<?php

//Primero cargamos la informacion necesaria
//Con esta variable mandamos a llamar la tabla sucursal
$usuarios = ControladorFormularios::ctrSeleccionarRegistros(null,null);
//este print_r sirve para mostrar en pantalla el tipo y contenido de dato
//echo '<pre>'; print_r($usuarios); echo '</pre>';



?>

<div class="d-flex justify-content-center text-center ">

	<form class="p-5 bg-light" method="post">

		<!-- Campo para ingresar id del producto -->
		<div class="form-group">
			<label for="nombre">Id producto:</label>
			<div class="input-group">
				<!-- Para agregar un icono al inicio del campo-->
				<div class="input-group-prepend">
					<span class="input-group-text"><i class="far fa-id-badge"></i></i></span>
				</div>
				<input type="id" class="form-control" placeholder="Ingresa un nuevo ID " id="id" name="registroId">
			</div>
		</div>

		<!-- Campo para ingresar nombre producto-->
		<div class="form-group">
			<label for="nombre">Nombre Producto:</label>
			<div class="input-group">
				<!-- Para agregar un icono al inicio del campo-->
				<div class="input-group-prepend">
					<span class="input-group-text"><i class="fas fa-first-aid"></i></span>
				</div>
				<input type="name" class="form-control" placeholder="Ingresa el nombre " id="nombre" name="registroNombre">
			</div>
		</div>


		<!-- Campo para ingresar caducidad-->
		<div class="form-group">
			<label for="nombre">Caducidad:</label>
			<div class="input-group">
				<!-- Para agregar un icono al inicio del campo-->
				<div class="input-group-prepend">
					<span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
				</div>
				<input type="date" class="form-control" placeholder="Ingresa fecha caducidad " id="caducidad" name="registroCaducidad">
			</div>
		</div>

		<!-- Campo para ingresar precio-->
		<div class="form-group">
			<label for="nombre">Precio:</label>
			<div class="input-group">
				<!-- Para agregar un icono al inicio del campo-->
				<div class="input-group-prepend">
					<span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
				</div>
				<input type="price" class="form-control" placeholder="Ingresa precio " id="precio" name="registroPrecio">
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

				



				<select class="form-control" name="registroIdSucursal" id="idSucursal">
					<?php foreach ($usuarios as $key => $value): ?>
						<option value=<?php echo $value["id_sucursal"]; ?>>
							<?php echo $value["nombre_sucursal"]; ?>
						</option>
					<?php endforeach ?>
				</select>
			




				

				<!---	

				<input type="hidden" class="form-control" text=value id="idSucursal" name="registroIdSucursal">  <!--->
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
		$registro = ControladorFormularios::ctrRegistroProducto();
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
				<div class="px-1"><a href="index.php?pagina=verproductos" type="btn" class="btn btn-dark">Mostrar Productos</a></div>
			</div>
		</div>

		


</div>