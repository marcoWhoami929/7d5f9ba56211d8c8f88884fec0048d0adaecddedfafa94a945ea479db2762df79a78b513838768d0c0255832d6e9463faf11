<?php
/**************CONTROLADORES*******************/
require_once "controladores/plantilla.controlador.php";
require_once "controladores/administradores.controlador.php";
require_once "controladores/encuestas.controlador.php";

/***************MODELOS*******************/

require_once "modelos/plantilla.modelo.php";
require_once "modelos/administradores.modelo.php";
require_once "modelos/rutas.php";
require_once "modelos/encuestas.modelo.php";


$plantilla = new ControladorPlantilla();
$plantilla -> plantilla();