<div ng-controller="SeatsController as vm">
	<div class=" row viaje">
		<div  class="vuelo col-md-5  col-md-offset-1 col-xs-10 col-xs-offset-1">
			<h4 style="text-align:center">IDA</h4>
			<div class="avion">
				<div class="group">
					<div ng-repeat="row in vm.seats_departure" class="filas" style="font-size: 30px">
						<div ng-repeat="column in row" class="asiento icn_efect">
							<span class="ast_icn icon-squared-plus" ng-class="column.occupied?'occupied':'available'"></span>
							<span class="ast_txt"><%column.column%> - <%column.row%></span>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="vuelo col-md-5  col-md-offset-1 col-xs-10 col-xs-offset-1">
			<h4>VUELTA</h4>
			<div class="avion">
				<div class="group">
					<div ng-repeat="row in vm.seats_return" class="filas" style="font-size: 30px">
						<div ng-repeat="column in row" class="asiento icn_efect">
							<span class="ast_icn icon-squared-plus" ng-class="column.occupied?'occupied':'available'"></span>
							<span class="ast_txt"><%column.column%> - <%column.row%></span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
			<button class="seat-form-button" style="float:right" >Next</button>			
	</div>

		

	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/jquery-ui.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/wan.js"></script>
	<script type="text/javascript" src="js/bus04.js"></script>
</div>