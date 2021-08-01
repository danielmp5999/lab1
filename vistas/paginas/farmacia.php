
<div class="d-flex justify-content-center text-center ">

	<form class="p-5 bg-light" method="post">

		<!-- Campo para ingresar id-->
		<div class="form-group">
			<label for="nombre">Id:</label>
			<div class="input-group">
				<!-- Para agregar un icono al inicio del campo-->
				<div class="input-group-prepend">
					<span class="input-group-text"><i class="fas fa-user"></i></span>
				</div>
				<input type="id" class="form-control" placeholder="Ingresa un nuevo ID " id="id" name="registroId">
			</div>
		</div>

		<!-- Campo para ingresar nombre-->
		<div class="form-group">
			<label for="nombre">Nombre de la sucursal:</label>
			<div class="input-group">
				<!-- Para agregar un icono al inicio del campo-->
				<div class="input-group-prepend">
					<span class="input-group-text"><i class="fas fa-pills"></i></span>
				</div>
				<input type="name" class="form-control" placeholder="Ingresa el nombre " id="nombre" name="registroNombre">
			</div>
		</div>


		<!-- Campo para ingresar direccion	***		-->
		<div class="form-group">
			<label for="nombre">Dirección:</label>
			<div class="input-group">
				<!-- Para agregar un icono al inicio del campo-->
				<div class="input-group-prepend">
					<span class="input-group-text"><i class="fas fa-location-arrow"></i></span>
				</div>
				<input type="text" class="form-control" placeholder="Ingresa la dirección " id="direccion" name="registroDireccion">
			</div>
		</div>


		<!-- Campo para ingresar telefono1		***		-->
		<div class="form-group">
			<label for="telefono1">Telefono 1:</label>
			<div class="input-group">
				<!-- Para agregar un icono al inicio del campo-->
				<div class="input-group-prepend">
					<span class="input-group-text"><i class="fas fa-phone-alt"></i></span>
				</div>
				<input type="phone" class="form-control" placeholder="Ingresa el telefono 1" id="telefono1" name="registroTelefono1">
			</div>	
		</div>


		<!-- Campo para ingresar telefono 2		***		-->
		<div class="form-group">
			<label for="telefono2">Telefono 2:</label>
			<div class="input-group">
				<!-- Para agregar un icono al inicio del campo-->
				<div class="input-group-prepend">
					<span class="input-group-text"><i class="fas fa-phone-alt"></i></span>
				</div>
				<input type="phone" class="form-control" placeholder="Ingresa el telefono 2" id="telefono2" name="registroTelefono2">
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

	<div>
		<div class="row">
			<div class="col-md-2">
				<div class="px-1"><a href="index.php?pagina=sucursal" type="btn" class="btn btn-dark">Mostrar Sucursales</a></div>
			</div>
		</div>

		<li>
			<div class="row">
				<div class="col-md-2">
					<div class="px-1"><a href="index.php?pagina=telefono_sucursal" type="btn" class="btn btn-dark">Mostrar telefono Sucursales</a></div>
				</div>
			</div>
		</li>
	</div>


</div>

