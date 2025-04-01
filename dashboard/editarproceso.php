<?php
if (!isset($_POST['oculto'])) {
    header('Location:panel.php');
}

include '../model/database.php';

$id_categoria = $_POST['txtid'];
$cat_nom = $_POST['txtnombrecat'];
$cat_des = $_POST['txtdesecat'];

$sentencia = $conn->prepare("UPDATE categoria SET cat_nom = ?, cat_des = ? WHERE id_categoria = ?;");
$resultado = $sentencia->execute([$cat_nom, $cat_des, $id_categoria]);

// Verificar si la actualización fue exitosa
if ($resultado === TRUE) {
    // Redirigir a category.php con el parámetro 'message=success'
    header('Location: category.php?message=success');
    exit; // Terminar el script después de la redirección
} else {
    // En caso de error, puedes hacer algo aquí si lo deseas
}




?>