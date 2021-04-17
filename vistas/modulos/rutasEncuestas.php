<body>
   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" >
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Rutas Encuestadores</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
              <li class="breadcrumb-item active">Rutas</li>
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
              <h3 class="card-title">Rutas de Encuestadores</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                 <main role="main" class="container" style="display: none;">
                  <div class="row">
                      <!-- Aquí pon las col-x necesarias, comienza tu contenido, etcétera -->
                      <div class="col-12">
                          <br>
                          <br>
                          <strong>Latitud: </strong> <p id="latitud"></p>
                          <br>
                          <strong>Longitud: </strong> <p id="longitud"></p>
                          
                      </div>
                  </div>
                 
              </main>
              <div class="row">
                 <div id="mapa" class="col-lg-6 col-md-12 col-sm-12"></div>
            
                  <div id="datosMapa" class="col-lg-6 col-md-12 col-sm-12">
                    <div  id="map"  class="col-lg-12 col-md-12 col-sm-12"></div>

                    <div class="col-lg-12 col-md-12 col-sm-12">
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
      cargarCoordenadas();
    })
  function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
           zoom: 12,
        center: new google.maps.LatLng(19.011903,-98.205545),
        mapTypeId: google.maps.MapTypeId.ROADMAP
        });

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

        var latitudSucursal = localStorage.getItem("latitud");
        var longitudSucursal =localStorage.getItem("longitud");
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
    function initialize() {
      var marcadores = JSON.parse(localStorage.getItem("marcadoresMapa"));
      var map = new google.maps.Map(document.getElementById('mapa'), {
        zoom: 12,
        center: new google.maps.LatLng(19.011903,-98.205545),
        mapTypeId: google.maps.MapTypeId.ROADMAP
      });
      var infowindow = new google.maps.InfoWindow();
      var marker, i;
      for (i = 0; i < marcadores.length; i++) {  
        marker = new google.maps.Marker({
          position: new google.maps.LatLng(marcadores[i][1], marcadores[i][2]),
          map: map
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
    google.maps.event.addDomListener(window, 'load', initialize);
</script>

</body>