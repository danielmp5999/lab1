<?php
require_once "conexion.php";

class ModeloFormularios{
	######Farmacia############
	static public function mdlRegistro($tabla, $datos){
		#se declara como stmt porque: statement=declaracion
		#prepare() prepara una sentenica sql para ser ejecutada por el metodo PDOStatement::execute(). La sentenica sql puede contener cero o mas marcadores de parametros con nombre (:nombre) o signos de interrogacion (?) por los cuales los valores reales seran sustituidos cuando la sentencia sea ejecutada. Ayuda a prevenir inyecciones SQL eliminando la necesidad de entrecomillar manualmente los parametros

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_sucursal, nombre_sucursal, direccion) VALUES (:id, :nombre, :direccion)");
		
		#bindParam() Esta funcion vincula una variable de php a un parametro de sustitucion con nombre o de signo de interrogacion correspondiente de la sentencia SQL que fue usada para preparar la sentencia.  es decir es usada para leer los datos oculatdos por ":"
		#bindParam("nombre", "los datos de donde los va a tomar", "El tipo de dato que estoy recibiendo ")
		$stmt->bindParam(":id",$datos["id"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre",$datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":direccion",$datos["direccion"], PDO::PARAM_STR);
		//$stmt->bindParam(":password",$datos["password"], PDO::PARAM_STR);

		



		if ($stmt->execute()) {
			return "ok";
		}else{
			
			print_r(Conexion::conectar()->errorInfo());
		}

		$stmt->close();
		$stmt=null;
	}

	/*=============================================================
Registramos telefonos de sucursal
================================================================*/
	static public function mdlRegistroTelefonos($tabla,$datos){
		//select id_sucursal from sucursal where nombre_sucursal = "Toscalia";
		//$id = Conexion::conectar()->prepare("SELECT id_sucursal FROM sucursal WHERE nombre_sucursal = :aux");
		//$stmt->bindParam(":aux",$datos["telefono1"], PDO::PARAM_STR);
		//$stmt->bindParam(":aux",$aux, PDO::PARAM_STR);

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(telefono, id_sucursalF) VALUES (:telefono1, :id), (:telefono2, :id)");

		//INSERT INTO `telefono_sucursal` (`telefono`, `id_sucursal`) VALUES ('2226698978', '6'), ('1225262927', '6')
		$stmt->bindParam(":id",$datos["id"], PDO::PARAM_STR);		
		$stmt->bindParam(":telefono1",$datos["telefono1"], PDO::PARAM_STR);
		$stmt->bindParam(":telefono2",$datos["telefono2"], PDO::PARAM_STR);

		if ($stmt->execute()) {
			return "ok";
		}else{
			
			print_r(Conexion::conectar()->errorInfo());
		}


		$stmt->close();
		$stmt=null;
	}

	/*=============================================================
Registramos empleado
================================================================*/
	static public function mdlRegistroE($tabla,$datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_empleado, nombre, apellido_Materno, apellido_paterno, curp, fecha_contratacio, id_sucursal, id_puesto) VALUES (:id, :nombre, :apelldoM, :apellidoP, :curp, :fecha, :idSucursal, :idPuesto)");

		//INSERT INTO `empleado` (`id_empleado`, `nombre`, `apellido_Materno`, `apellido_paterno`, `curp`, `fecha_contratacio`, `id_sucursal`, `id_puesto`) VALUES ('1', 'Cesar', 'Gutierez', 'Ortega', 'CEVAJU021596HHLDJ1AS3', '2021-04-05', '2', '4')
		$stmt->bindParam(":id",$datos["id"], PDO::PARAM_STR);		
		$stmt->bindParam(":nombre",$datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":apelldoM",$datos["apelldoM"], PDO::PARAM_STR);
		$stmt->bindParam(":apellidoP",$datos["apellidoP"], PDO::PARAM_STR);		
		$stmt->bindParam(":curp",$datos["curp"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha",$datos["fecha"], PDO::PARAM_STR);
		$stmt->bindParam(":idSucursal",$datos["idSucursal"], PDO::PARAM_STR);
		$stmt->bindParam(":idPuesto",$datos["idPuesto"], PDO::PARAM_STR);


		if ($stmt->execute()) {
			return "ok";
		}else{
			
			print_r(Conexion::conectar()->errorInfo());
		}


		$stmt->close();
		$stmt=null;
	}

	/*=============================================================
Registramos proveedor
================================================================*/
	static public function mdlRegistroProveedor($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_provedor, nombre, nombre_paterno, nombre_materno) VALUES (:id, :nombre, :apellidoP, :apelldoM)");

		//INSERT INTO `provedor` (`id_provedor`, `nombre`, `nombre_paterno`, `nombre_materno`) VALUES ('1', 'Julio', 'Mendez', 'Sanchez')
		$stmt->bindParam(":id",$datos["id"], PDO::PARAM_STR);		
		$stmt->bindParam(":nombre",$datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":apelldoM",$datos["apelldoM"], PDO::PARAM_STR);
		$stmt->bindParam(":apellidoP",$datos["apellidoP"], PDO::PARAM_STR);		
		


		if ($stmt->execute()) {
			return "ok";
		}else{
			
			print_r(Conexion::conectar()->errorInfo());
		}


		$stmt->close();
		$stmt=null;
	}


	/*=============================================================
Insertamos en tabla provee
================================================================*/
	static public function mdlRegistroProvee($tabla2, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla2(id_sucursal, id_proveedor) VALUES (:idSucursal, :id)");

		//INSERT INTO `provedor` (`id_provedor`, `nombre`, `nombre_paterno`, `nombre_materno`) VALUES ('1', 'Julio', 'Mendez', 'Sanchez')
		$stmt->bindParam(":id",$datos["id"], PDO::PARAM_STR);		
		$stmt->bindParam(":idSucursal",$datos["idSucursal"], PDO::PARAM_STR);	
		


		if ($stmt->execute()) {
			return "ok";
		}else{
			
			print_r(Conexion::conectar()->errorInfo());
		}


		$stmt->close();
		$stmt=null;
	}



	/*=============================================================
insertamos en producto
================================================================*/
	static public function mdlRegistroProducto($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_productos, nombre, caducidad, precio, id_sucursal) VALUES (:id, :nombre, :caducidad, :precio, :idSucursal)");

		//INSERT INTO `productos` (`id_productos`, `nombre`, `caducidad`, `precio`, `id_sucursal`) VALUES ('33', 's', '2021-05-05', '300', '2')
		$stmt->bindParam(":id",$datos["id"], PDO::PARAM_STR);		
		$stmt->bindParam(":nombre",$datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":caducidad",$datos["caducidad"], PDO::PARAM_STR);
		$stmt->bindParam(":precio",$datos["precio"], PDO::PARAM_STR);	
		$stmt->bindParam(":idSucursal",$datos["idSucursal"], PDO::PARAM_STR);	
		


		if ($stmt->execute()) {
			return "ok";
		}else{
			
			print_r(Conexion::conectar()->errorInfo());
		}


		$stmt->close();
		$stmt=null;
	}

/*=============================================================
Seleccionar ID sucursal
================================================================*/
	static public function mdlSeleccionaID($tabla,$item){
		$stmt = Conexion::conectar()->prepare("SELECT id_sucursal FROM $tabla WHERE nombre_sucursal = :item");
	}



/*=============================================================
Seleccionar Registros
,DATE_FORMAT(fecha,'%H/%i/%s')
DATE_FORMAT(fecha,'%d/%m/%Y')
================================================================*/
	static public function mdlSeleccionarRegistros($tabla, $item, $valor){

			$stmt = Conexion::conectar()->prepare("SELECT id_sucursal, nombre_sucursal,direccion, DATE_FORMAT(fecha, '%d/%m/%Y') AS fecha, DATE_FORMAT(fecha, '%h:%i:%s %p') AS hora FROM $tabla ORDER BY id_sucursal DESC");

			$stmt->execute();
			return $stmt -> fetchAll();



		$stmt->close();
		$stmt=null;
	}


	/*=============================================================
Seleccionar Registros con telefono
,DATE_FORMAT(fecha,'%H/%i/%s')
DATE_FORMAT(fecha,'%d/%m/%Y')
================================================================*/
	static public function mdlSeleccionarRegistrosT($tabla,$tabla2, $item, $valor){

			$stmt = Conexion::conectar()->prepare("SELECT id_sucursal, nombre_sucursal,direccion, DATE_FORMAT(fecha, '%d/%m/%Y') AS fecha, DATE_FORMAT(fecha, '%h:%i:%s %p') AS hora, telefono FROM $tabla,$tabla2 WHERE id_sucursal = id_sucursalF ORDER BY id_sucursal DESC");

			$stmt->execute();
			return $stmt -> fetchAll();



		$stmt->close();
		$stmt=null;
	}

	/*=============================================================
Seleccionar Registros empleados
================================================================*/
	static public function mdlSeleccionarRegistrosEm($tabla, $tabla2, $tabla3, $item, $valor){
		//select empleado.nombre, sucursal.nombre_sucursal, puesto_empleado.puesto from empleado inner join sucursal on empleado.id_sucursal = sucursal.id_sucursal inner join puesto_empleado on empleado.id_puesto = puesto_empleado.id_puesto;

		// select * from empleado inner join sucursal on empleado.id_sucursal = sucursal.id_sucursal inner join puesto_empleado on empleado.id_puesto = puesto_empleado.id_puesto;


			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla INNER JOIN $tabla2 ON $tabla.id_sucursal = $tabla2.id_sucursal INNER JOIN $tabla3  ON $tabla.id_puesto = $tabla3.id_puesto ORDER BY id_empleado DESC");

			$stmt->execute();
			return $stmt -> fetchAll();



		$stmt->close();
		$stmt=null;
	}
	


/*=============================================================
Seleccionar Registros puesto
================================================================*/
	static public function mdlSeleccionarRegistrospuesto($tabla, $item, $valor){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id_puesto DESC");

			$stmt->execute();
			return $stmt -> fetchAll();



		$stmt->close();
		$stmt=null;
	}



/*=============================================================
Seleccionar Registros Proveedor
================================================================*/
	static public function mdlSeleccionarRegistrosProveedor($tabla, $item, $valor){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id_provedor DESC");

			$stmt->execute();
			return $stmt -> fetchAll();



		$stmt->close();
		$stmt=null;
	}


/*=============================================================
Seleccionar Registros Proveedor a sucursal
================================================================*/
	static public function mdlSeleccionarRegistrosProveedorS($tabla, $tabla2, $tabla3, $item, $valor){
//$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla INNER JOIN $tabla2 ON $tabla.id_sucursal = $tabla2.id_sucursal INNER JOIN $tabla3  ON $tabla.id_puesto = $tabla3.id_puesto ORDER BY id_empleado DESC");
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla INNER JOIN $tabla2 ON $tabla.id_provedor = $tabla2.id_proveedor INNER JOIN $tabla3 ON $tabla2.id_sucursal = $tabla3.id_sucursal ORDER BY id_provedor DESC");

			$stmt->execute();
			return $stmt -> fetchAll();



		$stmt->close();
		$stmt=null;
	}




/*=============================================================
Seleccionar Registros Productos
================================================================*/
	static public function mdlSeleccionarRegistrosProductos($tabla, $tabla2, $item, $valor){

	/*	if ($item == null && $valor == null) {
			$stmt = Conexion::conectar()->prepare("SELECT *,DATE_FORMAT(fecha,'%d/%m/%Y') AS fecha, DATE_FORMAT(fecha,'%h:%i:%s %p') AS hora FROM $tabla ORDER BY id DESC");

			$stmt->execute();
			return $stmt -> fetchAll();

		}else{
			$stmt = Conexion::conectar()->prepare("SELECT *,DATE_FORMAT(fecha,'%d/%m/%Y') AS fecha, DATE_FORMAT(fecha,'%h:%i:%s %p') AS hora FROM $tabla WHERE $item = :$item ORDER BY id DESC");

			$stmt->bindParam(":".$item,$valor, PDO::PARAM_STR);

			$stmt->execute();
			return $stmt -> fetch();

		}*/
		if ($item == null && $valor == null) {
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla inner join $tabla2 on $tabla.id_sucursal = $tabla2.id_sucursal ORDER BY id_productos DESC");

			$stmt->execute();
			return $stmt -> fetchAll();
		}else{
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla inner join $tabla2 on $tabla.id_sucursal = $tabla2.id_sucursal where $tabla.$item = :$item ORDER BY id_productos DESC");

			$stmt->bindParam(":".$item,$valor, PDO::PARAM_STR);

			$stmt->execute();
			return $stmt -> fetchAll();
		}

		$stmt->close();
		$stmt=null;
	}

/*=============================================================
Seleccionar Registros Productos Editar
================================================================*/
	static public function mdlSeleccionarRegistrosProductosEditar($tabla, $item, $valor){

	/*	if ($item == null && $valor == null) {
			$stmt = Conexion::conectar()->prepare("SELECT *,DATE_FORMAT(fecha,'%d/%m/%Y') AS fecha, DATE_FORMAT(fecha,'%h:%i:%s %p') AS hora FROM $tabla ORDER BY id DESC");

			$stmt->execute();
			return $stmt -> fetchAll();

		}else{
			$stmt = Conexion::conectar()->prepare("SELECT *,DATE_FORMAT(fecha,'%d/%m/%Y') AS fecha, DATE_FORMAT(fecha,'%h:%i:%s %p') AS hora FROM $tabla WHERE $item = :$item ORDER BY id DESC");

			$stmt->bindParam(":".$item,$valor, PDO::PARAM_STR);

			$stmt->execute();
			return $stmt -> fetch();

		}*/

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla where $tabla.$item = :$item ORDER BY id_productos DESC");

			$stmt->bindParam(":".$item,$valor, PDO::PARAM_STR);

			$stmt->execute();
			return $stmt -> fetchAll();
		
		$stmt->close();
		$stmt=null;
	}


/*=============================================================
Editar registro
================================================================*/
static public function mdlActualizarRegistro($tabla, $datos){
	$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre=:nombre, caducidad=:caducidad, precio=:precio, id_sucursal=:idSucursal WHERE id_productos = :id");
	$stmt->bindParam(":id",$datos["id"], PDO::PARAM_INT);
	$stmt->bindParam(":nombre",$datos["nombre"], PDO::PARAM_STR);
	$stmt->bindParam(":caducidad",$datos["caducidad"], PDO::PARAM_STR);
	$stmt->bindParam(":precio",$datos["precio"], PDO::PARAM_STR);
	$stmt->bindParam(":idSucursal",$datos["idSucursal"], PDO::PARAM_INT);


	if ($stmt->execute()) {
			return "ok";
		}else{
			
			print_r(Conexion::conectar()->errorInfo());
		}

		$stmt->close();
		$stmt=null;
}

/*--------------------------------------------------------------------------------------------------------------------------
Elimina registro Sucursal Telefono
Nota: Para que el eliminado de sucursal sea exitoso se requiere eliminar primero 
la tabla relacionada con telefono, por lo que primero eliminamos esta tabla con su relacion 
correspondiente
================================================================*/
static public function mdlEliminaRegistroSucursalT($tabla, $datos){
	$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_sucursalF = :id");

	$stmt->bindParam(":id",$datos["id"], PDO::PARAM_INT);
	if ($stmt->execute()) {
			return "ok";
		}else{
			
			print_r(Conexion::conectar()->errorInfo());
		}

	$stmt->close();
	$stmt=null;
}

/*=============================================================
Elimina registro provee de sucursal
================================================================*/
static public function mdlEliminaRegistroSucursalProvee($tabla, $datos){
	$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_sucursal = :id");

	$stmt->bindParam(":id",$datos["id"], PDO::PARAM_INT);
	if ($stmt->execute()) {
			return "ok";
		}else{
			
			print_r(Conexion::conectar()->errorInfo());
		}

	$stmt->close();
	$stmt=null;
}

/*=============================================================
Elimina registro producto de sucursal
================================================================*/
static public function mdlEliminaRegistroSucursalProd($tabla, $datos){
	$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_sucursal = :id");

	$stmt->bindParam(":id",$datos["id"], PDO::PARAM_INT);
	if ($stmt->execute()) {
			return "ok";
		}else{
			
			print_r(Conexion::conectar()->errorInfo());
		}

	$stmt->close();
	$stmt=null;
}

/*=============================================================
Elimina registro empleado de sucursal
================================================================*/
static public function mdlEliminaRegistroSucursalEmp($tabla, $datos){
	$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_sucursal = :id");

	$stmt->bindParam(":id",$datos["id"], PDO::PARAM_INT);
	if ($stmt->execute()) {
			return "ok";
		}else{
			
			print_r(Conexion::conectar()->errorInfo());
		}

	$stmt->close();
	$stmt=null;
}

/*=============================================================
Elimina registro Sucursal
================================================================*/
static public function mdlEliminaRegistroSucursal($tabla, $datos){
	$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_sucursal = :id");

	$stmt->bindParam(":id",$datos["id"], PDO::PARAM_INT);
	if ($stmt->execute()) {
			return "ok";
		}else{
			
			print_r(Conexion::conectar()->errorInfo());
		}

	$stmt->close();
	$stmt=null;
}
/*--------------------------------------------------------------------------------------------------------------------------*/


/*=============================================================
Elimina registro Prodcutos
================================================================*/
static public function mdlEliminaRegistroProductos($tabla, $datos){
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_productos = :id");

		$stmt->bindParam(":id",$datos["id"], PDO::PARAM_INT);


		if ($stmt->execute()) {
				return "ok";
			}else{
				
				print_r(Conexion::conectar()->errorInfo());
			}

		$stmt->close();
		$stmt=null;
	}

/*=============================================================
Elimina registro Empleado
================================================================*/
static public function mdlEliminaRegistroEmpleado($tabla, $datos){
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_empleado = :id");

		$stmt->bindParam(":id",$datos["id"], PDO::PARAM_INT);


		if ($stmt->execute()) {
				return "ok";
			}else{
				
				print_r(Conexion::conectar()->errorInfo());
			}

		$stmt->close();
		$stmt=null;
	}


	/*=============================================================
Elimina registro Proveedor
================================================================*/
static public function mdlEliminaRegistroProveedor($tabla, $datos){
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_provedor = :id");

		$stmt->bindParam(":id",$datos["id"], PDO::PARAM_INT);


		if ($stmt->execute()) {
				return "ok";
			}else{
				
				print_r(Conexion::conectar()->errorInfo());
			}

		$stmt->close();
		$stmt=null;
	}


}