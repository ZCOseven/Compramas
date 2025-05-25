<?php
// Define la configuración de la página
$title = "Compramas - Shop Page";
$activePage = 'productos';
ob_start();

require_once '../controller/controlador_productos.php';
$controlador = $controladorProducto;
$producto = $controlador->listarProducto();
$datosCategorias = $controlador->listarCategoriaProducto();

$categoria = isset($_GET['cat']) ? htmlspecialchars($_GET['cat']) : null;
if ($categoria) {
    $mensajeCategoria = "Mostrando productos de la categoría: <strong>" . ucfirst($categoria) . "</strong>";
} else {
    $mensajeCategoria =  "Todos nuestros productos | sin una categoría en específico";
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
                <label for="buscador" class="c-filtros__label">Buscar</label>
                <input type="text" id="buscador" class="c-filtros__input c-filtros__input--texto"
                    placeholder="Nombre del producto..." list="sugerencias-productos">
                <datalist id="sugerencias-productos"></datalist>
            </div>

            <!-- Filtro por rango de precios -->
            <div class="c-filtros__grupo">
                <h3 class="c-filtros__subtitulo">Rango de Precios</h3>
                <div class="range-slider">
                    <div class="range-slider__values">
                        <span id="precio-min">S/0</span>
                        <span id="precio-max">S/60</span>
                    </div>
                    <div class="range-slider__container">
                        <input type="range" min="0" max="60" value="0" class="range-slider__input range-slider__input--min">
                        <input type="range" min="0" max="60" value="60" class="range-slider__input range-slider__input--max">
                        <div class="range-slider__track"></div>
                        <div class="range-slider__range"></div>
                    </div>
                </div>
            </div>

            <!-- Filtro por categorías (checkboxes) -->
            <div class="c-filtros__grupo">
                <h3 class="c-filtros__subtitulo">Categorías</h3>
                <ul class="c-filtros__lista">
                    <?php foreach ($datosCategorias as $lista) { ?>
                        <li class="c-filtros__item">
                            <input type="checkbox" id="<?= $lista["id_categoria"] ?>" class="c-filtros__checkbox" name="categoria" value="<?= htmlspecialchars($lista["cat_nom"]) ?>">
                            <label for="<?= $lista["id_categoria"] ?>" class="c-filtros__label"><?= $lista["cat_nom"] ?></label>
                        </li>
                    <?php } ?>
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
        <!-- Iteramos todos los Productos habidos y por haber -->
        <?php foreach ($producto as $fila) { ?>

            <article role="button"
                tabindex="0"
                class="producto-card"
                data-categoria="<?= htmlspecialchars($fila['nombre_categoria']) ?>"
                data-stock="<?= $fila['stock'] ?>">

                <div class="producto-card__imagen-container">
                    <a href="productos-detalle.php?id=<?= $fila['id_producto'] ?>">
                        <img onclick="idProducto()" src="../<?= $fila["imagen"] ?>">
                    </a>
                </div>
                <div class="producto-card__info">
                    <a href="productos.php?cat=<?= $fila['nombre_categoria'] ?>" class="producto-card__categoria" itemprop="category" onclick="event.stopPropagation()">
                        <?= $fila["nombre_categoria"] ?>
                    </a>
                    <h3 class="producto-card__nombre"><?= $fila["nom_pro"] ?></h3>
                    <span class="producto-card__precio">S/<?= number_format($fila["costo"], 2, '.', ',') ?></span>
                </div>
                <button
                    class="producto-card__btn-add"
                    data-id="<?= $fila['id_producto'] ?>"
                    data-nombre="<?= htmlspecialchars($fila['nom_pro']) ?>"
                    data-precio="<?= $fila['costo'] ?>"
                    data-descripcion="<?= htmlspecialchars($fila['descripcion']) ?>"
                    data-imagen="../<?= $fila['imagen'] ?>"
                >
                    Añadir al Carrito
                </button>
            </article>

        <?php } ?>
    </article>
</section>


<!-- Scripts Personalizados -->
<script src="../assets/js/filtro.js"></script>
<script src="../assets/js/productos_filtros.js"></script>

<?php
$content = ob_get_clean();
include 'template.php';
