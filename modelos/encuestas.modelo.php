<?php
require_once "conexion.php";
class ModeloEncuestas{

/*==============================================
=            MODELOS PARA ENCUESTAS            =
==============================================*/
/* MOSTRAR LAS ENCUESTAS  */
static public function mdlListaEncuestas($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT enc.id,enc.taller,enc.cliente,enc.domicilio,enc.telefono,enc.movil,enc.correoElectronico,enc.facebook,enc.fechaEncuesta,enc.reparacionesMes,enc.igualadosPorSemana,enc.calidadDeIgualado,enc.areaHyp,enc.trabajadores,enc.horarioSemana,enc.horarioSabado,enc.finalizada,enc.motivoFinalizacion,encs.nombre as encuestador  FROM $tabla enc INNER JOIN encuestadores encs ON enc.encuestador = encs.id WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id asc");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt-> close();

		$stmt = null;
}
/* MOSTRAR ENCUESTADORES */
static public function mdlListaEncuestadores($tabla,$item,$valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla  WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT enc.id,enc.nombre,enc.correo,enc.telefono,enc.area,COUNT(enct.encuestador) as encuestados, MAX(fecha) as ultimaEncuesta,(SELECT cliente from encuesta WHERE id= MAX(enct.id)) as clienteEncuestado, (SELECT estado from encuesta WHERE id= MAX(enct.id)) as estado, (SELECT taller from encuesta WHERE id= MAX(enct.id)) as taller FROM $tabla enc INNER JOIN encuesta as enct ON enct.encuestador = enc.id  GROUP by enct.encuestador HAVING Count(enct.id) > 1");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt-> close();

		$stmt = null;
}
/* MOSTRAR DATOS DE ENCUESTADO */
static public function mdlObtenerDatosEncuestado($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT coord.latitud,coord.longitud,esc.domicilio FROM $tabla as esc INNER JOIN coordenadas as coord ON esc.id = coord.id  WHERE esc.$item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id asc");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt-> close();

		$stmt = null;
}
/* FUNCION PARA MOSTRAR TOTALES DE ENCUESTAS */
static public function mdlMostrarIndicadoresEncuestas($tabla){

			$stmt = Conexion::conectar()->prepare("SELECT (SELECT COUNT(id) from encuesta) total,(SELECT COUNT(id) from $tabla where estado = 'PUEBLA') encuestasPuebla, (SELECT COUNT(id) from $tabla where estado = 'TLAXCALA') encuestasTlaxcala FROM $tabla limit 1");

			$stmt -> execute();

			return $stmt -> fetch();

		$stmt-> close();

		$stmt = null;
}
/* FUNCION PARA MOSTRAR TOTALES NOTIFICACIONES */
static public function mdlMostrarTotalNotificaciones($tabla){

			$stmt = Conexion::conectar()->prepare("SELECT puebla,fechaPuebla,tlaxcala,fechaTlaxcala from $tabla");

			$stmt -> execute();

			return $stmt -> fetch();

		$stmt-> close();

		$stmt = null;
}
/* MOSTRAR DETALLES ENCUESTA */
static public function mdlObtenerDetalleEncuesta($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla  WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id asc");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt-> close();

		$stmt = null;
}
/* FUNCION PARA MOSTRAR LOS DETALLES DE LA ENCUESTA */

static public function mdlObtenerListaCoordenadas($tabla,$item,$valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla  WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT enc.taller,cord.latitud,cord.longitud FROM $tabla as cord INNER JOIN encuesta as enc ON cord.idEncuesta = enc.id");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt-> close();

		$stmt = null;
}
/* FUNCION PARA MOSTRAR TOTALES DE ENCUESTAS */
static public function mdlMostrarTotalesIndicadores($tabla,$item,$valor){

			$stmt = Conexion::conectar()->prepare("SELECT (SELECT COUNT(id) from $tabla) total,(SELECT COUNT(id) from $tabla where estado = 'PUEBLA') encuestasPuebla, (SELECT COUNT(id) from $tabla where estado = 'TLAXCALA') encuestasTlaxcala,(SELECT COUNT(id) from $tabla where $item = :$item) encuestasHoy,(SELECT IF(estado is null,'PUEBLA',estado) from $tabla GROUP BY estado LIMIT 1) masEncuestado FROM $tabla limit 1");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		$stmt-> close();

		$stmt = null;
}
/* FUNCION PARA MOSTRAR INDICADORES */
static public function mdlMostrarIgualadoPorSemana($tabla){

			$stmt = Conexion::conectar()->prepare("SELECT igualadosPorSemana as concepto,count(id) as cantidad from $tabla where igualadosPorSemana IS NOT NULL GROUP by igualadosPorSemana");

			$stmt -> execute();

			return $stmt -> fetchAll();

		$stmt-> close();

		$stmt = null;
}
static public function mdlMostrarReparacionesPorMes($tabla){

			$stmt = Conexion::conectar()->prepare("SELECT reparacionesMes as concepto,count(id) as cantidad from $tabla where reparacionesMes IS NOT NULL GROUP by reparacionesMes");

			$stmt -> execute();

			return $stmt -> fetchAll();

		$stmt-> close();

		$stmt = null;
}
static public function mdlMostrarCalidadIgualado($tabla){

			$stmt = Conexion::conectar()->prepare("SELECT calidadDeIgualado as concepto,count(id) as cantidad from $tabla where calidadDeIgualado IS NOT NULL GROUP by calidadDeIgualado");

			$stmt -> execute();

			return $stmt -> fetchAll();

		$stmt-> close();

		$stmt = null;
}
static public function mdlMostrarInversionSemanal($tabla){

			$stmt = Conexion::conectar()->prepare("SELECT inversion as concepto,count(id) as cantidad from $tabla where inversion IS NOT NULL GROUP by inversion");

			$stmt -> execute();

			return $stmt -> fetchAll();

		$stmt-> close();

		$stmt = null;
}
static public function mdlMostrarAreaHyp($tabla){

			$stmt = Conexion::conectar()->prepare("SELECT areaHyp as concepto,count(id) as cantidad from $tabla where areaHyp IS NOT NULL GROUP by areaHyp");

			$stmt -> execute();

			return $stmt -> fetchAll();

		$stmt-> close();

		$stmt = null;
}
static public function mdlMostrarNumeroTrabajadores($tabla){

			$stmt = Conexion::conectar()->prepare("SELECT  trabajadores as concepto,count(id) as cantidad from $tabla where trabajadores IS NOT NULL GROUP by trabajadores");

			$stmt -> execute();

			return $stmt -> fetchAll();

		$stmt-> close();

		$stmt = null;
}
static public function mdlMostrarSatisfaccionProveedor($tabla){

			$stmt = Conexion::conectar()->prepare("SELECT satisfaccionProveedor as concepto,count(id) as cantidad from $tabla where satisfaccionProveedor IS NOT NULL GROUP by satisfaccionProveedor");

			$stmt -> execute();

			return $stmt -> fetchAll();

		$stmt-> close();

		$stmt = null;
}
static public function mdlMostrarListaProveedores($tabla){

			$stmt = Conexion::conectar()->prepare("SELECT proveedorPinturas as concepto from $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

		$stmt-> close();

		$stmt = null;
}
static public function mdlMostrarFormaPago($tabla){

			$stmt = Conexion::conectar()->prepare("SELECT formaPago as concepto,count(id) as cantidad from $tabla where formaPago IS NOT NULL GROUP by formaPago");

			$stmt -> execute();

			return $stmt -> fetchAll();

		$stmt-> close();

		$stmt = null;
}
static public function mdlMostrarMarcas($tabla,$item,$valor){

			$stmt = Conexion::conectar()->prepare("SELECT $item as concepto from $tabla where $item IS NOT NULL");
		
			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();

		$stmt-> close();

		$stmt = null;
}

static public function mdlMostrarMarcas2($tabla,$item,$valor){

			$stmt = Conexion::conectar()->prepare("SELECT  $item as concepto from $tabla where  $item != ''");
			
			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();

		$stmt-> close();

		$stmt = null;
}
static public function mdlMostrarMarcas3($tabla,$item,$valor){

			$stmt = Conexion::conectar()->prepare("SELECT  $item as concepto from $tabla where  $item != '' ORDER by proveedorPinturas");
			
			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();

		$stmt-> close();

		$stmt = null;
}
/*=====================================================
=          LOCALIZADOR DE DISTRIBUIDORES            =
=====================================================*/
static public function mdlMostrarListaDistribuidores($tabla){

			$stmt = Conexion::conectar()->prepare("SELECT id,sucursal,lat,lng,contacto  from $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

		$stmt-> close();

		$stmt = null;
}

static public function mdlObtenerListaCoordenadasLocalizador($tabla,$latitud,$longitud){

			/*===================================
			=            LOCALIZADOR            =
			===================================*/

			if ($latitud == 0) {

				 $stmt =  Conexion::conectar()->prepare('SELECT *
                             FROM coordenadas as coord LEFT OUTER JOIN encuesta as enc ON enc.id = coord.idEncuesta  ');

				 	$stmt -> execute();

					return $stmt -> fetchAll();

				
			}else{

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

			}
			
		$stmt-> close();

		$stmt = null;
}
	
/*=====  End of LOCALIZADOR DE DISTRIBUIDORES  ======*/
/*=====================================================
=          LOCALIZADOR DE PROVEEDORES            =
=====================================================*/
static public function mdlMostrarListaEncuestaProveedores($tabla){

			$stmt = Conexion::conectar()->prepare("SELECT proveedores.id,encuesta.proveedorPinturas as proveedor,proveedores.latitud,proveedores.longitud FROM $tabla AS encuesta INNER JOIN proveedores as proveedores ON encuesta.proveedorPinturas = proveedores.proveedor WHERE encuesta.proveedorPinturas IS NOT NULL and encuesta.proveedorPinturas != ''   GROUP by encuesta.proveedorPinturas,proveedores.id");

			$stmt -> execute();

			return $stmt -> fetchAll();

		$stmt-> close();

		$stmt = null;
}

static public function mdlObtenerListaCoordenadasLocalizadorProveedores($tabla,$latitud,$longitud,$proveedor){

		$nombreProveedor = $proveedor;

		if($proveedor != "TODOS"){

			$stmt = Conexion::conectar()->prepare("SELECT enc.taller,enc.proveedorPinturas,coord.latitud,coord.longitud FROM $tabla as coord LEFT OUTER JOIN encuesta as enc ON enc.id = coord.idEncuesta WHERE enc.proveedorPinturas = '".$nombreProveedor."'");


			$stmt -> execute();

			return $stmt -> fetchAll();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT enc.taller,enc.proveedorPinturas,coord.latitud,coord.longitud FROM $tabla as coord LEFT OUTER JOIN encuesta as enc ON enc.id = coord.idEncuesta WHERE enc.finalizada != 1 and enc.proveedorPinturas IS NOT NULL UNION SELECT prove.proveedor as taller, prove.proveedor as proveedorPinturas, prove.latitud,prove.longitud FROM proveedores AS prove");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt-> close();

		$stmt = null;
			
}
static public function mdlMostrarLocalizadorClientesProveedores($tabla,$item,$valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla  WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

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
/*=====  End of LOCALIZADOR DE PROVEEDORES  ======*/
/*=====  End of MODELOS PARA ENCUESTAS  ======*/

}
?>