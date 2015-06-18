<div ng-controller="ScheduleController as vm">
			
	<div class="row" >
		<div class="col-xs-10  col-xs-offset-1 search-container">
			<div class="col-xs-10 col-md-5 col-xs-offset-1 col-md-offset-1 search-form " action="">
				<div class="row">
					<label class="col-xs-11 col-xs-offset-1 search-form-title" for="nombre">Compra de Pasajes</label>
				</div>
				<div class="row" style="margin-top:5px;margin-bottom:10px">
					<div class="form-group">
						<label class="col-xs-6 "> <input id="on" type="radio" name="optradio">Ida y Vuelta</label>
						<label class="col-xs-6 "> <input id="off" type="radio" name="optradio">Solo Ida</label>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12">
						<input type="text" class="search-form-place" value="" placeholder="Ciudad de Origen" autocompletedepartureairport id="tags1" ng-model="vm.departure_airport.name" style="margin-bottom:10px">
					</div>
					<div class="col-xs-12">
						<input type="text" class="search-form-place" value="" placeholder="Ciudad de Destino" autocompletearrivalairport id="tags2" ng-model="vm.arrival_airport.name" style="margin-bottom:10px">
					</div>
				</div>	
				<div class="row" style="margin-top:10px">
					<div class="col-xs-6" style="padding-right:5px">
						<input class="search-form-date" type="text" id="datepickerSalida" placeholder="Fecha Salida" ng-model="vm.departure_date">
					</div>
					<div class="col-xs-6 fecha-vuelta" style="padding-left:5px">
						<input class="search-form-date" type="text" id="datepickerRetorno" placeholder="Fecha Retorno" ng-model="vm.return_date">
					</div>
				</div>
				<div style="padding:10px;padding-bottom:0px">
					N.Pasajeros <input class="row search-form-spinner" id="numPass" name="pasajeros" type="spinner" min="1" max="5" ng-model="vm.pasajeros"/>
				</div>

				<div  class="row">
					<input class="search-form-button col-xs-12" type="button" value="Buscar Vuelo" ng-click="vm.searchFlights()">
				</div>
				<input type="hidden" ng-model="vm.ida_y_vuelta" id="ida_y_vuelta">
			</div>
		</div>	
	</div>

<div class="row listar">
	<div class="ida">
		<h4 class="titulo">Ruta <strong>IDA</strong> <label for="" class="origen">Lima</label>-<label for="" class="destino">Huaraz</label></h4>
		<div class="opciones">
			<div class="head">
				<div class="vacio"></div>
				<div class="title"><label >HORA SALIDA</label></div>
				<div class="title"><label >DURACION APROXIMADA</label></div>
				<div class="title"><label >COSTO</label></div>
			</div>
			<div ng-repeat="sc in vm.avaible_departure">
				<div class="lista">
					<div class="elementos"><label ><%sc.departure_time%></label></div>
					<div class="elementos"><label ><%sc.duration%> hrs. 00 min</label></div>
					<div class="elementos"><label ><%sc.price | currency%></label></div>
					<div class="elementos opt"><input type="radio" name="go"  ng-click="vm.setOptionDeparture(sc)"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="vuelta">
		<h4 class="titulo">Ruta <strong>VUELTA</strong> <label  class="origen">Huaraz</label>-<label  class="destino">Lima</label></h4>
		<div class="opciones">
			<div class="head">
				<div class="title"><label >HORA SALIDA</label></div>
				<div class="title"><label >DURACION APROXIMADA</label></div>
				<div class="title"><label >COSTO</label></div>
			</div>
			<div ng-repeat="sc in vm.available_return">
				<div class="lista">
					<div class="elementos"><label ><%sc.departure_time%></label></div>
					<div class="elementos"><label ><%sc.duration%> hrs. 00 min</label></div>
					<div class="elementos"><label ><%sc.price | currency%></label></div>
					<div class="elementos opt"><input type="radio" name="back" ng-click="vm.setOptionReturn(sc)"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="vuelta">
		<button type="button" class="search-form-button" ng-click="vm.next()">NEXT</button>
	</div>
</div>
			<script>
  				$(function() {
  				$.datepicker.setDefaults($.datepicker.regional['es']);
    			$( "#datepickerSalida" ).datepicker({ 
					minDate: "-0D", 
					maxDate: "+10Y",
					dateFormat: 'yy-mm-dd',
					onSelect:function(selectedDate){
						console.log($("#datepickerSalida").val());
						$("#datepickerSalida").trigger('change');
						$("fecha-vuelta").val(selectedDate);
						var fechaSeparada=selectedDate.split("-");
						console.log(fechaSeparada);
						$("#datepickerRetorno").datepicker(
							"option","minDate", new Date(fechaSeparada[0],parseInt(fechaSeparada[1])-1, parseInt(fechaSeparada[2]) ));
					} 
				});
				$( "#datepickerRetorno" ).datepicker({ 
					minDate: "-0D", 
					maxDate: "+10Y" ,
					dateFormat: 'yy-mm-dd',
					onSelect:function(selectedDate){
						console.log($("#datepickerRetorno").val());
						$("#datepickerRetorno").trigger('change');
						$("fecha-ida").val(selectedDate);
					} 
				});
  				});	
  			</script>
			<script>
				$(function(){
					$("#on").click(function(){
						$(".fecha-vuelta").show();
						$("#ida_y_vuelta").val(0);
						$("#ida_y_vuelta").trigger('change');
					});
				});
				$(function(){
					$("#off").click(function(){
						$(".fecha-vuelta").hide();
						$("#ida_y_vuelta").val(1);
						$("#ida_y_vuelta").trigger('change');
					});
				});
			</script>
				  <script>
				  $(function() {
				    var spinner = $( "#numPass" ).spinner();
				    $( "#getvalue" ).click(function() {
				      alert( numPass.spinner( "value" ) );
				    });				 
				    $( "button" ).button();
				  });
				  </script>
		<script type="text/javascript" src="js/wan.js"></script>
		<script type="text/javascript" src="js/bus02.js"></script>
</div>