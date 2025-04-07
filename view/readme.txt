<?php
$title = "Compramas - Support Page";
$activePage = 'soporte';
ob_start();

?>

<!-- Estilos CSS personalizados -->
<link rel="stylesheet" href="../assets/css/index">


<!-- Contenido de la pagina -->



<!-- Scripts Personalizados -->
<script>

</script>

<?php
$content = ob_get_clean();
include 'template.php';

