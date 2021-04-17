<?php
error_reporting(0);
  require_once "controladores/encuestas.controlador.php";
  require_once "modelos/encuestas.modelo.php";

  $indicadores = ControladorEncuestas::ctrMostrarIndicadoresEncuestas();
  $encuestasPuebla = $indicadores["encuestasPuebla"];
  $encuestasTlaxcala = $indicadores["encuestasTlaxcala"];
?>

<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="inicio" class="brand-link">
      <img src="vistas/img/plantilla/LOGO SDF blanco.png"  class=" elevation-3" style="opacity: 1;width: 100%">
      
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="vistas/img/plantilla/icono.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Marco López</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
     
          <li class="nav-item">
            <a href="encuestasPuebla" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Puebla
                <span class="right badge badge-success"><?php  echo $encuestasPuebla?></span>
              </p>
            </a>
          </li>
           <li class="nav-item">
            <a href="encuestasTlaxcala" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Tlaxcala
                <span class="right badge badge-warning"><?php  echo $encuestasTlaxcala?></span>
              </p>
            </a>
          </li>
           <li class="nav-item">
            <a href="encuestadores" class="nav-link">
              <i class="fas fa-users"></i>
              <p>
                Encuestadores
                <span class="right badge badge-info">4</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="rutasEncuestas" class="nav-link" id="btnLocalizarEncuestados">
              <i class="fas fa-map-marked-alt"></i>
              <p>
                Rutas
               
              </p>
            </a>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="fas fa-file-excel"></i>
              <p>
                Reportes
                <i class="fas fa-angle-left right"></i>
               
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="vistas/modulos/reportes.php?reporte=encuesta&estado=PUEBLA" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Reporte Puebla</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="vistas/modulos/reportes.php?reporte=encuesta&estado=TLAXCALA" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Reporte Tlaxcala</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="vistas/modulos/reportes.php?reporteEncuestados=encuesta" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Reporte Encuestados</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="vistas/modulos/reportes.php?reporteNoEncuestados=encuesta" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Reporte No Encuestados</p>
                </a>
              </li>

        
      
            </ul>
            
          </li>
          <li class="nav-item">
              <a href="localizadorDistribuidores" class="nav-link" id="btnLocalizarDistribuidores">
               <i class="fas fa-search-location"></i>
                <p>
                  Localizador
                 
                </p>
              </a>
          </li>
           <li class="nav-item">
              <a href="localizadorProveedores" class="nav-link" id="btnLocalizarProveedores">
               <i class="fas fa-search-location"></i>
                <p>
                  Localizador Proveedores
                 
                </p>
              </a>
          </li>
        
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>