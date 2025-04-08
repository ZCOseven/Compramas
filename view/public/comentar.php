<?php
/* Conexión a la bd */
require '../../model/database.php';

/* Verificar si el formulario ha sido enviado */
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    /* Verificar si los datos del formulario existen */
    if (isset($_POST['fname'], $_POST['lname'], $_POST['email'], $_POST['message'])) {

        /* Recibe los datos del formulario */
        $nombre = $_POST['fname'];
        $apellido = $_POST['lname'];
        $correo = $_POST['email'];
        $mensaje = $_POST['message'];

        $stmt = $conn->prepare("INSERT INTO contacto (nombres, apellidos, correo, mensaje) VALUES (?, ?, ?, ?)");

        /* Vincular los parámetros */
        $stmt->bindParam(1, $nombre);
        $stmt->bindParam(2, $apellido);
        $stmt->bindParam(3, $correo);
        $stmt->bindParam(4, $mensaje);

        if ($stmt->execute()) {
            /* Si esta bien me redirije a la página de contacto */
            header("Location: index.php");
            exit();
        } else {
            $errorInfo = $stmt->errorInfo(); 
            echo "Error: " . $errorInfo[2];
        }
        $stmt = null;
    } else {
        echo "Faltan datos en el formulario.";
    }
}
?>
