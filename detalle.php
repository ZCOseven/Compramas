<?php
require 'model/database.php';
require 'model/config.php';

$id = isset($_GET['id_producto']) ? $_GET['id_producto'] : '';
$token = isset($_GET['token']) ? $_GET['token'] : '';

if ($id == '' || $token == '') {
    echo 'error al mostrar datos';
    exit;

} else {

    $token_tmp = hash_hmac('sha1', $id, KEY_TOKEN);


    if ($token == $token_tmp) {

        $sql = $conn->prepare("SELECT count(id_producto)  from producto where id_producto=?");
        $sql->execute([$id]);
        if ($sql->fetchColumn() > 0) {

            $sql = $conn->prepare("SELECT  nom_pro, costo, stock, categoria, descripcion, imagen from producto where id_producto=? ");
            $sql->execute([$id]);
            $row = $sql->fetch(PDO::FETCH_ASSOC);
            $nombre = $row['nom_pro'];
            $costo = $row['costo'];
            $stock = $row['stock'];
            $categoria = $row['categoria'];
            $descripcion = $row['descripcion'];
            $imagen = $row['imagen'];


        }

    } else {
        echo 'error al mostrar datos';
        exit;
    }
}


//CONSULTA PARA OBTENER EL NOMBRE DE LA CATEGOIRIA DEL PRODUCTO
$consulta_categoria = $conn->prepare("SELECT cat_nom FROM categoria WHERE id_categoria = ?");
$consulta_categoria->execute([$categoria]); // Suponiendo que $categoria es el ID de la categoría del producto
$resultado_categoria = $consulta_categoria->fetch(PDO::FETCH_ASSOC);

if ($resultado_categoria) {

    $nombre_categoria = $resultado_categoria['cat_nom'];
} else {

    $nombre_categoria = "Sin categoría";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="favicon.png">
    <title>Furniture | Tienda de muebles modernos</title>
    <meta name="description"
        content="Encuentra los mejores muebles para decorar tu hogar. Amplia variedad de diseños para todos los gustos.">
    <meta name="keywords" content="muebles, decoración, hogar, diseño de interiores, moderno, estilo, calidad">
    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="css/tiny-slider.css" rel="stylesheet">
    <link href="css/style.cssF" rel="stylesheet">
    <title>Forniture</title>

    <style>
        btn {
            padding: 10px 5px;

        }

        .li {
            list-style-type: none;
            margin-left: 30px;
        }

        .c-principal-detalles{
            width: 100%;
            padding: 10%;
        }

        .principal-detalles{
            display: grid;
            grid-template-columns: 40% 58%;
            align-items: center;
            gap: 2%;
        }

        .principal-detalles>h3{
            text-align: justify;
            justify-content: space-between;
        }
    </style>
</head>

<body>

    <nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">

        <div class="container">
            <a class="navbar-brand" href="index.php">Furni<span>tore.</span></a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni"
                aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsFurni">
                <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
                    <li>
                        <a class="nav-link" href="index.php">Inicio</a>
                    </li>
                    <li class="nav-item active"><a class="nav-link" href="shop.php">Productos</a></li>
                    <li><a class="nav-link" href="about.php">Nosotros</a></li>
                    <li><a class="nav-link" href="services.php">Servicios</a></li>
                    <li><a class="nav-link" href="contact.php">Contacto</a></li>

                </ul>

                <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
                    <li><a class="nav-link" href="login.php"><img src="images/user.svg"></a></li>
                    <li><a class="nav-link" href="cart.php"><img src="images/cart.svg"></a></li>
                </ul>
                <!-- <li class="li"><a class="btn" href="logout.php">Cerrar</a></li> -->
            </div>
        </div>

    </nav>

    <div class="c-principal-detalles">

        <div class="principal-detalles">


            <div class="detalles">
                <h3 class=""><?php echo $nombre; ?></h3>
                <img src="<?php echo str_replace('../', '', $imagen); ?>" class="">
                <h2 class="">$<?php echo number_format($costo, 2); ?></h2>
                <h3 class="">Stock:<?php echo $stock; ?></h3>
                <h3 class="">categoria:<?php echo $nombre_categoria; ?></h3>
            </div>
            <h3 class=""><?php echo $descripcion; ?></h3>


        </div>

    </div>

</body>

</html>