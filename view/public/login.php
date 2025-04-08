<?php
session_start();

require '../../model/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        
        $_SESSION['user'] = [
            'id' => $user['id'],
            'nombre' => $user['nombre'],
            'email' => $user['email']
        ];

        echo "<script>
                alert('¡Inicio de sesión exitoso!');
                window.location.href = '../../panel.php'; // Redirigir a la página principal
              </script>";
    } else {
        echo "<script>alert('¡Credenciales Incorrectos!');</script>";
    }
}
?>




<?php
$title = "Compramas - Home Page";
$activePage = 'login';
ob_start();
?>
 <link rel="stylesheet" href="../assets/css/login.css">

<!-- Formulario de login -->
<form action="login.php" method="POST">
    <label for="email">Correo electrónico:</label>
    <input type="email" id="email" name="email" required><br>

    <label for="password">Contraseña:</label>
    <input type="password" id="password" name="password" required><br>

    <button type="submit">Iniciar sesión</button>
       
    <p>¿No tienes cuenta? <a href="register.php">Regístrate aquí</a></p>
</form>