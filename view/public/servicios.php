<?php
$title = "Compramas - Services Page";
$activePage = 'servicios';
ob_start();

?>

<!-- Estilos CSS personalizados -->
<link rel="stylesheet" href="../assets/css/servicios.css">

<!-- Contenido de la pagina -->
<section class="c-banner" style="background-image: url('../assets/img/servicios/banner-servicios.jpg');">
    <h2>Servicios</h2>
</section>

<section class="c-principal">
    <p class="intro-servicios">En CompRamas, nos apasiona la jardinería y queremos ayudarte a transformar cualquier espacio en un paraíso verde. Ofrecemos una amplia gama de productos y servicios diseñados para satisfacer todas tus necesidades de jardinería, mantenimiento y embellecimiento de áreas verdes.</p>
    <div class="c-caja__servicios">
        <!-- Servicio 1 -->
        <div class="servicio">
            <div class="servicio-bg" style="background-image: url('../assets/img/servicios/servicio1.jpg');"></div>
            <div class="servicio-contenido">
                <h3 class="servicio-titulo">Diseño y creación de jardines </h3>
                <p class="servicio-descripcion">Creamos espacios verdes personalizados.</p>
            </div>
        </div>

        <!-- Servicio 2 -->
        <div class="servicio">
            <div class="servicio-bg" style="background-image: url('../assets/img/servicios/servicio2.jpg');"></div>
            <div class="servicio-contenido">
                <h3 class="servicio-titulo">Asesoría en jardinería</h3>
                <p class="servicio-descripcion">Aprende a cuidar tu jardín con expertos.</p>
            </div>
        </div>

        <!-- Servicio 3 (ocupará dos filas) -->
        <div class="servicio">
            <div class="servicio-bg" style="background-image: url('../assets/img/servicios/servicio3.jpg');"></div>
            <div class="servicio-contenido">
                <h3 class="servicio-titulo">Mantenimiento y poda</h3>
                <p class="servicio-descripcion">Cortes, limpieza y cuidado de plantas.</p>
            </div>
        </div>

        <!-- Servicio 4 -->
        <div class="servicio">
            <div class="servicio-bg" style="background-image: url('../assets/img/servicios/servicio4.jpg');"></div>
            <div class="servicio-contenido">
                <h3 class="servicio-titulo">Control de plagas y fertilización</h3>
                <p class="servicio-descripcion">Protege tus plantas con soluciones ecológicas.</p>
            </div>
        </div>

        <!-- Servicio 5 -->
        <div class="servicio">
            <div class="servicio-bg" style="background-image: url('../assets/img/servicios/servicio5.jpg');"></div>
            <div class="servicio-contenido">
                <h3 class="servicio-titulo">Instalación de sistemas de riego</h3>
                <p class="servicio-descripcion">Ahorra agua y mantén tu jardín saludable.</p>
            </div>
        </div>
    </div>
</section>

<!-- Scripts Personalizados -->
<script>

</script>

<?php
$content = ob_get_clean();
include 'template.php';
