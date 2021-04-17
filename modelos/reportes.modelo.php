<?php
require_once "conexion.php";


class ModeloReportes{

	/*============================================
	DESCARGAR REPORTE ENCUESTAS
	===========================================*/
	static public function  mdlDescargarReporteEncuestas($tabla,$item,$valor){
		$stmt = Conexion::conectar()->prepare("SELECT enc.*,enct.nombre as encuestador FROM $tabla enc INNER JOIN encuestadores as enct ON enc.encuestador = enct.id WHERE $item = :$item  order by enc.id ASC");


		$stmt -> bindParam(":".$item,$valor, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;
	}
	/*============================================
	DESCARGAR REPORTE ENCUESTADOS
	===========================================*/
	static public function  mdlDescargarReporteEncuestados($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE finalizada = 0 ORDER BY id asc ");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;
	}
	/*============================================
	DESCARGAR REPORTE NO ENCUESTADOS
	===========================================*/
	static public function  mdlDescargarReporteNoEncuestados($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT enc.id,IF(enc.taller is null,'',enc.taller) as taller,coord.latitud,coord.longitud,enc.domicilio,enc.fechaEncuesta,encu.nombre as encuestador FROM $tabla as enc INNER JOIN encuestadores as encu ON encu.id = enc.encuestador INNER JOIN coordenadas as coord ON coord.idEncuesta = enc.id where enc.finalizada = 1 order by enc.id");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;
	}
	static public function  mdlDescargarReporteLocalizadorDistribuidores($tabla,$latitud,$longitud){
		/*===================================
			=            LOCALIZADOR            =
			===================================*/
			function getBoundaries($lat, $lng, $distance)
		        {
		            $return = array();
		             
		            // Los angulos para cada dirección
		            $cardinalCoords = array('north' => '0',
		                                    'south' => '180',
		                                    'east' => '90',
		                                    'west' => '270');

		            $rLat = deg2rad($lat);
		            $rLng = deg2rad($lng);
		            $rAngDist = $distance/6371;

		            foreach ($cardinalCoords as $name => $angle)
		            {
		                $rAngle = deg2rad($angle);
		                $rLatB = asin(sin($rLat) * cos($rAngDist) + cos($rLat) * sin($rAngDist) * cos($rAngle));
		                $rLonB = $rLng + atan2(sin($rAngle) * sin($rAngDist) * cos($rLat), cos($rAngDist) - sin($rLat) * sin($rLatB));

		                 $return[$name] = array('lat' => (float) rad2deg($rLatB), 
		                                        'lng' => (float) rad2deg($rLonB));
		            }

		            return array('min_lat'  => $return['south']['lat'],
		                         'max_lat' => $return['north']['lat'],
		                         'min_lng' => $return['west']['lng'],
		                         'max_lng' => $return['east']['lng']);
		        }
		        
		        
		        $lat = $latitud;
		        $lng = $longitud;
		        $distance = 2; // Sitios que se encuentren en un radio de 1KM
		        $box = getBoundaries($lat, $lng, $distance);

		        $stmt =  Conexion::conectar()->prepare('SELECT *, ( 6371 * ACOS( 
		                                                     COS( RADIANS(' . $lat . ') ) 
		                                                     * COS(RADIANS( latitud ) ) 
		                                                     * COS(RADIANS( longitud ) 
		                                                     - RADIANS(' . $lng . ') ) 
		                                                     + SIN( RADIANS(' . $lat . ') ) 
		                                                     * SIN(RADIANS( latitud ) ) 
		                                                    )
		                                       ) AS distance 
		                             FROM coordenadas as coord LEFT OUTER JOIN encuesta as enc ON enc.id = coord.idEncuesta 
		                             WHERE (latitud BETWEEN ' . $box['min_lat']. ' AND ' . $box['max_lat'] . ')
		                             AND (longitud BETWEEN ' . $box['min_lng']. ' AND ' . $box['max_lng']. ')
		                             HAVING distance < ' . $distance . '
		                             ORDER BY distance ASC');
					
			
			/*=====  End of LOCALIZADOR  ======*/

			$stmt -> execute();

			return $stmt -> fetchAll();

		$stmt-> close();

		$stmt = null;
	}
	static public function  mdlDescargarReporteLocalizadorProveedores($tabla,$proveedor){
		
		$nombreProveedor = $proveedor;

		if($proveedor != "TODOS"){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla  WHERE proveedorPinturas = '".$nombreProveedor."'");


			$stmt -> execute();

			return $stmt -> fetchAll();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt-> close();

		$stmt = null;

	}

}


?>