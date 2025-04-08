<?php
session_start();

require '../../model/database.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $email = $_POST['email'];
    $password = $_POST['password'];
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch();

    if ($user) {
        echo "El correo electrónico ya está registrado.";
    } else {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $conn->prepare("INSERT INTO users (email, password, nombre, telefono) 
                               VALUES (:email, :password, :nombre, :telefono)");
        $stmt->execute([
            'email' => $email, 
            'password' => $hashedPassword, 
            'nombre' => $nombre, 
            'telefono' => $telefono
        ]);

        echo "<script>alert('¡Usuario registrado exitosamente!');</script>";
    }
} 
?>






<link rel="stylesheet" href="../assets/css/login.css">

<!-- Formulario que envía los datos a 'register.php' mediante el método POST -->
<form action="register.php" method="POST">

    <!-- Etiqueta del campo de correo electrónico -->
    <label for="email">Correo electrónico:</label>

    <!-- Campo de entrada para el email (validado automáticamente por el navegador) -->
    <input type="email" id="email" name="email" required><br>

    <!-- Etiqueta del campo de contraseña -->
    <label for="password">Contraseña:</label>

    <!-- Campo para que el usuario escriba su contraseña (los caracteres se ocultan) -->
    <input type="password" id="password" name="password" required><br>

    <!-- Etiqueta para el campo de nombre completo -->
    <label for="nombre">Nombre completo:</label>

    <!-- Campo de texto donde el usuario escribe su nombre completo -->
    <input type="text" id="nombre" name="nombre" required><br>

    <!-- Etiqueta del campo de teléfono -->
    <label for="telefono">Teléfono:</label>

    <!-- Campo de entrada de texto para el número de teléfono -->
    <!-- Puede validarse mejor si se usa 'type="tel"' en vez de "text" -->
    <input type="text" id="telefono" name="telefono" required><br>

    <!-- Botón que envía el formulario para registrar al usuario -->
    <button type="submit">Registrar</button>
</form>

