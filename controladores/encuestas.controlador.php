<?php
class ControladorEncuestas{

	/*=================================================================
	=            FUNCIONES PARA CONTROLADORES DE ENCUESTAS            =
	=================================================================*/
	/* FUNCION PARA MOSTRAR LAS ENCUESTAS */
	static public function ctrListaEncuestas($item,$valor){

		$tabla = "encuesta";
		$respuesta = ModeloEncuestas::mdlListaEncuestas($tabla,$item,$valor);

		return $respuesta;
	}
	/* FUNCION PARA MOSTRAR LA LISTA DE LOS ENCUESTADORES */
	static public function ctrListaEncuestadores($item,$valor){

		$tabla = "encuestadores";
		$respuesta = ModeloEncuestas::mdlListaEncuestadores($tabla,$item,$valor);

		return $respuesta;
	}
	/* FUNCION PARA MOSTRAR LOS DATOS DEL ENCUESTADO */
	static public function ctrObtenerDatosEncuestado($item,$valor){

		$tabla = "encuesta";
		$respuesta = ModeloEncuestas::mdlObtenerDatosEncuestado($tabla,$item,$valor);

		return $respuesta;
	}
	/* FUNCION PARA MOSTRAR TOTALES DE ENCUESTAS */
	static public function ctrMostrarIndicadoresEncuestas(){

		$tabla = "encuesta";
		$respuesta = ModeloEncuestas::mdlMostrarIndicadoresEncuestas($tabla);

		return $respuesta;
	}
	/* FUNCION PARA MOSTRAR TOTAL NOTIFICACIONES */
	static public function ctrMostrarTotalNotificaciones(){

		$tabla = "notificaciones";
		$respuesta = ModeloEncuestas::mdlMostrarTotalNotificaciones($tabla);

		return $respuesta;
	}
	/* FUNCION PARA MOSTRAR EL DETALLE DE LA ENCUESTA */
	static public function ctrObtenerDetalleEncuesta($item,$valor){

		$tabla = "encuesta";
		$respuesta = ModeloEncuestas::mdlObtenerDetalleEncuesta($tabla,$item,$valor);

		return $respuesta;
	}
	/* FUNCION PARA MOSTRAR LISTA DE COORDENADAS */
	static public function ctrObtenerListaCoordenadas($item,$valor){

		$tabla = "coordenadas";
		$respuesta = ModeloEncuestas::mdlObtenerListaCoordenadas($tabla,$item,$valor);

		return $respuesta;
	}
	
	/* FUNCION PARA MOSTRAR TOTALES DE ENCUESTAS */
	static public function ctrMostrarTotalesIndicadores($item,$valor){

		$tabla = "encuesta";
		$respuesta = ModeloEncuestas::mdlMostrarTotalesIndicadores($tabla,$item,$valor);

		return $respuesta;
	}
	/* FUNCION PARA INDICADORES */
	static public function ctrMostrarIgualadosPorSemana(){
		$tabla = "encuesta";

		$respuesta = ModeloEncuestas::mdlMostrarIgualadoPorSemana($tabla);

		return $respuesta;
	}
	static public function ctrMostrarReparacionesPorMes(){
		$tabla = "encuesta";

		$respuesta = ModeloEncuestas::mdlMostrarReparacionesPorMes($tabla);

		return $respuesta;
	}
	static public function ctrMostrarCalidadIgualado(){
		$tabla = "encuesta";

		$respuesta = ModeloEncuestas::mdlMostrarCalidadIgualado($tabla);

		return $respuesta;
	}
	static public function ctrMostrarInversionSemanal(){
		$tabla = "encuesta";

		$respuesta = ModeloEncuestas::mdlMostrarInversionSemanal($tabla);

		return $respuesta;
	}
	static public function ctrMostrarAreaHyp(){
		$tabla = "encuesta";

		$respuesta = ModeloEncuestas::mdlMostrarAreaHyp($tabla);

		return $respuesta;
	}
	static public function ctrMostrarNumeroTrabajadores(){
		$tabla = "encuesta";

		$respuesta = ModeloEncuestas::mdlMostrarNumeroTrabajadores($tabla);

		return $respuesta;
	}
	static public function ctrMostrarSatisfaccionProveedor(){
		$tabla = "encuesta";

		$respuesta = ModeloEncuestas::mdlMostrarSatisfaccionProveedor($tabla);

		return $respuesta;
	}
	static public function ctrMostrarListaProveedores(){
		$tabla = "encuesta";

		$respuesta = ModeloEncuestas::mdlMostrarListaProveedores($tabla);

		return $respuesta;
	}
	static public function ctrMostrarFormaPago(){
		$tabla = "encuesta";

		$respuesta = ModeloEncuestas::mdlMostrarFormaPago($tabla);

		return $respuesta;
	}
	static public function ctrMostrarMarcas($item,$valor){
		$tabla = "encuesta";

		$respuesta = ModeloEncuestas::mdlMostrarMarcas($tabla,$item,$valor);

		return $respuesta;
	}
	
	static public function ctrMostrarMarcas2($item,$valor){
		$tabla = "encuesta";

		$respuesta = ModeloEncuestas::mdlMostrarMarcas2($tabla,$item,$valor);

		return $respuesta;
	}
	static public function ctrMostrarMarcas3($item,$valor){
		$tabla = "encuesta";

		$respuesta = ModeloEncuestas::mdlMostrarMarcas3($tabla,$item,$valor);

		return $respuesta;
	}
	/*=====================================================
	=            LOCALIZADOR DE DISTRIBUIDORES            =
	=====================================================*/
	static public function ctrMostrarListaDistribuidores(){
		$tabla = "distribuidores";

		$respuesta = ModeloEncuestas::mdlMostrarListaDistribuidores($tabla);

		return $respuesta;
	}
	static public function ctrObtenerListaCoordenadasLocalizador($latitud,$longitud){

		$tabla = "coordenadas";
		$respuesta = ModeloEncuestas::mdlObtenerListaCoordenadasLocalizador($tabla,$latitud,$longitud);

		return $respuesta;
	}
	
	/*=====  End of LOCALIZADOR DE DISTRIBUIDORES  ======*/
	/*=====================================================
	=            LOCALIZADOR DE PROVEEDORES          =
	=====================================================*/
	static public function ctrMostrarListaEncuestaProveedores(){
		$tabla = "encuesta";

		$respuesta = ModeloEncuestas::mdlMostrarListaEncuestaProveedores($tabla);

		return $respuesta;
	}
	static public function ctrObtenerListaCoordenadasLocalizadorProveedores($latitud,$longitud,$proveedor){

		$tabla = "coordenadas";
		$respuesta = ModeloEncuestas::mdlObtenerListaCoordenadasLocalizadorProveedores($tabla,$latitud,$longitud,$proveedor);

		return $respuesta;
	}
	
	static public function ctrMostrarLocalizadorClientesProveedores($item,$valor){

		$tabla = "encuesta";
		$respuesta = ModeloEncuestas::mdlMostrarLocalizadorClientesProveedores($tabla,$item,$valor);

		return $respuesta;
	}
	/*=====  End of LOCALIZADOR DE PROVEEDORES  ======*/
	/*=====  End of FUNCIONES PARA CONTROLADORES DE ENCUESTAS  ======*/
	


}

?>