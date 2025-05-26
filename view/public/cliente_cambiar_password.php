<?php
if (session_status() === PHP_SESSION_NONE) session_start();
header('Content-Type: application/json');
require_once '../controller/controlador_clientes.php';

$data = json_decode(file_get_contents('php://input'), true);

$idCliente = $_SESSION['cliente']['id_cliente'] ?? 0;
$passActual = $data['pass_actual'] ?? '';
$passNueva = $data['pass_nueva'] ?? '';

if (!$idCliente || !$passActual || !$passNueva) {
    echo json_encode(['success' => false, 'message' => 'Datos incompletos']);
    exit;
}

// Verifica la contraseña actual
$cliente = $controladorCliente->obtenerPorId($idCliente);
if (!$cliente || $cliente['password'] !== $passActual) {
    echo json_encode(['success' => false, 'message' => 'Contraseña actual incorrecta']);
    exit;
}

// Actualiza la contraseña
$resultado = $controladorCliente->actualizarPassword($idCliente, $passNueva);
if ($resultado['success']) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => $resultado['message']]);
}