function idProducto(idproducto) {
    console.log("id producto presionado:" + idproducto);
}

// Declaración de funciones globales
let aplicarFiltros, limpiarFiltros;

document.addEventListener('DOMContentLoaded', function() {
    // 1. DEFINICIÓN DE ELEMENTOS DEL DOM
    const checkboxes = document.querySelectorAll('.c-filtros__checkbox');
    const radiosStock = document.querySelectorAll('.c-filtros__radio[name="stock"]');
    const productos = document.querySelectorAll('.producto-card');
    const botonAplicar = document.querySelector('.c-filtros__boton--aplicar');
    const botonLimpiar = document.querySelector('.c-filtros__boton--limpiar');
    const buscador = document.getElementById('buscador');
    const datalist = document.getElementById('sugerencias-productos');

    const minInput = document.querySelector('.range-slider__input--min');
    const maxInput = document.querySelector('.range-slider__input--max');
    const range = document.querySelector('.range-slider__range');
    const rangeContainer = document.querySelector('.range-slider__container');
    const minValue = document.getElementById('precio-min');
    const maxValue = document.getElementById('precio-max');

    const MIN_DIFFERENCE = 10;
    let minVal = parseInt(minInput.value);
    let maxVal = parseInt(maxInput.value);
    let isDraggingRange = false;
    let dragStartX = 0;
    let dragStartMin = 0;
    let dragStartMax = 0;

    function updateRangeSlider() {
        if (minVal > (maxVal - MIN_DIFFERENCE)) {
            if (minVal > parseInt(minInput.max) - MIN_DIFFERENCE) {
                minVal = parseInt(minInput.max) - MIN_DIFFERENCE;
                maxVal = parseInt(maxInput.max);
            } else {
                maxVal = minVal + MIN_DIFFERENCE;
            }
            minInput.value = minVal;
            maxInput.value = maxVal;
        }

        const percent1 = (minVal / parseInt(minInput.max)) * 100;
        const percent2 = (maxVal / parseInt(maxInput.max)) * 100;
        range.style.left = percent1 + '%';
        range.style.width = (percent2 - percent1) + '%';

        minValue.textContent = 'S/' + minVal;
        maxValue.textContent = 'S/' + maxVal;
    }

    function handleRangeDrag(e) {
        if (!isDraggingRange) return;

        const containerRect = rangeContainer.getBoundingClientRect();
        const containerWidth = containerRect.width;
        const moveX = e.clientX - dragStartX;
        const movePercent = (moveX / containerWidth) * 100;

        const newMin = dragStartMin + (movePercent / 100) * parseInt(minInput.max);
        const newMax = dragStartMax + (movePercent / 100) * parseInt(maxInput.max);

        if (newMin >= 0 && newMax <= parseInt(maxInput.max)) {
            minVal = Math.round(newMin);
            maxVal = Math.round(newMax);
            minInput.value = minVal;
            maxInput.value = maxVal;
            updateRangeSlider();
        }
    }

    function stopRangeDrag() {
        isDraggingRange = false;
        document.removeEventListener('mousemove', handleRangeDrag);
        document.removeEventListener('mouseup', stopRangeDrag);
    }

    function actualizarSugerenciasBusqueda(texto) {
        datalist.innerHTML = '';
        texto = texto.trim().toLowerCase();
        if (texto.length === 0) return;

        const nombresUnicos = new Set(
            Array.from(document.querySelectorAll('.producto-card:not(.ocultar)'))
            .map(producto => producto.querySelector('.producto-card__nombre').textContent.trim())
        );

        nombresUnicos.forEach(nombre => {
            if (nombre.toLowerCase().startsWith(texto)) {
                const option = document.createElement('option');
                option.value = nombre;
                datalist.appendChild(option);
            }
        });
    }

    aplicarFiltros = function() {
        const categoriasSeleccionadas = Array.from(checkboxes)
            .filter(checkbox => checkbox.checked)
            .map(checkbox => checkbox.nextElementSibling.textContent.trim());

        const filtroStock = document.querySelector('.c-filtros__radio[name="stock"]:checked')?.value || 'todos';
        const precioMin = parseInt(minInput.value);
        const precioMax = parseInt(maxInput.value);
        const textoBusqueda = buscador.value.toLowerCase();

        productos.forEach(producto => {
            const categoriaProducto = producto.dataset.categoria;
            const stockProducto = parseInt(producto.dataset.stock);
            const precioProducto = parseFloat(producto.querySelector('.producto-card__precio').textContent.replace('S/', ''));
            const nombreProducto = producto.querySelector('.producto-card__nombre').textContent.toLowerCase();

            const cumpleCategoria = categoriasSeleccionadas.length === 0 || categoriasSeleccionadas.includes(categoriaProducto);
            const cumpleStock = filtroStock === 'todos' ||
                (filtroStock === 'disponible' && stockProducto > 0) ||
                (filtroStock === 'agotado' && stockProducto === 0);
            const cumplePrecio = precioProducto >= precioMin && precioProducto <= precioMax;
            const cumpleBusqueda = !textoBusqueda || nombreProducto.includes(textoBusqueda);

            producto.classList.toggle('ocultar', !(cumpleCategoria && cumpleStock && cumplePrecio && cumpleBusqueda));
        });

        actualizarSugerenciasBusqueda(buscador.value);

        const mensajeCategoria = document.querySelector('.c-mostrar-busqueda span');
        if (mensajeCategoria) {
            let mensaje = '';

            // Parte de categorías
            if (categoriasSeleccionadas.length === 1) {
                mensaje = `Mostrando productos de la categoría: <strong>${categoriasSeleccionadas[0]}</strong>`;
            } else if (categoriasSeleccionadas.length > 1) {
                mensaje = `Mostrando productos de <strong>múltiples categorías</strong>`;
            } else {
                mensaje = "Todos nuestros productos | sin una categoría en específico";
            }

            // Parte del stock
            if (filtroStock === 'disponible') {
                mensaje += ' - <strong>En stock</strong>';
            } else if (filtroStock === 'agotado') {
                mensaje += ' - <strong>Agotados</strong>';
            } else {
                mensaje += ' - <strong>Todos</strong>';
            }

            mensajeCategoria.innerHTML = mensaje;
        }
    };

    limpiarFiltros = function() {
        checkboxes.forEach(checkbox => checkbox.checked = false);
        document.getElementById('stock-todos').checked = true;

        minInput.value = 0;
        maxInput.value = parseInt(maxInput.max);
        minVal = 0;
        maxVal = parseInt(maxInput.max);
        updateRangeSlider();

        buscador.value = '';

        productos.forEach(producto => producto.classList.remove('ocultar'));
        actualizarSugerenciasBusqueda(buscador.value);

        const url = new URL(window.location);
        url.searchParams.delete('cat');
        window.history.replaceState({}, '', url);

        const mensajeCategoria = document.querySelector('.c-mostrar-busqueda span');
        if (mensajeCategoria && mensajeCategoria.innerHTML.includes('Mostrando productos de la categoría')) {
            mensajeCategoria.innerHTML = "Todos nuestros productos | sin una categoría en específico";
        }
    };

    // EVENT LISTENERS
    range.addEventListener('mousedown', function(e) {
        isDraggingRange = true;
        dragStartX = e.clientX;
        dragStartMin = minVal;
        dragStartMax = maxVal;
        document.addEventListener('mousemove', handleRangeDrag);
        document.addEventListener('mouseup', stopRangeDrag);
        e.preventDefault();
    });

    minInput.addEventListener('input', function() {
        minVal = parseInt(this.value);
        updateRangeSlider();
    });

    maxInput.addEventListener('input', function() {
        maxVal = parseInt(this.value);
        updateRangeSlider();
    });

    buscador.addEventListener('input', function() {
        actualizarSugerenciasBusqueda(buscador.value);
    });

    buscador.addEventListener('change', aplicarFiltros);
    botonAplicar.addEventListener('click', aplicarFiltros);
    botonLimpiar.addEventListener('click', limpiarFiltros);

    updateRangeSlider();
    actualizarSugerenciasBusqueda(buscador.value);
    datalist.innerHTML = '';

    // Si existe una categoría en la URL, activar el checkbox correspondiente y aplicar filtros
    const urlParams = new URLSearchParams(window.location.search);
    const categoriaURL = urlParams.get('cat');

    if (categoriaURL) {
        checkboxes.forEach(checkbox => {
            if (checkbox.value.toLowerCase() === categoriaURL.toLowerCase()) {
                checkbox.checked = true;
            }
        });
        aplicarFiltros();
    }
});