<?php
if (!isset($_POST['oculto'])) {
    header('Location:panel.php');
}

include '../model/database.php';



//PRODUCTO
$id_producto = $_POST['txtidpro'];
$nom_pro = $_POST['txtnombrepro'];
$costo = $_POST['txtcostopro'];
$stock = $_POST['txtstockpro'];
$categoria = $_POST['txtcategoria'];
$descripcion = $_POST['txtdescripcionpro'];
// $imagen = $_POST['imagen'];


// Manejar la carga de la imagen
if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
    $imagen_temporal = $_FILES['imagen']['tmp_name'];
    $nombre_imagen = $_FILES['imagen']['name'];
    $ruta_imagen = '../imgpro/' . $nombre_imagen; // Establece la ruta donde guardar la imagen

    // Mover la imagen temporal a la ruta de destino
    if (move_uploaded_file($imagen_temporal, $ruta_imagen)) {
        // Si se ha movido correctamente, actualizar la ruta de la imagen en la base de datos
        $imagen = $ruta_imagen;
    } else {
       
       $_SESSION['mensaje'] = '<div class="alert alert-danger" role="alert">Error en la imagen </div>';
       header('Location: product.php');
       exit();
    }
}

// Si no se proporciona una nueva imagen, conservar la imagen existente
if (!isset($imagen)) {
    $imagen = $_POST['imagen_actual']; // Conserva la imagen existente
}


$sentencia2 = $conn->prepare("UPDATE producto SET nom_pro = ?, costo = ?, stock = ?, categoria = ?, descripcion = ?, imagen = ? WHERE id_producto = ?;");
$resultado2 = $sentencia2->execute([$nom_pro, $costo, $stock, $categoria, $descripcion, $imagen, $id_producto]);

// Verificar si la actualización fue exitosa
if ($resultado2 === TRUE) {
    // Redirigir a category.php con el parámetro 'message=success'
    header('Location: product.php?message=success');
    exit; // Terminar el script después de la redirección
} else {
    // En caso de error, puedes hacer algo aquí si lo deseas
}


?>