<?php
$title = "Compramas - Location Page";
$activePage = 'encuentranos';
ob_start();

?>

<!-- Estilos CSS personalizados -->
<link rel="stylesheet" href="../assets/css/escuentranos.css">


<!-- Contenido de la pagina -->
<h3>Pagina de ubicaciones en Construcción</h3>


<!-- Scripts Personalizados -->
<script>

</script>

<?php
$content = ob_get_clean();
include 'template.php';

