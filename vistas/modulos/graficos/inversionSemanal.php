<div class="card card-success">
  <div class="card-header">
    <h3 class="card-title">Inversión Semanal en PYC</h3>

    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
      </button>
      <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
    </div>
  </div>
  <div class="card-body">
    <div class="chart">
      <canvas id="inversion" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
    </div>
  </div>
  <!-- /.card-body -->
 </div>
<script type="text/javascript">
  var inversionCanvas = $('#inversion').get(0).getContext('2d')
    
  var  areaChartData = {
      labels  : [
             <?php
                     error_reporting(0);
                     require_once "controladores/encuestas.controlador.php";
                     require_once "modelos/encuestas.modelo.php";

                     $inversion = ControladorEncuestas::ctrMostrarInversionSemanal();
                     $arregloConcepto = array();
                     foreach ($inversion as $key => $value) {
                        $arregloConcepto[] = '"'.$value["concepto"].'"';
                     }
                     echo $arregloConcepto[0].','.$arregloConcepto[1].','.$arregloConcepto[2].','.$arregloConcepto[3].','.$arregloConcepto[4].','.$arregloConcepto[5];
                  ?>
      ],
      datasets: [
        {
          label               : 'Inversion',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [
                       <?php
                         error_reporting(0);
                         require_once "controladores/encuestas.controlador.php";
                         require_once "modelos/encuestas.modelo.php";

                         $inversion = ControladorEncuestas::ctrMostrarInversionSemanal();
                         $arregloCantidad = array();
                         foreach ($inversion as $key => $value) {
                            $arregloCantidad[] = '"'.$value["cantidad"].'"';
                         }
                         echo $arregloCantidad[0].','.$arregloCantidad[1].','.$arregloCantidad[2].','.$arregloCantidad[3].','.$arregloCantidad[4].','.$arregloCantidad[5];
                      ?>

                  ]
        },
        
      ]
    }
    var inversionData = jQuery.extend(true, {}, areaChartData)
    var temp0 = areaChartData.datasets[0]

    inversionData.datasets[0] = temp0


    var inversionOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    var inversion = new Chart(inversionCanvas, {
      type: 'bar', 
      data: inversionData,
      options: inversionOptions
    })
    
</script>