@extends('layout.base')

@section('content')
		<div class="tabla_1 center-block">
			<h4 class="titulo">Itinerario</h4>
			<table class="tabla_itinerario" id="id_tabla_itinerario" cellpadding="0" cellspacing="0">  
		  		<tbody>
			  		<tr class="cabezera">
			    		<td class="cabezal">Ida <a title="Detalle de itinerario" href="javascript:showLightbox_escalas('layer_escalas_1');">[+] info</a></td>
			    		<td class="info" >Salida</td>
			    		<td class="info" >&nbsp;</td>
			    		<td class="info" >Llegada</td>
			    		<td class="info" >&nbsp;</td>
			    		<td class="info" >Vuelo</td>
			    		<td class="info" >Cabina</td>
			    		<td class="info" >Equipaje</td>
			  		</tr>
			  
			  		<tr class="celda">
			    		<td class="info_dinamica">Domingo 24 mayo 2015&nbsp;</td>
					    <td class="info_dinamica"><strong>15:50</strong></td>
					    <td class="info_dinamica">Lima (LIM)</td>
					    <td class="info_dinamica"><strong>16:45</strong> <strong></strong></td>
					    <td class="info_dinamica">Ayacucho (AYP)</td>
					    <td class="info_dinamica">LA2183<br>
			      		<br>Operado por Lan Peru   </td>
			    		<td class="info_dinamica">Económica-V
			    		</td>
			    		<td class="info_dinamica">Máximo 2 piezas que pesen 23 kg <strong>en total</strong>.</td>
			    	</tr>
			  
			  		<tr class="cabezera">
			    		<td class="cabezal">Vuelta <a title="Detalle de itinerario" href="javascript:showLightbox_escalas('layer_escalas_1');">[+] info</a></td>
			    		<td class="info" >Salida</td>
			    		<td class="info" >&nbsp;</td>
			    		<td class="info" >Llegada</td>
			    		<td class="info" >&nbsp;</td>
			    		<td class="info" >Vuelo</td>
			    		<td class="info" >Cabina</td>
			    		<td class="info" >Equipaje</td>
			  		</tr>
			  
			  		<tr class="celda">
			    		<td class="info_dinamica">Miércoles 27 mayo 2015&nbsp;</td>
			    		<td class="info_dinamica"><strong>07:20</strong></td>
			    		<td class="info_dinamica">Ayacucho (AYP)</td>
			    		<td class="info_dinamica"><strong>08:10</strong> <strong></strong></td>
			    		<td class="info_dinamica">Lima (LIM)</td>
			    		<td class="info_dinamica">LA2180<br><br>Operado por Lan Peru   </td>
			    		<td class="info_dinamica">Económica-H</td>
			    		<td class="info_dinamica">Máximo 2 piezas que pesen 23 kg <strong>en total</strong>.</td>
					</tr>
		  		</tbody>
			</table>
		</div>
		<div class="advertencia">
			<p class="icon-user letra">Si tú o alguno de tus acompañantes tiene una <a href="http://www.lan.com/sitio_personas/reservas-y-servicios/necesidades-especiales/necesidades-medicas/index.html" target="_blank">necesidad especial</a>,<strong> infórmanos al momento de realizar tu reserva y hasta 48 horas antes de tu vuelo</strong>, llamando al Contact Center al (01) 213 8200 o acercándote a una de nuestras <a href="http://www.lan.com/sitio_personas/contactanos/oficinas/" target="_blank">Oficinas de Atención</a>. </p>
		</div>
		<table width="100%">
	    	<colgroup>	
	    		<col width="67%">
	    		<col width="3%">
	    		<col width="30%">
	    	</colgroup>
	    	<tbody>
	    		<tr>
	      			<td>
	        			<div>
			  				<div id="tabla_cambio_moneda" class="opcional">
			  					<h4 class="titulo">Tarifa referencial</h4>
									<table class="table" cellpadding="0" cellspacing="0" width="100%">
										<tbody>
											<tr> 
												<th>&nbsp;</th>
												<th class="costo derecha">Moneda</th>
												<th class="costo derecha">Total</th>
											</tr>
											<tr class="no-par" id="fila_valor_referencial"> 
												<td>Valor referencial</td>
												<td class="right p_tamano" ><strong><span id="span_moneda"></span></strong></td>
												<td class="right p_tamano" ><strong><span id="span_total"></span></strong></td>
											</tr>
										</tbody>
									</table>
							</div>
	          

							<h4 class="titulo">Tarifa en dólares americanos</h4>

							<table id="qa_tabla_tarifa" class="tabla_tarifa" cellpadding="0" cellspacing="0">
		    					<tbody>
		    						<tr class="cabezera"> 
		        						<th>&nbsp;</th>
		        						<th class="costo">&nbsp;</th>
		        						<th class="costo">Tarifa</th>
		        						<th class="costo">Impuestos</th>       
		        						<th class="col_total">Total (USD)</th>
		    						</tr>
		    						<tr class="no-par celda_pasajero"> 
										<td class="celda_tp">Pasajero adulto nº 1</td>
										<td class="costo"></td>
										<td class="costo">196.00</td>
										<td class="costo">50.18</td>	
										<td class="costo"><a title="Total" href="javascript:ajaxpage('/cgi-bin/compra/show_taxes.cgi?accion=show_taxes&amp;session_id=xy91561432477886_8DVMK270I2&amp;n_tax=&amp;t_pax=adt&amp;n_pax=1&amp;cc_data=0', 'content_layer_espera_proceso');showLightbox_espera_procesa_pago('layer_general');">246.18</a></td>
									</tr>
									<tr class="par celda_pasajero"> 
										<td class="celda_tp">Pasajero adulto nº 2</td>
										<td class="costo"></td>
										<td class="costo">196.00</td>
										<td class="costo">50.18</td>
										<td class="costo"><a title="Total" href="javascript:ajaxpage('/cgi-bin/compra/show_taxes.cgi?accion=show_taxes&amp;session_id=xy91561432477886_8DVMK270I2&amp;n_tax=&amp;t_pax=adt&amp;n_pax=2&amp;cc_data=0', 'content_layer_espera_proceso');showLightbox_espera_procesa_pago('layer_general');">246.18</a></td>
									</tr>
									<tr class="no-par celda_pasajero"> 
										<td class="celda_tp">Pasajero adulto nº 3</td>
										<td class="costo"></td>
										<td class="costo">196.00</td>
										<td class="costo">50.18</td>
										<td class="costo"><a title="Total" href="javascript:ajaxpage('/cgi-bin/compra/show_taxes.cgi?accion=show_taxes&amp;session_id=xy91561432477886_8DVMK270I2&amp;n_tax=&amp;t_pax=adt&amp;n_pax=3&amp;cc_data=0', 'content_layer_espera_proceso');showLightbox_espera_procesa_pago('layer_general');">246.18</a></td>
									</tr>
									<tr class="par celda_pasajero"> 
										<td class="celda_tp">Pasajero adulto nº 4</td>
										<td class="costo"></td>
										<td class="costo">196.00</td>
										<td class="costo">50.18</td>	
										<td class="costo"><a title="Total" href="javascript:ajaxpage('/cgi-bin/compra/show_taxes.cgi?accion=show_taxes&amp;session_id=xy91561432477886_8DVMK270I2&amp;n_tax=&amp;t_pax=adt&amp;n_pax=4&amp;cc_data=0', 'content_layer_espera_proceso');showLightbox_espera_procesa_pago('layer_general');">246.18</a></td>
									</tr>
									<tr class="no-par celda_pasajero"> 
										<td class="celda_tp">Pasajero adulto nº 5</td>
										<td class="costo"></td>
										<td class="costo">196.00</td>
										<td class="costo">50.18</td>
										<td class="costo"><a title="Total" href="javascript:ajaxpage('/cgi-bin/compra/show_taxes.cgi?accion=show_taxes&amp;session_id=xy91561432477886_8DVMK270I2&amp;n_tax=&amp;t_pax=adt&amp;n_pax=5&amp;cc_data=0', 'content_layer_espera_proceso');showLightbox_espera_procesa_pago('layer_general');">246.18</a></td>
									</tr>
									<tr class="par celda_pasajero"> 
										<td class="celda_tp">Pasajero adulto nº 6</td>
										<td class="costo"></td>
										<td class="costo">196.00</td>
										<td class="costo">50.18</td>
										<td class="costo"><a title="Total" href="javascript:ajaxpage('/cgi-bin/compra/show_taxes.cgi?accion=show_taxes&amp;session_id=xy91561432477886_8DVMK270I2&amp;n_tax=&amp;t_pax=adt&amp;n_pax=6&amp;cc_data=0', 'content_layer_espera_proceso');showLightbox_espera_procesa_pago('layer_general');">246.18</a></td>
									</tr>
									<tr class="no-par celda_pasajero"> 
										<td class="celda_tp">Pasajero adulto nº 7</td>
										<td class="costo"></td>
										<td class="costo">196.00</td>
										<td class="costo">50.18</td>
										<td class="costo"><a title="Total" href="javascript:ajaxpage('/cgi-bin/compra/show_taxes.cgi?accion=show_taxes&amp;session_id=xy91561432477886_8DVMK270I2&amp;n_tax=&amp;t_pax=adt&amp;n_pax=7&amp;cc_data=0', 'content_layer_espera_proceso');showLightbox_espera_procesa_pago('layer_general');">246.18</a></td>
									</tr>
							    	<tr class="cabezera"> 
								        <td class="costo izquierda" >Total</td>
								        <td class="costo"></td>
								        <td class="costo">1,372.00</td>
								        <td class="costo">351.26</td>        
								        <td id="id_monto_total_cotizacion" class="costo cursiva" >US$ 1,723.26</td>
		    						</tr>
								</tbody>
							</table>
							<input name="moneda" value="USD" type="hidden">
							<input id="monto_total_sin_moneda" name="monto" value="1723.26" type="hidden">
						</div>
						<a title="Detalle de condiciones de tarifa escogida" href="javascript:MM_openBrWindow('/cgi-bin/compra/show_regulaciones.cgi?session_id=xy91561432477886_8DVMK270I2','nombre','width=600,height=520,scrollbars=yes');">Ver restricciones de esta tarifa</a>
	      			</td>
	      			<td id="space_step_3">&nbsp;</td>
	      			<td id="another_taxs">
						<div id="CCFee">
							<h4>Ver tarifas en otra moneda</h4>
							<table class="table" cellpadding="0" cellspacing="0" width="100%">
								<tbody>
									<tr>
										<td>
											<select id="otra_moneda" onchange="actualizar_moneda(this.value);">
												<option value="">Selecciona</option>
												<option value="1.723,USD,US$,dólares americanos">Dólares (USD)</option>
												<option value="1.549,EUR,€,euros">Euros (EUR)</option>
												<option value="5.442,PEN,S/.,nuevos soles">nuevos soles (PEN)</option>
												<option value="15.458,ARS,$,pesos argentinos">pesos argentinos (ARS)</option>
												<option value="1.030.510,CLP,$,pesos chilenos">pesos chilenos (CLP)</option>
												<option value="5.221,BRL,R$,Real Brasilero">Reales brasileños (BRL)</option>
												<option value="1.104,GBP,£,Libra Esterlina">Libra Esterlina (GBP)</option>
												<option value="2.102,CAD,CAD,Dólares Canadienses">Dólares Canadienses (CAD)</option>
												<option value="4.289.918,COP,$,pesos colombianos">pesos colombianos (COP)</option>
											</select>
										</td>
									</tr>
									<tr>
										<td><div id="actualiza_moneda"></div>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
	        
	      			</td>
	    		</tr>
	      
	  		</tbody>
  		</table>
  		<div id="asistencia">
  			<h3 class="titulo	">RECOMENDADO: Seguro de viaje</h3>
		  	<table class="principal" id="id_tabla_compra_normal_asistencia" cellpadding="0" cellspacing="0">
	  			<tbody>
	  				<tr>
	    				<td><p class="asis-titulo">Viaja tranquilo, viaja protegido</p><p class="asis-bajada">Principales coberturas: Gastos médicos, cancelación de viaje, pérdida de equipaje, asistencia las 24 horas, entre otras.</p><p>No dejes que lo inesperado arruine tus vacaciones. LAN.com te ofrece la posibilidad de viajar protegido contra enfermedades, accidentes u otros imprevistos a través del <strong>seguro de viajes Pacífico</strong>.</p></td>
	    				<td><img src="http://s.lanstatic.com/es_pe/images/asistencia_viaje/promo_travel_assist.jpg" alt="Viaje tranquilo, viaje protegido" height="90" width="300"></td>
	  					</tr>
	  				<tr>
		    			<td colspan="2"><img src="http://s.lanstatic.com/es_pe/images/asistencia_viaje/logo_seguros_pacifico.gif" alt="Seguros Pacifico" class="logo" height="60" width="110">
		    
			    			<table class="interior" cellpadding="0" cellspacing="0">
			    				<colgroup>
				    				<col width="5%">
				    				<col width="80%">
									<col width="15%">
			    				</colgroup>
			      				<tbody>
			      					<tr>
								        <td class="destacado"><input name="radio" id="asistencia_viaje" value="asistencia_viaje" type="radio"></td>
								        <td class="destacado"><p><label for="asistencia_viaje"><strong>Sí, quiero contratar el seguro para todos los pasajeros de este viaje</strong></label></p></td>
								        <td class="destacado-bottom"><strong id="qa_valor_asistencia">USD 91.00 * </strong>
			        						<div id="following_tooltip" class="espaciado" ></div>
			          						<div class="precio_referencial">
				    							<label onmouseover="if (typeof(activa_ttip) != 'undefined') activa_ttip('id_ttip', 'tooltip_frase_variacion_poliza');" onmouseout="if (typeof(desactiva_ttip) != 'undefined') desactiva_ttip();">Precio total referencial
				      								<div id="id_ttip" class="opcional">
			            								<div class="middle">El precio del seguro incluye el Impuesto General a las Ventas (IGV) y puede variar según la edad del asegurado: para <b> menores de 12 años </b> aplica un descuento de hasta 50% si viaja acompañado de al menos 2 adultos. <b> A partir de los 70 años y hasta los 84 años </b> aplica un recargo de 10% si contrata el plan USA &amp; Canadá.
			            								</div>
			              							</div>
				    							</label>
			          						</div>
			          					</td>
			          				</tr>
			      					<tr>
			        					<td><input name="radio" id="asistencia_viaje2" value="asistencia_viaje2" type="radio"></td>
			            				<td><p><label for="asistencia_viaje2">No deseo contratar el seguro de viaje</label></p></td>
			        					<td>&nbsp;</td>
			      					</tr>
			    				</tbody>
			    			</table>
		    			</td>
		  			</tr>
		  			<tr>
			    		<td colspan="2"><a title="Revisa la cobertura y beneficios del plan" href="javascript:showLightbox('beneficios_asistencia');">Revisa la cobertura y beneficios del plan [+]</a></td>
			  		</tr>
			  		<tr>
			    		<td colspan="2"><a title="Ver condiciones de contratación del seguro por Internet" href="/files/travel_assist/Condiciones_del_Servicio_en_la_Contratacion_del_Seguro_de_Viajes_por_Internet.pdf" target="_blank">Ver condiciones de contratación del seguro por Internet </a></td>
			  		</tr>
			  
			  		<tr>
			    		<td colspan="2" class="contacto">Si optas por contratar el seguro y presionas “continuar”, estarás manifestando expresa e inequívocamente tu voluntad de adquirir un seguro de viajes de Pacífico Seguros y de conocer de manera previa los términos y condiciones de dicho servicio. </td>
			  		</tr>
				</tbody>
			</table>
  		</div>
	<script type="text/javascript">
var $oculto=$('#tabla_cambio_moneda');
function actualizar_moneda($valor){
	var valor=$('#otra_moneda').val();
	if(valor==""){
		$oculto.toggle();
	}
	else{
		if(!$oculto.is (':visible')){
			$oculto.show();
		}	
		$('#span_moneda').text($valor.split(',')[1])
		$('#span_total').text($valor.split(',')[2]+$valor.split(',')[0])

	}
}
	</script>
	<script>
		$(window).load(function() {
			$(".aparecer").click(function(){
   				$(".openfooter").toggle();
			});
		})
	</script>
@endsection