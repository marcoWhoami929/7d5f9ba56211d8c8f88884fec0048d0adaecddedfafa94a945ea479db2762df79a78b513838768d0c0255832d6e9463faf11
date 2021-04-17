<?php
require_once "../controladores/encuestas.controlador.php";
require_once "../modelos/encuestas.modelo.php";

class AjaxEncuestas{

	/*==============================================================
	=            FUNCIONES AJAX PARA PROCESAR ENCUESTAS            =
	==============================================================*/
	
	/*=============================================
	OBTENER COORDENADAS DEL ENCUESTADO
	=============================================*/	

	public $idEncuesta;

	public function ajaxObtenerCoordenadasEncuestado(){

		$item = "id";
		$valor = $this->idEncuesta;

		$respuesta = ControladorEncuestas::ctrObtenerDatosEncuestado($item, $valor);

		echo json_encode($respuesta);

	}
	/* OBTENER DETALLES DE ENCUESTA */
	public $idEncuestaDetalle;

	public function ajaxObtenerDetalleEncuesta(){

		$item = "id";
		$valor = $this->idEncuestaDetalle;

		$respuesta = ControladorEncuestas::ctrObtenerDetalleEncuesta($item, $valor);

		echo json_encode($respuesta);

	}
	/* OBTENER LISTA DE COORDENADAS */
	public $identificador;

	public function ajaxObtenerListaCoordenadas(){

		$item = null;
		$valor = null;

		$respuesta = ControladorEncuestas::ctrObtenerListaCoordenadas($item, $valor);

		echo json_encode($respuesta);

	}
	/*=====================================================
	=            LOCALIZADOR DE DISTRIBUIDORES            =
	=====================================================*/
	public $identificadorLocalizador;
	public $latitud;
	public $longitud;

	public function ajaxObtenerListaCoordenadasLocalizador(){

		$latitud = $this->latitud;
		$longitud = $this->longitud;

		$respuesta = ControladorEncuestas::ctrObtenerListaCoordenadasLocalizador($latitud,$longitud);

		echo json_encode($respuesta);

	}
	/*=====================================================
	=            LOCALIZADOR DE PROVEEDORES            =
	=====================================================*/
	public $identificadorLocalizadorProveedor;
	public $latitudProveedor;
	public $longitudProveedor;
	public $proveedor;

	public function ajaxObtenerListaCoordenadasLocalizadorProveedores(){

		$latitud = $this->latitudProveedor;
		$longitud = $this->longitudProveedor;
		$proveedor = $this->proveedor;

		$respuesta = ControladorEncuestas::ctrObtenerListaCoordenadasLocalizadorProveedores($latitud,$longitud,$proveedor);

		echo json_encode($respuesta);

	}
	
	
	/*=====  End of FUNCIONES AJAX PARA PROCESAR ENCUESTAS  ======*/


}
/* INSTANCION DE LOS NUEVOS OBJETOS PARA LAS FUNCIONES DE AJAX */
if (isset($_POST["idEncuesta"])) {
	$obtenerCoordenadas = new AjaxEncuestas();
	$obtenerCoordenadas -> idEncuesta = $_POST["idEncuesta"];
	$obtenerCoordenadas -> ajaxObtenerCoordenadasEncuestado();
}
if (isset($_POST["idEncuestaDetalle"])) {
	$obtenerDetalleEncuesta = new AjaxEncuestas();
	$obtenerDetalleEncuesta -> idEncuestaDetalle = $_POST["idEncuestaDetalle"];
	$obtenerDetalleEncuesta -> ajaxObtenerDetalleEncuesta();
}
if (isset($_POST["identificador"])) {
	$obtenerDetalleEncuesta = new AjaxEncuestas();
	$obtenerDetalleEncuesta -> identificador = $_POST["identificador"];
	$obtenerDetalleEncuesta -> ajaxObtenerListaCoordenadas();
}
if (isset($_POST["identificadorLocalizador"])) {
	$obtenerCoordenadasLocalizador = new AjaxEncuestas();
	$obtenerCoordenadasLocalizador -> identificadorLocalizador = $_POST["identificadorLocalizador"];
	$obtenerCoordenadasLocalizador -> latitud = $_POST["latitud"];
	$obtenerCoordenadasLocalizador -> longitud = $_POST["longitud"];
	$obtenerCoordenadasLocalizador -> ajaxObtenerListaCoordenadasLocalizador();
}
if (isset($_POST["identificadorLocalizadorProveedor"])) {
	$obtenerCoordenadasLocalizador = new AjaxEncuestas();
	$obtenerCoordenadasLocalizador -> identificadorLocalizadorProveedor = $_POST["identificadorLocalizadorProveedor"];
	$obtenerCoordenadasLocalizador -> latitudProveedor = $_POST["latitudProveedor"];
	$obtenerCoordenadasLocalizador -> longitudProveedor = $_POST["longitudProveedor"];
	$obtenerCoordenadasLocalizador -> proveedor = $_POST["proveedor"];
	$obtenerCoordenadasLocalizador -> ajaxObtenerListaCoordenadasLocalizadorProveedores();
}

?>