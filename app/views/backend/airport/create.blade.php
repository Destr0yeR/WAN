@extends('backend.layout.base')

@section('extra_scripts')
	{{HTML::script('backend/js/form.js')}}
@endsection

@section('content')
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Mantenimiento de Horarios</h1>
	</div>
</div>
@if($errors->has())
<div class="row">
    <div class="col-lg-12">
        <div id="errors">
            <div class="alert alert-danger alert-dismissible" role="alert" >
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <a href="#" class="alert-link"></a>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endif
@if(Session::has('message'))
<div class="row">
    <div class="col-lg-12">
        <div id="messages">
            <div class="alert alert-success alert-dismissible" role="alert" >
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <a href="#" class="alert-link"></a>
                {{Session::get('message')}}
            </div>
        </div>
    </div>
</div>
@endif
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				Crea un nuevo Horario
			</div>
			<div class="panel-body">
				<div class="col-sm-12">
					<div class="row">
						<div id="message-container">

						</div>
						<div id="message-container-source" style="display:none;">
							<div id="message_source_success" class="alert alert-success alert-dismissible" role="alert" >
								<button type="button" class="close" data-dismiss="alert">&times;</button>
								<a href="#" class="alert-link"></a>
							</div>
							<div id="message_source_error" class="alert alert-danger alert-dismissible" role="alert" >
								<button type="button" class="close" data-dismiss="alert">&times;</button>
								<a href="#" class="alert-link"></a>
							</div>
							<div id="message_source_info" class="alert alert-info alert-dismissible" role="alert" >
								<button type="button" class="close" data-dismiss="alert">&times;</button>
								<a href="#" class="alert-link"></a>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-3">
							
						</div>
						<div class="col-sm-6">
							<input id="base_path" type="hidden" value="{{route('index.api')}}">
							{{Form::open(array('id' => 'submit-form','name' => 'userForm', 'role' => 'form', route('airports.store')))}}
								<div class="form-group">
									{{Form::label('destination', 'Destino', array('class' => 'control-label'))}}
									{{Form::select('country' , $countries, 0, array('class' => 'form-control', 'id' => 'countries'))}}
									<br>
									{{Form::text('country_name', '', array('class' => 'form-control', 'id' => 'country_name'))}}
									<br>
									{{Form::select('city' , [0 => 'Seleccione una Ciudad'], null, array('class' => 'form-control', 'id' => 'cities', 'disabled' => 'true'))}}
									<br>
									{{Form::text('city_name', '', array('class' => 'form-control', 'id' => 'city_name'))}}
									<br>
									{{Form::text('airport_name' , '',  array('class' => 'form-control', 'id' => 'airports'))}}
								</div>
								<div class="col-sm-2">
									{{ Form::submit('Crear',array('class' => 'btn btn-primary'))}}
								</div>
							{{Form::close()}}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection