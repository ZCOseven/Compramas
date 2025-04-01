<?php
session_start();
// Validación
if (!isset($_POST['oculto'])) {
    exit();
}

include '../model/database.php';

// Obtener los valores del formulario
$cat_nom = $_POST['txtnombrecat'];
$cat_des = $_POST['txtdesecat'];

// Preparar la sentencia INSERT 
$sentencia = $conn->prepare("INSERT INTO categoria (cat_nom, cat_des) VALUES (?, ?)");

// Ejecutar la sentencia con los valores proporcionados
$resultado = $sentencia->execute([$cat_nom, $cat_des]);

// Verificar si la inserción fue exitosa
if ($resultado === TRUE) {
    // Notificación de éxito
    $_SESSION['mensaje'] = '<div class="alert alert-success" role="alert">Los datos se han insertado correctamente en la tabla categoria.</div>';
} else {
    // Notificación de error
    $_SESSION['mensaje'] = '<div class="alert alert-danger" role="alert">Hubo un error al insertar los datos en la tabla categoria.</div>';
}
// Redireccionar de vuelta a la página del formulario
header('Location: panel.php');

?>
