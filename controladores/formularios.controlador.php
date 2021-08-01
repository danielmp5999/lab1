<?php

class ControladorFormularios{
	/*Creamos formulario sucursal*/
	static public function ctrRegistro(){

		if (isset($_POST["registroNombre"])) {

			$tabla = "sucursal";
			$tabla2 = "telefono_sucursal";
			$datos = array("id" => $_POST["registroId"],
							"nombre" => $_POST["registroNombre"],
							"direccion" => $_POST["registroDireccion"],
							"telefono1" => $_POST["registroTelefono1"],
							"telefono2" => $_POST["registroTelefono2"]);
			$respuesta = ModeloFormularios::mdlRegistro($tabla, $datos);
			$respuesta = ModeloFormularios::mdlRegistroTelefonos($tabla2, $datos);
			/*$aux = array("nombre" => $_POST["registroNombre"]);
			//Para agregar telefono sucursal
			$tabla = "telefono_sucursal";
			$datos = array("telefono1" => $_POST["registroTelefono1"],
							"telefono2" => $_POST["registroTelefono2"]);
			$respuesta = ModeloFormularios::mdlRegistroTelefonos($tabla, $datos,$aux);
*/
			return $respuesta;
		}
	}


	/*================================================================
	Creamos formulario llamado empleado
	====================================================================*/
	
	static public function ctrRegistroE(){

		if (isset($_POST["registroNombre"])) {

			$tabla = "empleado";
			
			$datos = array("id" => $_POST["registroId"],
							"nombre" => $_POST["registroNombre"],
							"apelldoM" => $_POST["registroApellidoM"],
							"apellidoP" => $_POST["registroApellidoP"],
							"curp" => $_POST["registroCurp"],
							"fecha" => $_POST["registroFecha"],
							"idSucursal" => $_POST["registroIdSucursal"],
							"idPuesto" => $_POST["registroIdPuesto"]);
			$respuesta = ModeloFormularios::mdlRegistroE($tabla, $datos);
			
			
			return $respuesta;
		}
	}


	/*================================================================
	Creamos formulario llamado proveedor
	====================================================================*/
	
	static public function ctrRegistroProveedor(){

		if (isset($_POST["registroNombre"])) {

			$tabla = "provedor";
			$tabla2 = "provee";
			$tabla3 = "sucursal";
			
			$datos = array("id" => $_POST["registroId"],
							"nombre" => $_POST["registroNombre"],
							"apelldoM" => $_POST["registroApellidoM"],
							"apellidoP" => $_POST["registroApellidoP"],
							"idSucursal" => $_POST["registroIdSucursal"]);
							
			$respuesta = ModeloFormularios::mdlRegistroProveedor($tabla, $datos);
			$respuesta = ModeloFormularios::mdlRegistroProvee($tabla2, $datos);
			
			
			return $respuesta;
		}
	}

	/*================================================================
	Creamos formulario para insertar producto
	====================================================================*/
	
	static public function ctrRegistroProducto(){

		if (isset($_POST["registroNombre"])) {

			$tabla = "productos";
			
			$datos = array("id" => $_POST["registroId"],
							"nombre" => $_POST["registroNombre"],
							"caducidad" => $_POST["registroCaducidad"],
							"precio" => $_POST["registroPrecio"],
							"idSucursal" => $_POST["registroIdSucursal"]);
							
			$respuesta = ModeloFormularios::mdlRegistroProducto($tabla, $datos);
			//$respuesta = ModeloFormularios::mdlRegistroProvee($tabla2, $datos);
			
			
			return $respuesta;
		}
	}

/*=======================================
Creamos formulario para seleccionar registro mostrar solo sucursal
========================================*/


	static public function ctrSeleccionarRegistros($item, $valor){
		$tabla = "sucursal";
		$respuesta = ModeloFormularios::mdlSeleccionarRegistros($tabla, $item, $valor);
		return $respuesta;
	}

/*=======================================
Creamos formulario para seleccionar registro mostrar solo sucursal con telefono
========================================*/
	static public function ctrSeleccionarRegistrosT($item, $valor){
		$tabla = "sucursal";
		$tabla2 = "telefono_sucursal";
		$respuesta = ModeloFormularios::mdlSeleccionarRegistrosT($tabla,$tabla2, $item, $valor);
		return $respuesta;
	}
/*=======================================
Creamos formulario para seleccionar registro mostrar empleados
========================================*/
	static public function ctrSeleccionarRegistrosEm($item, $valor){
		$tabla = "empleado";
		$tabla2 = "sucursal";
		$tabla3 = "puesto_empleado";
		$respuesta = ModeloFormularios::mdlSeleccionarRegistrosEm($tabla,$tabla2, $tabla3, $item, $valor);
		return $respuesta;
	}
/*=======================================
Creamos formulario para seleccionar registro puestos
========================================*/
	static public function ctrSeleccionarRegistrosPuesto($item, $valor){
		$tabla = "puesto_empleado";
		$respuesta = ModeloFormularios::mdlSeleccionarRegistrosPuesto($tabla, $item, $valor);
		return $respuesta;
	}

/*=======================================
Creamos formulario para seleccionar registro proveedor
========================================*/
	static public function ctrSeleccionarRegistrosProveedor($item, $valor){
		$tabla = "provedor";
		$respuesta = ModeloFormularios::mdlSeleccionarRegistrosProveedor($tabla, $item, $valor);
		return $respuesta;
	}


/*=======================================
Creamos formulario para seleccionar registro proveedor a sucursal
========================================*/
	static public function ctrSeleccionarRegistrosProveedorS($item, $valor){
		$tabla = "provedor";
		$tabla2 = "provee";
		$tabla3 = "sucursal";
		$respuesta = ModeloFormularios::mdlSeleccionarRegistrosProveedorS($tabla, $tabla2, $tabla3, $item, $valor);
		return $respuesta;
	}



/*=======================================
Creamos formulario para seleccionar registro productos
========================================*/
static public function ctrSeleccionarRegistrosProductos($item, $valor){
	$tabla = "productos";
	$tabla2 = "sucursal";
	$respuesta = ModeloFormularios::mdlSeleccionarRegistrosProductos($tabla, $tabla2, $item, $valor);
	return $respuesta;
}
/*=======================================
Creamos formulario para seleccionar registro productosEditar
========================================*/
static public function ctrSeleccionarRegistrosProductosEditar($item, $valor){
	$tabla = "productos";
	$respuesta = ModeloFormularios::mdlSeleccionarRegistrosProductosEditar($tabla, $item, $valor);
	return $respuesta;
}

/*=======================================
Creamos formulario para ingreso
========================================*/

	public function ctrIngreso(){
		if (isset($_POST["ingresoEmail"])) {
			$tabla = "registros";
			$item = "email";
			$valor = $_POST["ingresoEmail"];

			$respuesta = ModeloFormularios::mdlSeleccionarRegistros($tabla, $item, $valor);

			if(($respuesta["email"] == $_POST["ingresoEmail"]) && ($respuesta["password"] == $_POST["ingresoPassword"])){

				$_SESSION["validarIngreso"] = "ok";

				echo '<script>
				if(window.history.replaceState){
					window.history.replaceState(null,null,window.location.href);
				}

				window.location = "index.php?pagina=inicio"

				</script>';
				echo '<div class="alert alert-danger">Error de datos</div>';
			}else{
				echo '<script>
				if(window.history.replaceState){
					window.history.replaceState(null,null,window.location.href);
				}

				</script>';
				echo '<div class="alert alert-danger">Error de datos</div>';
			}

			//echo '<pre>'; print_r($respuesta); echo '</pre>';
		}
	}

/*=======================================
Para editar
========================================*/
static public function ctrActualizarRegistroProducto(){
		if (isset($_POST["actualizarNombre"])) {
		$tabla="productos";
		$datos = array("id" => $_POST["registroId"],
						"nombre" => $_POST["actualizarNombre"],
						"caducidad" => $_POST["actualizarCaducidad"],
						"precio" => $_POST["actualizarPrecio"],
						"idSucursal" => $_POST["actualizarIdSucursal"]);

		$respuesta = ModeloFormularios::mdlActualizarRegistro($tabla,$datos);

		return "ok";
}
	}

// =====================================================
// ELIMINA registro Sucursal
// =====================================================

	static public function ctrEliminaRegistroSucursal(){

		if (isset($_POST["idUsuario"])) {
			$tabla="sucursal";
			$tabla2 = "telefono_sucursal";
			$tabla3 = "provee";
			$tabla4 = "productos";
			$tabla5 = "empleado";
			$datos = array("id" => $_POST["idUsuario"]);
			//elimina el telefono
			$respuesta = ModeloFormularios::mdlEliminaRegistroSucursalT($tabla2,$datos);
			//elimina los productos
			$respuesta = ModeloFormularios::mdlEliminaRegistroSucursalProvee($tabla3,$datos);
			//elimina provee
			$respuesta = ModeloFormularios::mdlEliminaRegistroSucursalProd($tabla4,$datos);
			//elimina empleado sucursal
			$respuesta = ModeloFormularios::mdlEliminaRegistroSucursalEmp($tabla5,$datos);
			//elimina la sucursal
			$respuesta = ModeloFormularios::mdlEliminaRegistroSucursal($tabla,$datos);

			return "ok";

		}
	}


// =====================================================
// ELIMINA registro Productos
// =====================================================
static public function ctrEliminaRegistroProductos(){
		if (isset($_POST["idUsuario"])) {
			$tabla="productos";
			$datos = array("id" => $_POST["idUsuario"]);
			$respuesta = ModeloFormularios::mdlEliminaRegistroProductos($tabla,$datos);
			return "ok";

		}
	}

// =====================================================
// ELIMINA registro empleado
// =====================================================
static public function ctrEliminaRegistroEmpleado(){
		if (isset($_POST["idUsuario"])) {
			$tabla="empleado";
			$datos = array("id" => $_POST["idUsuario"]);
			$respuesta = ModeloFormularios::mdlEliminaRegistroEmpleado($tabla,$datos);
			return "ok";

		}
	}

// =====================================================
// ELIMINA registro proveedor
// =====================================================
static public function ctrEliminaRegistroProveedor(){
		if (isset($_POST["idUsuario"])) {
			$tabla="provedor";
			$datos = array("id" => $_POST["idUsuario"]);
			$respuesta = ModeloFormularios::mdlEliminaRegistroProveedor($tabla,$datos);
			return "ok";

		}
	}


}