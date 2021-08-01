<?php
$bandera = "";
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

$usuarios = ControladorFormularios::ctrSeleccionarRegistrosProveedor(null,null);
//este print_r sirve para mostrar en pantalla el tipo y contenido de dato
//echo '<pre>'; print_r($usuarios); echo '</pre>';



?>

<table class="table table-striped">
	<thead>
		<tr>
			<th>id</th>
			<th>Nombre</th>
			<th>Apellido</th>


		</tr>
	</thead>
	<tbody>

		<?php foreach ($usuarios as $key => $value): ?>
			<tr>
				<td><?php echo $value["id_provedor"]; ?></td>
				<td><?php echo $value["nombre"]; ?></td>
				<td><?php echo $value["nombre_paterno"]; ?></td>

				<td>
					<div class="btn-group">

						<div class="px-1">
						<a href="index.php?pagina=editar&id=<?php echo $value["id_provedor"]; ?>" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>			
						</div>
						<form method="post">

							<button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></i></button>

							<input type="hidden" name="idUsuario" value="<?php echo $value["id_provedor"]; ?>">
							<?php

							// $eliminar = new ControladorFormularios();
							// $eliminar -> ctrEliminaRegistro();

							$eliminar = ControladorFormularios::ctrEliminaRegistroProveedor();
							
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
					window.location = "index.php?pagina=inicio";
				},3000);
			</script
			';

			$bandera = "";
}

 ?>

	</tbody>
</table>