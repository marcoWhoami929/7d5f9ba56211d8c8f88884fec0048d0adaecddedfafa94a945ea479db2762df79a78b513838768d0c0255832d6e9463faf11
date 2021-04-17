 <?php
error_reporting(E_ALL);
  require_once "controladores/encuestas.controlador.php";
  require_once "modelos/encuestas.modelo.php";

  $item = 'fecha';
  $valor = date('Y-m-d');
  $indicadores = ControladorEncuestas::ctrMostrarTotalesIndicadores($item,$valor);
  $total = $indicadores["encuestasPuebla"]+$indicadores["encuestasTlaxcala"];
  $porcentajePuebla = ($indicadores["encuestasPuebla"]/$total*100);
  $porcentajeTlaxcala = ($indicadores["encuestasTlaxcala"]/$total*100);
  $realizadasHoy = $indicadores["encuestasHoy"];
  $estadoMasEncuestado = $indicadores["masEncuestado"];

?>

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" >
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tablero</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active">Tablero</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo number_format($porcentajePuebla,2)?><sup style="font-size: 20px">%</sup></h3>

                <p>Encuestas puebla</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="encuestasPuebla" class="small-box-footer">Ver Encuestas <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo number_format($porcentajeTlaxcala,2)?><sup style="font-size: 20px">%</sup></h3>

                <p>Encuestas Tlaxcala</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="encuestasTlaxcala" class="small-box-footer">Ver Encuestas <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $realizadasHoy ?></h3>

                <p>Encuestas Realizadas Hoy</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $estadoMasEncuestado ?></h3>

                <p>Estado Mas Encuestado</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer"> <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-7 connectedSortable">
            <?php include("vistas/modulos/graficos/igualadosPorSemana.php") ?>
            <?php include("vistas/modulos/graficos/calidadIgualado.php") ?>
            <?php include("vistas/modulos/graficos/areaHyp.php") ?>
            <?php include("vistas/modulos/graficos/satisfaccionProveedor.php") ?>

            
          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-5 connectedSortable">
            <?php include("vistas/modulos/graficos/reparacionesPorMes.php") ?>
            <?php include("vistas/modulos/graficos/inversionSemanal.php") ?>
            <?php include("vistas/modulos/graficos/numeroTrabajadores.php") ?>
            <?php include("vistas/modulos/graficos/formaPago.php") ?>
            
            
          </section>
          <section class="col-lg-12 connectedSortable">
            
            <?php include("vistas/modulos/graficos/proveedorPinturas.php") ?>

          </section>
         
          <section class="col-lg-6 connectedSortable">
            
            <?php include("vistas/modulos/graficos/marcasBaseColor.php") ?>

          </section>
          <section class="col-lg-6 connectedSortable">
            
            <?php include("vistas/modulos/graficos/marcasEsmalte.php") ?>

          </section>
          <section class="col-lg-6 connectedSortable">
            
            <?php include("vistas/modulos/graficos/marcasTransparente.php") ?>
            <?php include("vistas/modulos/graficos/marcasLijas.php") ?>
   
          </section>
          <section class="col-lg-6 connectedSortable">
            
            <?php include("vistas/modulos/graficos/marcasPistolas.php") ?>
            <?php include("vistas/modulos/graficos/marcasMasking.php") ?>

          </section>
           <section class="col-lg-12 connectedSortable">
            
            <?php include("vistas/modulos/graficos/noEncuestados.php") ?>

          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->