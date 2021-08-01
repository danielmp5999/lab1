<?php
$bandera = "";
$eliminar = null;
//if (!isset($_SESSION["validarIngreso"])) {

//	echo '<script>window.location = "index.php?pagina=ingreso"</script>';

//	return;
//}else{
//	if ($_SESSION["validarIngreso"] != "ok") {
//		echo '<script>window.location = "index.php?pagina=ingreso"</script>';
//
//		return;
//	}
//}

$usuarios = ControladorFormularios::ctrSeleccionarRegistros(null,null);
//este print_r sirve para mostrar en pantalla el tipo y contenido de dato
//echo '<pre>'; print_r($usuarios); echo '</pre>';



?>

<table class="table table-striped">
	<thead>
		<tr>
			<th>#</th>
			<th>Nombre</th>
			<th>Direccion</th>
			<th>Fecha Creacion</th>
			<th>Hora</th>
			<th>Acciones</th>

		</tr>
	</thead>
	<tbody>

		<?php foreach ($usuarios as $key => $value): ?>
			<tr>
				<td><?php echo $value["id_sucursal"]; ?></td>
				<td><?php echo $value["nombre_sucursal"]; ?></td>
				<td><?php echo $value["direccion"]; ?></td>
				<td><?php echo $value["fecha"]; ?></td>
				<td><?php echo $value["hora"]; ?></td>
				<td>
					<div class="btn-group">

						<div class="px-1">
						<a href="index.php?pagina=editarsucursal&id=<?php echo $value["id_sucursal"]; ?>" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>			
						</div>
						<form method="post">

							<button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></i></button>

							<input type="hidden" name="idUsuario" value="<?php echo $value["id_sucursal"]; ?>">
							<?php

							// $eliminar = new ControladorFormularios();
							// $eliminar -> ctrEliminaRegistro();

							$eliminar = ControladorFormularios::ctrEliminaRegistroSucursal();
							
								// $bandera = $eliminar;

							?>
							
							
							

						</form>
					</div>
				</td>
			</tr>
		<?php endforeach ?>

<?php 
if ($eliminar == "ok") {
				echo '<script>
			if(window.history.replaceState){
				window.history.replaceState(null,null,window.location.href);
			}

			</script>';
			echo '<div class="alert alert-danger">El usuario ha sido eliminado recargando pagina...</div>
			<script>	

				setTimeout(function(){
					window.location = "index.php?pagina=sucursal";
				},3000);
			</script
			';

			$bandera = "";
}

 ?>

	</tbody>
</table>