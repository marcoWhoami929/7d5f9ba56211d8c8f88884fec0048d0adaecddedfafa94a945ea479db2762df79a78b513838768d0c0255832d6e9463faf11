 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="width: 80%" >
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Encuestas Tlaxcala</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
              <li class="breadcrumb-item active">Tlaxcala</li>
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
              <h3 class="card-title">Lista de encuestas Tlaxcala</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="encuestasTlaxcala" class="table table-bordered table-striped table-responsive tablaEncuestasTlaxcala" width="100%">
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
           
          <input type="text" class="form-control input-lg" id="satisfaccionProveedorT" name="satisfaccionProveedorT" readonly style="border:none; background: white;font-size:14px">
        </div>
        <div class="input-group">
          <span class="input-group-addon" style="font-weight: bold; border:none;color: #2667ce">¿Porqué?:</span>
           
          <input type="text" class="form-control input-lg" id="motivoT" name="motivoT" readonly style="border:none; background: white;font-size:14px">
        </div>
        <div class="input-group">
          <span class="input-group-addon" style="font-weight: bold; border:none;color: #2667ce">Proveedor de Pinturas y Complementos:</span>
           
          <input type="text" class="form-control input-lg" id="proveedorPinturasT" name="proveedorPinturasT" readonly style="border:none; background: white;font-size:14px">
        </div>
        <div class="input-group">
          <span class="input-group-addon" style="font-weight: bold; border:none;color: #2667ce">Domicilio / Referencia:</span>
           
          <input type="text" class="form-control input-lg" id="domicilioReferenciaT" name="domicilioReferenciaT" readonly style="border:none; background: white;font-size:14px">
        </div>
        <div class="input-group">
          <span class="input-group-addon" style="font-weight: bold; border:none;color: #2667ce">Forma Pago:</span>
           
          <input type="text" class="form-control input-lg" id="formaPagoT" name="formaPagoT" readonly style="border:none; background: white;font-size:14px">
        </div>
         <div class="input-group">
          <span class="input-group-addon" style="font-weight: bold; border:none;color: #17A2B8;font-size: 18px">¿Qué Marca de Pintura Utilizas?:</span>
        
        </div>
        <div class="input-group">
          <span class="input-group-addon" style="font-weight: bold; border:none;color: #2667ce">Línea de Base Color:</span>
          <input type="text" class="form-control input-lg" id="marcaBaseColorT" name="marcaBaseColorT" readonly style="border:none; background: white;font-size:14px">
        </div>
         <div class="input-group">
          <span class="input-group-addon" style="font-weight: bold; border:none;color: #2667ce">Esmalte:</span>
          <input type="text" class="form-control input-lg" id="marcaEsmalteT" name="marcaEsmalteT" readonly style="border:none; background: white;font-size:14px">
        </div>
         <div class="input-group">
          <span class="input-group-addon" style="font-weight: bold; border:none;color: #2667ce">Transparente:</span>
          <input type="text" class="form-control input-lg" id="marcaTransparenteT" name="marcaTransparenteT" readonly style="border:none; background: white;font-size:14px">
        </div>
         <div class="input-group">
          <span class="input-group-addon" style="font-weight: bold; border:none;color: #2667ce">Pistolas:</span>
          <input type="text" class="form-control input-lg" id="marcaPistolasT" name="marcaPistolasT" readonly style="border:none; background: white;font-size:14px">
        </div>
        <div class="input-group">
          <span class="input-group-addon" style="font-weight: bold; border:none;color: #2667ce">Lijas:</span>
          <input type="text" class="form-control input-lg" id="marcaLijasT" name="marcaLijasT" readonly style="border:none; background: white;font-size:14px">
        </div>
        <div class="input-group">
          <span class="input-group-addon" style="font-weight: bold; border:none;color: #2667ce">Masking:</span>
          <input type="text" class="form-control input-lg" id="marcaMaskingT" name="marcaMaskingT" readonly style="border:none; background: white;font-size:14px">
        </div>
        <div class="input-group">
          <span class="input-group-addon" style="font-weight: bold; border:none;color: #2667ce;">¿Cuánto Inviertes Semanalmente en PYC?:</span>
          <input type="text" class="form-control input-lg" id="inversionT" name="inversionT" readonly style="border:none; background: white;font-size:14px">
        
        </div>
        <div class="input-group">
          <span class="input-group-addon" style="font-weight: bold; border:none;color: #2667ce;">¿Qué productos le falta incluir a tu actual proveedor en su catálogo?:</span>
          <input type="text" class="form-control input-lg" id="productosFaltantesT" name="productosFaltantesT" readonly style="border:none; background: white;font-size:14px">
        
        </div>
        <div class="input-group">
          <span class="input-group-addon" style="font-weight: bold; border:none;color: #2667ce;">¿Qué le hace falta a tu actual proveedor para mejorar?:</span>
          <input type="text" class="form-control input-lg" id="faltaMejorarT" name="faltaMejorarT" readonly style="border:none; background: white;font-size:14px">
        
        </div>




      </div>

      <div class="modal-footer">
        
        <button type="button" class="btn btn-info" id="salir" data-dismiss="modal">Salir</button>
      </div>
    </div>
  </div>
</div>