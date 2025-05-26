<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once '../controller/controlador_productos.php';
require_once '../controller/controlador_pedidos.php';

if (!isset($_SESSION['cliente']['id_cliente'])) {
    header('Location: login.php');
    exit;
}

$title = "Mis pedidos";
$activePage = 'pedidos';
ob_start();

$idCliente = $_SESSION['cliente']['id_cliente'];
$pedidos = $controladorPedidos->obtenerPedidosPorCliente($idCliente);
?>

<link rel="stylesheet" href="../assets/css/productos.css">
<link rel="stylesheet" href="../assets/css/carrito.css">
<link rel="stylesheet" href="../assets/css/pedido.css">

<div class="c-barra-de-texto">
    <div class="c-mostrar-busqueda">
        <span><i class="fas fa-list"></i> Mis pedidos</span>
    </div>
</div>

<section class="cliente-panel">
    <!-- Menú lateral -->
    <nav class="cliente-menu">
        <ul>
            <li><a href="cliente_perfil.php" <?= $activePage === 'perfil' ? ' class="activo"' : '' ?>>Mi perfil</a></li>
            <li><a href="cliente_pedidos.php" <?= $activePage === 'pedidos' ? ' class="activo"' : '' ?>>Mis pedidos</a></li>
        </ul>
    </nav>
    <!-- Contenido principal -->
    <div class="cliente-contenido">
        <div class="pedidos-lista">
            <?php if ($pedidos && count($pedidos) > 0): ?>
                <table class="carrito-tabla pedidos-tabla">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Fecha</th>
                            <th>Total</th>
                            <th>Estado</th>
                            <th>Ver detalle</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pedidos as $pedido): ?>
                            <tr>
                                <td><?= htmlspecialchars($pedido['id_pedido']) ?></td>
                                <td><?= htmlspecialchars($pedido['fecha']) ?></td>
                                <td>S/ <?= number_format($pedido['total'], 2) ?></td>
                                <td><?= htmlspecialchars($pedido['estado']) ?></td>
                                <td>
                                    <a href="#" class="carrito-btn carrito-btn-ver" onclick="verDetallePedido(<?= $pedido['id_pedido'] ?>);return false;">Ver</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <div class="alert-info" style="margin:2rem 0;">No tienes pedidos registrados.</div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Modal para detalle de pedido -->
<div id="detalleModal" class="modal" style="display:none;">
    <div class="modal-content">
        <span class="close" id="cerrarModal">&times;</span>
        <div id="detallePedidoContenido">
            <!-- Aquí se cargará el detalle del pedido -->
        </div>
    </div>
</div>

<style>
    .modal {
        display: none;
        position: fixed;
        z-index: 9999;
        left: 0;
        top: 0;
        width: 100vw;
        height: 100vh;
        background: rgba(0, 0, 0, 0.4);
        justify-content: center;
        align-items: center;
    }

    .modal-content {
        background: #fff;
        margin: 5% auto;
        padding: 2rem;
        border-radius: 10px;
        width: 95%;
        max-width: 500px;
        position: relative;
        box-shadow: 0 2px 16px rgba(0, 0, 0, 0.15);
    }

    .close {
        position: absolute;
        top: 10px;
        right: 20px;
        font-size: 2rem;
        cursor: pointer;
        color: #6fa36f;
    }
</style>

<script>
    function verDetallePedido(idPedido) {
        // Muestra el modal
        document.getElementById('detalleModal').style.display = 'flex';
        // Limpia el contenido
        document.getElementById('detallePedidoContenido').innerHTML = 'Cargando...';

        // Llama a un archivo PHP que devuelva el detalle del pedido en HTML
        fetch('cliente_pedido_detalle_ajax.php?id=' + idPedido)
            .then(res => res.text())
            .then(html => {
                document.getElementById('detallePedidoContenido').innerHTML = html;
            })
            .catch(() => {
                document.getElementById('detallePedidoContenido').innerHTML = 'Error al cargar el detalle.';
            });
    }

    // Cierra el modal al hacer click en la X o fuera del contenido
    document.getElementById('cerrarModal').onclick = function() {
        document.getElementById('detalleModal').style.display = 'none';
    };
    window.onclick = function(event) {
        if (event.target === document.getElementById('detalleModal')) {
            document.getElementById('detalleModal').style.display = 'none';
        }
    };
</script>

<?php
$content = ob_get_clean();
include 'template.php';
