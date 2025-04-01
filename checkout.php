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
			<a class="navbar-brand" href="index.php">Furni<span>.</span></a>

			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni"
				aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarsFurni">
				<ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
					<li class="nav-item ">
						<a class="nav-link" href="index.php">Inicio</a>
					</li>
					<li><a class="nav-link" href="shop.php">Productos</a></li>
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
						<h1>Caja</h1>
					</div>
				</div>
				<div class="col-lg-7">

				</div>
			</div>
		</div>
	</div>


	<div class="untree_co-section">
		<div class="container">
			<div class="row mb-5">
				<div class="col-md-12">
					<div class="border p-4 rounded" role="alert">
						Eres cliente? <a href="index.php">Click aqui</a> para ingresar
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6 mb-5 mb-md-0">
					<h2 class="h3 mb-3 text-black">Detalles de facturación</h2>
					<div class="p-3 p-lg-5 border bg-white">
						<div class="form-group">
							<label for="c_country" class="text-black">País <span class="text-danger">*</span></label>
							<select id="c_country" class="form-control">
								<option value="1">Seleccione un país</option>
								<option value="2">Argentina</option>
								<option value="3">Perú</option>
								<option value="4">Mexico</option>
								<option value="5">Paraguay</option>
								<option value="6">Bolivia</option>
								<option value="7">Estados Unidos</option>
								<option value="8">Colombia</option>
								<option value="9">Republica Dominicana</option>
							</select>
						</div>
						<div class="form-group row">
							<div class="col-md-6">
								<label for="c_fname" class="text-black">Nombre <span
										class="text-danger">*</span></label>
								<input type="text" class="form-control" id="c_fname" name="c_fname">
							</div>
							<div class="col-md-6">
								<label for="c_lname" class="text-black">Apellidos <span
										class="text-danger">*</span></label>
								<input type="text" class="form-control" id="c_lname" name="c_lname">
							</div>
						</div>

						<div class="form-group row">
							<div class="col-md-12">
								<label for="c_companyname" class="text-black">Nombre de empresa</label>
								<input type="text" class="form-control" id="c_companyname" name="c_companyname">
							</div>
						</div>

						<div class="form-group row">
							<div class="col-md-12">
								<label for="c_address" class="text-black">Dirección <span
										class="text-danger">*</span></label>
								<input type="text" class="form-control" id="c_address" name="c_address"
									placeholder="Dirección de la calle">
							</div>
						</div>

						<div class="form-group mt-3">
							<input type="text" class="form-control"
								placeholder="Apartamento, suite, unidad, etc. (opcional)">
						</div>

						<div class="form-group row">
							<div class="col-md-6">
								<label for="c_state_country" class="text-black">País / Estado<span
										class="text-danger">*</span></label>
								<input type="text" class="form-control" id="c_state_country" name="c_state_country">
							</div>
							<div class="col-md-6">
								<label for="c_postal_zip" class="text-black">Postal <span
										class="text-danger">*</span></label>
								<input type="text" class="form-control" id="c_postal_zip" name="c_postal_zip">
							</div>
						</div>

						<div class="form-group row mb-5">
							<div class="col-md-6">
								<label for="c_email_address" class="text-black">Correo electronico<span
										class="text-danger">*</span></label>
								<input type="text" class="form-control" id="c_email_address" name="c_email_address">
							</div>
							<div class="col-md-6">
								<label for="c_phone" class="text-black">Número <span
										class="text-danger">*</span></label>
								<input type="text" class="form-control" id="c_phone" name="c_phone"
									placeholder="Numero telefonico">
							</div>
						</div>

						<div class="form-group">
							<label for="c_create_account" class="text-black" data-bs-toggle="collapse"
								href="#create_an_account" role="button" aria-expanded="false"
								aria-controls="create_an_account"><input type="checkbox" value="1"
									id="c_create_account"> ¿Crea una cuenta?</label>
							<div class="collapse" id="create_an_account">
								<div class="py-2 mb-4">
									<p class="mb-3">Cree una cuenta ingresando la información a continuación. si eres un
										Cliente que regresa, inicie sesión en la parte superior de la página.</p>
									<div class="form-group">
										<label for="c_account_password" class="text-black">Contraseña de cuenta</label>
										<input type="email" class="form-control" id="c_account_password"
											name="c_account_password" placeholder="">
									</div>
								</div>
							</div>
						</div>


						<div class="form-group">
							<label for="c_ship_different_address" class="text-black" data-bs-toggle="collapse"
								href="#ship_different_address" role="button" aria-expanded="false"
								aria-controls="ship_different_address"><input type="checkbox" value="1"
									id="c_ship_different_address"> ¿Envia a una direccion diferente?</label>
							<div class="collapse" id="ship_different_address">
								<div class="py-2">

									<div class="form-group">
										<label for="c_diff_country" class="text-black">País <span
												class="text-danger">*</span></label>
										<select id="c_diff_country" class="form-control">
											<option value="1">Seleccione un país</option>
											<option value="2">Argentina</option>
											<option value="3">Perú</option>
											<option value="4">Mexico</option>
											<option value="5">Paraguay</option>
											<option value="6">Bolivia</option>
											<option value="7">Estados Unidos</option>
											<option value="8">Colombia</option>
											<option value="9">Republica Dominicana</option>
										</select>
									</div>


									<div class="form-group row">
										<div class="col-md-6">
											<label for="c_diff_fname" class="text-black">Nombre<span
													class="text-danger">*</span></label>
											<input type="text" class="form-control" id="c_diff_fname"
												name="c_diff_fname">
										</div>
										<div class="col-md-6">
											<label for="c_diff_lname" class="text-black">Apellidos <span
													class="text-danger">*</span></label>
											<input type="text" class="form-control" id="c_diff_lname"
												name="c_diff_lname">
										</div>
									</div>

									<div class="form-group row">
										<div class="col-md-12">
											<label for="c_diff_companyname" class="text-black">Nombre de Compañia
											</label>
											<input type="text" class="form-control" id="c_diff_companyname"
												name="c_diff_companyname">
										</div>
									</div>

									<div class="form-group row  mb-3">
										<div class="col-md-12">
											<label for="c_diff_address" class="text-black">Dirección <span
													class="text-danger">*</span></label>
											<input type="text" class="form-control" id="c_diff_address"
												name="c_diff_address" placeholder="Street address">
										</div>
									</div>

									<div class="form-group">
										<input type="text" class="form-control"
											placeholder="Apartamento, suite, unidad, etc. (opcional)">
									</div>

									<div class="form-group row">
										<div class="col-md-6">
											<label for="c_diff_state_country" class="text-black">País / Estado <span
													class="text-danger">*</span></label>
											<input type="text" class="form-control" id="c_diff_state_country"
												name="c_diff_state_country">
										</div>
										<div class="col-md-6">
											<label for="c_diff_postal_zip" class="text-black">Postal<span
													class="text-danger">*</span></label>
											<input type="text" class="form-control" id="c_diff_postal_zip"
												name="c_diff_postal_zip">
										</div>
									</div>

									<div class="form-group row mb-5">
										<div class="col-md-6">
											<label for="c_diff_email_address" class="text-black">Correo Electronico
												<span class="text-danger">*</span></label>
											<input type="text" class="form-control" id="c_diff_email_address"
												name="c_diff_email_address">
										</div>
										<div class="col-md-6">
											<label for="c_diff_phone" class="text-black">Número <span
													class="text-danger">*</span></label>
											<input type="text" class="form-control" id="c_diff_phone"
												name="c_diff_phone" placeholder="Numero telefonico">
										</div>
									</div>

								</div>

							</div>
						</div>

						<div class="form-group">
							<label for="c_order_notes" class="text-black">Pedidos</label>
							<textarea name="c_order_notes" id="c_order_notes" cols="30" rows="5" class="form-control"
								placeholder="Escribe tus notas aquí..."></textarea>
						</div>

					</div>
				</div>
				<div class="col-md-6">

					<div class="row mb-5">
						<div class="col-md-12">
							<h2 class="h3 mb-3 text-black">Código promocional</h2>
							<div class="p-3 p-lg-5 border bg-white">

								<label for="c_code" class="text-black mb-3">Ingrese su código de cupón si tiene
									uno</label>
								<div class="input-group w-75 couponcode-wrap">
									<input type="text" class="form-control me-2" id="c_code" placeholder="Coupon Code"
										aria-label="Coupon Code" aria-describedby="button-addon2">
									<div class="input-group-append">
										<button class="btn btn-black btn-sm" type="button"
											id="button-addon2">Aplicar</button>
									</div>
								</div>

							</div>
						</div>
					</div>

					<div class="row mb-5">
						<div class="col-md-12">
							<h2 class="h3 mb-3 text-black">Tu Orden</h2>
							<div class="p-3 p-lg-5 border bg-white">
								<table class="table site-block-order-table mb-5">
									<thead>
										<th>Producto</th>
										<th>Total</th>
									</thead>
									<tbody>
										<tr>
											<td>Top Up T-Shirt <strong class="mx-2">x</strong> 1</td>
											<td>$250.00</td>
										</tr>
										<tr>
											<td>Polo Shirt <strong class="mx-2">x</strong> 1</td>
											<td>$100.00</td>
										</tr>
										<tr>
											<td class="text-black font-weight-bold"><strong>Subtotal del
													carrito</strong></td>
											<td class="text-black">$350.00</td>
										</tr>
										<tr>
											<td class="text-black font-weight-bold"><strong>Total de Orden </strong>
											</td>
											<td class="text-black font-weight-bold"><strong>$350.00</strong></td>
										</tr>
									</tbody>
								</table>

								<div class="border p-3 mb-3">
									<h3 class="h6 mb-0"><a class="d-block" data-bs-toggle="collapse"
											href="#collapsebank" role="button" aria-expanded="false"
											aria-controls="collapsebank">Transferencia bancaria directa</a></h3>

									<div class="collapse" id="collapsebank">
										<div class="py-2">
											<p class="mb-0">Realice su pago directamente en nuestra cuenta bancaria. Por
												favor use
												su ID de pedido como referencia de pago. Tu pedido no será enviado
												hasta que los fondos se hayan liquidado en nuestra cuenta.</p>
										</div>
									</div>
								</div>

								<div class="border p-3 mb-3">
									<h3 class="h6 mb-0"><a class="d-block" data-bs-toggle="collapse"
											href="#collapsecheque" role="button" aria-expanded="false"
											aria-controls="collapsecheque">Pago con cheque</a></h3>

									<div class="collapse" id="collapsecheque">
										<div class="py-2">
											<p class="mb-0">Realice su pago directamente en nuestra cuenta bancaria. Por
												favor use
												su ID de pedido como referencia de pago. Tu pedido no será enviado
												hasta que los fondos se hayan liquidado en nuestra cuenta.</p>
										</div>
									</div>
								</div>

								<div class="border p-3 mb-5">
									<h3 class="h6 mb-0"><a class="d-block" data-bs-toggle="collapse"
											href="#collapsepaypal" role="button" aria-expanded="false"
											aria-controls="collapsepaypal">Paypal</a></h3>

									<div class="collapse" id="collapsepaypal">
										<div class="py-2">
											<p class="mb-0">Realice su pago directamente en nuestra cuenta bancaria. Por
												favor use
												su ID de pedido como referencia de pago. Tu pedido no será enviado
												hasta que los fondos se hayan liquidado en nuestra cuenta.</p>
										</div>
									</div>
								</div>

								<div class="form-group">
									<button class="btn btn-black btn-lg py-3 btn-block"
										onclick="window.location='thankyou.php'">Realizar pedido</button>
								</div>

							</div>
						</div>
					</div>

				</div>
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
</body>

</html>