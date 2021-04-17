<?php
error_reporting(0);
require_once "../controladores/encuestas.controlador.php";
require_once "../modelos/encuestas.modelo.php";

class TablaEncuestasPuebla{

 	/*=============================================
  
  	=============================================*/ 

	public function mostrarTablas(){	

		$item = 'estado';
 		$valor = 'PUEBLA';

 		$encuestasPuebla = ControladorEncuestas::ctrListaEncuestas($item, $valor);


 		$datosJson = '{
		 
	 	"data": [ ';

	 	for($i = 0; $i < count($encuestasPuebla); $i++){

	 		if ($encuestasPuebla[$i]["calidadDeIgualado"] == 'BUENA') {
	 			$calidadIgualado = "<span class='badge badge-success right'>".$encuestasPuebla[$i]["calidadDeIgualado"]."</span>";
	 		}else if($encuestasPuebla[$i]["calidadDeIgualado"] == 'REGULAR'){
	 			$calidadIgualado = "<span class='badge badge-warning right'>".$encuestasPuebla[$i]["calidadDeIgualado"]."</span>";
	 		}else if ($encuestasPuebla[$i]["calidadDeIgualado"] == 'MALA') {
	 			$calidadIgualado = "<span class='badge badge-danger right'>".$encuestasPuebla[$i]["calidadDeIgualado"]."</span>";
	 		}

	 		$masInformacion = "<div class='btn-group'><button class='btn btn-info btnDetallesEncuestaPuebla' idEncuesta='".$encuestasPuebla[$i]["id"]."'  data-toggle='modal' data-target='#modalDetallesEncuesta'><i class='fa fa-eye' aria-hidden='true'></i></button></div>";	
	 		/*=============================================
			DEVOLVER DATOS JSON
			=============================================*/

			$datosJson	 .= '[
				      "'.$encuestasPuebla[$i]["id"].'",
				      "'.$encuestasPuebla[$i]["taller"].'",
				      "'.$encuestasPuebla[$i]["cliente"].'",
				      "'.$encuestasPuebla[$i]["fechaEncuesta"].'",
				      "'.str_replace("+","Mas de ",$encuestasPuebla[$i]["reparacionesMes"]).'",
				      "'.str_replace("+","Mas de ",$encuestasPuebla[$i]["igualadosPorSemana"]).'",
				      "'.$calidadIgualado.'",
				      "'.$encuestasPuebla[$i]["areaHyp"].'m2",
				      "'.$encuestasPuebla[$i]["trabajadores"].'",
				      "'.$encuestasPuebla[$i]["horarioSemana"].'",
				      "'.$encuestasPuebla[$i]["horarioSabado"].'",
				      "'.$masInformacion.'",
				      "'.$encuestasPuebla[$i]["encuestador"].'"
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
$activar = new TablaEncuestasPuebla();
$activar -> mostrarTablas();



