document.addEventListener('DOMContentLoaded', function() {
    const carritoProductos = document.getElementById('carritoProductos');
    const carritoVacio = document.getElementById('carritoVacio');

    // Función para mostrar la notificación
    function mostrarNotificacion(mensaje) {
        const noti = document.getElementById('carritoNotificacion');
        const texto = document.getElementById('carritoNotificacionTexto');
        texto.textContent = mensaje;
        noti.classList.add('activo');
        setTimeout(() => noti.classList.remove('activo'), 1800);
    }

    // Añadir producto al carrito
    document.body.addEventListener('click', function(e) {
        // Añadir producto (esto ya funciona bien)
        if (e.target.classList.contains('producto-card__btn-add')) {
            const btn = e.target;
            const id = btn.dataset.id;
            const nombre = btn.dataset.nombre;
            const precio = parseFloat(btn.dataset.precio);
            const descripcion = btn.dataset.descripcion;
            const imagen = btn.dataset.imagen;

            // Leer carrito de localStorage
            let carrito = JSON.parse(localStorage.getItem('carritoCompramas') || '[]');
            const existente = carrito.find(p => p.id == id);
            if (existente) {
                existente.cantidad++;
            } else {
                carrito.push({ id, nombre, precio, descripcion, imagen, cantidad: 1 });
            }
            localStorage.setItem('carritoCompramas', JSON.stringify(carrito));
            if (typeof mostrarNotificacion === 'function') {
                mostrarNotificacion('¡Producto añadido al carrito!');
            }
            if (typeof renderCarrito === 'function') {
                renderCarrito();
            }
        }

        // Aumentar cantidad
        if (e.target.classList.contains('carrito-cantidad-mas')) {
            const id = e.target.closest('.carrito-producto').dataset.id;
            let carrito = JSON.parse(localStorage.getItem('carritoCompramas') || '[]');
            const prod = carrito.find(p => p.id == id);
            if (prod) {
                prod.cantidad++;
                localStorage.setItem('carritoCompramas', JSON.stringify(carrito));
                renderCarrito();
            }
        }

        // Disminuir cantidad
        if (e.target.classList.contains('carrito-cantidad-menos')) {
            const id = e.target.closest('.carrito-producto').dataset.id;
            let carrito = JSON.parse(localStorage.getItem('carritoCompramas') || '[]');
            const prod = carrito.find(p => p.id == id);
            if (prod && prod.cantidad > 1) {
                prod.cantidad--;
                localStorage.setItem('carritoCompramas', JSON.stringify(carrito));
                renderCarrito();
            }
        }

        // Eliminar producto
        if (e.target.classList.contains('carrito-producto-eliminar') || e.target.closest('.carrito-producto-eliminar')) {
            const btn = e.target.closest('.carrito-producto-eliminar');
            const id = btn.closest('.carrito-producto').dataset.id;
            let carrito = JSON.parse(localStorage.getItem('carritoCompramas') || '[]');
            carrito = carrito.filter(p => p.id != id);
            localStorage.setItem('carritoCompramas', JSON.stringify(carrito));
            renderCarrito();
        }
    });

    function renderCarrito() {
        const carrito = JSON.parse(localStorage.getItem('carritoCompramas')) || [];

        // Referencias a los elementos de totales
        const subtotalElem = document.getElementById('carritoSubtotal');
        const igvElem = document.getElementById('carritoIGV');
        const totalElem = document.getElementById('carritoTotal');
        let subtotal = 0;

        // Mostrar/ocultar mensaje vacío
        if (carrito.length === 0) {
            document.getElementById('carritoVacio').style.display = 'flex';
            // Limpiar productos previos
            carritoProductos.querySelectorAll('.carrito-producto').forEach(el => el.remove());
            // Limpiar totales
            if (subtotalElem) subtotalElem.textContent = 'S/ 0.00';
            if (igvElem) igvElem.textContent = 'S/ 0.00';
            if (totalElem) totalElem.textContent = 'S/ 0.00';
            return;
        } else {
            document.getElementById('carritoVacio').style.display = 'none';
        }

        // Limpiar productos previos
        carritoProductos.querySelectorAll('.carrito-producto').forEach(el => el.remove());

        // Renderizar productos y calcular subtotal
        carrito.forEach(prod => {
            subtotal += prod.precio * prod.cantidad;
            const div = document.createElement('div');
            div.className = 'carrito-producto';
            div.dataset.id = prod.id;
            div.innerHTML = `
                <img src="${prod.imagen}" alt="Producto" class="carrito-producto-img">
                <div class="carrito-producto-info">
                    <span class="carrito-producto-nombre">${prod.nombre}</span>
                    <span class="carrito-producto-descripcion">${prod.descripcion}</span>
                    <div class="carrito-producto-cantidad-control">
                        <button class="carrito-cantidad-menos" ${prod.cantidad === 1 ? 'disabled' : ''}>-</button>
                        <span class="carrito-producto-cantidad">x${prod.cantidad}</span>
                        <button class="carrito-cantidad-mas">+</button>
                    </div>
                    <span class="carrito-producto-precio">S/ ${(prod.precio * prod.cantidad).toFixed(2)}</span>
                </div>
                <button class="carrito-producto-eliminar" aria-label="Eliminar"><i class="fas fa-trash"></i></button>
            `;
            carritoProductos.appendChild(div);
        });

        // Calcular IGV y total
        const igv = subtotal * 0.18;
        const total = subtotal + igv;

        // Actualizar los totales en el DOM
        if (subtotalElem) subtotalElem.textContent = `S/ ${subtotal.toFixed(2)}`;
        if (igvElem) igvElem.textContent = `S/ ${igv.toFixed(2)}`;
        if (totalElem) totalElem.textContent = `S/ ${total.toFixed(2)}`;
    }

    // Inicializa el carrito vacío al cargar
    renderCarrito();
});