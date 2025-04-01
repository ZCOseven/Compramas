<?php
require 'model/database.php';
require 'model/config.php';
$sentencia = $conn->query("SELECT * FROM producto;");
$producto = $sentencia->fetchAll(PDO::FETCH_OBJ);
// print_r($categoria);

?>
<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="shortcut icon" href="favicon.png">
	<title>Furniture | Tienda de muebles modernos</title>
	<meta name="description"
		content="Encuentra los mejores muebles para decorar tu hogar. Amplia variedad de diseños para todos los gustos.">
	<meta name="keywords" content="muebles, decoración, hogar, diseño de interiores, moderno, estilo, calidad">
	<!-- Bootstrap CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
	<link href="css/tiny-slider.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<title>Forniture</title>
</head>
<style>
	btn {
		padding: 10px 5px;

	}

	.li {
		list-style-type: none;
		margin-left: 30px;
	}
</style>

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

	<div class="hero">
		<div class="container">
			<div class="row justify-content-between">
				<div class="col-lg-5">
					<div class="intro-excerpt">
						<h1>Productos</h1>
					</div>
				</div>
				<div class="col-lg-7">

				</div>
			</div>
		</div>
	</div>




	<div class="untree_co-section product-section before-footer-section">
		<div class="container">
			<div class="row">
				<?php
				foreach ($producto as $dato) {


					?>

					<div class="col-12 col-md-4 col-lg-3 mb-5">
						<a class="product-item producto"
							href="detalle.php?id_producto=<?php echo $dato->id_producto; ?>&token=<?php echo hash_hmac('sha1', $dato->id_producto, KEY_TOKEN); ?>">
							<img src="<?php echo str_replace('../', '', $dato->imagen); ?>"
								class="img-fluid product-thumbnail">
							<h3 class="product-title"><?php echo $dato->nom_pro; ?></h3>
							<strong class="product-price">$<?php echo number_format($dato->costo, 2); ?></strong>

							<span class="icon-cross">
								<img src="images/cross.svg" class="img-fluid">
							</span>
						</a>
					</div>



					<?php
				}

				?>

			</div>
		</div>
	</div>



	<footer class="footer-section">
		<div class="container relative">

			<div class="sofa-img">
				<img src="images/sofa.png" alt="Image" class="img-fluid">
			</div>

			<div class="row">
				<div class="col-lg-8">
					<div class="subscription-form">
						<h3 class="d-flex align-items-center"><span class="me-1"><img src="images/envelope-outline.svg"
									alt="Image" class="img-fluid"></span><span>Recibe nuestras noticias</span></h3>

						<form action="#" class="row g-3">
							<div class="col-auto">
								<input type="text" class="form-control" placeholder="Escribe tu nombre">
							</div>
							<div class="col-auto">
								<input type="email" class="form-control" placeholder="Escribe tu email">
							</div>
							<div class="col-auto">
								<button class="btn btn-primary">
									<span class="fa fa-paper-plane"></span>
								</button>
							</div>
						</form>

					</div>
				</div>
			</div>

			<div class="row g-5 mb-5">
				<div class="col-lg-4">
					<div class="mb-4 footer-logo-wrap"><a href="#" class="footer-logo">Furnitore<span>.</span></a></div>
					<p class="mb-4">Furnitore es tu destino principal para encontrar muebles de calidad y estilo para
						transformar tu hogar. Con una amplia selección de productos cuidadosamente seleccionados, desde
						sofás elegantes hasta mesas funcionales y accesorios decorativos, Furnitore ofrece soluciones
						para cada espacio y presupuesto. </p>

					<ul class="list-unstyled custom-social">
						<li><a href="#"><span class="fa fa-brands fa-facebook-f"></span></a></li>
						<li><a href="#"><span class="fa fa-brands fa-twitter"></span></a></li>
						<li><a href="#"><span class="fa fa-brands fa-instagram"></span></a></li>
						<li><a href="#"><span class="fa fa-brands fa-linkedin"></span></a></li>
					</ul>
				</div>

				<div class="col-lg-8">
					<div class="row links-wrap">
						<div class="col-6 col-sm-6 col-md-3">
							<ul class="list-unstyled">
								<li><a href="#">Nosotros</a></li>
								<li><a href="#">Servicios</a></li>
								<li><a href="#">Blog</a></li>
								<li><a href="#">Contactanos</a></li>
							</ul>
						</div>

						<div class="col-6 col-sm-6 col-md-3">
							<ul class="list-unstyled">
								<li><a href="#">Soporte</a></li>
								<li><a href="#">Saber más</a></li>
								<li><a href="#">Privacidad</a></li>
							</ul>
						</div>

						<div class="col-6 col-sm-6 col-md-3">
							<ul class="list-unstyled">
								<li><a href="#">Trabajos</a></li>
								<li><a href="#">ONuestro Equipo</a></li>
								<li><a href="#">Leadership</a></li>
								<li><a href="#">Política de privacidad</a></li>
							</ul>
						</div>

						<div class="col-6 col-sm-6 col-md-3">
							<ul class="list-unstyled">
								<li><a href="#">Nordic Chair</a></li>
								<li><a href="#">Kruzo Aero</a></li>
								<li><a href="#">Ergonomic Chair</a></li>
							</ul>
						</div>
					</div>
				</div>

			</div>

			<div class="border-top ">
				<div class="row pt-4">


					<div class="col-lg-6 text-center text-lg-end">
						<ul class="list-unstyled d-inline-flex ms-auto">
							<li class="me-4"><a href="#">Terminos &amp; Condiciones</a></li>
							<li><a href="#">Política de privacidad</a></li>
						</ul>
					</div>

				</div>
			</div>

		</div>
	</footer>



	<script src="js/bootstrap.bundle.min.js"></script>
	<script src="js/tiny-slider.js"></script>
	<script src="js/custom.js"></script>
	<script>
		function comprar(producto) {
			// Número de WhatsApp y mensaje predefinido
			var numeroWhatsApp = '51987791103';
			var mensaje = encodeURIComponent('Estoy interesado en el mueble' + producto + ' quisiera mas información, por favor.');

			// Crear el enlace de WhatsApp
			var enlaceWhatsApp = 'https://wa.me/' + numeroWhatsApp + '?text=' + mensaje;

			// Redirigir a WhatsApp
			window.location.href = enlaceWhatsApp;
		}
	</script>
</body>

</html>