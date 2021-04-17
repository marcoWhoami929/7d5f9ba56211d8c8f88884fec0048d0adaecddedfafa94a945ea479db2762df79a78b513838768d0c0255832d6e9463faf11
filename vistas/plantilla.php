<?php
session_start();
error_reporting(0);

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>BLITZ</title>

  <link rel="icon" href="vistas/img/plantilla/icono.png">

   <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!--=====================================
  PLUGINS DE CSS
  ======================================-->
  <!-- Font Awesome -->
  <link rel="stylesheet" type="text/css" href="vistas/AdminLTE-3.0.4/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" type="text/css" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" type="text/css" href="vistas/AdminLTE-3.0.4/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" type="text/css" href="vistas/AdminLTE-3.0.4/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" type="text/css" href="vistas/AdminLTE-3.0.4/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" type="text/css" href="vistas/AdminLTE-3.0.4/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" type="text/css" href="vistas/AdminLTE-3.0.4/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" type="text/css" href="vistas/AdminLTE-3.0.4/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" type="text/css" href="vistas/AdminLTE-3.0.4/plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" type="text/css" rel="stylesheet">
  <!-- DataTables -->
  <link rel="stylesheet" type="text/css" href="vistas/AdminLTE-3.0.4/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" type="text/css" href="vistas/AdminLTE-3.0.4/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

  <!-- ESTILOS PLANTILLA -->
  <link rel="stylesheet" type="text/css" href="vistas/css/plantilla.css">



 
  <!--=====================================
  PLUGINS DE JAVASCRIPT
  ======================================-->
  <!-- jQuery -->
	<script src="vistas/AdminLTE-3.0.4/plugins/jquery/jquery.min.js"></script>
	<!-- jQuery UI 1.11.4 -->
	<script src="vistas/AdminLTE-3.0.4/plugins/jquery-ui/jquery-ui.min.js"></script>
	<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
	<script>
	  $.widget.bridge('uibutton', $.ui.button)
	</script>
	<!-- Bootstrap 4 -->
	<script src="vistas/AdminLTE-3.0.4/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- ChartJS -->
	<script src="vistas/AdminLTE-3.0.4/plugins/chart.js/Chart.min.js"></script>
	<!-- Sparkline -->
	<script src="vistas/AdminLTE-3.0.4/plugins/sparklines/sparkline.js"></script>
	<!-- JQVMap -->
	<script src="vistas/AdminLTE-3.0.4/plugins/jqvmap/jquery.vmap.min.js"></script>
	<script src="vistas/AdminLTE-3.0.4/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
	<!-- jQuery Knob Chart -->
	<script src="vistas/AdminLTE-3.0.4/plugins/jquery-knob/jquery.knob.min.js"></script>
	<!-- daterangepicker -->
	<script src="vistas/AdminLTE-3.0.4/plugins/moment/moment.min.js"></script>
	<script src="vistas/AdminLTE-3.0.4/plugins/daterangepicker/daterangepicker.js"></script>
	<!-- Tempusdominus Bootstrap 4 -->
	<script src="vistas/AdminLTE-3.0.4/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
	<!-- Summernote -->
	<script src="vistas/AdminLTE-3.0.4/plugins/summernote/summernote-bs4.min.js"></script>
	<!-- overlayScrollbars -->
	<script src="vistas/AdminLTE-3.0.4/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
	<!-- AdminLTE App -->
	<script src="vistas/AdminLTE-3.0.4/dist/js/adminlte.js"></script>
	<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
	<script src="vistas/AdminLTE-3.0.4/dist/js/pages/dashboard.js"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="vistas/AdminLTE-3.0.4/dist/js/demo.js"></script>

	<!-- SweetAlert 2 https://sweetalert2.github.io/-->
  	<script src="vistas/AdminLTE-3.0.4/plugins/sweetalert2/sweetalert2.all.js"></script>

  	<!-- DataTables -->
	<script src="vistas/AdminLTE-3.0.4/plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="vistas/AdminLTE-3.0.4/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
	<script src="vistas/AdminLTE-3.0.4/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
	<script src="vistas/AdminLTE-3.0.4/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <!-- HIGHCHARTS-->
  <script src = "https://code.highcharts.com/highcharts.js "></script>
  <script src="https://code.highcharts.com/modules/exporting.js"></script>
  <script src="https://code.highcharts.com/modules/export-data.js"></script>
  <script src="https://code.highcharts.com/modules/accessibility.js"></script>
  <script src="https://code.highcharts.com/highcharts-3d.js"></script>
  <script src="https://code.highcharts.com/modules/wordcloud.js"></script>  
		
</head>

<body class="hold-transition sidebar-mini layout-fixed login-page" style="background-image: url('vistas/img/plantilla/fondo.jpg');background-repeat: none;background-size: 100%;">
<?php

 if(isset($_SESSION["validarSesionBackend"]) && $_SESSION["validarSesionBackend"] === "ok"){

    echo '<div class="wrapper">';

    /*=============================================
     CABEZOTE
     =============================================*/

     include "modulos/cabezote.php";

    /*=============================================
     LATERAL
     =============================================*/

     include "modulos/lateral.php";

     /*=============================================
     CONTENIDO
     =============================================*/

     if(isset($_GET["ruta"])){

          if($_GET["ruta"] == "inicio" ||

          	   $_GET["ruta"] == "encuestadores" ||

          	   $_GET["ruta"] == "rutasEncuestas" ||

          	   $_GET["ruta"] == "encuestasPuebla" ||

          	   $_GET["ruta"] == "encuestasTlaxcala" ||

          	   $_GET["ruta"] == "encuestados" ||

               $_GET["ruta"] == "localizadorDistribuidores" ||

               $_GET["ruta"] == "localizadorProveedores" ||
                            
               $_GET["ruta"] == "salir"){


          include "modulos/".$_GET["ruta"].".php";

        }else{

          include "modulos/404.php";

        }

     }else{

       include "modulos/inicio.php";

     }

     /*=============================================
     FOOTER
     =============================================*/

     include "modulos/footer.php";


    echo '</div>';

 }else{

  include "modulos/login.php";

 }
 
?>


<!--=====================================
JS PERSONALIZADO
======================================-->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
<script src="vistas/js/plantilla.js"></script>
<!--=====================================
	GESTORES DE TABLAS
======================================-->
<script src="vistas/js/gestorEncuestas.js"></script>
</body>
</html>