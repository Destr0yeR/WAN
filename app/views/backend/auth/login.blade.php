@extends('backend.layout.templatelogin')
@section('content')
	<div class="row">
		<div class="col-md-4 col-md-offset-4" id="form-login">
			{{ Form::open(array('url' => '/login','role'=>'form')) }}
				<fieldset>
					<legend>Log in</legend>
					@if(Session::has('warning'))
						<div class="alert alert-warning">
							{{Session::get('warning')}}
						</div>
					@endif
					<div class="form-group">
						{{Form::text('username',null,array('class'=>'form-control','placeholder'=>'Username'))}}
					</div>
					<div class="form-group">
						{{Form::password('password',array('class'=>'form-control','placeholder'=>'Password'))}}
					</div>
					<div class="form-group">
						{{Form::submit('Log In',array('class'=>'btn btn-primary btn-lg btn-block')) }}
					</div>
				</fieldset>
			{{ Form::close() }}
		</div>
	</div>
@stop

