<!DOCTYPE html>
<html ng-app="wan">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/jquery-ui.css">
		<link rel="stylesheet" href="css/iconos.css">
		<link rel="stylesheet" href="css/wan.css">
		<link rel="stylesheet" href="css/bus03.css">
		<link rel="stylesheet" href="css/main.css">
		<link rel="stylesheet" type="text/css" href="css/bus02.css">
		<script src="js/jquery.min.js"></script>
		<script src="js/jquery-ui.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<title>Prueba WAN</title>
	</head>
	<body>
		<div class="container-fluid">
			@include('layout.header')
			
			<div ng-view>

  			</div><!-- End View -->					
		</div>
		
	</body>
	{{HTML::script('js/angular/angular.js')}}
	{{HTML::script('js/angular/angular-route.min.js')}}
	{{HTML::script('js/app.js')}}
	{{HTML::script('js/config/constants.js')}}
	{{HTML::script('js/services/AutoCompleteService.js')}}
	{{HTML::script('js/entities/Schedule.js')}}
	{{HTML::script('js/directives/autocompletedepartureairport.js')}}
	{{HTML::script('js/directives/autocompletearrivalairport.js')}}
	{{HTML::script('js/services/ConsumerService.js')}}
	{{HTML::script('js/controllers/SearchController.js')}}
	{{HTML::script('js/controllers/ScheduleController.js')}}
</html>	