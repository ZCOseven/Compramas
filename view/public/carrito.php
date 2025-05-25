<?php
$title = "Compramas - Carrito de Compras";
$activePage = 'carrito';
ob_start();
?>

<!-- Estilos CSS personalizados -->
<link rel="stylesheet" href="../assets/css/productos.css">
<link rel="stylesheet" href="../assets/css/carrito.css">

<div class="c-barra-de-texto">
    <div class="c-mostrar-busqueda">
        <span><i class="fas fa-shopping-cart"></i> Carrito de Compras</span>
    </div>
</div>

<section class="c-principal carrito-pagina">
    <div class="carrito-tabla-container" style="margin-top:2rem;">
        <table class="carrito-tabla">
            <thead>
                <tr>
                    <th>Imagen</th>
                    <th>Producto</th>
                    <th>Precio unitario</th>
                    <th>Cantidad</th>
                    <th>Subtotal<br><span style="font-weight:400;">S/</span></th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody id="carritoTablaBody">
                <!-- Aquí JS renderiza los productos -->
            </tbody>
        </table>
        <div id="carritoVacio" class="carrito-vacio" style="display:none;">
            <i class="fas fa-shopping-basket"></i>
            <p>Tu carrito está vacío.<br>¡Añade productos para comenzar!</p>
        </div>
    </div>
    <div class="carrito-resumen">
        <div><span>Subtotal:</span> <span id="carritoSubtotal">S/ 0.00</span></div>
        <div><span>IGV (18%):</span> <span id="carritoIGV">S/ 0.00</span></div>
        <div class="carrito-total"><span>Total:</span> <span id="carritoTotal">S/ 0.00</span></div>
        <div class="carrito-acciones">
            <a href="productos.php" class="carrito-btn carrito-btn-ver">Seguir comprando</a>
            <a href="checkout.php" class="carrito-btn carrito-btn-comprar">Procesar compra</a>
        </div>
    </div>
</section>

<!-- Script para renderizar el carrito desde localStorage -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const tbody = document.getElementById('carritoTablaBody');
    const carritoVacio = document.getElementById('carritoVacio');
    const subtotalElem = document.getElementById('carritoSubtotal');
    const igvElem = document.getElementById('carritoIGV');
    const totalElem = document.getElementById('carritoTotal');

    function getCarrito() {
        return JSON.parse(localStorage.getItem('carritoCompramas') || '[]');
    }

    function setCarrito(carrito) {
        localStorage.setItem('carritoCompramas', JSON.stringify(carrito));
    }

    function renderCarrito() {
        const carrito = getCarrito();
        tbody.innerHTML = '';
        let subtotal = 0;

        if (carrito.length === 0) {
            carritoVacio.style.display = 'flex';
            subtotalElem.textContent = 'S/ 0.00';
            igvElem.textContent = 'S/ 0.00';
            totalElem.textContent = 'S/ 0.00';
            return;
        } else {
            carritoVacio.style.display = 'none';
        }

        carrito.forEach(prod => {
            const sub = prod.precio * prod.cantidad;
            subtotal += sub;
            const tr = document.createElement('tr');
            tr.innerHTML = `
                <td><img src="${prod.imagen}" alt="${prod.nombre}" style="width:64px;height:64px;object-fit:cover;border-radius:8px;"></td>
                <td style="text-align:left; padding-inline: 2rem;">
                    <strong>${prod.nombre}</strong>
                    <div class="carrito-tabla-descripcion">
                        ${prod.descripcion}
                    </div>
                </td>
                <td>S/ ${parseFloat(prod.precio).toFixed(2)}</td>
                <td>
                  <div class="carrito-producto-cantidad-control">
                    <button class="carrito-cantidad-menos" ${prod.cantidad === 1 ? 'disabled' : ''} data-id="${prod.id}">-</button>
                    <span class="carrito-producto-cantidad"> ${prod.cantidad} </span>
                    <button class="carrito-cantidad-mas" data-id="${prod.id}">+</button>
                  </div>
                </td>
                <td>${(sub).toFixed(2)}</td>
                <td>
                    <button class="carrito-producto-eliminar" data-id="${prod.id}" aria-label="Eliminar"><i class="fas fa-trash"></i></button>
                </td>
            `;
            tbody.appendChild(tr);
        });

        const igv = subtotal * 0.18;
        const total = subtotal + igv;
        subtotalElem.textContent = `S/ ${subtotal.toFixed(2)}`;
        igvElem.textContent = `S/ ${igv.toFixed(2)}`;
        totalElem.textContent = `S/ ${total.toFixed(2)}`;
    }

    // Eventos para +, -, eliminar
    tbody.addEventListener('click', function(e) {
        let carrito = getCarrito();
        if (e.target.classList.contains('carrito-cantidad-mas')) {
            const id = e.target.dataset.id;
            const prod = carrito.find(p => p.id == id);
            if (prod) prod.cantidad++;
            setCarrito(carrito);
            renderCarrito();
        }
        if (e.target.classList.contains('carrito-cantidad-menos')) {
            const id = e.target.dataset.id;
            const prod = carrito.find(p => p.id == id);
            if (prod && prod.cantidad > 1) prod.cantidad--;
            setCarrito(carrito);
            renderCarrito();
        }
        if (e.target.classList.contains('carrito-producto-eliminar') || e.target.closest('.carrito-producto-eliminar')) {
            const btn = e.target.closest('.carrito-producto-eliminar');
            const id = btn.dataset.id;
            carrito = carrito.filter(p => p.id != id);
            setCarrito(carrito);
            renderCarrito();
        }
    });

    renderCarrito();
});
</script>

<?php
$content = ob_get_clean();
include 'template.php';
?>