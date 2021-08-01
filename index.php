<?php
#El index: En él mostraremos la salida de las vistas al usuario y tambien a traves de el enviaremos las distintas acciones que el usuario envie al controlador
#require() establece que el codigo del archivo invocado es requerido, es decir obligatorio para el funcionamiento del programa. Por ello si el archivo especificado en la funcion require() no se encuentre, saltará un error "PHP Fatal error" y el programa PHP se dentendrá

#La version require_once() funcionan de la misma forma que su respectivo, salvo que, al utilizar la version _once, se impide la carga de un mismo archivo mas de una vez.

#Si requerimos el mismo codigo mas de una vez corremos el riesgo de redeclaraciones de variables, funciones o clases.

require_once "controladores/platilla.controlador.php";
require_once "controladores/formularios.controlador.php";

require_once "modelos/formularios.modelo.php";


$plantilla=new ControladorPlantilla();
$plantilla->ctrTraerPlantilla();


