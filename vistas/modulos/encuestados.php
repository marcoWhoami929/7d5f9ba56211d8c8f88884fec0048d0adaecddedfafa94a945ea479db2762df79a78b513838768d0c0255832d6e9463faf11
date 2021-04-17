 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="width: 80%">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Lista de Encuestados</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
              <li class="breadcrumb-item active">Encuestados</li>
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
              <h3 class="card-title">Lista de Encuestados</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
             <table id="encuestados" class="table table-bordered table-striped table-responsive tablaEncuestados" width="100%">
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
<!-- Modal -->
<div class="modal fade" id="modalUbicacionTaller" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document" style="width: 80%">
    <div class="modal-content">
      <div class="modal-header" style="background: #17A2B8; color:white">
        
        <h5 class="modal-title" id="exampleModalLabel">UBICACIÓN TALLER</h5>
        <button type="button" class="close" id="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        
      </div>
      <div class="modal-body">
       
         <div class="input-group">
          <span class="input-group-addon" style="font-weight: bold; border:none;">Dirección:</span> 
          <input type="text" class="form-control input-lg" id="domicilioEncuestado" name="domicilioEncuestado" readonly style="border:none; background: white;">
        </div>
        <div id="datosMapaTaller">
          <div  id="mapaTaller" class="col-lg-12 col-md-12 col-sm-12"></div>

          <div class="col-lg-4 col-md-12 col-sm-12" style="display: none">
            <div class="box box-info collapsed-box">
              <div class="box-header with-border">
                <h4>Ver Indicaciones</h4>
                <p>Distancia Total: <span id="total"></span></p>
                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div>
                </div>
              <div class="box-body no-padding">
                <div id="right-panel-taller">
                </div>
              </div>
            </div>
          </div>

        </div>
        <br>
      
          <input type="hidden" class="form-control input-lg" id="latitudEncuestado" name="latitudEncuestado" readonly style="border: none;background: white;color:black">
          <input type="hidden" class="form-control input-lg" id="longitudEncuestado" name="longitudEncuestado" readonly style="border: none;background: white;color:black">
          
   


      </div>

     
      <div class="modal-footer">
        
        <button type="button" class="btn btn-info" id="salir" data-dismiss="modal">Salir</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  function initMap() {
        var map = new google.maps.Map(document.getElementById('mapaTaller'), {
           zoom: 12,
        center: new google.maps.LatLng(19.011903,-98.205545),
        mapTypeId: google.maps.MapTypeId.ROADMAP
        });

        var directionsService = new google.maps.DirectionsService;
        var directionsRenderer = new google.maps.DirectionsRenderer({
          draggable: true,
          map: map,
          panel: document.getElementById('right-panel-taller')
        });

        directionsRenderer.addListener('directions_changed', function() {
          computeTotalDistance(directionsRenderer.getDirections());


        });
        var latitudCliente = $("#latitudEncuestado").val();
        var longitudCliente = $("#longitudEncuestado").val();
        var direccionesCliente = ''+latitudCliente+','+longitudCliente+'';

        var latitudSucursal = '19.011903';
        var longitudSucursal = '-98.205545';
        var coordenadaSucursal = ''+latitudSucursal+','+longitudSucursal+'';

        displayRoute(''+coordenadaSucursal+'', ''+direccionesCliente+'', directionsService,
            directionsRenderer);
       
      }

      function displayRoute(origin, destination, service, display) {
        document.getElementById('right-panel-taller').innerHTML="";
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