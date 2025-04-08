<?php
session_start();

// Incluir la conexión a la base de datos
require '../../model/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recibir los datos del formulario
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Preparar la consulta para buscar al usuario por email
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch();

    // Verificar si el usuario existe y si la contraseña es correcta
    if ($user && password_verify($password, $user['password'])) {
        
        // Almacenar los datos del usuario en la sesión
        $_SESSION['user'] = [
            'id' => $user['id'],
            'nombre' => $user['nombre'],
            'email' => $user['email']
        ];

        // Redirigir al usuario a la página principal
        echo "<script>
                alert('¡Inicio de sesión exitoso!');
                window.location.href = 'index.php'; // Redirigir a la página principal
              </script>";
    } else {
        // Mostrar un mensaje de error si las credenciales son incorrectas
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