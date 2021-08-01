<?php
#Archivo que nos sirve para conectara la base de datos
class Conexion{
	static public function conectar(){
		# Como parametros ññevan lo siguiente 
		#PDO("nombre del servidor;nombre de la base de datos", "nombre de usuario", "la contraseña con la que se preotege esta base de datos")
		#El nombre de servidor de php lo encontramos desde la ventana principal de php my admin
		$link = new PDO("mysql:host=127.0.0.1;dbname=farmacia",
						"root",
						"");
		$link->exec("set names utf8");
		return $link;
	}
}

