<?php
// Define la configuración de la página
$title = "Compramas - Shop Page";
$activePage = 'productos';
ob_start();

require_once '../controller/controlador_productos.php';
$controlador = $controladorProducto;


if (isset($_GET['id'])) {
    $id = htmlspecialchars($_GET['id']);
    $producto = $controlador->listarProductoPorId($id);
} else {
    header("Location: productos.php");
    exit;
}
?>

<!-- Estilos CSS personalizados -->
<link rel="stylesheet" href="../assets/css/productos.css">

<!-- Contenido de la pagina -->
<div class="c-barra-de-texto">
    <div class="c-mostrar-busqueda">
        <span><?= htmlspecialchars($producto['nom_pro']) ?></span>
    </div>
</div>

<section class="c-principal">
    <div class="detalle-producto">
        <div class="detalle-producto__imagen">
            <img src="../<?= $producto['imagen'] ?>" alt="<?= htmlspecialchars($producto['nom_pro']) ?>">
        </div>
        <div class="detalle-producto__info">
            <h2><?= htmlspecialchars($producto['nom_pro']) ?></h2>
            <p><?= nl2br(htmlspecialchars($producto['descripcion'])) ?></p>
            <p><strong>Stock:</strong> <?= $producto['stock'] ?></p>
            <p><strong>Precio:</strong> S/<?= number_format($producto['costo'], 2) ?></p>
            <button>Añadir producto</button>
        </div>
    </div>
</section>


<!-- Scripts Personalizados -->
<?php
$content = ob_get_clean();
include 'template.php';
?>