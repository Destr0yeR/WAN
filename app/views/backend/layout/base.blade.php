<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>WAN</title>
	{{ HTML::style('backend/css/datepicker3.css' )}}
	{{ HTML::style('backend/css/bootstrap.min.css')}}
	{{ HTML::style('backend/font-awesome-4.1.0/css/font-awesome.min.css')}}
	{{ HTML::style('backend/css/sb-admin-2.css')}}
	{{ HTML::style('backend/css/jquery-ui.css')}}
	{{ HTML::style('backend/css/main.css')}}
	{{ HTML::script('backend/js/jquery-1.11.0.js')}}
	{{ HTML::script('backend/js/bootstrap.min.js')}}
	{{ HTML::script('backend/js/main.js')}}
	{{ HTML::script('backend/js/table.js')}}
	{{ HTML::script('backend/js/jquery.autocomplete.js')}}
</head>
<body>
	<div id="wrapper">
		@section('header')
			@include('backend.layout.header')
		@show
		<div id="page-wrapper">
			@yield('content')
		</div>
	</div>
{{ HTML::script('backend/js/plugins/metisMenu/metisMenu.min.js')}}
{{ HTML::script('backend/js/sb-admin-2.js')}}
@yield('extra_scripts')
</body>
</html>