 <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="position: fixed;">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="inicio" class="nav-link">Tablero</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="encuestados" class="nav-link">Encuestados</a>
      </li>
     
    </ul>
     <ul class="navbar-nav ml-auto">
      <div id="notificaciones">
      
    </div>
    <li class="nav-item d-none d-sm-inline-block">
        <a href="salir" class="nav-link"><button type="button" class="btn btn-danger"><i class="fas fa-sign-out-alt"></i></button></a>
      </li>
     </ul>
    
  </nav>
  <!-- /.navbar -->
  <script type="text/javascript">
     function actualiza(){
                    $("#notificaciones").load("vistas/modulos/inicio/notificaciones.php");
                  }
                  setInterval( "actualiza()", 10000);

  </script>