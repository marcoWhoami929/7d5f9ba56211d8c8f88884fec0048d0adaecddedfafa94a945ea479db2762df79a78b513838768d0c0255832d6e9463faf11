<?php
error_reporting(0);
require_once "../controladores/encuestas.controlador.php";
require_once "../modelos/encuestas.modelo.php";

class TablaLocalizadorProveedores{

 	/*=============================================
  
  	=============================================*/ 

	public function mostrarTablas(){	

		if ($_GET["nombreProveedor"] != "TODOS") {

			$item = "proveedorPinturas";
			$valor = $_GET["nombreProveedor"];
			
		}else{

			$item = null;
	 		$valor = mull;

		}

		$localizador = ControladorEncuestas::ctrMostrarLocalizadorClientesProveedores($item, $valor);
		


 		$datosJson = '{
		 
	 	"data": [ ';

	 	for($i = 0; $i < count($localizador); $i++){
	 	
	 		/*=============================================
			DEVOLVER DATOS JSON
			=============================================*/
			  if ($localizador[$i]["finalizada"] == 1) {
                
                $taller = "<span class='badge badge-success right'>Sin registro</span>";
                $cliente = $localizador[$i]["motivoFinalizacion"];
                $domicilio = "<span class='badge badge-success right'>Sin registro</span>";
                $telefono = "<span class='badge badge-success right'>Sin registro</span>";
                $movil = "<span class='badge badge-success right'>Sin registro</span>";
                $correoElectronico = "<span class='badge badge-success right'>Sin registro</span>";
                $facebook = "<span class='badge badge-success right'>Sin registro</span>";
                $horarioSemana  = "<span class='badge badge-success right'>Sin registro</span>";
                $horarioSabado = "<span class='badge badge-success right'>Sin registro</span>";

            }else{

                $taller = $localizador[$i]["taller"];
                $cliente = $localizador[$i]["cliente"];
                $domicilio = $localizador[$i]["domicilio"];
                $telefono = $localizador[$i]["telefono"];
                $movil = $localizador[$i]["movil"];
                $correoElectronico = $localizador[$i]["correoElectronico"];
                $facebook = $localizador[$i]["facebook"];
                $horarioSemana = $localizador[$i]["horarioSemana"]; 
                $horarioSabado = $localizador[$i]["horarioSabado"];
            }
			
			$datosJson	 .= '[
				       "'.$localizador[$i]["id"].'",
                      "'.$taller.'",
                      "'.$cliente.'",
                      "'.$domicilio.'",
                      "'.$telefono.'",
                      "'.$movil.'",
                      "'.$correoElectronico.'",
                      "'.$facebook.'",
                      "'.$localizador[$i]["fecha"].'",
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
$activar = new TablaLocalizadorProveedores();
$activar -> mostrarTablas();



