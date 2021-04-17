<div class="card card-warning">
  <div class="card-header">
     <h3 class="card-title">Marcas Pistolas</h3>

     <div class="card-tools">
       <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
      </button>
      <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
    </div>
   </div>
  <div class="card-body">
    <figure class="highcharts-figure">
        <div id="pistolas" style="width:100%; height:350px;"></div>
    </figure>
  </div>
  <!-- /.card-body -->
</div>
<style type="text/css" media="screen">
#pistolas {
  height: 400px; 
}

.highcharts-figure, .highcharts-data-table table {
  min-width: 310px; 
  max-width: 800px;
  margin: 1em auto;
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
        Highcharts.setOptions({
            colors: ['#058DC7', '#50B432', '#ED561B', '#DDDF00', '#24CBE5', '#64E572', '#FF9655', '#FFF263', '#6AF9C4','#AFEEEE','#FF9966','#3399FF','#33CC66','#6666CC','#CC6633','#993333',' #006600','#CC0033']
        });
        Highcharts.chart('pistolas', {
            chart: {
                type: 'pie',
                options3d: {
                    enabled: true,
                    alpha: 45,
                    beta: 0
                }
            },
            title: {
                text: ''
            },
            accessibility: {
                point: {
                    valueSuffix: '%'
                }
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    depth: 35,
                    dataLabels: {
                        enabled: true,
                        format: '{point.y}'+'->'+'{point.name}'
                    }
                }
            },
            series: [{
                type: 'pie',
                name: '',
                data: [
                  

                  <?php
                     error_reporting(0);
                     require_once "controladores/encuestas.controlador.php";
                     require_once "modelos/encuestas.modelo.php";

                     $item = 'marcaPistolas';
                     $valor = '';
                     $pistolas = ControladorEncuestas::ctrMostrarMarcas2($item,$valor);
                      $arregloMarcas = array();
                      $arregloNombreMarcas = array();
                     
                      for ($i=0; $i <count($pistolas) ; $i++) {

                        $arregloMarcas[] =  $pistolas[$i][0].",";

                      }

                      $arregloMarcasFinal = implode(',',$arregloMarcas);

                      $arregloFinal = str_replace(',,',',',$arregloMarcasFinal);

                      $arregloFinal = explode(',',$arregloFinal);

                      $arregloFinal = array_count_values($arregloFinal);

                      foreach ($arregloFinal as $key => $value) {
                        if ($key == "") {

                        }else{

                            $arregloNombreMarcas[] = "'".$key."'".','.$value;

                        }
                        

                      }
                      for ($i=0; $i < count($arregloNombreMarcas); $i++) { 
                                 print_r('['.$arregloNombreMarcas[$i].']'.',');
                      }
               
                    
                  ?>
                ]
            }]
        });
    });
</script>