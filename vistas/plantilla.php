

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Definimos al navegador que usamos los puntos de quiebre de pantalla sacado de W3school-->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Ejemlplo MVC</title>

	<!-- Plugin de CSS-->
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">


	<!-- Plugin de JS-->
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

	<!-- Latest Compiled FontAwesome-->
	<script src="https://kit.fontawesome.com/87a9a7ec96.js" crossorigin="anonymous"></script>


</head>
<body>
	<!-- LOGO -->
	<div class ="container-fluid">
		<h3 class="text-center py-3">LOGO</h3>
	</div>
	<!-- BOTONERA -->
	<div class="container-fluid bg-light">
		<div class="container">
			<ul class="nav nav-justified py-2 nav-pills">


				<?php if (isset($_GET["pagina"])): ?>
					<?php if ($_GET["pagina"] == "farmacia"): ?>
						
						<li class="nav-item">
							<a class="nav-link active" href="index.php?pagina=farmacia">Farmacia</a>
						</li>

						<?php else: ?>
							<a class="nav-link " href="index.php?pagina=farmacia">Farmacia</a>

					<?php endif ?>

					<?php if ($_GET["pagina"] == "empleado"): ?>
						
						<li class="nav-item">
							<a class="nav-link active" href="index.php?pagina=empleado">Empleado</a>
						</li>

						<?php else: ?>
							<a class="nav-link " href="index.php?pagina=empleado">Empleado</a>

					<?php endif ?>



					<?php if ($_GET["pagina"] == "proveedor"): ?>
						
						<li class="nav-item">
							<a class="nav-link active" href="index.php?pagina=proveedor">Proveedor</a>
						</li>

						<?php else: ?>
							<a class="nav-link " href="index.php?pagina=proveedor">Proveedor</a>
					<?php endif ?>

					
					<?php if ($_GET["pagina"] == "producto"): ?>
						
						<li class="nav-item">
							<a class="nav-link active" href="index.php?pagina=producto">Producto</a>
						</li>

						<?php else: ?>
							<a class="nav-link " href="index.php?pagina=producto">Producto</a>
						<?php endif ?>



					<!--

						<?php if ($_GET["pagina"] == "cliente"): ?>
						<li class="nav-item">
							<a class="nav-link active" href="index.php?pagina=cliente">Cliente</a>
						</li>
						<?php else: ?>
							<a class="nav-link " href="index.php?pagina=cliente">Cliente</a>
						<?php endif ?>

						<?php if ($_GET["pagina"] == "venta"): ?>
						<li class="nav-item">
							<a class="nav-link active" href="index.php?pagina=venta">Venta</a>
						</li>
						<?php else: ?>
							<a class="nav-link " href="index.php?pagina=venta">Venta</a>
						<?php endif ?>

						--->



					<?php else: ?>

						<li class="nav-item">
							<a class="nav-link active" href="index.php?pagina=farmacia">Farmacia</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="index.php?pagina=empleado">Empleado</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="index.php?pagina=proveedor">Proveedor</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="index.php?pagina=producto">Producto</a>


						<!----</li>
						<li class="nav-item">
							<a class="nav-link" href="index.php?pagina=cliente">Cliente</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="index.php?pagina=venta">Venta</a>
						</li>
						*---->



				<?php endif ?>



				<!--GET: $_GET["variable"] Variables que se pasan como parametros via URL (Tamien conocido como cadena de consulta a través de la URL)
				Cuando es la primera variable se separa con ?
				las que siguen a continuación se separan con &
				-->


			</ul>
		</div>
	</div>

	<!-- CONTENIDO -->
	<div class="container-fluid">
		<div class="container py-5">
			
			<?php

				#ISSET: isset() Determina si una variable está definida y no es NULL

				if (isset($_GET["pagina"])) {
					
					if ($_GET["pagina"] == "farmacia" ||
						$_GET["pagina"] == "empleado" ||
						$_GET["pagina"] == "proveedor" ||
						$_GET["pagina"] == "editar" ||
						$_GET["pagina"] == "producto" ||
						$_GET["pagina"] == "cliente" ||
						$_GET["pagina"] == "venta" ||
						$_GET["pagina"] == "telefono_sucursal" ||
						$_GET["pagina"] == "sucursal" ||
						$_GET["pagina"] == "verempleado" ||
						$_GET["pagina"] == "verpuesto" ||
						$_GET["pagina"] == "verproveedores" ||
						$_GET["pagina"] == "verproveedorasucursal" ||
						$_GET["pagina"] == "verproductos" ||
						$_GET["pagina"] == "editarsucursal") {
						 #Este ejecuta la pagina
						 include "paginas/".$_GET["pagina"].".php";

					}else{
						include "paginas/error404.php";
					}


				}else{#si no recibe parametros entonces...
					#indicamos la pagina principal registro
					include "paginas/farmacia.php";
				}

				
			 ?>

		</div>
	</div>

</body>
</html>