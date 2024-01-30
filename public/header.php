<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<title></title>
	<meta name="description" content="Este es un ejemplo de pagina web">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link href="public/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<script src="public/js/jquery-3.7.1.min.js" type="text/javascript"></script>
	<script src="public/js/bootstrap.bundle.min.js" type="text/javascript"></script>
	<script src="public/js/popper.min.js" type="text/javascript"></script>
	<script src="public/js/scripts.js" type="text/javascript"></script>
	<script src="public/js/notifications.js" type="text/javascript"></script>
	<link href="public/css/estilo.css" rel="stylesheet" type="text/css" />
	<link href="public/css/notificacion.css" rel="stylesheet" type="text/css" />
</head>


<?php
if (isset($_SESSION['categoria']) && $_SESSION['categoria'] > 0) {

	?>
	<script>
		var colores = ["#EAEDED", "#7DCEA0", "#AEB6BF", "#85C1E9"];
		// Este código se ejecutará cuando la página se cargue completamente
		document.addEventListener("DOMContentLoaded", function () {
			// Cambia el color de fondo después de que la página esté completamente cargada
			document.body.style.backgroundColor = colores[<?php echo $_SESSION['categoria'] ?>]; // Cambia este valor al color que desees
		});
	</script>
	<?php
}else if (isset($_SESSION['tipoRecomendado']) && $_SESSION['tipoRecomendado'] > 0) {
	?>
	
	<script>
		var colores = ["#EAEDED", "#7DCEA0", "#AEB6BF", "#85C1E9"];
		// Este código se ejecutará cuando la página se cargue completamente
		document.addEventListener("DOMContentLoaded", function () {
			// Cambia el color de fondo después de que la página esté completamente cargada
			document.body.style.backgroundColor = colores[<?php echo $_SESSION['tipoRecomendado'] ?>]; // Cambia este valor al color que desees
		});
	</script>
	<?php
}else {
	?>
	<script>
		var colores = ["#EAEDED", "#7DCEA0", "#AEB6BF", "#85C1E9"];
		// Este código se ejecutará cuando la página se cargue completamente
		document.addEventListener("DOMContentLoaded", function () {
			// Cambia el color de fondo después de que la página esté completamente cargada
			document.body.style.backgroundColor = colores[0]; // Cambia este valor al color que desees
		});
	</script>
	<?php
}
?>


<body>
	<div class="d-flex justify-content-center">
		<img src="./public/img/logo.jpeg" alt="Logo" class="d-inline-block align-text-top img border ">
		<h1 class="titulo">Las Lobas Tours</h1>
	</div>
	<hr class="border border-secondary border-2 opacity-50">
	<div class="container">
		<nav class="navbar navbar-expand-lg bg-body-tertiary ">
			<div class="container-fluid">
				<a href="?controlador=Index&accion=mostrarIndex" class="navbar-brand"><img src="./public/img/inicio.png" alt=""></a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse"
					data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
					aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav me-auto mb-2 mb-lg-0">
						<li class="nav-item">
							<form class="d-flex" role="search" action="?controlador=Tours&accion=mostrarTours"
								method="post">
								<input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search"
									id="nombre" name="nombre" required>
								<button class="btn btn-outline-success" type="submit">Buscar</button>
							</form>
						</li>
					</ul>
					<span>
						<button type="button" class="btn " data-bs-toggle="modal" data-bs-target="#staticBackdrop">
							<img src="./public/img/setting.png" alt="boton.png">
						</button>
						<a type="button" class="btn " <a href="?controlador=Index&accion=cerrarSesion">
							<img src="./public/img/close-session.png" alt="boton.png"></a>
					</span>
				</div>
			</div>
		</nav>
	</div>



	<!-- Modal -->
	<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
		aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h1 class="modal-title fs-5" id="staticBackdropLabel">Configuración</h1>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<h5 class="modal-title">Preferencias</h5>
					<div>
						<h6>Seleccione la categoría de su preferencia para mostrar ese contenido</h6>
						<select class="form-control" name="categoria" id="categoria">
							<?php foreach ($_SESSION['tipos'] as $value) {
								if ($_SESSION['categoria'] == $value['id']) {
									?>
									<option value="	<?php echo $value['id'] ?>" selected>
										<?php echo $value['nombre'] ?>
									</option>
								<?php } else { ?>
									<option value="	<?php echo $value['id'] ?>">
										<?php echo $value['nombre'] ?>
									</option>
								<?php }
							} ?>
						</select>
					</div>
					<div>
						<h6>Seleccione la subcategoría de su preferencia para mostrar ese contenido</h6>
						<select class="form-control" name="subcategoria" id="subcategoria">
							<?php foreach ($_SESSION['subtipos'] as $value) {
								if ($_SESSION['subcategoria'] == $value['id']) {
									?>
									<option value="	<?php echo $value['id'] ?>" selected>
										<?php echo $value['nombre'] ?>
									</option>
								<?php } else { ?>
									<option value="	<?php echo $value['id'] ?>">
										<?php echo $value['nombre'] ?>
									</option>
									<?php
								}
							}
							?>
						</select>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
					<button type="button" class="btn btn-primary" data-bs-dismiss="modal"
						onclick="cambiarColor()">Guardar cambios</button>
				</div>
			</div>
		</div>
	</div>

	<div class="container">