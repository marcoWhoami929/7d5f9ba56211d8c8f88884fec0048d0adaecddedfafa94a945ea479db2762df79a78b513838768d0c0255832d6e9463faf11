<?php
error_reporting(0);
require_once "../controladores/encuestas.controlador.php";
require_once "../modelos/encuestas.modelo.php";

class TablaEncuestasTlaxcala{

 	/*=============================================
  
  	=============================================*/ 

	public function mostrarTablas(){	

		$item = 'estado';
 		$valor = 'TLAXCALA';

 		$encuestasTlaxcala = ControladorEncuestas::ctrListaEncuestas($item, $valor);


 		$datosJson = '{
		 
	 	"data": [ ';

	 	for($i = 0; $i < count($encuestasTlaxcala); $i++){
	 		if ($encuestasTlaxcala[$i]["calidadDeIgualado"] == 'BUENA') {
	 			$calidadIgualado = "<span class='badge badge-success right'>".$encuestasTlaxcala[$i]["calidadDeIgualado"]."</span>";
	 		}else if($encuestasTlaxcala[$i]["calidadDeIgualado"] == 'REGULAR'){
	 			$calidadIgualado = "<span class='badge badge-warning right'>".$encuestasTlaxcala[$i]["calidadDeIgualado"]."</span>";
	 		}else if ($encuestasTlaxcala[$i]["calidadDeIgualado"] == 'MALA') {
	 			$calidadIgualado = "<span class='badge badge-danger right'>".$encuestasTlaxcala[$i]["calidadDeIgualado"]."</span>";
	 		}
	 		
	 		$masInformacion = "<div class='btn-group'><button class='btn btn-info btnDetallesEncuestaTlaxcala' idEncuesta='".$encuestasTlaxcala[$i]["id"]."'  data-toggle='modal' data-target='#modalDetallesEncuesta'><i class='fa fa-eye' aria-hidden='true'></i></button></div>";	
	 		/*=============================================
			DEVOLVER DATOS JSON
			=============================================*/

			$datosJson	 .= '[
				      "'.$encuestasTlaxcala[$i]["id"].'",
				      "'.$encuestasTlaxcala[$i]["taller"].'",
				      "'.$encuestasTlaxcala[$i]["cliente"].'",
				      "'.$encuestasTlaxcala[$i]["fechaEncuesta"].'",
				      "'.str_replace("+","Mas de ",$encuestasTlaxcala[$i]["reparacionesMes"]).'",
				      "'.str_replace("+","Mas de ",$encuestasTlaxcala[$i]["igualadosPorSemana"]).'",
				      "'.$calidadIgualado.'",
				      "'.$encuestasTlaxcala[$i]["areaHyp"].'m2",
				      "'.$encuestasTlaxcala[$i]["trabajadores"].'",
				      "'.$encuestasTlaxcala[$i]["horarioSemana"].'",
				      "'.$encuestasTlaxcala[$i]["horarioSabado"].'",
				      "'.$masInformacion.'",
				      "'.$encuestasTlaxcala[$i]["encuestador"].'"
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
$activar = new TablaEncuestasTlaxcala();
$activar -> mostrarTablas();



