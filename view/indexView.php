<?php
include_once './public/header.php';
?>
<div class="container row ">
	<div class="col-xl-12 d-flex justify-content-center">
		<div class="col-8-flex justify-content-center row fuente border">

			<p class="text-container">Bienvenido a <span class="section-title">LasLobasTours.com</span></p>

			<p class="text-container">Descubre la magia y la biodiversidad incomparable de Costa Rica con <span
					class="section-title">Las Lobas Tours</span>, tu puerta de entrada a una experiencia turística
				inolvidable. Sumérgete en la belleza natural de este paraíso tropical, donde cada rincón cuenta una
				historia fascinante.</p>

			<p class="text-container">En <span class="section-title">Las Lobas Tours</span>, nos dedicamos a
				ofrecerte los tours más emocionantes y auténticos, diseñados para llevarte a los destinos más
				espectaculares del país. Desde playas de arena blanca hasta selvas exuberantes y majestuosos
				volcanes, te invitamos a explorar la diversidad que hace de Costa Rica un destino único en el mundo.
			</p>


			<p class="text-container">¿Estás listo para vivir la aventura de tu vida? Únete a nosotros en <span
					class="section-title">Las Lobas Tours</span> y descubre la esencia de este paraíso tropical. ¡Tu
				viaje de ensueño comienza aquí!</p>
			<!-- <img src="./public/img/inicio.jpg" class="img-fluid border" alt="inicio.jpg"> -->
		</div>
	</div>
	<div class="col-xl-12 row justify-content-center">
		<div class="d-flex justify-content-center">
			<h3 class="my-2">Recomendaciones para ti</h3>
		</div>

		<div class="d-flex justify-content-center">
			<?php if ($vars['recomendaciones'] == null) { ?>
				<div class="alert alert-warning text-center mb-3" role="alert">
					¡Empezá a navegar para obtener recomendaciones o establece tus preferencias desde el apartado de
					Configuración!
				</div>
			<?php } else { ?>
				<div id="carouselExampleDark" class="carousel carousel-dark slide">
					<div class="carousel-indicators">
						<?php
						$contador = 0;
						foreach ($vars['recomendaciones'] as $value) {
							?>
							<button type="button" data-bs-target="#carouselExampleDark"
								data-bs-slide-to="<?php echo $contador; ?>" class="active" aria-current="true"
								aria-label="Slide <?php echo $contador; ?>+1"></button>

							<?php $contador++;
						}
						?>
					</div>
					<div class="carousel-inner">
						<?php
						$contadorAux = 0;
						foreach ($vars['recomendaciones'] as $value) {

							if ($contadorAux == 0) {
								?>
								<div class="carousel-item active" data-bs-interval="10000">
									<div class="card mx-3 my-3 col-3 d-block" style="width: 18rem;">
									<img src="./public/img/<?php echo $value['img_def']?>.png" class="card-img-top" alt="...">
										<div class="card-body">
											<h5 class="card-title">
												<?php echo $value['nombre'] ?>
											</h5>
											<p class="card-text">Ubicación:
											<?php echo $value['ubicacion'] ?>
											</p>
											<p class="card-text">Valoración:
												<?php echo $value['valoracion'] ?>

											</p>
											<form action="?controlador=Tours&accion=mostrarTourIndex" method="post">
												<input type="hidden" name="id" value="<?php echo $value['id'] ?>">
												<button type="submit" class="btn btn-primary">Ver info</button>
											</form>
										</div>
									</div>
								</div>
								<?php $contadorAux++;
							} else { ?>
								<div class="carousel-item " data-bs-interval="2000">
									<div class="card mx-3 my-3 col-3 d-block" style="width: 18rem;">
									<img src="./public/img/<?php echo $value['img_def']?>.png" class="card-img-top" alt="...">
										<div class="card-body">
											<h5 class="card-title">
												<?php echo $value['nombre'] ?>
											</h5>
											<p class="card-text">Ubicación:
												<?php echo $value['ubicacion'] ?>
											</p>
											<p class="card-text">Valoración:
												<?php echo $value['valoracion'] ?>

											</p>
											<form action="?controlador=Tours&accion=mostrarTourIndex" method="post">
												<input type="hidden" name="id" value="<?php echo $value['id'] ?>">
												<button type="submit" class="btn btn-primary">Ver info</button>
											</form>
										</div>
									</div>
								</div>
							<?php }
						}
						?>
					</div>
					<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark"
						data-bs-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="visually-hidden">Previous</span>
					</button>
					<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark"
						data-bs-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="visually-hidden">Next</span>
					</button>
				</div>
			</div>
		</div>
	<?php } ?>
</div>



<?php
include_once './public/footer.php';
?>