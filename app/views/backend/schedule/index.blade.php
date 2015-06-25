@extends('backend.layout.base')

@section('content')
@section('content')
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Horarios</h1>
	</div>
</div>
<div class="row">
	{{Form::open(array('id' => 'search-form','name' => 'userForm', 'role' => 'form'))}}
	<div class="col-lg-12">
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
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						Lista de Horarios
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<div class="dataTables_wrapper form-inline" role="grid">
								<div class="row">
									<div class="col-sm-3">
										<div class="dataTables_filter">
											<a href="{{route('schedules.create')}}" class="btn btn-primary btn-sm">
												Nuevo Horario
											</a>
										</div>
									</div>
								</div>
								<hr>
								<div class="row hidden">
									<div class="col-sm-3">
										<div class="dataTables_filter">
											{{ Form::label('name', 'Name ', array('class' => 'control-label')) }}
											{{ Form::text('name', '', array('class' => 'form-control input-sm')) }}
										</div>
									</div>
									<div class="col-sm-3">
										<div class="dataTables_filter">
											{{Form::submit('Search',array('class'=>'btn btn-primary', 'id' => 'search'))}}
										</div>
									</div>
								</div>
								<div id = "ajax-table">
									@include('backend.schedule.table')
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		{{Form::close()}}
	</div>
</div>
@endsection