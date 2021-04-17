<?php
error_reporting(0);
require_once "../controladores/encuestas.controlador.php";
require_once "../modelos/encuestas.modelo.php";

class TablaEncuestados{

 	/*=============================================
  
  	=============================================*/ 

	public function mostrarTablas(){	

		$item = null;
 		$valor = mull;

 		$encuestados = ControladorEncuestas::ctrListaEncuestas($item, $valor);


 		$datosJson = '{
		 
	 	"data": [ ';

	 	for($i = 0; $i < count($encuestados); $i++){
	 		$ubicacionTaller = "<div class='btn-group'><button class='btn btn-warning btnVerUbicacionTaller' idEncuesta='".$encuestados[$i]["id"]."'  data-toggle='modal' data-target='#modalUbicacionTaller'><i class='fa fa-map-marker' aria-hidden='true'></i></button></div>";	

	 		if ($encuestados[$i]["finalizada"] == 1) {
	 			
	 			$taller = "<span class='badge badge-success right'>Sin registro</span>";
	 			$cliente = $encuestados[$i]["motivoFinalizacion"];
	 			$domicilio = "<span class='badge badge-success right'>Sin registro</span>";
	 			$telefono = "<span class='badge badge-success right'>Sin registro</span>";
	 			$movil = "<span class='badge badge-success right'>Sin registro</span>";
	 			$correoElectronico = "<span class='badge badge-success right'>Sin registro</span>";
	 			$facebook = "<span class='badge badge-success right'>Sin registro</span>";
	 			$horarioSemana  = "<span class='badge badge-success right'>Sin registro</span>";
	 			$horarioSabado = "<span class='badge badge-success right'>Sin registro</span>";

	 		}else{

	 			$taller = $encuestados[$i]["taller"];
	 			$cliente = $encuestados[$i]["cliente"];
	 			$domicilio = $encuestados[$i]["domicilio"];
	 			$telefono = $encuestados[$i]["telefono"];
	 			$movil = $encuestados[$i]["movil"];
	 			$correoElectronico = $encuestados[$i]["correoElectronico"];
	 			$facebook = $encuestados[$i]["facebook"];
	 			$horarioSemana = $encuestados[$i]["horarioSemana"]; 
	 			$horarioSabado = $encuestados[$i]["horarioSabado"];
 	 		}

	 		/*=============================================
			DEVOLVER DATOS JSON
			=============================================*/

			
			$datosJson	 .= '[
				      "'.$encuestados[$i]["id"].'",
				      "'.$taller.'<br>'.$ubicacionTaller.'",
				      "'.$cliente.'",
				      "'.$domicilio.'",
				      "'.$telefono.'",
				      "'.$movil.'",
				      "'.$correoElectronico.'",
				      "'.$facebook.'",
				      "'.$encuestados[$i]["fecha"].'",
				      "'.$horarioSemana.'",
				      "'.$horarioSabado.'"
				    ],';

	 	}

	 	$datosJson = substr($datosJson, 0, -1);

		$datosJson.=  ']
			  
		}'; 

		echo $datosJson;

 	}

}

/*=============================================

=============================================*/ 
$activar = new TablaEncuestados();
$activar -> mostrarTablas();



