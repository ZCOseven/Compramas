<?php
session_start();

// Incluir el archivo de conexión a la base de datos
include '../model/database.php';

// Validación
if (isset($_POST['oculto'])) {
  

    // Validación de campos obligatorios
    if (empty($_POST['txtnombrepro']) || empty($_POST['txtcostopro']) || empty($_POST['txtstockpro']) || empty($_POST['txtcategoria'])) {
        $_SESSION['mensaje'] = '<div class="alert alert-danger" role="alert">Todos los campos son obligatorios.</div>';
        header('Location: addproduct.php');
        exit();
    }

    // Validación de valores numéricos
    $costo = $_POST['txtcostopro'];
    $stock = $_POST['txtstockpro'];
    if (!is_numeric($costo) || !is_numeric($stock)) {
        $_SESSION['mensaje'] = '<div class="alert alert-danger" role="alert">El costo y el stock deben ser valores numéricos válidos.</div>';
        header('Location: addproduct.php');
        exit();
    }

    // Obtener los valores del formulario
    $nom_pro = $_POST['txtnombrepro'];
    $costo = number_format($_POST['txtcostopro'], 2);
    $stock = $_POST['txtstockpro'];
    $categoria = $_POST['txtcategoria'];
    $descripcion = $_POST['txtdescripcionpro'];

    // Manejar la carga de la imagen
    if (isset($_FILES['imagen'])) {
        $imagen = $_FILES['imagen'];

        // Obtener información de la imagen
        $nombre_imagen = $imagen['name'];
        $imagen_temporal = $imagen['tmp_name'];
        $ruta_imagen = '../imgpro/' . $nombre_imagen; // Ruta donde se guardan las imágenes

        // Mover la imagen al directorio deseado
        if (!move_uploaded_file($imagen_temporal, $ruta_imagen)) {
            // Si no se puede mover la imagen, mostrar un mensaje de error y salir
            $_SESSION['mensaje'] = '<div class="alert alert-danger" role="alert">Hubo un error al cargar la imagen.</div>';
            header('Location: addproduct.php');
            exit();
        }
    } else {
        // Si no se proporciona una imagen, mostrar un mensaje de error y salir
        $_SESSION['mensaje'] = '<div class="alert alert-danger" role="alert">Debes subir una imagen para el producto.</div>';
        header('Location: addproduct.php');
        exit();
    }

    // Preparar la sentencia INSERT 
    $sentencia2 = $conn->prepare("INSERT INTO producto (nom_pro, costo, stock, categoria, descripcion, imagen) VALUES (?, ?, ?, ?, ?, ?)");

    // Ejecutar la sentencia con los valores proporcionados
    $resultado2 = $sentencia2->execute([$nom_pro, $costo, $stock, $categoria, $descripcion, $ruta_imagen]);

    // Verificar si la inserción fue exitosa
    if ($resultado2 === TRUE) {
        // Notificación de éxito
        $_SESSION['mensaje'] = '<div class="alert alert-success" role="alert">Los datos se han insertado correctamente en la tabla producto.</div>';
    } else {
        // Notificación de error
        $_SESSION['mensaje'] = '<div class="alert alert-danger" role="alert">Hubo un error al insertar los datos en la tabla producto.</div>';
    }

    // Redireccionar de vuelta a la página del formulario
    header('Location: addproduct.php');
    exit();
}
?>