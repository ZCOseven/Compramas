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
<!-- Formulario de registro -->
<form action="register.php" method="POST">
    <label for="email">Correo electrónico:</label>
    <input type="email" id="email" name="email" required><br>

    <label for="password">Contraseña:</label>
    <input type="password" id="password" name="password" required><br>

    <label for="nombre">Nombre completo:</label>
    <input type="text" id="nombre" name="nombre" required><br>

    <label for="telefono">Teléfono:</label>
    <input type="text" id="telefono" name="telefono" required><br>

    <button type="submit">Registrar</button>
</form>
