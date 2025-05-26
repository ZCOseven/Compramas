<?php
// filepath: c:\xampp\htdocs\proyectos\Compramas\view\public\cliente_pedido_detalle_ajax.php
if (session_status() === PHP_SESSION_NONE) session_start();
require_once '../controller/controlador_pedidos.php';

$idPedido = intval($_GET['id'] ?? 0);
$idCliente = $_SESSION['cliente']['id_cliente'] ?? 0;

$detalle = $controladorPedidos->obtenerDetallePedido($idPedido, $idCliente);

if (!$detalle) {
    echo "<div class='alert-error'>No se encontró el pedido o no tienes acceso.</div>";
    exit;
}
?>

<style>
.detalle-popup-lista {
    font-family: 'Segoe UI', Arial, sans-serif;
    color: #333;
    font-size: 1rem;
    background: #fff;
    border-radius: 10px;
    padding: 1.5em 1.2em;
    max-width: 520px;
    margin: 0 auto;
}
.detalle-popup-lista h2 {
    margin: 0 0 1em 0;
    color: #4a7c59;
    font-size: 1.3em;
    font-weight: 600;
    letter-spacing: 0.5px;
}
.detalle-popup-datos {
    display: flex;
    flex-wrap: wrap;
    gap: 2em;
    margin-bottom: 1.2em;
}
.detalle-popup-datos-col {
    flex: 1 1 200px;
    min-width: 180px;
}
.detalle-popup-datos-col div {
    margin-bottom: 0.4em;
}
.detalle-popup-total {
    font-weight: 600;
    color: #4a7c59;
    margin-top: 0.7em;
}
.detalle-popup-productos {
    margin-top: 1.2em;
}
.detalle-popup-productos table {
    width: 100%;
    border-collapse: collapse;
    background: #f8f8f8;
    font-size: 0.98em;
}
.detalle-popup-productos th, .detalle-popup-productos td {
    padding: 0.7em 0.5em;
    border-bottom: 1px solid #e0e0e0;
    text-align: left;
}
.detalle-popup-productos th {
    background: #e6efe6;
    color: #4a7c59;
    font-weight: 600;
    font-size: 1em;
}
.detalle-popup-productos td {
    color: #333;
}
.detalle-popup-productos tr:last-child td {
    border-bottom: none;
}
@media (max-width: 600px) {
    .detalle-popup-lista { padding: 1em 0.3em; }
    .detalle-popup-datos { flex-direction: column; gap: 0.7em; }
}
</style>

<div class="detalle-popup-lista">
    <h2>Pedido #<?= htmlspecialchars($detalle['id_pedido']) ?></h2>
    <div class="detalle-popup-datos">
        <div class="detalle-popup-datos-col">
            <div><b>Fecha:</b> <?= htmlspecialchars($detalle['fecha']) ?></div>
            <div><b>Estado:</b> <span><?= htmlspecialchars($detalle['estado']) ?></span></div>
            <div><b>Método de pago:</b> <?= htmlspecialchars($detalle['metodo_pago']) ?></div>
        </div>
        <div class="detalle-popup-datos-col">
            <div><b>Dirección:</b> <?= htmlspecialchars($detalle['direccion']) ?></div>
            <div><b>Subtotal:</b> S/ <?= number_format($detalle['subtotal'], 2) ?></div>
            <div><b>IGV:</b> S/ <?= number_format($detalle['igv'], 2) ?></div>
            <div class="detalle-popup-total"><b>Total:</b> S/ <?= number_format($detalle['total'], 2) ?></div>
        </div>
    </div>
    <div class="detalle-popup-productos">
        <b>Productos:</b>
        <table>
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio unitario</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($detalle['productos'] as $prod): ?>
                <tr>
                    <td><?= htmlspecialchars($prod['nombre_producto']) ?></td>
                    <td style="text-align:center;"><?= intval($prod['cantidad']) ?></td>
                    <td style="text-align:right;">S/ <?= number_format($prod['precio_unitario'], 2) ?></td>
                    <td style="text-align:right;">S/ <?= number_format($prod['subtotal'], 2) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
