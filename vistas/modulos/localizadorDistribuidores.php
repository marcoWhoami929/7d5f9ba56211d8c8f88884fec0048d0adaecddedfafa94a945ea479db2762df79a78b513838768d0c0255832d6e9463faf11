 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="width: 80%">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Localizador Distribuidores</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
              <li class="breadcrumb-item active">Localizador</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header" style="background: #17A2B8;color: white">
              <h3 class="card-title">Resultados Encuestados Localizados</h3>
              <br>
              <br>
              <select name="elegirDistribuidor" id= "elegirDistribuidor" class="form-control">
               <?php

                error_reporting(E_ALL);
              
                require_once "controladores/encuestas.controlador.php";
                require_once "modelos/encuestas.modelo.php";

                $mostrarDistribuidores = ControladorEncuestas::ctrMostrarListaDistribuidores();
                foreach ($mostrarDistribuidores as $key => $value) {
                      
                      echo "<option value=".$value["id"]." lat = ".$value["lat"]." lng = ".$value["lng"].">".$value["contacto"]."</option>";


                }
                echo "<option value='100'>TODOS LOS DISTRIBUIDORES</option>";

               ?>
               
              </select>
          
            </div>

            <!-- /.card-header -->
            <div class="card-body">
              <div class="row">
                 <div id="mapa" class="col-lg-6 col-md-12 col-sm-12"></div>
            
                  <div id="datosMapa" class="col-lg-6 col-md-12 col-sm-12">
                    <div  id="map"  class="col-lg-12 col-md-12 col-sm-12"></div>

                    <div class="col-lg-12 col-md-12 col-sm-12" >
                      <div class="box box-info collapsed-box">
                        <div class="box-header with-border">
                          <h4>Ver Indicaciones</h4>
                          <p>Distancia Total: <span id="total"></span></p>
                            <div class="box-tools pull-right">
                              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            </div>
                          </div>
                        <div class="box-body no-padding">
                          <div id="right-panel">
                          </div>
                        </div>
                      </div>
                    </div>

                  </div>
                
              </div>
              <br>
                <div class="container col-lg-12 col-md-12 col-sm-12">
                <div class="row">
                  <div class="col-lg-8 col-md-8 col-sm-8">
                    <input type="text" name="rutaMapaDistribuidor" id="rutaMapaDistribuidor" class="form-control">
                  </div>
                  <div class="col-lg-2 col-md-2 col-sm-2">
                    <button type="button" class="btn btn-info" id="copiarRutaMapa">Copiar Enlace</button>
                  </div>
                  <div class="col-lg-2 col-md-2 col-sm-2">
                    <a  id="reporteLocalizador" class="nav-link">
                    <button type="button" class="btn btn-success">Reporte</button></a>
                    
                  </div>
                </div>

              </div>
              <br>
              <br>
             <table id="localizadorDistribuidores" class="table table-bordered table-striped table-responsive tablaLocalizadorDistribuidores" width="100%">
                <thead style="background: #17A2B8;color: white">
                <tr>
                  <th>Folio</th>
                  <th>Taller</th>
                  <th>Cliente</th>
                  <th>Domicilio</th>
                  <th>Teléfono</th>
                  <th>Movil</th>
                  <th>Correo</th>
                  <th>Facebook</th>
                  <th>Fecha Encuesta</th>
                  <th>Horario Semana</th>
                  <th>Horario Sábado</th>
                </tr>
                </thead>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

 <script type="text/javascript">
    $(document).ready(function(){
      cargarCoordenadasLocalizador();
      var  distribuidor = localStorage.getItem("distribuidor"); 
      $('select option[value="'+distribuidor+'"]').attr("selected", true);
    })
  function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
           zoom: 12,
        center: new google.maps.LatLng(19.011903,-98.205545),
        mapTypeId: google.maps.MapTypeId.ROADMAP,
         icon : image
        });


        var image = {
          url: 'vistas/img/plantilla/paint.png', //ruta de la imagen
          size: new google.maps.Size(40, 60), //tamaño de la imagen
          origin: new google.maps.Point(0,0), //origen de la iamgen
        //el ancla de la imagen, el punto donde esta marcando, en nuestro caso el centro inferior.
          anchor: new google.maps.Point(20, 60) 
         };

        var directionsService = new google.maps.DirectionsService;
        var directionsRenderer = new google.maps.DirectionsRenderer({
          draggable: true,
          map: map,
          panel: document.getElementById('right-panel')
        });

        directionsRenderer.addListener('directions_changed', function() {
          computeTotalDistance(directionsRenderer.getDirections());


        });
        var latitudCliente = localStorage.getItem("latitudCliente");
        var longitudCliente = localStorage.getItem("longitudCliente");
        var direccionesCliente = ''+latitudCliente+','+longitudCliente+'';


        var latitudSucursal = localStorage.getItem("latitudDistribuidor");
        var longitudSucursal =localStorage.getItem("longitudDistribuidor");



        if (latitudSucursal === 'undefined') {
           var latitudSucursal = '19.01213503760101';
           var longitudSucursal = '-98.20579680695103';


          var coordenadaSucursal = ''+latitudSucursal+','+longitudSucursal+'';
        

        }else{

          var coordenadaSucursal = ''+latitudSucursal+','+longitudSucursal+'';

        }
       

        displayRoute(''+coordenadaSucursal+'', ''+direccionesCliente+'', directionsService,
            directionsRenderer);
       
      }

      function displayRoute(origin, destination, service, display) {
        document.getElementById('right-panel').innerHTML="";
        service.route({
          origin: origin,
          destination: destination,
          
          travelMode: 'DRIVING',
          avoidTolls: true
        }, function(response, status) {
          if (status === 'OK') {
            display.setDirections(response);
          } else {
            console.log('Could not display directions due to: ' + status);
          }
        });
      }

      function computeTotalDistance(result) {
        var total = 0;
        var myroute = result.routes[0];
        for (var i = 0; i < myroute.legs.length; i++) {
          total += myroute.legs[i].distance.value;
        }
        total = total / 1000;
        document.getElementById('total').innerHTML = total + ' km';
      }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA7Ow27ztKwFY0_CyX5FXXfK6PV87gJsPQ&callback=initMap"></script>

  <script type="text/javascript">
    /*============================================
    =            COPIAR RUTA DEL MAPA            =
    ============================================*/
    document.getElementById("copiarRutaMapa").addEventListener("click", function() {
        copyToClipboard(document.getElementById("rutaMapaDistribuidor"));
    });
    function copyToClipboard(elem) {
          // create hidden text element, if it doesn't already exist
            var targetId = "_hiddenCopyText_";
            var isInput = elem.tagName === "INPUT" || elem.tagName === "TEXTAREA";
            var origSelectionStart, origSelectionEnd;
            if (isInput) {
                // can just use the original source element for the selection and copy
                target = elem;
                origSelectionStart = elem.selectionStart;
                origSelectionEnd = elem.selectionEnd;
            } else {
                // must use a temporary form element for the selection and copy
                target = document.getElementById(targetId);
                if (!target) {
                    var target = document.createElement("textarea");
                    target.style.position = "absolute";
                    target.style.left = "-9999px";
                    target.style.top = "0";
                    target.id = targetId;
                    document.body.appendChild(target);
                }
                target.textContent = elem.textContent;
            }
            // select the content
            var currentFocus = document.activeElement;
            target.focus();
            target.setSelectionRange(0, target.value.length);
            
            // copy the selection
            var succeed;
            try {
                  succeed = document.execCommand("copy");
            } catch(e) {
                succeed = false;
            }
            // restore original focus
            if (currentFocus && typeof currentFocus.focus === "function") {
                currentFocus.focus();
            }
            
            if (isInput) {
                // restore prior selection
                elem.setSelectionRange(origSelectionStart, origSelectionEnd);
            } else {
                // clear temporary content
                target.textContent = "";
            }
            return succeed;
        }
            
    
    /*=====  End of COPIAR RUTA DEL MAPA  ======*/
    
    function iniciarLocalizador() {

      var lat = localStorage.getItem("latitudDistribuidor");
      var long = localStorage.getItem("longitudDistribuidor");
      if (localStorage.getItem("nombreDistribuidor") == "TODOS LOS DISTRIBUIDORES") {

        var proveedor = "TODOS";
        var rutaReporteLocalizador = "vistas/modulos/reportes.php?reporteLocalizador=coordenadas&latitud="+lat+"&longitud="+long+"";
        $("#reporteLocalizador").attr('href',rutaReporteLocalizador);
      }else{

        var proveedor = localStorage.getItem("nombreDistribuidor");
        var rutaReporteLocalizador = "vistas/modulos/reportes.php?reporteLocalizador=coordenadas&latitud="+lat+"&longitud="+long+"";
        $("#reporteLocalizador").attr('href',rutaReporteLocalizador);
      }
      var urlMapaDistribuidores = "https://sanfranciscodekkerlab.com/localizador/localizador.php?latitud="+lat+"&longitud="+long+"&marcadores="+localStorage.getItem("marcadoresMapaDistribuidores")+"&proveedor="+proveedor;

      

      $("#rutaMapaDistribuidor").val(urlMapaDistribuidores);

     
     if (localStorage.getItem("nombreDistribuidor") === "TODOS LOS DISTRIBUIDORES") {

       var marcadores = JSON.parse(localStorage.getItem("marcadoresMapaDistribuidores"));

       var markers = [
        ['PINTURAS EXCELO HUAMANTLA','19.31491','-97.92198'],['PINTURAS HERSA','19.31055','-97.92749'],['PINTURAS ÁGUILA','19.21693','-98.24045'],['PINTURAS ÁGUILA','19.30544','-98.24005'],['PINTURAS LA NUEVA IMAGEN','19.24436','-98.1936'],['PINTURAS EL BOCHO','19.41528','-98.149'],['PINTURAS ÁGUILA','19.19135','-98.23781'],['PINTURAS PANZACOLA','19.15032','-98.22353'],['PINTURAS SAN PABLO','19.11975','-98.16825'],['PINTURAS PAO','19.32099','-98.19424'],['PINTURAS KRIZZ','19.321473','-98.209532'],['PINTURAS KRIZZ','19.21073','-98.23893'],['PINTURAS PATO','19.41396','-98.14612'],['PINTURAS TINO´´S','19.04678','-98.16536'],['SHERWIN WILLIANS SANTA ROSA','19.08404','-98.16397'],['SHERWIN WILLIANS MIGUEL HIDALGO','19.066','-98.13844'],['SHERWIN WILLIANS VÍA CORTA','19.10579','-98.18063'],['PINTURAS LA UNIVERSAL','18.95955','-98.23975'],['PINTURAS EL CONDE','18.99581','-98.23609'],['PINTURAS CHAPULTEPEC','19.04162','-98.14167'],['PINTURAS EXCELO','19.09103','-98.20626'],['PINTURAS CRUCERO','19.04276','-98.14852'],['PINTURAS PAYRE','19.0603','-98.20664'],['PINTURAS TECNICOLOR','19.05538','-98.21746'],['PINTURAS METROPOLITANAS','19.04973','-98.19335'],['PINTURAS 11 SUR','18.98213','-98.2523'],['PINTURAS EXCELO','19.04327','-98.18257'],['PINTURAS EL CONDE','18.9879','-98.19581'],['PINTURAS CONDE','19.07671','-98.26374'],['PINTURAS VERO','19.06503','-98.31111'],['PINTURAS GRUPO CONCER','19.06723','-98.30537'],['PINTURAS MARY FER','19.0522','-98.31183'],['PINTURAS EXCELO AMOZOC','19.04183','-98.04248'],['AGRICORT','19.14256','-97.64429'],['PINTURAS EL RETOQUE','19.836249','-98.03161'],['PINTURAS LA UNIÓN','19.94194','-97.96127'],['PINTURAS CRI-JASS','18.59625','-98.46035'],['PINTURAS CRI-JASS','18.60547','-98.4689'],['PINTURAS EXCELO DE ACATZINGO','18.97975','-97.79091'],['SAN FRANCISCO SAN MANUEL','19.01222','-98.20299'],['SAN FRANCISCO REFORMA','19.06285','-98.2308'],['SAN FRANCISCO SANTIAGO','19.04162','-98.21028'],['SAN FRANCISCO CAPU','19.07213','-98.20195'],['SAN FRANCISCO TORRES','18.99255','-98.2132']
    ];


            var map = new google.maps.Map(document.getElementById('mapa'), {
        zoom: 15,
        center: new google.maps.LatLng(19.0413, -98.2062),
        mapTypeId: google.maps.MapTypeId.ROADMAP
      });

        var image = {
          url: 'vistas/img/plantilla/paint.png', //ruta de la imagen
          size: new google.maps.Size(40, 60), //tamaño de la imagen
          origin: new google.maps.Point(0,0), //origen de la iamgen
        //el ancla de la imagen, el punto donde esta marcando, en nuestro caso el centro inferior.
          anchor: new google.maps.Point(20, 60) 
         };
        var image2 = {
          url: 'vistas/img/plantilla/icono-sfd.png', //ruta de la imagen
          size: new google.maps.Size(40, 60), //tamaño de la imagen
          origin: new google.maps.Point(0,0), //origen de la iamgen
        //el ancla de la imagen, el punto donde esta marcando, en nuestro caso el centro inferior.
          anchor: new google.maps.Point(20, 60) 
         };
        var image3 = {
          url: 'vistas/img/plantilla/icono-sherwin-2.png', //ruta de la imagen
          size: new google.maps.Size(40, 60), //tamaño de la imagen
          origin: new google.maps.Point(0,0), //origen de la iamgen
        //el ancla de la imagen, el punto donde esta marcando, en nuestro caso el centro inferior.
          anchor: new google.maps.Point(20, 60) 
         };
      var infowindow = new google.maps.InfoWindow();
      var marker, i;
    
      for (i = 0; i < marcadores.length; i++) {  
        marker = new google.maps.Marker({
          position: new google.maps.LatLng(marcadores[i][1], marcadores[i][2]),
          map: map,
          icon : image
        });
        google.maps.event.addListener(marker, 'click', (function(marker, i) {

          return function() {
            infowindow.setContent(marcadores[i][0]);
            infowindow.open(map, marker);
            localStorage.setItem("latitudCliente",marcadores[i][1]);
            localStorage.setItem("longitudCliente",marcadores[i][2]);
            initMap();
        
          }
        })(marker, i));
      }

      for( i = 0; i < markers.length; i++ ) {

        var latit =  markers[i][1];
        var longit =  markers[i][2];
      
     

      if ( latit == 19.01222 ||  latit == 19.06285 ||  latit == 19.04162 ||  latit == 19.07213 ||  latit == 18.99255) {

            var img = image2;
      }else{

            var img = image3;
      }
  
      marker = new google.maps.Marker({
          position: new google.maps.LatLng(latit,longit),
          map: map,
          icon : img
        });
        google.maps.event.addListener(marker, 'click', (function(marker, i) {

          return function() {
            infowindow.setContent(markers[i][0]);
            infowindow.open(map, marker);
            //localStorage.setItem("latitudCliente",marcadores[i][1]);
            //localStorage.setItem("longitudCliente",marcadores[i][2]);
            //initMap();
        
          }
        })(marker, i));
      }





    

     }else{

       var marcadores = JSON.parse(localStorage.getItem("marcadoresMapaDistribuidores"));


      var map = new google.maps.Map(document.getElementById('mapa'), {
        zoom: 15,
        center: new google.maps.LatLng(localStorage.getItem("latitudDistribuidor"),localStorage.getItem("longitudDistribuidor")),
        mapTypeId: google.maps.MapTypeId.ROADMAP
      });

        var image = {
          url: 'vistas/img/plantilla/paint.png', //ruta de la imagen
          size: new google.maps.Size(40, 60), //tamaño de la imagen
          origin: new google.maps.Point(0,0), //origen de la iamgen
        //el ancla de la imagen, el punto donde esta marcando, en nuestro caso el centro inferior.
          anchor: new google.maps.Point(20, 60) 
         };
        var image2 = {
          url: 'vistas/img/plantilla/icono-sfd.png', //ruta de la imagen
          size: new google.maps.Size(40, 60), //tamaño de la imagen
          origin: new google.maps.Point(0,0), //origen de la iamgen
        //el ancla de la imagen, el punto donde esta marcando, en nuestro caso el centro inferior.
          anchor: new google.maps.Point(20, 60) 
         };
        var image3 = {
          url: 'vistas/img/plantilla/icono-sherwin-2.png', //ruta de la imagen
          size: new google.maps.Size(40, 60), //tamaño de la imagen
          origin: new google.maps.Point(0,0), //origen de la iamgen
        //el ancla de la imagen, el punto donde esta marcando, en nuestro caso el centro inferior.
          anchor: new google.maps.Point(20, 60) 
         };
      var infowindow = new google.maps.InfoWindow();
      var marker, i;
      for (i = 0; i < marcadores.length; i++) {  
        marker = new google.maps.Marker({
          position: new google.maps.LatLng(marcadores[i][1], marcadores[i][2]),
          map: map,
          icon : image
        });
        google.maps.event.addListener(marker, 'click', (function(marker, i) {

          return function() {
            infowindow.setContent(marcadores[i][0]);
            infowindow.open(map, marker);
            localStorage.setItem("latitudCliente",marcadores[i][1]);
            localStorage.setItem("longitudCliente",marcadores[i][2]);
            initMap();
        
          }
        })(marker, i));
      }

      if (lat == 19.01222 || lat == 19.06285 || lat == 19.04162 || lat == 19.07213 || lat == 18.99255) {

            var img = image2;
      }else{

            var img = image3;
      }
  
      marker = new google.maps.Marker({
          position: new google.maps.LatLng(lat, long),
          map: map,
          icon : img
        });
        google.maps.event.addListener(marker, 'click', (function(marker, i) {

          return function() {
            infowindow.setContent(localStorage.getItem("nombreDistribuidor"));
            infowindow.open(map, marker);
            localStorage.setItem("latitudCliente",marcadores[i][1]);
            localStorage.setItem("longitudCliente",marcadores[i][2]);
            initMap();
        
          }
        })(marker, i));
     }

        /********************************************/
    }
    google.maps.event.addDomListener(window, 'load', iniciarLocalizador);
</script>
