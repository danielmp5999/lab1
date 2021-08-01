<?php

//Primero cargamos la informacion necesaria
//Con esta variable mandamos a llamar la tabla sucursal
$usuarios = ControladorFormularios::ctrSeleccionarRegistros(null,null);

//Con esta variable mandamos a llamar la tabla puesto_empleado
$puestos = ControladorFormularios::ctrSeleccionarRegistrosPuesto(null,null);
//este print_r sirve para mostrar en pantalla el tipo y contenido de dato
//echo '<pre>'; print_r($puestos); echo '</pre>';



?>
<div class="d-flex justify-content-center text-center ">

	<form class="p-5 bg-light" method="post">

		<!-- Campo para ingresar id-->
		<div class="form-group">
			<label for="nombre">Id:</label>
			<div class="input-group">
				<!-- Para agregar un icono al inicio del campo-->
				<div class="input-group-prepend">
					<span class="input-group-text"><i class="far fa-id-badge"></i></i></span>
				</div>
				<input type="id" class="form-control" placeholder="Ingresa un nuevo ID " id="id" name="registroId">
			</div>
		</div>

		<!-- Campo para ingresar nombre empleado-->
		<div class="form-group">
			<label for="nombre">Nombre Empleado:</label>
			<div class="input-group">
				<!-- Para agregar un icono al inicio del campo-->
				<div class="input-group-prepend">
					<span class="input-group-text"><i class="fas fa-user"></i></span>
				</div>
				<input type="name" class="form-control" placeholder="Ingresa el nombre " id="nombre" name="registroNombre">
			</div>
		</div>


		<!-- Campo para ingresar apellido materno-->
		<div class="form-group">
			<label for="nombre">Apellido Materno:</label>
			<div class="input-group">
				<!-- Para agregar un icono al inicio del campo-->
				<div class="input-group-prepend">
					<span class="input-group-text"><i class="fas fa-user"></i></span>
				</div>
				<input type="name" class="form-control" placeholder="Ingresa apellido materno " id="apelldoM" name="registroApellidoM">
			</div>
		</div>

		<!-- Campo para ingresar apellido paterno-->
		<div class="form-group">
			<label for="nombre">Apellido Paterno:</label>
			<div class="input-group">
				<!-- Para agregar un icono al inicio del campo-->
				<div class="input-group-prepend">
					<span class="input-group-text"><i class="fas fa-user"></i></span>
				</div>
				<input type="name" class="form-control" placeholder="Ingresa apellido paterno " id="apellidoP" name="registroApellidoP">
			</div>
		</div>

		<!-- Campo para ingresar CURP-->
		<div class="form-group">
			<label for="nombre">CURP:</label>
			<div class="input-group">
				<!-- Para agregar un icono al inicio del campo-->
				<div class="input-group-prepend">
					<span class="input-group-text"><i class="fas fa-user"></i></span>
				</div>
				<input type="curp" class="form-control" placeholder="Ingresa curp " id="curp" name="registroCurp">
			</div>
		</div>


		<!-- Campo para ingresar fechacontratacion-->
		<div class="form-group">
			<label for="nombre">Fecha Contratacion::</label>
			<div class="input-group">
				<!-- Para agregar un icono al inicio del campo-->
				<div class="input-group-prepend">
					<span class="input-group-text"><i class="fas fa-calendar-day"></i></span>
				</div>
				<input type="date" class="form-control" placeholder=" " id="fecha" name="registroFecha">
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
			</div>
		</div>

		<!-- Campo para ingresar id puesto-->
		<div class="form-group">
			<label for="nombre">Id Puesto:</label>
			<div class="input-group">
				<!-- Para agregar un icono al inicio del campo-->
				<div class="input-group-prepend">
					<span class="input-group-text"><i class="far fa-id-badge"></i></i></span>
				</div>

				<select class="form-control" name="registroIdPuesto" id="idPuesto">
					<?php foreach ($puestos as $key => $value): ?>
						<option value=<?php echo $value["id_puesto"]; ?>>
							<?php echo $value["puesto"]; ?>
						</option>
					<?php endforeach ?>
				</select>
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
		$registro = ControladorFormularios::ctrRegistroE();
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
				<div class="px-1"><a href="index.php?pagina=verempleado" type="btn" class="btn btn-dark">Mostrar empleados</a></div>
			</div>
		</div>

		<li>
			<div class="row">
				<div class="col-md-2">
					<div class="px-1"><a href="index.php?pagina=verpuesto" type="btn" class="btn btn-dark">Mostrar puestos</a></div>
				</div>
			</div>
		</li>

		
	</div>


</div>