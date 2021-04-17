<?php
/*==============================================================
=            CONTROLADORES DE REPORTES DE ENCUESTAS            =
==============================================================*/
class ControladorReportes{

	public function ctrDescargarReporte(){ 

		if(isset($_GET["reporte"])){
			
			$tabla = $_GET["reporte"];

			$item = 'estado';

			$estado = $_GET["estado"];

			$valor = $estado;

			$datos = strtoupper($estado);

			$reporte = ModeloReportes::mdlDescargarReporteEncuestas($tabla,$item,$valor);

			/*=============================================
			CREAMOS EL ARCHIVO DE EXCEL
			=============================================*/

			$nombreArchivo = "Reporte Encuestas"." ".$datos;
			$nombre = $nombreArchivo.'.xls';

			header('Expires: 0');
			header('Cache-control: private');
			header('Content-type: application/vnd.ms-excel');// Archivo de Excel
			header("Cache-Control: cache, must-revalidate"); 
			header('Content-Description: File Transfer');
			header('Last-Modified: '.date('D, d M Y H:i:s'));
			header("Pragma: public"); 
			header('Content-Disposition:; filename="'.$nombre.'"');
			header("Content-Transfer-Encoding: binary");
			

			/*=============================================
		
			=============================================*/

			if($_GET["reporte"] == "encuesta"){	

				$arregloCamposEncuesta = ['Folio','Taller','Cliente','Fecha Encuesta','Reparaciones Por Mes','Igualados Por Semana','Calidad Igualado','Área Hyp','N° Trabajadores','Horario(L-V)','Horario(Sab)','Satisfacción','Porqué','Proveedor de Pintura','Domicilio/Referencia','Forma Pago','Monto Línea Crédito','Tiempo Crédito','Antiguedad Taller','Base Color','Esmalte','Transparente','Pistolas','Lijas','Masking','Inversión Semanal','Productos Faltantes','Mejorar','Encuestador'];

				echo utf8_decode("<table>");
				echo "<tr>
					<th colspan='29' style='font-weight:bold; background:#17202A; color:white;'>SAN FRANCISCO DEKKERLAB</th>
					</tr>

					<tr>
					<th colspan='29' style='font-weight:bold; background:#17202A; color:white;'>R E P O R T E &nbsp; E N C U E S T A &nbsp; D E &nbsp; ".$datos."  &nbsp</th>
					</tr>";
				echo utf8_decode("<tr>");
				for ($i=0; $i < count($arregloCamposEncuesta); $i++) { 
					echo utf8_decode("<td style='font-weight:bold; background:#000000; color:white;'></td>");
					
				}
				echo utf8_decode("</tr>");
				echo utf8_decode("<tr>");

				foreach ($arregloCamposEncuesta as $key => $value) {
						
						echo utf8_decode("<td style='font-weight:bold; background:#000000; color:white;'>".$value."</td>");
	
				}
				echo utf8_decode("</tr>");

				foreach ($reporte as $key => $value) {

					echo utf8_decode("<tr>
										<td style='color:black;'>".$value["id"]."</td>
										<td style='color:black;'>".$value["taller"]."</td>
										<td style='color:black;'>".$value["cliente"]."</td>
										<td style='color:black;'>".$value["fechaEncuesta"]."</td>
										<td style='color:black;'>&nbsp;".$value["reparacionesMes"]."</td>
										<td style='color:black;'>&nbsp;".$value["igualadosPorSemana"]."</td>
										<td style='color:black;'>".$value["calidadDeIgualado"]."</td>
										<td style='color:black;'>&nbsp;".$value["areaHyp"]."</td>
										<td style='color:black;'>".$value["trabajadores"]."</td>
										<td style='color:black;'>".$value["horarioSemana"]."</td>
										<td style='color:black;'>".$value["horarioSabado"]."</td>
										<td style='color:black;'>".$value["satisfaccionProveedor"]."</td>
										<td style='color:black;'>".$value["motivo"]."</td>
										<td style='color:black;'>".$value["proveedorPinturas"]."</td>
										<td style='color:black;'>".$value["domicilioReferencia"]."</td>
										<td style='color:black;'>".$value["formaPago"]."</td>
										<td style='color:black;'>".$value["lineaCredito"]."</td>
										<td style='color:black;'>".$value["tiempoCredito"]."</td>
										<td style='color:black;'>".$value["antiguedadTaller"]."</td>
										<td style='color:black;'>".$value["marcaBaseColor"]."</td>
										<td style='color:black;'>".$value["marcaEsmalte"]."</td>
										<td style='color:black;'>".$value["marcaTransparente"]."</td>
										<td style='color:black;'>".$value["marcaPistolas"]."</td>
										<td style='color:black;'>".$value["marcaLijas"]."</td>
										<td style='color:black;'>".$value["marcaMasking"]."</td>
										<td style='color:black;'>&nbsp;".$value["inversion"]."</td>
										<td style='color:black;'>".$value["productosFaltantes"]."</td>
										<td style='color:black;'>".$value["faltaMejorar"]."</td>
										<td style='color:black;'>".$value["encuestador"]."</td>
							
										</tr>");

									
	
	
				}



			echo "</table>";

			}
			/****FIN DE LA TABLA***/

		}

	}

	public function ctrDescargarReporteEncuestados(){ 

		if(isset($_GET["reporteEncuestados"])){
			
			$tabla = $_GET["reporteEncuestados"];

			$reporte = ModeloReportes::mdlDescargarReporteEncuestados($tabla);

			/*=============================================
			CREAMOS EL ARCHIVO DE EXCEL
			=============================================*/

			$nombreArchivo = "Reporte Encuestados";
			$nombre = $nombreArchivo.'.xls';

			header('Expires: 0');
			header('Cache-control: private');
			header('Content-type: application/vnd.ms-excel');// Archivo de Excel
			header("Cache-Control: cache, must-revalidate"); 
			header('Content-Description: File Transfer');
			header('Last-Modified: '.date('D, d M Y H:i:s'));
			header("Pragma: public"); 
			header('Content-Disposition:; filename="'.$nombre.'"');
			header("Content-Transfer-Encoding: binary");
			

			/*=============================================
		
			=============================================*/

			if($_GET["reporteEncuestados"] == "encuesta"){	

				$arregloCamposEncuesta = ['Folio','Taller','Cliente','Domicilio','Teléfono','Móvil','Correo','Facebook','Fecha Encuesta','Horario Semana','Horario Sábado'];

				echo utf8_decode("<table>");
				echo "<tr>
					<th colspan='11' style='font-weight:bold; background:#17202A; color:white;'>SAN FRANCISCO DEKKERLAB</th>
					</tr>

					<tr>
					<th colspan='11' style='font-weight:bold; background:#17202A; color:white;'>R E P O R T E &nbsp; E N C U E S T A D O S &nbsp;</th>
					</tr>";
				echo utf8_decode("<tr>");
				for ($i=0; $i < count($arregloCamposEncuesta); $i++) { 
					echo utf8_decode("<td style='font-weight:bold; background:#000000; color:white;'></td>");
					
				}
				echo utf8_decode("</tr>");
				echo utf8_decode("<tr>");

				foreach ($arregloCamposEncuesta as $key => $value) {
						
						echo utf8_decode("<td style='font-weight:bold; background:#000000; color:white;'>".$value."</td>");
	
				}
				echo utf8_decode("</tr>");

				foreach ($reporte as $key => $value) {

					echo utf8_decode("<tr>
										<td style='color:black;'>".$value["id"]."</td>
										<td style='color:black;'>".$value["taller"]."</td>
										<td style='color:black;'>".$value["cliente"]."</td>
										<td style='color:black;'>".$value["domicilio"]."</td>
										<td style='color:black;'>".$value["telefono"]."</td>
										<td style='color:black;'>".$value["movil"]."</td>
										<td style='color:black;'>".$value["correoElectronico"]."</td>
										<td style='color:black;'>".$value["facebook"]."</td>
										<td style='color:black;'>".$value["fechaEncuesta"]."</td>
										<td style='color:black;'>".$value["horarioSemana"]."</td>
										<td style='color:black;'>".$value["horarioSabado"]."</td>

									
										</tr>");

									
	
	
				}



			echo "</table>";

			}
			/****FIN DE LA TABLA***/

		}

	}

	public function ctrDescargarReporteNoEncuestados(){ 

		if(isset($_GET["reporteNoEncuestados"])){
			
			$tabla = $_GET["reporteNoEncuestados"];

			$reporte = ModeloReportes::mdlDescargarReporteNoEncuestados($tabla);

			/*=============================================
			CREAMOS EL ARCHIVO DE EXCEL
			=============================================*/

			$nombreArchivo = "Reporte No Encuestados";
			$nombre = $nombreArchivo.'.xls';

			header('Expires: 0');
			header('Cache-control: private');
			header('Content-type: application/vnd.ms-excel');// Archivo de Excel
			header("Cache-Control: cache, must-revalidate"); 
			header('Content-Description: File Transfer');
			header('Last-Modified: '.date('D, d M Y H:i:s'));
			header("Pragma: public"); 
			header('Content-Disposition:; filename="'.$nombre.'"');
			header("Content-Transfer-Encoding: binary");
			

			/*=============================================
		
			=============================================*/

			if($_GET["reporteNoEncuestados"] == "encuesta"){	

				$arregloCamposEncuesta = ['Folio','Taller','Latitud','Longitud','Domicilio','Fecha Encuesta','Encuestador'];

				echo utf8_decode("<table>");
				echo "<tr>
					<th colspan='7' style='font-weight:bold; background:#17202A; color:white;'>SAN FRANCISCO DEKKERLAB</th>
					</tr>

					<tr>
					<th colspan='7' style='font-weight:bold; background:#17202A; color:white;'>R E P O R T E &nbsp; N O  &nbsp; E N C U E S T A D O S &nbsp;</th>
					</tr>";
				echo utf8_decode("<tr>");
				for ($i=0; $i < count($arregloCamposEncuesta); $i++) { 
					echo utf8_decode("<td style='font-weight:bold; background:#000000; color:white;'></td>");
					
				}
				echo utf8_decode("</tr>");
				echo utf8_decode("<tr>");

				foreach ($arregloCamposEncuesta as $key => $value) {
						
						echo utf8_decode("<td style='font-weight:bold; background:#000000; color:white;'>".$value."</td>");
	
				}
				echo utf8_decode("</tr>");

				foreach ($reporte as $key => $value) {

					echo utf8_decode("<tr>
										<td style='color:black;'>".$value["id"]."</td>
										<td style='color:black;'>".$value["taller"]."</td>
										<td style='color:black;'>".$value["latitud"]."</td>
										<td style='color:black;'>".$value["longitud"]."</td>
										<td style='color:black;'>".$value["domicilio"]."</td>
										<td style='color:black;'>".$value["fechaEncuesta"]."</td>
										<td style='color:black;'>".$value["encuestador"]."</td>
							
									
										</tr>");

									
	
	
				}



			echo "</table>";

			}
			/****FIN DE LA TABLA***/

		}

	}

	public function ctrDescargarReporteLocalizador(){

		if(isset($_GET["reporteLocalizador"])){
			
			$tabla = $_GET["reporteLocalizador"];

			$latitud = $_GET["latitud"];

			$longitud = $_GET["longitud"];

			$reporte = ModeloReportes::mdlDescargarReporteLocalizadorDistribuidores($tabla,$latitud,$longitud);

			/*=============================================
			CREAMOS EL ARCHIVO DE EXCEL
			=============================================*/

			$nombreArchivo = "Reporte Localizador";
			$nombre = $nombreArchivo.'.xls';

			header('Expires: 0');
			header('Cache-control: private');
			header('Content-type: application/vnd.ms-excel');// Archivo de Excel
			header("Cache-Control: cache, must-revalidate"); 
			header('Content-Description: File Transfer');
			header('Last-Modified: '.date('D, d M Y H:i:s'));
			header("Pragma: public"); 
			header('Content-Disposition:; filename="'.$nombre.'"');
			header("Content-Transfer-Encoding: binary");
			

			/*=============================================
		
			=============================================*/

			if($_GET["reporteLocalizador"] == "coordenadas"){	

				$arregloCamposEncuesta = ['Folio','Taller','Cliente','Domicilio','Estado','Teléfono','Movil','Correo','Fecha Encuesta','Reparaciones Por Mes','Igualados Por Semana','Calidad Igualado','Área Hyp','N° Trabajadores','Horario(L-V)','Horario(Sab)','Satisfacción','Porqué','Proveedor de Pintura','Domicilio/Referencia','Forma Pago','Monto Línea Crédito','Tiempo Crédito','Antiguedad Taller','Base Color','Esmalte','Transparente','Pistolas','Lijas','Masking','Inversión Semanal','Productos Faltantes','Mejorar'];

				echo utf8_decode("<table>");
				echo "<tr>
					<th colspan='32' style='font-weight:bold; background:#17202A; color:white;'>SAN FRANCISCO DEKKERLAB</th>
					</tr>

					<tr>
					<th colspan='32' style='font-weight:bold; background:#17202A; color:white;'>R E P O R T E &nbsp; L O C A L I Z A D O R &nbsp</th>
					</tr>";
				echo utf8_decode("<tr>");
				for ($i=0; $i < count($arregloCamposEncuesta); $i++) { 
					echo utf8_decode("<td style='font-weight:bold; background:#000000; color:white;'></td>");
					
				}
				echo utf8_decode("</tr>");
				echo utf8_decode("<tr>");

				foreach ($arregloCamposEncuesta as $key => $value) {
						
						echo utf8_decode("<td style='font-weight:bold; background:#000000; color:white;'>".$value."</td>");
	
				}
				echo utf8_decode("</tr>");

				foreach ($reporte as $key => $value) {

					echo utf8_decode("<tr>
										<td style='color:black;'>".$value["id"]."</td>
										<td style='color:black;'>".$value["taller"]."</td>
										<td style='color:black;'>".$value["cliente"]."</td>
										<td style='color:black;'>".$value["domicilio"]."</td>
										<td style='color:black;'>".$value["estado"]."</td>
										<td style='color:black;'>".$value["telefono"]."</td>
										<td style='color:black;'>".$value["movil"]."</td>
										<td style='color:black;'>".$value["correoElectronico"]."</td>
										<td style='color:black;'>".$value["fechaEncuesta"]."</td>
										<td style='color:black;'>&nbsp;".$value["reparacionesMes"]."</td>
										<td style='color:black;'>&nbsp;".$value["igualadosPorSemana"]."</td>
										<td style='color:black;'>".$value["calidadDeIgualado"]."</td>
										<td style='color:black;'>&nbsp;".$value["areaHyp"]."</td>
										<td style='color:black;'>".$value["trabajadores"]."</td>
										<td style='color:black;'>".$value["horarioSemana"]."</td>
										<td style='color:black;'>".$value["horarioSabado"]."</td>
										<td style='color:black;'>".$value["satisfaccionProveedor"]."</td>
										<td style='color:black;'>".$value["motivo"]."</td>
										<td style='color:black;'>".$value["proveedorPinturas"]."</td>
										<td style='color:black;'>".$value["domicilioReferencia"]."</td>
										<td style='color:black;'>".$value["formaPago"]."</td>
										<td style='color:black;'>".$value["lineaCredito"]."</td>
										<td style='color:black;'>".$value["tiempoCredito"]."</td>
										<td style='color:black;'>".$value["antiguedadTaller"]."</td>
										<td style='color:black;'>".$value["marcaBaseColor"]."</td>
										<td style='color:black;'>".$value["marcaEsmalte"]."</td>
										<td style='color:black;'>".$value["marcaTransparente"]."</td>
										<td style='color:black;'>".$value["marcaPistolas"]."</td>
										<td style='color:black;'>".$value["marcaLijas"]."</td>
										<td style='color:black;'>".$value["marcaMasking"]."</td>
										<td style='color:black;'>&nbsp;".$value["inversion"]."</td>
										<td style='color:black;'>".$value["productosFaltantes"]."</td>
										<td style='color:black;'>".$value["faltaMejorar"]."</td>
							
										</tr>");

									
	
	
				}



			echo "</table>";

			}
			/****FIN DE LA TABLA***/

		}

	}
	public function ctrDescargarReporteLocalizadorProveedores(){

		if(isset($_GET["reporteLocalizadorProveedores"])){
			
			$tabla = $_GET["reporteLocalizadorProveedores"];

			$proveedor = $_GET["proveedor"];

			$reporte = ModeloReportes::mdlDescargarReporteLocalizadorProveedores($tabla,$proveedor);

			/*=============================================
			CREAMOS EL ARCHIVO DE EXCEL
			=============================================*/

			$nombreArchivo = "Reporte Localizador";
			$nombre = $nombreArchivo.'.xls';

			header('Expires: 0');
			header('Cache-control: private');
			header('Content-type: application/vnd.ms-excel');// Archivo de Excel
			header("Cache-Control: cache, must-revalidate"); 
			header('Content-Description: File Transfer');
			header('Last-Modified: '.date('D, d M Y H:i:s'));
			header("Pragma: public"); 
			header('Content-Disposition:; filename="'.$nombre.'"');
			header("Content-Transfer-Encoding: binary");
			

			/*=============================================
		
			=============================================*/

			if($_GET["reporteLocalizadorProveedores"] == "encuesta"){	

				$arregloCamposEncuesta = ['Folio','Taller','Cliente','Fecha Encuesta','Reparaciones Por Mes','Igualados Por Semana','Calidad Igualado','Área Hyp','N° Trabajadores','Horario(L-V)','Horario(Sab)','Satisfacción','Porqué','Proveedor de Pintura','Domicilio/Referencia','Forma Pago','Monto Línea Crédito','Tiempo Crédito','Antiguedad Taller','Base Color','Esmalte','Transparente','Pistolas','Lijas','Masking','Inversión Semanal','Productos Faltantes','Mejorar'];

				echo utf8_decode("<table>");
				echo "<tr>
					<th colspan='28' style='font-weight:bold; background:#17202A; color:white;'>SAN FRANCISCO DEKKERLAB</th>
					</tr>

					<tr>
					<th colspan='28' style='font-weight:bold; background:#17202A; color:white;'>R E P O R T E &nbsp; L O C A L I Z A D O R &nbsp</th>
					</tr>";
				echo utf8_decode("<tr>");
				for ($i=0; $i < count($arregloCamposEncuesta); $i++) { 
					echo utf8_decode("<td style='font-weight:bold; background:#000000; color:white;'></td>");
					
				}
				echo utf8_decode("</tr>");
				echo utf8_decode("<tr>");

				foreach ($arregloCamposEncuesta as $key => $value) {
						
						echo utf8_decode("<td style='font-weight:bold; background:#000000; color:white;'>".$value."</td>");
	
				}
				echo utf8_decode("</tr>");

				foreach ($reporte as $key => $value) {

					echo utf8_decode("<tr>
										<td style='color:black;'>".$value["id"]."</td>
										<td style='color:black;'>".$value["taller"]."</td>
										<td style='color:black;'>".$value["cliente"]."</td>
										<td style='color:black;'>".$value["fechaEncuesta"]."</td>
										<td style='color:black;'>&nbsp;".$value["reparacionesMes"]."</td>
										<td style='color:black;'>&nbsp;".$value["igualadosPorSemana"]."</td>
										<td style='color:black;'>".$value["calidadDeIgualado"]."</td>
										<td style='color:black;'>&nbsp;".$value["areaHyp"]."</td>
										<td style='color:black;'>".$value["trabajadores"]."</td>
										<td style='color:black;'>".$value["horarioSemana"]."</td>
										<td style='color:black;'>".$value["horarioSabado"]."</td>
										<td style='color:black;'>".$value["satisfaccionProveedor"]."</td>
										<td style='color:black;'>".$value["motivo"]."</td>
										<td style='color:black;'>".$value["proveedorPinturas"]."</td>
										<td style='color:black;'>".$value["domicilioReferencia"]."</td>
										<td style='color:black;'>".$value["formaPago"]."</td>
										<td style='color:black;'>".$value["lineaCredito"]."</td>
										<td style='color:black;'>".$value["tiempoCredito"]."</td>
										<td style='color:black;'>".$value["antiguedadTaller"]."</td>
										<td style='color:black;'>".$value["marcaBaseColor"]."</td>
										<td style='color:black;'>".$value["marcaEsmalte"]."</td>
										<td style='color:black;'>".$value["marcaTransparente"]."</td>
										<td style='color:black;'>".$value["marcaPistolas"]."</td>
										<td style='color:black;'>".$value["marcaLijas"]."</td>
										<td style='color:black;'>".$value["marcaMasking"]."</td>
										<td style='color:black;'>&nbsp;".$value["inversion"]."</td>
										<td style='color:black;'>".$value["productosFaltantes"]."</td>
										<td style='color:black;'>".$value["faltaMejorar"]."</td>
							
										</tr>");

									
	
	
				}



			echo "</table>";

			}
			/****FIN DE LA TABLA***/

		}

	}


}

/*=====  End of CONTROLADORES DE REPORTES DE ENCUESTAS  ======*/


?>