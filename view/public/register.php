<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$title = "Compramas - Registro";
$activePage = 'register';
ob_start();

require_once '../controller/controlador_clientes.php';

$mensaje = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim($_POST['nombre']);
    $email = trim($_POST['email']);
    $telefono = trim($_POST['telefono']);
    $password = $_POST['password'];

    $resultado = $controladorCliente->registrar($nombre, $email, $telefono, $password);

    if ($resultado['success']) {
        $mensaje = '<div class="alert-success">¡Registro exitoso! Ahora puedes <a href="login.php">iniciar sesión</a>.</div>';
        // Inicia sesión automáticamente
        $_SESSION['cliente'] = [
            'id_cliente' => $resultado['cliente']['id_cliente'],
            'nombre' => $resultado['cliente']['nombre'],
            'email' => $resultado['cliente']['email']
        ];
        $redirect = isset($_GET['return']) ? $_GET['return'] : '#';
        header('Location: ' . $redirect);
        exit;
    } else {
        $mensaje = '<div class="alert-error">' . htmlspecialchars($resultado['message']) . '</div>';
    }
}
?>

<link rel="stylesheet" href="../assets/css/login.css">
<link rel="stylesheet" href="../assets/css/productos.css">
<link rel="stylesheet" href="../assets/css/carrito.css">

<div class="c-barra-de-texto">
    <div class="c-mostrar-busqueda">
        <span><i class="fas fa-user-plus"></i> Crear cuenta</span>
    </div>
</div>

<section class="c-principal login-pagina">
    <form class="login-form" method="post" action="register.php<?= isset($_GET['return']) ? '?return=' . urlencode($_GET['return']) : '' ?>" autocomplete="off">
        <h2 class="login-titulo">Regístrate en Compramas</h2>
        <?= $mensaje ?? '' ?>
        <div class="login-form-grupo">
            <label for="nombre">Nombre completo</label>
            <input type="text" id="nombre" name="nombre" required maxlength="200" autocomplete="name">
        </div>
        <div class="login-form-grupo">
            <label for="email">Correo electrónico</label>
            <input type="email" id="email" name="email" required maxlength="200" autocomplete="username">
        </div>
        <div class="login-form-grupo">
            <label for="telefono">Teléfono</label>
            <input type="text" id="telefono" name="telefono" required maxlength="20" autocomplete="tel">
        </div>
        <div class="login-form-grupo">
            <label for="password">Contraseña</label>
            <input type="password" id="password" name="password" required maxlength="200" autocomplete="new-password">
        </div>
        <button type="submit" class="carrito-btn carrito-btn-comprar" style="width:100%;margin-top:1.2rem;">Crear cuenta</button>
        <div class="login-enlace-registro">
            ¿Ya tienes cuenta? 
            <a href="login.php<?= isset($_GET['return']) ? '?return=' . urlencode($_GET['return']) : '' ?>">Inicia sesión aquí</a>
        </div>
    </form>
</section>

<?php
$content = ob_get_clean();
include 'template.php';
?>