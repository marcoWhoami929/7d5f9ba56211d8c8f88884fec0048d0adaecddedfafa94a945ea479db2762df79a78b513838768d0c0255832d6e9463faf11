/* TABLA DE ENCUESTAS PUEBLA */

 $("#encuestasPuebla").DataTable({
   "ajax":"ajax/tablaEncuestasPuebla.ajax.php",
   "paging": true,
   "lengthChange": true,
   "searching": true,
   "ordering": true,
   "info": true,
   "autoWidth": true,
   "responsive": true,
   "deferRender": true,
   "retrieve": true,
   "processing": true,
   "fixedHeader": true,
    "iDisplayLength": 10,
    "order": [[ 0, "desc" ]],
    /*"scrollX": true,*/
     "lengthMenu": [[10, 25, 50, 100, 150,200, 300, -1], [10, 25, 50, 100, 150,200, 300, "All"]],
   "language": {

    "sProcessing":     "Procesando...",
    "sLengthMenu":     "Mostrar _MENU_ registros",
    "sZeroRecords":    "No se encontraron resultados",
    "sEmptyTable":     "Ningún dato disponible en esta tabla",
    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
    "sInfoPostFix":    "",
    "sSearch":         "Buscar:",
    "sUrl":            "",
    "sInfoThousands":  ",",
    "sLoadingRecords": "Cargando...",
    "oPaginate": {
      "sFirst":    "Primero",
      "sLast":     "Último",
      "sNext":     "Siguiente",
      "sPrevious": "Anterior"
    },
    "oAria": {
        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    }

   }

});
/* TABLA DE ENCUESTAS TLAXCALA */

$("#encuestasTlaxcala").DataTable({
   "ajax":"ajax/tablaEncuestasTlaxcala.ajax.php",
   "paging": true,
   "lengthChange": true,
   "searching": true,
   "ordering": true,
   "info": true,
   "autoWidth": true,
   "responsive": true,
   "deferRender": true,
   "retrieve": true,
   "processing": true,
   "fixedHeader": true,
    "iDisplayLength": 10,
    "order": [[ 0, "desc" ]],
    /*"scrollX": true,*/
     "lengthMenu": [[10, 25, 50, 100, 150,200, 300, -1], [10, 25, 50, 100, 150,200, 300, "All"]],
   "language": {

    "sProcessing":     "Procesando...",
    "sLengthMenu":     "Mostrar _MENU_ registros",
    "sZeroRecords":    "No se encontraron resultados",
    "sEmptyTable":     "Ningún dato disponible en esta tabla",
    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
    "sInfoPostFix":    "",
    "sSearch":         "Buscar:",
    "sUrl":            "",
    "sInfoThousands":  ",",
    "sLoadingRecords": "Cargando...",
    "oPaginate": {
      "sFirst":    "Primero",
      "sLast":     "Último",
      "sNext":     "Siguiente",
      "sPrevious": "Anterior"
    },
    "oAria": {
        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    }

   }

});
/* TABLA DE ENCUESTADORES */

$("#encuestadores").DataTable({
   "ajax":"ajax/tablaEncuestadores.ajax.php",
   "paging": true,
   "lengthChange": true,
   "searching": true,
   "ordering": true,
   "info": true,
   "autoWidth": true,
   "responsive": true,
   "deferRender": true,
   "retrieve": true,
   "processing": true,
   "fixedHeader": true,
    "iDisplayLength": 10,
    "order": [[ 0, "asc" ]],
    /*"scrollX": true,*/
     "lengthMenu": [[10, 25, 50, 100, 150,200, 300, -1], [10, 25, 50, 100, 150,200, 300, "All"]],
   "language": {

    "sProcessing":     "Procesando...",
    "sLengthMenu":     "Mostrar _MENU_ registros",
    "sZeroRecords":    "No se encontraron resultados",
    "sEmptyTable":     "Ningún dato disponible en esta tabla",
    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
    "sInfoPostFix":    "",
    "sSearch":         "Buscar:",
    "sUrl":            "",
    "sInfoThousands":  ",",
    "sLoadingRecords": "Cargando...",
    "oPaginate": {
      "sFirst":    "Primero",
      "sLast":     "Último",
      "sNext":     "Siguiente",
      "sPrevious": "Anterior"
    },
    "oAria": {
        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    }

   }

});
/* TABLA DE ENCUESTADOS */
$("#encuestados").DataTable({
   "ajax":"ajax/tablaEncuestados.ajax.php",
   "paging": true,
   "lengthChange": true,
   "searching": true,
   "ordering": true,
   "info": true,
   "autoWidth": true,
   "responsive": true,
   "deferRender": true,
   "retrieve": true,
   "processing": true,
   "fixedHeader": true,
    "iDisplayLength": 10,
    "order": [[ 0, "asc" ]],
    /*"scrollX": true,*/
     "lengthMenu": [[10, 25, 50, 100, 150,200, 300, -1], [10, 25, 50, 100, 150,200, 300, "All"]],
   "language": {

    "sProcessing":     "Procesando...",
    "sLengthMenu":     "Mostrar _MENU_ registros",
    "sZeroRecords":    "No se encontraron resultados",
    "sEmptyTable":     "Ningún dato disponible en esta tabla",
    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
    "sInfoPostFix":    "",
    "sSearch":         "Buscar:",
    "sUrl":            "",
    "sInfoThousands":  ",",
    "sLoadingRecords": "Cargando...",
    "oPaginate": {
      "sFirst":    "Primero",
      "sLast":     "Último",
      "sNext":     "Siguiente",
      "sPrevious": "Anterior"
    },
    "oAria": {
        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    }

   }

});
$("#encuestados").on("click", ".btnVerUbicacionTaller", function() {
    var idEncuesta = $(this).attr("idEncuesta");
    var datos =  new FormData();

    datos.append('idEncuesta', idEncuesta);
    $.ajax({
        url: "ajax/encuestas.ajax.php",
        method: "POST",
        data: datos,
        dataType: "json",
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta) {
            $("#domicilioEncuestado").val(respuesta["domicilio"]);
            $("#latitudEncuestado").val(respuesta["latitud"]);
            $("#longitudEncuestado").val(respuesta["longitud"]);
            initMap();
        }
    })
});
$("#encuestasTlaxcala").on("click", ".btnDetallesEncuestaTlaxcala", function() {
    var idEncuesta = $(this).attr("idEncuesta");
    var datos =  new FormData();

    datos.append('idEncuestaDetalle', idEncuesta);
    $.ajax({
        url: "ajax/encuestas.ajax.php",
        method: "POST",
        data: datos,
        dataType: "json",
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta) {
            
            $("#satisfaccionProveedorT").val(respuesta["satisfaccionProveedor"]);
            $("#motivoT").val(respuesta["motivo"]);
            $("#proveedorPinturasT").val(respuesta["proveedorPinturas"]);
            $("#domicilioReferenciaT").val(respuesta["domicilioReferencia"]);
            $("#formaPagoT").val(respuesta["formaPago"]);
            $("#marcaBaseColorT").val(respuesta["marcaBaseColor"]);
            $("#marcaEsmalteT").val(respuesta["marcaEsmalte"]);
            $("#marcaTransparenteT").val(respuesta["marcaTransparente"]);
            $("#marcaPistolasT").val(respuesta["marcaPistolas"]);
            $("#marcaLijasT").val(respuesta["marcaLijas"]);
            $("#marcaMaskingT").val(respuesta["marcaMasking"]);
            var cadena = respuesta["inversion"];

            if(cadena.indexOf('+') != -1){
               $("#inversionT").val(cadena.replace("+","Mas de "));
            }else{
               $("#inversionT").val("$ "+respuesta["inversion"]);
            }
            
         
            $("#productosFaltantesT").val(respuesta["productosFaltantes"]);
            $("#faltaMejorarT").val(respuesta["faltaMejorar"]);
        }
    })
});
$("#encuestasPuebla").on("click", ".btnDetallesEncuestaPuebla", function() {
    var idEncuesta = $(this).attr("idEncuesta");
    var datos =  new FormData();

    datos.append('idEncuestaDetalle', idEncuesta);
    $.ajax({
        url: "ajax/encuestas.ajax.php",
        method: "POST",
        data: datos,
        dataType: "json",
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta) {
            
            $("#satisfaccionProveedorP").val(respuesta["satisfaccionProveedor"]);
            $("#motivoP").val(respuesta["motivo"]);
            $("#proveedorPinturasP").val(respuesta["proveedorPinturas"]);
            $("#domicilioReferenciaP").val(respuesta["domicilioReferencia"]);
            $("#formaPagoP").val(respuesta["formaPago"]);
            $("#marcaBaseColorP").val(respuesta["marcaBaseColor"]);
            $("#marcaEsmalteP").val(respuesta["marcaEsmalte"]);
            $("#marcaTransparenteP").val(respuesta["marcaTransparente"]);
            $("#marcaPistolasP").val(respuesta["marcaPistolas"]);
            $("#marcaLijasP").val(respuesta["marcaLijas"]);
            $("#marcaMaskingP").val(respuesta["marcaMasking"]);
            var cadena = respuesta["inversion"];

            if(cadena.indexOf('+') != -1){
               $("#inversionP").val(cadena.replace("+","Mas de "));
            }else{
               $("#inversionP").val("$ "+respuesta["inversion"]);
            }
            
         
            $("#productosFaltantesP").val(respuesta["productosFaltantes"]);
            $("#faltaMejorarP").val(respuesta["faltaMejorar"]);
      

        }
    })
});
function cargarCoordenadas(){

    var identificador = 1;
    var datos = new FormData();
    var array = [];

    datos.append('identificador', identificador);
    $.ajax({
        url: "ajax/encuestas.ajax.php",
        method: "POST",
        data: datos,
        dataType: "json",
        cache: false,
        contentType: false,
        processData: false,

        success: function(respuesta) {
          for (var i = 0; i < respuesta.length; i++) {
                array.push([respuesta[i]["taller"],respuesta[i]["latitud"],respuesta[i]["longitud"]]);
          }
          //localStorage.setItem('marcadoresMapa', JSON.stringify(respuesta));
          localStorage.setItem('marcadoresMapa', JSON.stringify(array));


        }
    })


}
setInterval( "cargarCoordenadas()", 10000);
//setInterval( "initialize()", 10000);

/*=====================================================
=            LOCALIZADOR DE DISTRIBUIDORES            =
=====================================================*/
$(document).ready(function(){
  var lat = localStorage.getItem("latitudDistribuidor");
  var long = localStorage.getItem("longitudDistribuidor");

  
  tablaLocalizador = $(".tablaLocalizadorDistribuidores").DataTable({
                   "ajax":"ajax/tablaLocalizadorDistribuidores.ajax.php?latitudDistribuidor="+lat+"&longitudDistribuidor="+long,
                   "paging": true,
                   "lengthChange": true,
                   "searching": true,
                   "ordering": true,
                   "info": true,
                   "autoWidth": true,
                   "responsive": true,
                   "deferRender": true,
                   "retrieve": true,
                   "processing": true,
                   "fixedHeader": true,
                    "iDisplayLength": 10,
                    "order": [[ 0, "asc" ]],
                    /*"scrollX": true,*/
                     "lengthMenu": [[10, 25, 50, 100, 150,200, 300, -1], [10, 25, 50, 100, 150,200, 300, "All"]],
                   "language": {

                    "sProcessing":     "Procesando...",
                    "sLengthMenu":     "Mostrar _MENU_ registros",
                    "sZeroRecords":    "No se encontraron resultados",
                    "sEmptyTable":     "Ningún dato disponible en esta tabla",
                    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
                    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
                    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix":    "",
                    "sSearch":         "Buscar:",
                    "sUrl":            "",
                    "sInfoThousands":  ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                      "sFirst":    "Primero",
                      "sLast":     "Último",
                      "sNext":     "Siguiente",
                      "sPrevious": "Anterior"
                    },
                    "oAria": {
                        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    }

                   }

                });
})

function cargarDatos(lat,long){

      var lat = lat;
      var long = long;

      tablaLocalizador = $(".tablaLocalizadorDistribuidores").DataTable({
                   "ajax":"ajax/tablaLocalizadorDistribuidores.ajax.php?latitudDistribuidor="+lat+"&longitudDistribuidor="+long,
                   "paging": true,
                   "lengthChange": true,
                   "searching": true,
                   "ordering": true,
                   "info": true,
                   "autoWidth": true,
                   "responsive": true,
                   "deferRender": true,
                   "retrieve": true,
                   "processing": true,
                   "fixedHeader": true,
                    "iDisplayLength": 10,
                    "order": [[ 0, "asc" ]],
                    /*"scrollX": true,*/
                     "lengthMenu": [[10, 25, 50, 100, 150,200, 300, -1], [10, 25, 50, 100, 150,200, 300, "All"]],
                   "language": {

                    "sProcessing":     "Procesando...",
                    "sLengthMenu":     "Mostrar _MENU_ registros",
                    "sZeroRecords":    "No se encontraron resultados",
                    "sEmptyTable":     "Ningún dato disponible en esta tabla",
                    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
                    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
                    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix":    "",
                    "sSearch":         "Buscar:",
                    "sUrl":            "",
                    "sInfoThousands":  ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                      "sFirst":    "Primero",
                      "sLast":     "Último",
                      "sNext":     "Siguiente",
                      "sPrevious": "Anterior"
                    },
                    "oAria": {
                        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    }

                   }

                });
          }

$("#elegirDistribuidor").change(function(){
      var distribuidor = $("#elegirDistribuidor").val();
      var nombreDistribuidor = $("#elegirDistribuidor option:selected").text();

      var elemento = $(this).find('option:selected'); 
      
      var latitud = elemento.attr("lat"); 
      var longitud = elemento.attr("lng");

      localStorage.setItem("distribuidor", distribuidor);
      localStorage.setItem("latitudDistribuidor",latitud);
      localStorage.setItem("longitudDistribuidor",longitud);
      localStorage.setItem("nombreDistribuidor",nombreDistribuidor);

      $(".tablaLocalizadorDistribuidores").dataTable().fnDestroy();
      cargarDatos(latitud,longitud);

      var lat = localStorage.getItem("latitudDistribuidor");
      var lng = localStorage.getItem("longitudDistribuidor");

      cargarCoordenadasLocalizador(lat,lng);

      
     
});

function cargarCoordenadasLocalizador(lat,lng){

    var identificador = 2;

    if (lat === undefined) {

        var latitudDistribuidor = localStorage.getItem("latitudDistribuidor");
        var longitudDistribuidor = localStorage.getItem("longitudDistribuidor");
    }else{

        var latitudDistribuidor = lat;
        var longitudDistribuidor = lng;

    }
 

    var datos = new FormData();
    var array = [];

    if (latitudDistribuidor === undefined) {

          datos.append('identificadorLocalizador', identificador);
          datos.append('latitud',0);
          datos.append('longitud',0);

    }else{

          datos.append('identificadorLocalizador', identificador);
          datos.append('latitud',latitudDistribuidor);
          datos.append('longitud',longitudDistribuidor);

    }

 

    $.ajax({
        url: "ajax/encuestas.ajax.php",
        method: "POST",
        data: datos,
        dataType: "json",
        cache: false,
        contentType: false,
        processData: false,

        success: function(respuesta) {
          for (var i = 0; i < respuesta.length; i++) {
                array.push([respuesta[i]["taller"],respuesta[i]["latitud"],respuesta[i]["longitud"]]);
          }
          //localStorage.setItem('marcadoresMapa', JSON.stringify(respuesta));
          localStorage.setItem('marcadoresMapaDistribuidores', JSON.stringify(array));
          iniciarLocalizador();


        }
    })


}
//setInterval( "cargarCoordenadasLocalizador()", 10000);
/*=====  End of LOCALIZADOR DE DISTRIBUIDORES  ======*/
/*=====================================================
=            LOCALIZADOR DE PROVEEDORES            =
=====================================================*/
$(document).ready(function(){
  var lat = localStorage.getItem("latitudProveedor");
  var long = localStorage.getItem("longitudProveedor");
  var nombreProveedor = localStorage.getItem("nombreProveedor");

  
  tablaLocalizador = $(".tablaLocalizadorProveedores").DataTable({
                   "ajax":"ajax/tablaLocalizadorProveedores.ajax.php?latitudProveedor="+lat+"&longitudProveedor="+long+"&nombreProveedor="+nombreProveedor,
                   "paging": true,
                   "lengthChange": true,
                   "searching": true,
                   "ordering": true,
                   "info": true,
                   "autoWidth": true,
                   "responsive": true,
                   "deferRender": true,
                   "retrieve": true,
                   "processing": true,
                   "fixedHeader": true,
                    "iDisplayLength": 10,
                    "order": [[ 0, "asc" ]],
                    /*"scrollX": true,*/
                     "lengthMenu": [[10, 25, 50, 100, 150,200, 300, -1], [10, 25, 50, 100, 150,200, 300, "All"]],
                   "language": {

                    "sProcessing":     "Procesando...",
                    "sLengthMenu":     "Mostrar _MENU_ registros",
                    "sZeroRecords":    "No se encontraron resultados",
                    "sEmptyTable":     "Ningún dato disponible en esta tabla",
                    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
                    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
                    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix":    "",
                    "sSearch":         "Buscar:",
                    "sUrl":            "",
                    "sInfoThousands":  ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                      "sFirst":    "Primero",
                      "sLast":     "Último",
                      "sNext":     "Siguiente",
                      "sPrevious": "Anterior"
                    },
                    "oAria": {
                        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    }

                   }

                });
})

function cargarDatosProveedores(lat,long,nombreProveedor){

      var lat = lat;
      var long = long;
      var nombreProveedor = nombreProveedor;

      tablaLocalizador = $(".tablaLocalizadorProveedores").DataTable({
                   "ajax":"ajax/tablaLocalizadorProveedores.ajax.php?latitudProveedor="+lat+"&longitudProveedor="+long+"&nombreProveedor="+nombreProveedor,
                   "paging": true,
                   "lengthChange": true,
                   "searching": true,
                   "ordering": true,
                   "info": true,
                   "autoWidth": true,
                   "responsive": true,
                   "deferRender": true,
                   "retrieve": true,
                   "processing": true,
                   "fixedHeader": true,
                    "iDisplayLength": 10,
                    "order": [[ 0, "asc" ]],
                    /*"scrollX": true,*/
                     "lengthMenu": [[10, 25, 50, 100, 150,200, 300, -1], [10, 25, 50, 100, 150,200, 300, "All"]],
                   "language": {

                    "sProcessing":     "Procesando...",
                    "sLengthMenu":     "Mostrar _MENU_ registros",
                    "sZeroRecords":    "No se encontraron resultados",
                    "sEmptyTable":     "Ningún dato disponible en esta tabla",
                    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
                    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
                    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix":    "",
                    "sSearch":         "Buscar:",
                    "sUrl":            "",
                    "sInfoThousands":  ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                      "sFirst":    "Primero",
                      "sLast":     "Último",
                      "sNext":     "Siguiente",
                      "sPrevious": "Anterior"
                    },
                    "oAria": {
                        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    }

                   }

                });
          }

$("#elegirProveedor").change(function(){
      var proveedor = $("#elegirProveedor").val();
      var nombreProveedor = $("#elegirProveedor option:selected").text();

      var elemento = $(this).find('option:selected'); 
      var latitud = elemento.attr("lat"); 
      var longitud = elemento.attr("lng");

      localStorage.setItem("proveedor", proveedor);
      localStorage.setItem("nombreProveedor", nombreProveedor);
      localStorage.setItem("latitudProveedor",latitud);
      localStorage.setItem("longitudProveedor",longitud);

      $(".tablaLocalizadorProveedores").dataTable().fnDestroy();
      cargarDatosProveedores(latitud,longitud,nombreProveedor);

      var lat = localStorage.getItem("latitudProveedor");
      var lng = localStorage.getItem("longitudProveedor");
      var proveedor = localStorage.getItem("nombreProveedor");

      cargarCoordenadasLocalizadorProveedores(lat,lng,proveedor);

      
     
});

function cargarCoordenadasLocalizadorProveedores(lat,lng,proveedor){

    var identificador = 2;


    var latitudDistribuidor = lat;
    var longitudDistribuidor = lng;
    var proveedor = proveedor;

    var datos = new FormData();
    var array = [];

    datos.append('identificadorLocalizadorProveedor', identificador);
    datos.append('latitudProveedor',latitudDistribuidor);
    datos.append('longitudProveedor',longitudDistribuidor);
    datos.append('proveedor',proveedor);
    $.ajax({
        url: "ajax/encuestas.ajax.php",
        method: "POST",
        data: datos,
        dataType: "json",
        cache: false,
        contentType: false,
        processData: false,

        success: function(respuesta) {
         
          for (var i = 0; i < respuesta.length; i++) {
                array.push([respuesta[i]["taller"],respuesta[i]["latitud"],respuesta[i]["longitud"],respuesta[i]["proveedorPinturas"]]);
          }
          //localStorage.setItem('marcadoresMapa', JSON.stringify(respuesta));
          localStorage.setItem('marcadoresMapaProveedores', JSON.stringify(array));
          iniciarLocalizador();


        }
    })


}
//setInterval( "cargarCoordenadasLocalizador()", 10000);
/*=====  End of LOCALIZADOR DE PROVEEDORES  ======*/
