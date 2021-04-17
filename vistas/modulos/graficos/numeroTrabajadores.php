<div class="card card-warning">
  <div class="card-header">
     <h3 class="card-title">N° Trabajadores</h3>

     <div class="card-tools">
       <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
      </button>
      <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
    </div>
   </div>
  <div class="card-body">
    <figure class="highcharts-figure">
        <div id="container" style="width:100%; height:250px;"></div>
    </figure>
  </div>
  <!-- /.card-body -->
</div>
<style type="text/css" media="screen">
.highcharts-figure, .highcharts-data-table table {
    min-width: 310px; 
    max-width: 800px;
    margin: 1em auto;
}

#container {
    height: 400px;
}

.highcharts-data-table table {
  font-family: Verdana, sans-serif;
  border-collapse: collapse;
  border: 1px solid #EBEBEB;
  margin: 10px auto;
  text-align: center;
  width: 100%;
  max-width: 500px;
}
.highcharts-data-table caption {
    padding: 1em 0;
    font-size: 1.2em;
    color: #555;
}
.highcharts-data-table th {
  font-weight: 600;
    padding: 0.5em;
}
.highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
    padding: 0.5em;
}
.highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {
    background: #f8f8f8;
}
.highcharts-data-table tr:hover {
    background: #f1f7ff;
}

</style>
<script type="text/javascript">
	 document.addEventListener('DOMContentLoaded', function () {
        Highcharts.chart('container', {
          chart: {
            type: 'bar'
          },
          title: {
            text: ''
          },
          xAxis: {
            categories: [


              <?php
                     error_reporting(0);
                     require_once "controladores/encuestas.controlador.php";
                     require_once "modelos/encuestas.modelo.php";

                     $noTrabajadores = ControladorEncuestas::ctrMostrarNumeroTrabajadores();
                     $arregloConcepto = array();
                     foreach ($noTrabajadores as $key => $value) {
                        $arregloConcepto[] = '"'.$value["concepto"].'"';
                     }
                    for ($i=0; $i < count($arregloConcepto); $i++) { 
                       echo $arregloConcepto[$i].',';
                    }
                    
                  ?>



            ]
          },
          yAxis: {
            min: 0,
            title: {
              text: 'N° de trabajadores'
            }
          },
          legend: {
            reversed: true
          },
          plotOptions: {
            series: {
              stacking: 'normal'
            }
          },
          series: [{
            name: 'N° trabajadores agrupados',
            data: [


                  <?php
                     error_reporting(0);
                     require_once "controladores/encuestas.controlador.php";
                     require_once "modelos/encuestas.modelo.php";

                     $noTrabajadores = ControladorEncuestas::ctrMostrarNumeroTrabajadores();
                     $arregloCantidad = array();
                     foreach ($noTrabajadores as $key => $value) {
                        $arregloCantidad[] = $value["cantidad"];
                     }
                    for ($i=0; $i < count($arregloCantidad); $i++) { 
                       echo $arregloCantidad[$i].',';
                    }
                    
                  ?>



                  ]
          }]
        });
    });
</script>