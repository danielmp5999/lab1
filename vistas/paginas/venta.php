<div class="d-flex justify-content-center text-center ">

	<form class="p-5 bg-light" method="post">

		<!-- Campo para ingresar id de la venta -->
		<div class="form-group">
			<label for="nombre">Id venta:</label>
			<div class="input-group">
				<!-- Para agregar un icono al inicio del campo-->
				<div class="input-group-prepend">
					<span class="input-group-text"><i class="far fa-id-badge"></i></i></span>
				</div>
				<input type="id" class="form-control" placeholder="Ingresa un nuevo ID " id="id" name="registroId">
			</div>
		</div>



		<!-- Campo para ingresar id sucursal-->
		<div class="form-group">
			<label for="nombre">Id Sucursal:</label>
			<div class="input-group">
				<!-- Para agregar un icono al inicio del campo-->
				<div class="input-group-prepend">
					<span class="input-group-text"><i class="far fa-id-badge"></i></i></span>
				</div>
				<input type="id" class="form-control" placeholder="Ingresa el id de la sucursal " id="idSucursal" name="registroIdSucursal">
			</div>
		</div>

		<!-- Campo para ingresar id productos-->
		<div class="form-group">
			<label for="nombre">Id Producto:</label>
			<div class="input-group">
				<!-- Para agregar un icono al inicio del campo-->
				<div class="input-group-prepend">
					<span class="input-group-text"><i class="far fa-id-badge"></i></i></span>
				</div>
				<input type="id" class="form-control" placeholder="Ingresa el id del producto " id="idProducto" name="registroIdProducto">
			</div>
		</div>

		<!-- Campo para ingresar id cliente-->
		<div class="form-group">
			<label for="nombre">Id Cliente:</label>
			<div class="input-group">
				<!-- Para agregar un icono al inicio del campo-->
				<div class="input-group-prepend">
					<span class="input-group-text"><i class="far fa-id-badge"></i></i></span>
				</div>
				<input type="id" class="form-control" placeholder="Ingresa el id del cliente " id="idCliente" name="registroIdCliente">
			</div>
		</div>


		

		<!-- Campo para ingresar contraseña--*>
		<div class="form-group">
			<label for="password">Password:</label>
			<div class="input-group">
				<!-- Para agregar un icono al inicio del campo--*>
				<div class="input-group-prepend">
					<span class="input-group-text"><i class="fas fa-lock"></i></span>
				</div>
				<input type="password" class="form-control" placeholder="Enter password" id="password" name="registroPassword">
			</div>
		</div>
<---->
		<?php

		/* Forma en que se Instancia la clase de un metodo no estatico*/

//		$registro = new ControladorFormularios();
//		$registro -> ctrRegistro();

		/* Forma en que se Instancia la clase de un metodo estatico*/
		$registro = ControladorFormularios::ctrRegistro();
		if ($registro == "ok") {
			echo '<script>
				if(window.history.replaceState){
					window.history.replaceState(null,null,window.location.href);
				}

			</script>';
			echo '<div class="alert alert-success">El usuario ha sido registrado</div>';
		}

		?>
		<button type="submit" class="btn btn-primary">Enviar</button>
	</form>

</div>