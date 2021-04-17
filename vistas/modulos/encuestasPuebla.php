
   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="width: 80%" >
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Encuestas Puebla</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
              <li class="breadcrumb-item active">Puebla</li>
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
              <h3 class="card-title">Lista de encuestas Puebla</h3>
            </div>
            <!--
            <div class="row">
            <form action="importDatosEncuesta.php" method="post" enctype="multipart/form-data" id="import_form">
              <div class="col-md-4">
                <input type="file" name="file" />
              </div>
              <div class="col-md-2">
                <input type="submit" class="btn btn-success" name="import_data" value="IMPORTAR DATOS">
              </div>
            
            </form>
          </div>
        -->
            <!-- /.card-header -->
            <div class="card-body">
              <table id="encuestasPuebla" class="table table-bordered table-striped table-responsive tablaEncuestasPuebla" width="100%">
                <thead style="background: #17A2B8;color: white">
                <tr>
                  <th>Folio</th>
                  <th>Taller</th>
                  <th>Cliente</th>
                  <th>Fecha Encuesta</th>
                  <th>Reparaciones Por Mes</th>
                  <th>Igualados Por Semana</th>
                  <th>Calidad Igualado</th>
                  <th>Área Hyp</th>
                  <th>N° Trabajadores</th>
                  <th>Horario(L-V)</th>
                  <th>Horario(SAB)</th>
                  <th>Detalle</th>
                  <th>Encuestador</th>
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
<div class="modal fade" id="modalDetallesEncuesta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document" style="width: 80%">
    <div class="modal-content">
      <div class="modal-header" style="background: #17A2B8; color:white">
        
        <h5 class="modal-title" id="exampleModalLabel">DETALLE ENCUESTA</h5>
        <button type="button" class="close" id="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        
      </div>
      <div class="modal-body">
        <div class="input-group">
          <span class="input-group-addon" style="font-weight: bold; border:none;color: #2667ce">¿Satisfecho con el actual proveedor?:</span>
           
          <input type="text" class="form-control input-lg" id="satisfaccionProveedorP" name="satisfaccionProveedorP" readonly style="border:none; background: white;font-size:14px">
        </div>
        <div class="input-group">
          <span class="input-group-addon" style="font-weight: bold; border:none;color: #2667ce">¿Porqué?:</span>
           
          <input type="text" class="form-control input-lg" id="motivoP" name="motivoP" readonly style="border:none; background: white;font-size:14px">
        </div>
        <div class="input-group">
          <span class="input-group-addon" style="font-weight: bold; border:none;color: #2667ce">Proveedor de Pinturas y Complementos:</span>
           
          <input type="text" class="form-control input-lg" id="proveedorPinturasP" name="proveedorPinturasP" readonly style="border:none; background: white;font-size:14px">
        </div>
        <div class="input-group">
          <span class="input-group-addon" style="font-weight: bold; border:none;color: #2667ce">Domicilio / Referencia:</span>
           
          <input type="text" class="form-control input-lg" id="domicilioReferenciaP" name="domicilioReferenciaP" readonly style="border:none; background: white;font-size:14px">
        </div>
        <div class="input-group">
          <span class="input-group-addon" style="font-weight: bold; border:none;color: #2667ce">Forma Pago:</span>
           
          <input type="text" class="form-control input-lg" id="formaPagoP" name="formaPagoP" readonly style="border:none; background: white;font-size:14px">
        </div>
         <div class="input-group">
          <span class="input-group-addon" style="font-weight: bold; border:none;color: #17A2B8;font-size: 18px">¿Qué Marca de Pintura Utilizas?:</span>
        
        </div>
        <div class="input-group">
          <span class="input-group-addon" style="font-weight: bold; border:none;color: #2667ce">Línea de Base Color:</span>
          <input type="text" class="form-control input-lg" id="marcaBaseColorP" name="marcaBaseColorP" readonly style="border:none; background: white;font-size:14px">
        </div>
         <div class="input-group">
          <span class="input-group-addon" style="font-weight: bold; border:none;color: #2667ce">Esmalte:</span>
          <input type="text" class="form-control input-lg" id="marcaEsmalteP" name="marcaEsmalteP" readonly style="border:none; background: white;font-size:14px">
        </div>
         <div class="input-group">
          <span class="input-group-addon" style="font-weight: bold; border:none;color: #2667ce">Transparente:</span>
          <input type="text" class="form-control input-lg" id="marcaTransparenteP" name="marcaTransparenteP" readonly style="border:none; background: white;font-size:14px">
        </div>
         <div class="input-group">
          <span class="input-group-addon" style="font-weight: bold; border:none;color: #2667ce">Pistolas:</span>
          <input type="text" class="form-control input-lg" id="marcaPistolasP" name="marcaPistolasP" readonly style="border:none; background: white;font-size:14px">
        </div>
        <div class="input-group">
          <span class="input-group-addon" style="font-weight: bold; border:none;color: #2667ce">Lijas:</span>
          <input type="text" class="form-control input-lg" id="marcaLijasP" name="marcaLijasP" readonly style="border:none; background: white;font-size:14px">
        </div>
        <div class="input-group">
          <span class="input-group-addon" style="font-weight: bold; border:none;color: #2667ce">Masking:</span>
          <input type="text" class="form-control input-lg" id="marcaMaskingP" name="marcaMaskingP" readonly style="border:none; background: white;font-size:14px">
        </div>
        <div class="input-group">
          <span class="input-group-addon" style="font-weight: bold; border:none;color: #2667ce;">¿Cuánto Inviertes Semanalmente en PYC?:</span>
          <input type="text" class="form-control input-lg" id="inversionP" name="inversionP" readonly style="border:none; background: white;font-size:14px">
        
        </div>
        <div class="input-group">
          <span class="input-group-addon" style="font-weight: bold; border:none;color: #2667ce;">¿Qué productos le falta incluir a tu actual proveedor en su catálogo?:</span>
          <input type="text" class="form-control input-lg" id="productosFaltantesP" name="productosFaltantesP" readonly style="border:none; background: white;font-size:14px">
        
        </div>
        <div class="input-group">
          <span class="input-group-addon" style="font-weight: bold; border:none;color: #2667ce;">¿Qué le hace falta a tu actual proveedor para mejorar?:</span>
          <input type="text" class="form-control input-lg" id="faltaMejorarP" name="faltaMejorarP" readonly style="border:none; background: white;font-size:14px">
        
        </div>


      </div>

      <div class="modal-footer">
        
        <button type="button" class="btn btn-info" id="salir" data-dismiss="modal">Salir</button>
      </div>
    </div>
  </div>
</div>