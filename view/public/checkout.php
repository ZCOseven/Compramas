<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once '../controller/controlador_clientes.php';

// $clienteInfo se obtiene solo si el cliente está logueado
$clienteInfo = null;
if (isset($_SESSION['cliente'])) {
    $clienteId = $_SESSION['cliente']['id_cliente'];
    $clienteInfo = $controladorCliente->obtenerPorId($clienteId);
}

$mostrarAlerta = !isset($_SESSION['cliente']);
$title = "Compramas - Checkout";
$activePage = 'checkout';
ob_start();
?>

<!-- Estilos CSS personalizados -->
<link rel="stylesheet" href="../assets/css/productos.css">
<link rel="stylesheet" href="../assets/css/carrito.css">

<div class="c-barra-de-texto">
    <div class="c-mostrar-busqueda">
        <span><i class="fas fa-credit-card"></i> Finalizar Compra</span>
    </div>
</div>

<section class="c-principal checkout-pagina">
    <form class="checkout-form" method="post" action="procesar_pedido.php" autocomplete="off">
        <div class="checkout-flex">
            <div class="checkout-datos">
                <h2 class="checkout-titulo">Datos del comprador</h2>
                <div class="checkout-form-grupo">
                    <label for="nombre">Nombre y Apellido</label>
                    <input type="text" id="nombre" name="nombre" required maxlength="80"
                        value="<?= htmlspecialchars($clienteInfo['nombre'] ?? '') ?>">
                </div>
                <div class="checkout-form-grupo">
                    <label for="correo">Correo electrónico</label>
                    <input type="email" id="correo" name="correo" required maxlength="80"
                        value="<?= htmlspecialchars($clienteInfo['email'] ?? '') ?>">
                </div>
                <div class="checkout-form-grupo">
                    <label for="telefono">Teléfono</label>
                    <input type="tel" id="telefono" name="telefono" required maxlength="20"
                        value="<?= htmlspecialchars($clienteInfo['telefono'] ?? '') ?>">
                </div>
                <div class="checkout-form-grupo">
                    <label for="direccion">Dirección de envío</label>
                    <input type="text" id="direccion" name="direccion" required maxlength="150"
                        value="<?= htmlspecialchars($clienteInfo['direccion'] ?? '') ?>">
                </div>
                <div class="checkout-form-grupo">
                    <label for="metodo_pago">Método de pago</label>
                    <select id="metodo_pago" name="metodo_pago" required>
                        <option value="efectivo">Pago al recibir</option>
                        <!-- Puedes agregar más métodos si lo deseas -->
                    </select>
                </div>
            </div>
            <div class="checkout-resumen-box">
                <h2 class="checkout-titulo">Resumen de compra</h2>
                <div id="checkoutResumen">
                    <!-- JS renderiza aquí los productos del carrito -->
                </div>
                <button type="submit" class="carrito-btn carrito-btn-comprar" style="margin-top:2rem;width:100%;">Confirmar compra</button>
            </div>
        </div>
        <input type="hidden" name="carrito" id="carritoInput">
    </form>
</section>

<script>
    // Renderiza el resumen del carrito en el checkout
    document.addEventListener('DOMContentLoaded', function() {
        const resumen = document.getElementById('checkoutResumen');
        let carrito = JSON.parse(localStorage.getItem('carritoCompramas') || '[]');
        let subtotal = 0;

        if (carrito.length === 0) {
            resumen.innerHTML = '<p style="color:#b7c8b2;">No hay productos en el carrito.</p>';
            return;
        }

        let html = `<table class="carrito-tabla checkout-tabla">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>`;
        carrito.forEach(prod => {
            const sub = prod.precio * prod.cantidad;
            subtotal += sub;
            html += `<tr>
            <td style="text-align:left;">
                <strong>${prod.nombre}</strong>
                <div class="carrito-tabla-descripcion">${prod.descripcion}</div>
            </td>
            <td>${prod.cantidad}</td>
            <td>S/ ${(sub).toFixed(2)}</td>
        </tr>`;
        });
        const igv = subtotal * 0.18;
        const total = subtotal + igv;
        html += `</tbody>
        <tfoot>
            <tr>
                <td colspan="2" style="text-align:right;">Subtotal:</td>
                <td>S/ ${subtotal.toFixed(2)}</td>
            </tr>
            <tr>
                <td colspan="2" style="text-align:right;">IGV (18%):</td>
                <td>S/ ${igv.toFixed(2)}</td>
            </tr>
            <tr>
                <td colspan="2" style="text-align:right;font-weight:bold;">Total:</td>
                <td style="font-weight:bold;">S/ ${total.toFixed(2)}</td>
            </tr>
        </tfoot>
    </table>`;
        resumen.innerHTML = html;
    });

    document.querySelector('.checkout-form').addEventListener('submit', function(e) {
        e.preventDefault();

        // Prepara los datos del formulario
        document.getElementById('carritoInput').value = localStorage.getItem('carritoCompramas') || '[]';
        const form = e.target;
        const formData = new FormData(form);

        fetch('procesar_pedido.php', {
                method: 'POST',
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    localStorage.removeItem('carritoCompramas');
                    Swal.fire({
                        icon: 'success',
                        title: '¡Pedido realizado!',
                        text: 'Tu compra fue registrada correctamente.',
                        confirmButtonText: 'Ir a productos',
                        allowOutsideClick: false
                    }).then(() => {
                        window.location.href = 'cliente_pedidos.php';
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: data.message || 'No se pudo procesar el pedido.'
                    });
                }
            })
            .catch(() => {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'No se pudo conectar con el servidor.'
                });
            });
    });
</script>

<script>
    <?php if ($mostrarAlerta): ?>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'info',
                title: '¡Debes iniciar sesión!',
                text: 'Para continuar con el proceso de compra debes iniciar sesión o registrarte.',
                showCancelButton: true,
                confirmButtonText: 'Iniciar sesión',
                cancelButtonText: 'Cancelar',
                allowOutsideClick: false,
                backdrop: true, // Overlay oscuro
                customClass: {
                    popup: 'swal2-border-radius'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'login.php?return=checkout.php';
                } else {
                    window.history.back();
                }
            });
        });
    <?php endif; ?>
</script>

<?php
// Puedes quitar este debug en producción
// echo '<pre>SESION: '; print_r($_SESSION); echo '</pre>';

$content = ob_get_clean();
include 'template.php';
