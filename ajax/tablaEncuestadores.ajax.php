<?php
error_reporting(0);
require_once "../controladores/encuestas.controlador.php";
require_once "../modelos/encuestas.modelo.php";

class TablaEncuestadores{

 	/*=============================================
  
  	=============================================*/ 

	public function mostrarTablas(){	

		$item = null;
 		$valor = mull;

 		$encuestadores = ControladorEncuestas::ctrListaEncuestadores($item, $valor);


 		$datosJson = '{
		 
	 	"data": [ ';

	 	for($i = 0; $i < count($encuestadores); $i++){

	 		/*=============================================
			DEVOLVER DATOS JSON
			=============================================*/

			$datosJson	 .= '[
				      "'.$encuestadores[$i]["id"].'",
				      "'.$encuestadores[$i]["nombre"].'",
				      "'.$encuestadores[$i]["correo"].'",
				      "'.$encuestadores[$i]["encuestados"].'",
				      "'.$encuestadores[$i]["ultimaEncuesta"].'",
				      "'.$encuestadores[$i]["clienteEncuestado"].'",
				      "'.$encuestadores[$i]["taller"].'",
				      "'.$encuestadores[$i]["estado"].'"

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
$activar = new TablaEncuestadores();
$activar -> mostrarTablas();



