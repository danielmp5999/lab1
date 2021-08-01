<?php 
if (isset($_GET["id"])) {
	$item = "id_productos";
	$valor = $_GET["id"];

	$aux = ControladorFormularios::ctrSeleccionarRegistrosProductosEditar($item, $valor);
	$usuario = $aux["0"];
	/*echo '<pre>'; print_r($usuario); echo '</pre>';
	echo '<pre>'; print_r($valor); echo '</pre>';
	echo '<pre>'; print_r($item); echo '</pre>';
	echo '<pre>'; print_r($usuario["0"]); echo '</pre>';*/
	
}


/*	if (!isset($_SESSION["validarIngreso"])) {

		echo '<script>window.location = "index.php?pagina=ingreso"</script>';

		return;
	}else{
		if ($_SESSION["validarIngreso"] != "ok") {
			echo '<script>window.location = "index.php?pagina=ingreso"</script>';

			return;
		}
	}*/
 ?>


<div class="d-flex justify-content-center text-center ">

	<form class="p-5 bg-light" method="post">


				<!-- Campo para ingresar id-->
		<div class="form-group">
			<div class="input-group">
				<!-- Para agregar un icono al inicio del campo-->
				<div class="input-group-prepend">
					<span class="input-group-text"><i class="fas fa-user"></i></span>
				</div>
				<input type="id" class="form-control" value="<?php echo $usuario["id_productos"]; ?>" id="id" name="registroId">
			</div>

		</div>
		
		<!-- Campo para ingresar nombre-->
		<div class="form-group">
			<div class="input-group">
				<!-- Para agregar un icono al inicio del campo-->
				<div class="input-group-prepend">
					<span class="input-group-text"><i class="fas fa-user"></i></span>
				</div>
				<input type="text" class="form-control" value="<?php echo $usuario["nombre"]; ?>" placeholder="Ingresa tu nombre" id="nombre" name="actualizarNombre">
			</div>

		</div>


		<!-- Campo para ingresar caducidad-->
		<div class="form-group">
			<div class="input-group">
				<!-- Para agregar un icono al inicio del campo-->
				<div class="input-group-prepend">
					<span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
				</div>
				<input type="date" class="form-control" value="<?php echo $usuario["caducidad"]; ?>" placeholder="Ingresa tu correo electronico" id="caducidad" name="actualizarCaducidad">
			</div>	
		</div>


				<!-- Campo para ingresar PRECIO-->
		<div class="form-group">
			<div class="input-group">
				<!-- Para agregar un icono al inicio del campo-->
				<div class="input-group-prepend">
					<span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
				</div>
				<input type="price" class="form-control" value="<?php echo $usuario["precio"]; ?>" placeholder="Ingresa tu nombre" id="precio" name="actualizarPrecio">
			</div>
		</div>


				<!-- Campo para ingresar sucursal-->
		<div class="form-group">
			<div class="input-group">
				<!-- Para agregar un icono al inicio del campo-->
				<div class="input-group-prepend">
					<span class="input-group-text"><i class="far fa-id-badge"></i></span>
				</div>
				<input type="price" class="form-control" value="<?php echo $usuario["id_sucursal"]; ?>" placeholder="Ingresa tu nombre" id="idSucursal" name="actualizarIdSucursal">
			</div>
		</div>



		<!-- BOTON-->
		<div class="form-group">
			<div class="input-group">
				
			</div>
		</div>

		<?php
		$actualizar = ControladorFormularios::ctrActualizarRegistroProducto();
		if ($actualizar == "ok") {
		 	echo '<script>
				if(window.history.replaceState){
					window.history.replaceState(null,null,window.location.href);
				}

			</script>';
			echo '<div class="alert alert-success">El usuario ha sido actualizado</div>

			<script>	

				setTimeout(function(){
					window.location = "index.php?pagina=verproductos";
				},3000);
			</script
			';

		 }
		
		?>
		<button type="submit" class="btn btn-primary">Actualizar</button>
	</form>

</div>