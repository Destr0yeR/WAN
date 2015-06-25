<table class="table table-striped table-bordered table-hover dataTable no-footer">
	@if(!$airports->isEmpty())
		<thead>
			<tr>
				<th>Aeropuerto</th>
				<th>Ciudad</th>
				<th>Pais</th>
				<!--<th>Delete</th>
				<th>Edit</th>-->
			</tr>
		</thead>
		<tbody>
			@foreach($airports as $airport)
			<tr>
				<td>{{$airport->name}}</td>
				<td>{{$airport->city->name}}</td>
				<td>{{$airport->city->country->name}}</td>
				<!--<td><a href="#" data-toggle="modal" data-target="#myModal{{$airport->id}}">DELETE</a></td>
				<td><a href="#">EDIT</a></td>-->
			</tr>
			<div class="modal fade" id="myModal{{$airport->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title" id="myModalLabel">Delete Content Admin</h4>
			      </div>
			      <div class="modal-body">
			        Are you sure you want to continue?
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">NO</button>
			        <a class="btn btn-primary" href="#">YES</a>
			      </div>
			    </div>
			  </div>
			</div>
			@endforeach
		</tbody>
	@else
		There are not Content Admins.
	@endif
</table>
<div {{($search)?'id=locationPaginate':''}} class="pagination_location">
		{{$airports->links()}}
</div>