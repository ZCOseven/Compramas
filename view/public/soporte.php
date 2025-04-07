<?php
$title = "Compramas - Support Page";
$activePage = 'soporte';
ob_start();

?>

<!-- Estilos CSS personalizados -->
<link rel="stylesheet" href="../assets/css/soporte.css">


<!-- Contenido de la pagina -->
<h3>Pagina de soporte en Construcción</h3>


<!-- Scripts Personalizados -->
<script>

</script>

<?php
$content = ob_get_clean();
include 'template.php';

