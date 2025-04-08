<?php
$title = "Compramas - Home Page";
$activePage = 'inicio';
ob_start();
?>

<!-- Estilos CSS personalizados -->
<link rel="stylesheet" href="../assets/css/inicio.css">

<!-- Contenido de la pagina -->
<section class="c-banner" aria-label="Banner principal">
    <div class="hero">
        <div>
            <h1 class="hero__title">Especialistas en jardinería</h1>
            <p class="hero__subtitle">Y amantes de la ecología</p>
        </div>

        <a href="#footer" class="btn-hero">Contáctanos</a>
    </div>
    <div class="hero__img-container">
        <img class="hero__img" src="../assets/img/inicio/banner-hero-transparent.png" alt="Personas trabajando en jardinería" loading="lazy">
    </div>
</section>

<section class="c-principal">

    <!-- Sección que contiene las categorías de productos -->
    <section class="categorias">

        <!-- Título principal de esta sección -->
        <h2 class="categorias__titulo">Categoría De Productos</h2>

        <!-- Navegación que agrupa las diferentes categorías de productos -->
        <!-- Se usa 'aria-label' para mejorar la accesibilidad -->
        <nav class="categorias__grid" aria-label="Categorías de productos">

            <!-- Enlace a la categoría "Macetas" -->
            <!-- El fondo es una imagen representativa de macetas -->
            <a href="productos.php?cat=macetas" class="categorias__item"
                style="background-image: url('../assets/img/inicio/bg-maceta.jpg')">
                <!-- Texto visible sobre la imagen -->
                <span class="categorias__texto">Macetas</span>
            </a>

            <!-- Enlace a la categoría "Fertilizantes" -->
            <!-- Imagen de fondo específica para fertilizantes -->
            <a href="productos.php?cat=fertilizantes" class="categorias__item"
                style="background-image: url('../assets/img/inicio/bg-fertilizante.jpg')">
                <span class="categorias__texto">Fertilizantes</span>
            </a>

            <!-- Enlace a la categoría "Herramientas" -->
            <!-- Imagen de fondo relacionada con herramientas -->
            <a href="productos.php?cat=herramientas" class="categorias__item"
                style="background-image: url('../assets/img/inicio/bg-herramienta.jpg')">
                <span class="categorias__texto">Herramientas</span>
            </a>

            <!-- Enlace a la categoría "Plantas" -->
            <!-- Imagen de fondo con temática de plantas -->
            <a href="productos.php?cat=plantas" class="categorias__item"
                style="background-image: url('../assets/img/inicio/bg-planta.jpg')">
                <span class="categorias__texto">Plantas</span>
            </a>

            <!-- Enlace a la categoría "Accesorios" -->
            <!-- Imagen representativa de accesorios -->
            <a href="productos.php?cat=accesorios" class="categorias__item"
                style="background-image: url('../assets/img/inicio/bg-accesorio.jpg')">
                <span class="categorias__texto">Accesorios</span>
            </a>

        </nav>
    </section>


    <article class="destacados">
        <h2 class="destacados__titulo">Productos Más Vendidos</h2>
        <div class="destacados__grid">

            <!-- NOTA para Daniel del futuro: Se usara un onclick par redirgirnos a la pagina principal de productos inicialmente, luego se podria redirigir a una plantilla de descripcion llevando el id del producto para llamar los datos a través de una pedicion por el controlador -->

            <!-- Producto 1 -->
            <article onclick="paginaProductos()" role="button" tabindex="0" class="producto-card">
                <div class="producto-card__imagen-container">
                    <img src="../assets/img/inicio/product1-view.png" alt="Nombre del producto" class="producto-card__imagen producto-card__imagen--front">
                    <img src="../assets/img/inicio/product1-hide.png" alt="Vista alternativa" class="producto-card__imagen producto-card__imagen--back">
                </div>
                <div class="producto-card__info">
                    <a href="productos.php?cat=herramientas" class="producto-card__categoria" itemprop="category" onclick="event.stopPropagation()">Herramientas</a>
                    <h3 class="producto-card__nombre">Tijera de poda</h3>
                    <span class="producto-card__precio">S/169.99</span>
                </div>
            </article>

            <!-- Producto 2 -->
            <article onclick="paginaProductos()" role="button" tabindex="0" class="producto-card">
                <div class="producto-card__imagen-container">
                    <img src="../assets/img/inicio/product2-view.png" alt="Nombre del producto" class="producto-card__imagen producto-card__imagen--front">
                    <img src="../assets/img/inicio/product2-hide.png" alt="Vista alternativa" class="producto-card__imagen producto-card__imagen--back">
                </div>
                <div class="producto-card__info">
                    <a href="productos.php?cat=accesorios" class="producto-card__categoria" itemprop="category" onclick="event.stopPropagation()">Accesorios</a>
                    <h3 class="producto-card__nombre">Guantes de jardinería</h3>
                    <span class="producto-card__precio">S/69.00</span>
                </div>
            </article>

            <!-- Producto 3 -->
            <article onclick="paginaProductos()" role="button" tabindex="0" class="producto-card">
                <div class="producto-card__imagen-container">
                    <img src="../assets/img/inicio/product3-view.png" alt="Nombre del producto" class="producto-card__imagen producto-card__imagen--front">
                    <img src="../assets/img/inicio/product3-hide.png" alt="Vista alternativa" class="producto-card__imagen producto-card__imagen--back">
                </div>
                <div class="producto-card__info">
                    <a href="productos.php?cat=accesorios" class="producto-card__categoria" itemprop="category" onclick="event.stopPropagation()">Accesorios</a>
                    <h3 class="producto-card__nombre">Adaptador para caño de interior</h3>
                    <span class="producto-card__precio">S/85.00</span>
                </div>
            </article>

            <!-- Producto 4 -->
            <article onclick="paginaProductos()" role="button" tabindex="0" class="producto-card">
                <div class="producto-card__imagen-container">
                    <img src="../assets/img/inicio/product4-view.png" alt="Nombre del producto" class="producto-card__imagen producto-card__imagen--front">
                    <img src="../assets/img/inicio/product4-hide.png" alt="Vista alternativa" class="producto-card__imagen producto-card__imagen--back">
                </div>
                <div class="producto-card__info">
                    <a href="productos.php?cat=macetas" class="producto-card__categoria" itemprop="category" onclick="event.stopPropagation()">Macetas</a>
                    <h3 class="producto-card__nombre">Platos de arcilla</h3>
                    <span class="producto-card__precio">S/9.90 - S/19.90</span>
                </div>
            </article>

        </div>
    </article>

    <!-- Sección que muestra lo que ofrece la tienda o empresa -->
    <section class="ofrecemos">

        <!-- Título principal de esta sección -->
        <h2 class="ofrecemos__titulo">Ofrecemos</h2>

        <!-- Contenedor en forma de grid para organizar visualmente los ítems -->
        <div class="ofrecemos__grid">

            <!-- Primer ítem de lo que se ofrece -->
            <!-- Tiene un fondo con imagen relacionada al servicio -->
            <div class="ofrecemos__item" style="background-image: url('../assets/img/inicio/ofrecemos1.jpg')">
                <!-- Icono representativo del servicio (emoji de caja) -->
                <span class="ofrecemos__icono">📦</span>
                <!-- Descripción del servicio -->
                <span class="ofrecemos__texto">Envío rápido y seguro</span>
            </div>

            <!-- Segundo ítem: Calidad garantizada -->
            <div class="ofrecemos__item" style="background-image: url('../assets/img/inicio/ofrecemos2.jpg')">
                <span class="ofrecemos__icono">⭐</span>
                <span class="ofrecemos__texto">Productos de calidad garantizada</span>
            </div>

            <!-- Tercer ítem: Atención personalizada -->
            <div class="ofrecemos__item" style="background-image: url('../assets/img/inicio/ofrecemos3.jpg')">
                <span class="ofrecemos__icono">👩‍💼</span>
                <span class="ofrecemos__texto">Atención personalizada</span>
            </div>

            <!-- Cuarto ítem: Pagos seguros -->
            <div class="ofrecemos__item" style="background-image: url('../assets/img/inicio/ofrecemos4.jpg')">
                <span class="ofrecemos__icono">🔒</span>
                <span class="ofrecemos__texto">Pagos seguros y confiables</span>
            </div>

        </div> <!-- Fin del grid -->
    </section>


</section>

<!-- Scripts Personalizados -->
<script>
    function paginaProductos() {
        window.location.href = 'productos.php';
    }
</script>


<?php
$content = ob_get_clean();
include 'template.php';
