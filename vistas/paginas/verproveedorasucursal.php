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

$usuarios = ControladorFormularios::ctrSeleccionarRegistrosProveedorS(null,null);
//este print_r sirve para mostrar en pantalla el tipo y contenido de dato
//echo '<pre>'; print_r($usuarios); echo '</pre>';



?>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Sucursal</th>
			<th>Provedor</th>
			
			

		</tr>
	</thead>
	<tbody>

		<?php foreach ($usuarios as $key => $value): ?>
			<tr>
				<td><?php echo $value["nombre_sucursal"]; ?></td>
				<td><?php echo $value["nombre"]; ?></td>
				
			</tr>
		<?php endforeach ?>

<?php 


 ?>

	</tbody>
</table>