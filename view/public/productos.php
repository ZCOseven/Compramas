<?php
$title = "Compramas - Shop Page";
$activePage = 'productos';
ob_start();

$categoria = isset($_GET['cat']) ? htmlspecialchars($_GET['cat']) : null;
if ($categoria) {
    $mensajeCategoria = "Mostrando productos de la categoría: <strong>" . ucfirst($categoria) . "</strong>";
} else {
    $mensajeCategoria = "Todos nuestros productos | sin una categoria en especifico";
}
?>

<!-- Estilos CSS personalizados -->
<link rel="stylesheet" href="../assets/css/productos.css">

<!-- Contenido de la pagina -->
<div class="c-barra-de-texto">
    <div class="c-mostrar-busqueda">
        <span><?= $mensajeCategoria ?></span>
    </div>
</div>

<section class="c-principal" aria-label="Seccion Principal de Productos">
    <aside class="c-filtros">
        <div class="filtros">
            <h2 class="c-filtros__titulo">Filtrar Productos</h2>

            <!-- Filtro de búsqueda por texto -->
            <div class="c-filtros__grupo">
                <label for="busqueda-texto" class="c-filtros__label">Buscar</label>
                <input type="text" id="busqueda-texto" class="c-filtros__input c-filtros__input--texto"
                    placeholder="Nombre del producto...">
            </div>

            <!-- Filtro por rango de precios -->
            <div class="c-filtros__grupo">
                <h3 class="c-filtros__subtitulo">Rango de Precios</h3>
                <div class="c-filtros__rango">
                    <span class="c-filtros__precio" id="precio-min">S/0</span>
                    <input type="range" min="0" max="1000" value="500" class="c-filtros__input c-filtros__input--rango"
                        id="rango-precios">
                    <span class="c-filtros__precio" id="precio-max">S/1000</span>
                </div>
            </div>

            <!-- Filtro por categorías (checkboxes) -->
            <div class="c-filtros__grupo">
                <h3 class="c-filtros__subtitulo">Categorías</h3>
                <ul class="c-filtros__lista">
                    <?php include '../../dashboard/lis-categorias.php'; ?>
                </ul>
            </div>


            <!-- Filtro por stock (radio buttons) -->
            <div class="c-filtros__grupo">
                <h3 class="c-filtros__subtitulo">Disponibilidad</h3>
                <ul class="c-filtros__lista">
                    <li class="c-filtros__item">
                        <input type="radio" id="stock-todos" class="c-filtros__radio" name="stock" value="todos"
                            checked>
                        <label for="stock-todos" class="c-filtros__label">Todos</label>
                    </li>
                    <li class="c-filtros__item">
                        <input type="radio" id="stock-disponible" class="c-filtros__radio" name="stock"
                            value="disponible">
                        <label for="stock-disponible" class="c-filtros__label">En stock</label>
                    </li>
                    <li class="c-filtros__item">
                        <input type="radio" id="stock-agotado" class="c-filtros__radio" name="stock" value="agotado">
                        <label for="stock-agotado" class="c-filtros__label">Agotados</label>
                    </li>
                </ul>
            </div>

            <button class="c-filtros__boton c-filtros__boton--aplicar">Aplicar Filtros</button>
            <button class="c-filtros__boton c-filtros__boton--limpiar">Limpiar Filtros</button>
        </div>
    </aside>

    <article class="c-productos">
        <?php include '../../dashboard/productos-list.php'; ?>
    </article>
</section>


<!-- Scripts Personalizados -->

<script src="..\assets\js\filtro.js"></script>

<?php
$content = ob_get_clean();
include 'template.php';
