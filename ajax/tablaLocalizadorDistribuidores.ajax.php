<?php
    error_reporting(E_ALL);
        
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
        
        if (isset($_GET["latitudDistribuidor"])) {

            $latitud = $_GET["latitudDistribuidor"];
           

        }else {

            $latitud = "";
        }

        if (isset($_GET["longitudDistribuidor"])) {

            $longitud = $_GET["longitudDistribuidor"];
           
            
        }else{

            $longitud = "";
        }
      
        if($latitud === undefined){



        $dsn = 'mysql:dbname=sanfranc_encuesta;host=localhost';
        $usuario = 'sanfranc_root';
        $pass = 'Whoami929';

        $db = new PDO($dsn, $usuario, $pass);
        $stmt = $db->query('SELECT *
                             FROM coordenadas as coord LEFT OUTER JOIN encuesta as enc ON enc.id = coord.idEncuesta  ');

        $localizador = $stmt->fetchAll(PDO::FETCH_ASSOC);

        }else{

        $lat = $latitud;
        $lng = $longitud;
        $distance = 2; // Sitios que se encuentren en un radio de 1KM
        $box = getBoundaries($lat, $lng, $distance);

        $dsn = 'mysql:dbname=sanfranc_encuesta;host=localhost';
        $usuario = 'sanfranc_root';
        $pass = 'Whoami929';

        $db = new PDO($dsn, $usuario, $pass);
        $stmt = $db->query('SELECT *, ( 6371 * ACOS( 
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

        $localizador = $stmt->fetchAll(PDO::FETCH_ASSOC);

        }


        
    
        
        $datosJson = '{
             
            "data": [ ';

            for($i = 0; $i < count($localizador); $i++){


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
                /*=============================================
                DEVOLVER DATOS JSON
                =============================================*/
                
                $datosJson   .= '[
                  
                      "'.$localizador[$i]["id"].'",
                      "'.utf8_encode($taller).'",
                      "'.utf8_encode($cliente).'",
                      "'.utf8_encode($domicilio).'",
                      "'.$telefono.'",
                      "'.$movil.'",
                      "'.$correoElectronico.'",
                      "'.utf8_encode($facebook).'",
                      "'.$localizador[$i]["fecha"].'",
                      "'.$horarioSemana.'",
                      "'.$horarioSabado.'"
                    ],';

            }

            $datosJson = substr($datosJson, 0, -1);

            $datosJson.=  ']
                  
            }'; 

            echo $datosJson;


      ?>
