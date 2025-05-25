<?php
require_once '../controller/controlador_productos.php';
$controlador = $controladorProducto;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recibe datos del formulario
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];
    $metodo_pago = $_POST['metodo_pago'];

    // Recibe el carrito por JSON (enviado por JS)
    $carrito = json_decode($_POST['carrito'], true);

    // Calcula totales
    $subtotal = 0;
    foreach ($carrito as $prod) {
        $subtotal += $prod['precio'] * $prod['cantidad'];
    }
    $igv = $subtotal * 0.18;
    $total = $subtotal + $igv;

    $datosPedido = [
        'nombre' => $nombre,
        'correo' => $correo,
        'telefono' => $telefono,
        'direccion' => $direccion,
        'metodo_pago' => $metodo_pago,
        'total' => $total,
        'igv' => $igv,
        'subtotal' => $subtotal
    ];

    $idPedido = $controlador->insertarPedidoCompleto($datosPedido, $carrito);

    header('Content-Type: application/json');
    if ($idPedido) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error al procesar el pedido.']);
    }
    exit;
}
?>