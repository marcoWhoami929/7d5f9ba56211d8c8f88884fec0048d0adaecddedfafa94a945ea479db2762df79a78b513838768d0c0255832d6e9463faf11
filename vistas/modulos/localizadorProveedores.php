 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="width: 80%">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Localizador Proveedores</h1>
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
              <select name="elegirProveedor" id= "elegirProveedor" class="form-control">
               <?php

                error_reporting(E_ALL);
              
                require_once "controladores/encuestas.controlador.php";
                require_once "modelos/encuestas.modelo.php";

                $mostrarProveedores = ControladorEncuestas::ctrMostrarListaEncuestaProveedores();
                foreach ($mostrarProveedores as $key => $value) {
                      
                      echo "<option value=".$value["id"]." lat = ".$value["latitud"]." lng = ".$value["longitud"].">".$value["proveedor"]."</option>";


                }

                      echo "<option value='0' lat = '19.01222' lng = '-98.20299'>TODOS</option>";
               ?>
               
              </select>
          
            </div>

            <!-- /.card-header -->
            <div class="card-body">
              <div class="row">
                 <div id="mapa" class="col-lg-12 col-md-12 col-sm-12"></div>
            
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
                    <input type="text" name="rutaMapaProveedor" id="rutaMapaProveedor" class="form-control">
                  </div>
                  <div class="col-lg-2 col-md-2 col-sm-2">
                    <button type="button" class="btn btn-info" id="copiarRutaMapaProveedor">Copiar Enlace</button>
                  </div>
                  <div class="col-lg-2 col-md-2 col-sm-2">
                    <a  id="reporteLocalizadorProveedores" class="nav-link">
                    <button type="button" class="btn btn-success">Reporte</button></a>
                    
                  </div>
                </div>

              </div>
              <br>
              <br>
             <table id="localizadorProveedores" class="table table-bordered table-striped table-responsive tablaLocalizadorProveedores" width="100%">
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
      var  proveedor = localStorage.getItem("proveedor"); 
      $('select option[value="'+proveedor+'"]').attr("selected", true);
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

        var latitudSucursal = localStorage.getItem("latitudProveedor");
        var longitudSucursal =localStorage.getItem("longitudProveedor");
        var coordenadaSucursal = ''+latitudSucursal+','+longitudSucursal+'';

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
    document.getElementById("copiarRutaMapaProveedor").addEventListener("click", function() {
        copyToClipboard(document.getElementById("rutaMapaProveedor"));
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

      var lat = localStorage.getItem("latitudProveedor");
      var long = localStorage.getItem("longitudProveedor");
      if (localStorage.getItem("nombreProveedor") == "TODOS") {

        var proveedor = "TODOS";
      }else{

        var proveedor = localStorage.getItem("nombreProveedor");
      }
      var urlMapaProveedores = "https://sanfranciscodekkerlab.com/localizador/localizador.php?latitud="+lat+"&longitud="+long+"&marcadores="+localStorage.getItem("marcadoresMapaProveedores")+"&proveedor="+proveedor;


      var rutaReporteLocalizador = "vistas/modulos/reportes.php?reporteLocalizadorProveedores=encuesta&proveedor="+proveedor+"";
      $("#reporteLocalizadorProveedores").attr('href',rutaReporteLocalizador);
      $("#reporteLocalizador").attr('href',rutaReporteLocalizador);
      $("#rutaMapaProveedor").val(urlMapaProveedores);

      var marcadores = JSON.parse(localStorage.getItem("marcadoresMapaProveedores"));
      var map = new google.maps.Map(document.getElementById('mapa'), {
        zoom: 15,
        center: new google.maps.LatLng(localStorage.getItem("latitudProveedor"),localStorage.getItem("longitudProveedor")),
        mapTypeId: google.maps.MapTypeId.ROADMAP
      });
        var alvamex = {
          url: 'vistas/img/plantilla/alvamex.png', //ruta de la imagen
          size: new google.maps.Size(60, 35), //tamaño de la imagen
          origin: new google.maps.Point(0,0), //origen de la iamgen
        //el ancla de la imagen, el punto donde esta marcando, en nuestro caso el centro inferior.
          anchor: new google.maps.Point(40, 60) 
         };

        var autosayer = {
          url: 'vistas/img/plantilla/autosayer.png', //ruta de la imagen
          size: new google.maps.Size(60, 22), //tamaño de la imagen
          origin: new google.maps.Point(0,0), //origen de la iamgen
        //el ancla de la imagen, el punto donde esta marcando, en nuestro caso el centro inferior.
          anchor: new google.maps.Point(20, 60) 
         };

        var axalta = {
          url: 'vistas/img/plantilla/axalta.png', //ruta de la imagen
          size: new google.maps.Size(40, 30), //tamaño de la imagen
          origin: new google.maps.Point(0,0), //origen de la iamgen
        //el ancla de la imagen, el punto donde esta marcando, en nuestro caso el centro inferior.
          anchor: new google.maps.Point(40, 60) 
         };
        var g3 = {
          url: 'vistas/img/plantilla/g3.png', //ruta de la imagen
          size: new google.maps.Size(60, 27), //tamaño de la imagen
          origin: new google.maps.Point(0,0), //origen de la iamgen
        //el ancla de la imagen, el punto donde esta marcando, en nuestro caso el centro inferior.
          anchor: new google.maps.Point(20, 60) 
         };

        var ipesa = {
          url: 'vistas/img/plantilla/ipesa.png', //ruta de la imagen
          size: new google.maps.Size(60, 22), //tamaño de la imagen
          origin: new google.maps.Point(0,0), //origen de la iamgen
        //el ancla de la imagen, el punto donde esta marcando, en nuestro caso el centro inferior.
          anchor: new google.maps.Point(20, 60) 
         };
        var max = {
          url: 'vistas/img/plantilla/max.png', //ruta de la imagen
          size: new google.maps.Size(60, 29), //tamaño de la imagen
          origin: new google.maps.Point(0,0), //origen de la iamgen
        //el ancla de la imagen, el punto donde esta marcando, en nuestro caso el centro inferior.
          anchor: new google.maps.Point(20, 60) 
         };
        var ppg = {
          url: 'vistas/img/plantilla/ppg.png', //ruta de la imagen
          size: new google.maps.Size(40,31), //tamaño de la imagen
          origin: new google.maps.Point(0,0), //origen de la iamgen
        //el ancla de la imagen, el punto donde esta marcando, en nuestro caso el centro inferior.
          anchor: new google.maps.Point(20, 60) 
         };
        var zhaia = {
          url: 'vistas/img/plantilla/zhaia.png', //ruta de la imagen
          size: new google.maps.Size(60, 34), //tamaño de la imagen
          origin: new google.maps.Point(0,0), //origen de la iamgen
        //el ancla de la imagen, el punto donde esta marcando, en nuestro caso el centro inferior.
          anchor: new google.maps.Point(20, 60) 
         };

        var sfd = {
          url: 'vistas/img/plantilla/icono-sfd.png', //ruta de la imagen
          size: new google.maps.Size(40, 60), //tamaño de la imagen
          origin: new google.maps.Point(0,0), //origen de la iamgen
        //el ancla de la imagen, el punto donde esta marcando, en nuestro caso el centro inferior.
          anchor: new google.maps.Point(20, 60) 
         };
        var swam = {
          url: 'vistas/img/plantilla/icono-sherwin-2.png', //ruta de la imagen
          size: new google.maps.Size(40, 60), //tamaño de la imagen
          origin: new google.maps.Point(0,0), //origen de la iamgen
        //el ancla de la imagen, el punto donde esta marcando, en nuestro caso el centro inferior.
          anchor: new google.maps.Point(20, 60) 
         };
        var flex = {
          url: 'vistas/img/plantilla/flex.png', //ruta de la imagen
          size: new google.maps.Size(60, 80), //tamaño de la imagen
          origin: new google.maps.Point(0,0), //origen de la iamgen
        //el ancla de la imagen, el punto donde esta marcando, en nuestro caso el centro inferior.
          anchor: new google.maps.Point(20, 60) 
         };
        var cliente = {
          url: 'vistas/img/plantilla/cliente2.png', //ruta de la imagen
          size: new google.maps.Size(40, 60), //tamaño de la imagen
          origin: new google.maps.Point(0,0), //origen de la iamgen
        //el ancla de la imagen, el punto donde esta marcando, en nuestro caso el centro inferior.
          anchor: new google.maps.Point(20, 60) 
         };
        var cliente2 = {
          url: 'vistas/img/plantilla/cliente3.png', //ruta de la imagen
          size: new google.maps.Size(40, 60), //tamaño de la imagen
          origin: new google.maps.Point(0,0), //origen de la iamgen
        //el ancla de la imagen, el punto donde esta marcando, en nuestro caso el centro inferior.
          anchor: new google.maps.Point(20, 60) 
         };
        var otros = {
          url: 'vistas/img/plantilla/paint2.png', //ruta de la imagen
          size: new google.maps.Size(40, 60), //tamaño de la imagen
          origin: new google.maps.Point(0,0), //origen de la iamgen
        //el ancla de la imagen, el punto donde esta marcando, en nuestro caso el centro inferior.
          anchor: new google.maps.Point(20, 60) 
         };
       
      var infowindow = new google.maps.InfoWindow();
      var marker, i;
      for (i = 0; i < marcadores.length; i++) {  


        var proveedor = marcadores[i][3];

        if (marcadores[i][0] == marcadores[i][3]) {

            var prov = proveedor.search("SWAM");
            var prov2 = proveedor.search("SAN");
            var prov3 = proveedor.search("LIZBETH ATEMPAN");
            var prov4 = proveedor.search("PATRICIA FRANCO ROSAS");

            if (prov == 0 && prov3 == -1 && prov4 == -1) {

              var imagen = swam;

            }else if (prov2 == 0) {

              var imagen = sfd;

            }else if(prov == 0 && prov3 == 23 && prov4 == -1){

              var imagen = flex;

            }else if(prov == 0 && prov4 == 17 && prov3 == -1){

              var imagen = flex;

            }
            else if (proveedor == "ALVAMEX") {

              var imagen = alvamex;

            }else if (proveedor == "AUTOSAYER") {

              var imagen = autosayer;

            }else if(proveedor == "AXALTA"){

              var imagen = axalta;

            }else if(proveedor == "G3"){

              var imagen = g3;

            }
            else if(proveedor == "IPESA"){

              var imagen = ipesa;

            }else if(proveedor == "MAX"){

              var imagen = max;

            }
            else if(proveedor == "PPG"){

              var imagen = ppg;

            }
            else if(proveedor == "ZHAIA"){

              var imagen = zhaia;

            }else{

              var imagen = cliente;

            }
        }else{

            var prov = proveedor.search("SWAM");
            var prov2 = proveedor.search("SAN");
            if (prov == 0 || prov2 == 0) {

                var imagen = cliente;

            }else{

                var imagen = cliente2;
            }
            
        }
      
        marker = new google.maps.Marker({
          position: new google.maps.LatLng(marcadores[i][1], marcadores[i][2]),
          map: map,
          icon : imagen
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

      if (localStorage.getItem("nombreProveedor") != "TODOS") {

      var proveedor = localStorage.getItem("nombreProveedor");
      var prov = proveedor.search("SWAM");
      var prov1 = proveedor.search("LIZBETH ATEMPAN");
      var prov2 = proveedor.search("PATRICIA FRANCO ROSAS");


      if (prov == 0 && prov1 == -1 && prov2 == -1) {

          var img = swam;

      }else if(prov == 0 && prov1 == 23 && prov2 == -1){

          var img = flex;

      }else if(prov == 0 && prov2 == 17 && prov1 == -1){

          var img = flex;

      }
      else if (proveedor == "ALVAMEX") {

        var img = alvamex;

      }else if (proveedor == "AUTOSAYER") {

        var img = autosayer;

      }else if(proveedor == "AXALTA"){

        var img = axalta;

      }else if(proveedor == "G3"){

        var img = g3;

      }
      else if(proveedor == "IPESA"){

        var img = ipesa;

      }else if(proveedor == "MAX"){

        var img = max;

      }
      else if(proveedor == "PPG"){

        var img = ppg;

      }
      else if(proveedor == "ZHAIA"){

        var img = zhaia;

      }else if (lat == 19.01222 || lat == 19.06285 || lat == 19.04162 || lat == 19.07213 || lat == 18.99255) {

            var img = sfd;
      }else{

        var img = otros;

      }
  
      marker = new google.maps.Marker({
          position: new google.maps.LatLng(lat, long),
          map: map,
          icon : img
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
      
    }
    google.maps.event.addDomListener(window, 'load', iniciarLocalizador);
</script>
