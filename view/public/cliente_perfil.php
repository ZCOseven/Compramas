<?php
if (session_status() === PHP_SESSION_NONE) session_start();
require_once '../controller/controlador_clientes.php';

if (!isset($_SESSION['cliente']['id_cliente'])) {
    header('Location: login.php');
    exit;
}

$title = "Mi perfil";
$activePage = 'perfil';
ob_start();

$idCliente = $_SESSION['cliente']['id_cliente'];
$cliente = $controladorCliente->obtenerPorId($idCliente);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim($_POST['nombre']);
    $email = trim($_POST['email']);
    $telefono = trim($_POST['telefono']);
    $direccion = trim($_POST['direccion']);

    $resultado = $controladorCliente->actualizarPerfil($idCliente, $nombre, $email, $telefono, $direccion);

    if ($resultado['success']) {
        $mensaje = '<div class="alert-success">Datos actualizados correctamente.</div>';
        $_SESSION['cliente']['nombre'] = $nombre;
        $_SESSION['cliente']['email'] = $email;
    } else {
        $mensaje = '<div class="alert-error">' . htmlspecialchars($resultado['message']) . '</div>';
    }
    $cliente = $controladorCliente->obtenerPorId($idCliente);
}
?>

<link rel="stylesheet" href="../assets/css/productos.css">
<link rel="stylesheet" href="../assets/css/carrito.css">
<link rel="stylesheet" href="../assets/css/pedido.css">

<div class="c-barra-de-texto">
    <div class="c-mostrar-busqueda">
        <span><i class="fas fa-user"></i> Mi perfil</span>
    </div>
</div>

<section class="cliente-panel">
    <!-- Menú lateral -->
    <nav class="cliente-menu">
        <ul>
            <li><a href="cliente_perfil.php" <?= $activePage === 'perfil' ? ' class="activo"' : '' ?>>Mi perfil</a></li>
            <li><a href="cliente_pedidos.php" <?= $activePage === 'pedidos' ? ' class="activo"' : '' ?>>Mis pedidos</a></li>
        </ul>
    </nav>
    <!-- Contenido principal -->
    <div class="cliente-contenido">
        <div class="pedidos-lista">
            <form method="post" class="perfil-form" style="width: 100%;">
                <h2 style="margin-bottom:1.2em;">Editar datos de mi cuenta</h2>
                <div class="perfil-form-grupo">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre" value="<?= htmlspecialchars($cliente['nombre']) ?>" required maxlength="100">
                </div>
                <div class="perfil-form-grupo">
                    <label for="email">Correo electrónico</label>
                    <input type="email" name="email" id="email" value="<?= htmlspecialchars($cliente['email']) ?>" required maxlength="200">
                </div>
                <div class="perfil-form-grupo">
                    <label for="telefono">Teléfono</label>
                    <input type="text" name="telefono" id="telefono" value="<?= htmlspecialchars($cliente['telefono']) ?>" maxlength="20">
                </div>
                <div class="perfil-form-grupo">
                    <label for="direccion">Dirección</label>
                    <input type="text" name="direccion" id="direccion" value="<?= htmlspecialchars($cliente['direccion'] ?? '') ?>" maxlength="255">
                </div>
                <button type="submit" class="carrito-btn carrito-btn-comprar" style="margin-top:1.2rem; padding-inline: 1rem;">Guardar cambios</button>
            </form>
            <button type="button" class="carrito-btn carrito-btn-ver" id="btnCambiarPass" style="margin-top:1.2rem; padding-inline: 1rem;">Cambiar contraseña</button>
        </div>
    </div>
</section>

<style>
    .perfil-form-grupo {
        margin-bottom: 1.1em;
    }

    .perfil-form-grupo label {
        display: block;
        font-weight: 500;
        margin-bottom: 0.4em;
        color: #4a7c59;
    }

    .perfil-form-grupo input {
        width: 100%;
        padding: 0.6em 0.8em;
        border: 1px solid #b7c8b2;
        border-radius: 6px;
        font-size: 1em;
        background: #f8f8f8;
        color: #333;
    }

    .perfil-form-grupo input:focus {
        outline: 1.5px solid #4a7c59;
        background: #fff;
    }
</style>

<script>
document.getElementById('btnCambiarPass').addEventListener('click', function() {
    Swal.fire({
        title: 'Verificación',
        text: 'Introduce tu contraseña actual para continuar',
        input: 'password',
        inputLabel: 'Contraseña actual',
        inputPlaceholder: 'Contraseña actual',
        inputAttributes: {
            maxlength: 50,
            autocapitalize: 'off',
            autocorrect: 'off'
        },
        showCancelButton: true,
        confirmButtonText: 'Continuar',
        cancelButtonText: 'Cancelar',
        preConfirm: (password) => {
            if (!password) {
                Swal.showValidationMessage('Debes ingresar tu contraseña actual');
            }
            return password;
        }
    }).then((result) => {
        if (result.isConfirmed) {
            // Aquí puedes mostrar el formulario de cambio de contraseña
            mostrarFormularioCambio(result.value);
        }
    });
});

function mostrarFormularioCambio(passActual) {
    Swal.fire({
        title: 'Cambiar contraseña',
        html:
            `<div style="display:flex;flex-direction:column;align-items:center;gap:0.6em;">
                <input type="hidden" name="pass_actual" value="${passActual}">
                <label for="swalPassNueva" style="font-weight:500;width:100%;text-align:center;">Nueva contraseña</label>
                <input type="password" name="pass_nueva" id="swalPassNueva" class="swal2-input" required style="margin-top:0!important; width:100%;text-align:center;">
                <label for="swalPassNueva2" style="font-weight:500;width:100%;text-align:center;">Repetir nueva contraseña</label>
                <input type="password" name="pass_nueva2" id="swalPassNueva2" class="swal2-input" required style="margin-top:0!important;width:100%;text-align:center;">
            </div>`,
        focusConfirm: false,
        showCancelButton: true,
        confirmButtonText: 'Guardar',
        cancelButtonText: 'Cancelar',
        preConfirm: () => {
            const nueva = document.getElementById('swalPassNueva').value;
            const nueva2 = document.getElementById('swalPassNueva2').value;
            if (!nueva || !nueva2) {
                Swal.showValidationMessage('Completa ambos campos');
                return false;
            }
            if (nueva !== nueva2) {
                Swal.showValidationMessage('Las contraseñas no coinciden');
                return false;
            }
            return { pass_actual: passActual, pass_nueva: nueva };
        }
    }).then((result) => {
        if (result.isConfirmed) {
            fetch('cliente_cambiar_password.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(result.value)
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    Swal.fire('¡Listo!', 'Contraseña cambiada correctamente.', 'success');
                } else {
                    Swal.fire('Error', data.message, 'error');
                }
            })
            .catch(() => {
                Swal.fire('Error', 'No se pudo cambiar la contraseña.', 'error');
            });
        }
    });
}

<?php if (!empty($mensaje) && strpos($mensaje, 'Datos actualizados correctamente') !== false): ?>
document.addEventListener('DOMContentLoaded', function() {
    Swal.fire({
        icon: 'success',
        title: '¡Datos actualizados!',
        text: 'Tus datos fueron guardados correctamente.',
        timer: 1800,
        showConfirmButton: false
    });
});
<?php endif; ?>

</script>

<?php
$content = ob_get_clean();
include 'template.php';
