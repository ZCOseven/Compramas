<?php
$title = "Compramas - Support Page";
$activePage = 'contactos';
ob_start();

?>

<!-- Estilos CSS personalizados -->
<link href="../assets/css/tiny-slider.css" rel="stylesheet">
<link href="../assets/css/pedroo.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
<link href="../assets/css/bootstrap.min.css" rel="stylesheet">
<style>
	btn {
		padding: 10px 5px;

	}

	.li {
		list-style-type: none;
		margin-left: 30px;
	}
</style>

<!-- Contenido de la pagina -->

<div class="hero">
		<div class="container">
			<div class="row justify-content-between">
				<div class="col-lg-5">
					<div class="intro-excerpt">
						<h1>Contacto</h1>
						<p class="mb-4">Valoramos tu opinión y nos esforzamos por brindarte el mejor servicio posible.
						</p>
						<p><a href="shop.html" class="btn btn-secondary me-2">Compra ahora</a><a href="shop.html"
								class="btn btn-white-outline">Explora</a></p>
					</div>
				</div>
				<div class="col-lg-7">
					<div class="hero-img-wrap">
						<img src="../assets/img/inicio/banner-hero.png" class="img-fluid">
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="untree_co-section">
		<div class="container">

			<div class="block">
				<div class="row justify-content-center">


					<div class="col-md-8 col-lg-8 pb-4">


						<div class="row mb-5">
							<div class="col-lg-4">
								<div class="service no-shadow align-items-center link horizontal d-flex active"
									data-aos="fade-left" data-aos-delay="0">
									<div class="service-icon color-1 mb-4">
										<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
											fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
											<path
												d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z" />
										</svg>
									</div> <!-- /.icon -->
									<div class="service-contents">
										<p>43 Raymouth Rd. Baltemoer, London 3910</p>
									</div> <!-- /.service-contents-->
								</div> <!-- /.service -->
							</div>

							<div class="col-lg-4">
								<div class="service no-shadow align-items-center link horizontal d-flex active"
									data-aos="fade-left" data-aos-delay="0">
									<div class="service-icon color-1 mb-4">
										<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
											fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
											<path
												d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z" />
										</svg>
									</div> <!-- /.icon -->
									<div class="service-contents">
										<p>info@yourdomain.com</p>
									</div> <!-- /.service-contents-->
								</div> <!-- /.service -->
							</div>

							<div class="col-lg-4">
								<div class="service no-shadow align-items-center link horizontal d-flex active"
									data-aos="fade-left" data-aos-delay="0">
									<div class="service-icon color-1 mb-4">
										<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
											fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
											<path fill-rule="evenodd"
												d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
										</svg>
									</div> <!-- /.icon -->
									<div class="service-contents">
										<p>+1 294 3925 3939</p>
									</div> <!-- /.service-contents-->
								</div> <!-- /.service -->
							</div>
						</div>

						<form action="comentar.php" method="POST">
							<div class="row">
								<div class="col-6">
									<div class="form-group">
										<label class="text-black" for="fname">Nombre completo</label>
										<input type="text" class="form-control" id="fname" name="fname">
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<label class="text-black" for="lname">Apellidos</label>
										<input type="text" class="form-control" id="lname" name="lname">
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="text-black" for="email">Correo electronico</label>
								<input type="email" class="form-control" id="email" name="email">
							</div>

							<div class="form-group mb-5">
								<label class="text-black" for="message">Mensaje</label>
								<textarea name="message" class="form-control" id="message" cols="30" rows="5"></textarea>
							</div>

							<button type="submit" class="btn btn-primary-hover-outline">Enviar Mensaje</button>
						</form>

					</div>

				</div>

			</div>

		</div>


	</div>
	</div>


<!-- Scripts Personalizados -->
<script src="../assets/js/bootstrap.bundle.min.js"></script>
	<script src="../assets/js/tiny-slider.js"></script>
	<script src="../assets/js/custom.js"></script>
<?php
$content = ob_get_clean();
include 'template.php';

