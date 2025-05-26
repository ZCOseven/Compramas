<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once '../controller/controlador_productos.php';
require_once '../controller/controlador_clientes.php';

header('Content-Type: application/json');

try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Recibe datos del formulario
        $nombre = $_POST['nombre']??'';
        $correo = $_POST['correo']??'';
        $telefono = $_POST['telefono']??'';
        $direccion = $_POST['direccion']??'';
        $metodo_pago = $_POST['metodo_pago']??'';
        $carrito = json_decode($_POST['carrito'] ?? '[]', true);

        // Validación básica
        if (empty($nombre) || empty($correo) || empty($telefono) || empty($direccion) || empty($metodo_pago) || empty($carrito)) {
            echo json_encode(['success' => false, 'message' => 'Faltan datos obligatorios.']);
            exit;
        }

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

        // Inserta el pedido
        $idPedido = $controladorProducto->insertarPedidoCompleto($datosPedido, $carrito);

        // Actualiza la dirección del cliente si está logueado
        if (isset($_SESSION['cliente']['id_cliente'])) {
            $clienteId = $_SESSION['cliente']['id_cliente'];
            $controladorCliente->actualizarDireccion($clienteId, $direccion);
        }

        // Log de depuración (opcional, puedes quitarlo en producción)
        // file_put_contents('debug_pedido.txt', print_r($_POST, true));

        if ($idPedido) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Error al procesar el pedido.']);
        }
        exit;
    } else {
        echo json_encode(['success' => false, 'message' => 'Método no permitido.']);
        exit;
    }
} catch (Throwable $e) {
    echo json_encode(['success' => false, 'message' => 'Error interno: ' . $e->getMessage()]);
    exit;
}
