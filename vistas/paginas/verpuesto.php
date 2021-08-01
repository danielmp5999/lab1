<?php
$bandera = "";

$usuarios = ControladorFormularios::ctrSeleccionarRegistrosPuesto(null,null);
//este print_r sirve para mostrar en pantalla el tipo y contenido de dato
//echo '<pre>'; print_r($usuarios); echo '</pre>';



?>

<table class="table table-striped">
	<thead>
		<tr>
			<th>id</th>
			<th>Puesto</th>
			<th>Salario</th>
			

		</tr>
	</thead>
	<tbody>

		<?php foreach ($usuarios as $key => $value): ?>
			<tr>
				<td><?php echo $value["id_puesto"]; ?></td>
				<td><?php echo $value["puesto"]; ?></td>
				<td><?php echo $value["salario"]; ?></td>
				
			</tr>
		<?php endforeach ?>

<?php 


 ?>

	</tbody>
</table>