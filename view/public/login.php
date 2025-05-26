<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$title = "Compramas - Iniciar Sesión";
$activePage = 'login';
ob_start();

require_once '../controller/controlador_clientes.php';

$mensaje = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    $resultado = $controladorCliente->login($email, $password);

    if ($resultado['success']) {
        $_SESSION['cliente'] = [
            'id_cliente' => $resultado['cliente']['id_cliente'],
            'nombre' => $resultado['cliente']['nombre'],
            'email' => $resultado['cliente']['email']
        ];
        $redirect = isset($_GET['return']) ? $_GET['return'] : 'index.php';
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
        <span><i class="fas fa-sign-in-alt"></i> Iniciar Sesión</span>
    </div>
</div>

<section class="c-principal login-pagina">
    <form class="login-form" method="post" action="login.php<?= isset($_GET['return']) ? '?return=' . urlencode($_GET['return']) : '' ?>" autocomplete="off">
        <h2 class="login-titulo">Bienvenido a Compramas</h2>
        <?= $mensaje ?? '' ?>
        <div class="login-form-grupo">
            <label for="email">Correo electrónico</label>
            <input type="email" id="email" name="email" required maxlength="200" autocomplete="username">
        </div>
        <div class="login-form-grupo">
            <label for="password">Contraseña</label>
            <input type="password" id="password" name="password" required maxlength="200" autocomplete="current-password">
        </div>
        <button type="submit" class="carrito-btn carrito-btn-comprar" style="width:100%;margin-top:1.2rem;">Iniciar sesión</button>
        <div class="login-enlace-registro">
            ¿No tienes cuenta? 
            <a href="register.php<?= isset($_GET['return']) ? '?return=' . urlencode($_GET['return']) : '' ?>">Regístrate aquí</a>
        </div>
    </form>
</section>

<?php
$content = ob_get_clean();
include 'template.php';
?>