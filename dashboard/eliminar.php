<?php 
if (!isset($_GET['id'])) {
    exit();
}


$id_categoria = $_GET['id'];
$id_producto = $_GET['id'];

include '../model/database.php';


//SEGURIDAD =?
$sentencia = $conn->prepare("DELETE FROM categoria  WHERE id_categoria = ?;");
$resultado = $sentencia->execute([$id_categoria]);


if ($resultado === TRUE) {
   
    header('Location:category.php');
   
} else {
    echo "error";
}


//producto
$sentencia2 = $conn->prepare("DELETE FROM producto  WHERE id_producto = ?;");
$resultado2 = $sentencia2->execute([$id_producto]);


if ($resultado2 === TRUE) {
   
    header('Location:product.php');
   
} else {
    echo "error";
}

?>