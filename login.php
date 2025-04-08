<?php

session_start();

/* Hola mundo prueba de pedro */

if (isset ($_SESSION['user_id'])) {
    header('Location:panel.php');
}
require 'model/database.php';

if (!empty ($_POST['email']) && !empty ($_POST['password'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE email = :email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';

    if (is_countable($results) > 0 && password_verify($_POST['password'], $results['password'])) {
        $_SESSION['user_id'] = $results['id'];
        header("Location:dashboard/panel.php");
    } else {
        $message = 'Lo sentimos, esas credenciales no coinciden.';
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/login.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Lato&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
</head>

<body>

    <?php if (!empty ($message)): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= $message ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>


    <div data-aos="fade-up" data-aos-duration="2000" class="wrapper" style="font-family: 'Poppins', sans-serif;">
        <div class="container main">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 side-image">
                    <img  src="images/img4.png" alt="">
                </div>
                <div class="col-lg-6 col-md-6 right">
                    <div class="input-box">
                        <form class="mx-auto" action="login.php" method="POST">
                            <header>Iniciar sesión</header>
                            <div class="input-field">
                                <input type="text" class="input" id="email" required="" autocomplete="off" name="email">
                                <label for="email">Email</label>
                            </div>
                            <div class="input-field">
                                <input type="password" class="input" id="pass" required="" name="password">
                                <label for="pass">Contraseña</label>
                            </div>
                            <div class="input-field">
                                <input type="submit" class="submit" value="Ingresar">
                            </div>
                            <div class="signin">
                                <span>No tienes cuenta? <a href="signup.php">Crear cuenta</a></span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- duracion de la alerta -->
    <script>
        setTimeout(function () {
            document.querySelector('.alert').remove();
        }, 3000); 
    </script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>


</html>