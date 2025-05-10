<?php
session_start();

require './model/database.php';



if (isset($_SESSION['id'])) {
    $records = $conn->prepare('SELECT id, email, nombre, password FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['id']);
    if ($records->execute()) {
        $results = $records->fetch(PDO::FETCH_ASSOC);
        if ($results) {
            $user = $results;
        } else {
            echo "Datos de usuario no encontrados en la base de datos.";
        }
    } else {
        echo "Fallo en la consulta a la base de datos.";
    }
} 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Aos CSS(animate scroll) -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/panel.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg ">
        <div class="container-fluid px-5" >
            <a class="navbar-brand"> <img class="icono" src="./view/assets/img/general/logo-compramas.png"></img></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item px-3">
                        <a class="nav-link active" aria-current="page" href="#">Inicio</a>
                    </li>
                    <li class="nav-item px-3">
                        <a class="nav-link active" href="#">Blog</a>
                    </li>

                    <li class="nav-item px-3">
                        <a class="nav-link active" aria-disabled="true">Contacto</a>
                    </li>
                </ul>
                <div class="d-flex" role="search">

                    <a class="btn" href="./view/public/index.php"> <button class="btn1">Cerrar</button></a>
                </div>
            </div>
        </div>
    </nav>
    </nav>


    <div class="body-first">

        <div class="contenedor">

            <img data-aos="zoom-in" data-aos-duration="2500" src="./view/assets/img/inicio/banner-hero-transparent.png" alt="Imagen Rectangular">

            <div class="content" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="1000">
                <p class="bienvenida"> Bienvenido/a <?=  $_SESSION['user']['nombre']; ?>
                    <br>Has iniciado sesión correctamente
                </p>
            </div>

        </div>
    </div>




    <!-- Aos CSS(animate scroll) -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <!--animation inicio-->
    <script>
    AOS.init();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>