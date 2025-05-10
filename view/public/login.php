<?php
// Inicia una nueva sesión o reanuda la existente
session_start();

// Incluye la conexión a la base de datos
require '../../model/database.php';

// Verifica si la petición fue enviada por el método POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Obtiene el correo y la contraseña enviados desde el formulario
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepara una consulta para buscar al usuario por su correo electrónico
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");

    // Ejecuta la consulta pasando el correo como parámetro
    $stmt->execute(['email' => $email]);

    // Obtiene el primer resultado encontrado
    $user = $stmt->fetch();

    // Verifica que el usuario exista y que la contraseña ingresada sea correcta
    if ($user && password_verify($password, $user['password'])) {
        
        // Guarda los datos del usuario en la sesión para mantenerlo logueado
        $_SESSION['user'] = [
            'id' => $user['id'],
            'nombre' => $user['nombre'],
            'email' => $user['email']
        ];

        // Muestra un mensaje de éxito y redirige al panel de control
        echo "<script>
                alert('¡Inicio de sesión exitoso!');
                window.location.href = '../../panel.php'; // Redirigir a la página principal
              </script>";
    } else {
        // Si el login falla, muestra una alerta indicando credenciales incorrectas
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

<!-- Formulario de inicio de sesión que envía los datos a 'login.php' mediante POST -->
<form action="login.php" method="POST">

    <!-- Etiqueta para el campo de correo electrónico -->
    <label for="email">Correo electrónico:</label>
    
    <!-- Campo de entrada para el correo electrónico -->
    <!-- Usa el tipo 'email' para validación automática del formato -->
    <input type="email" id="email" name="email" required><br>

    <!-- Etiqueta para el campo de contraseña -->
    <label for="password">Contraseña:</label>
    
    <!-- Campo de entrada para la contraseña -->
    <!-- El tipo 'password' oculta los caracteres mientras se escribe -->
    <input type="password" id="password" name="password" required><br>

    <!-- Botón para enviar el formulario e iniciar sesión -->
    <button type="submit">Iniciar sesión</button>
    
    <!-- Texto con enlace para usuarios que aún no tienen cuenta -->
    <p>¿No tienes cuenta? <a href="register.php">Regístrate aquí</a></p>
</form>
