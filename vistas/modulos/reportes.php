<?php
require_once "../../controladores/encuestas.controlador.php";
require_once "../../modelos/encuestas.modelo.php";
require_once "../../controladores/reportes.controlador.php";
require_once "../../modelos/reportes.modelo.php";

$reporte = new ControladorReportes();
$reporte -> ctrDescargarReporte();

$reporteEncuestados = new ControladorReportes();
$reporteEncuestados -> ctrDescargarReporteEncuestados();

$reporteNoEncuestados =  new ControladorReportes();
$reporteNoEncuestados -> ctrDescargarReporteNoEncuestados();

$reporteLocalizador = new ControladorReportes();
$reporteLocalizador -> ctrDescargarReporteLocalizador();

$reporteLocalizador = new ControladorReportes();
$reporteLocalizador -> ctrDescargarReporteLocalizadorProveedores();

?>