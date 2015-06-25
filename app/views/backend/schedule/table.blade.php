<table class="table table-striped table-bordered table-hover dataTable no-footer">
	@if(!$schedules->isEmpty())
		<thead>
			<tr>
				<th>DEP. Airport</th>
				<th>DEP. Time</th>
				<th>ARR. Airport</th>
				<th>ARR. Time</th>
				<!--<th>Delete</th>
				<th>Edit</th>-->
			</tr>
		</thead>
		<tbody>
			@foreach($schedules as $schedule)
			<tr>
				<td>{{$schedule->departure->name}}, {{$schedule->departure->city->name}}, {{$schedule->departure->city->country->name}}</td>
				<td>{{$schedule->departure_time}}</td>
				<td>{{$schedule->arrival->name}}, , {{$schedule->arrival->city->name}}, {{$schedule->arrival->city->country->name}}</td>
				<td>{{$schedule->arrival_time}}</td>
				<!--<td><a href="#" data-toggle="modal" data-target="#myModal{{$schedule->id}}">DELETE</a></td>
				<td><a href="#">EDIT</a></td>-->
			</tr>
			<div class="modal fade" id="myModal{{$schedule->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
		{{$schedules->links()}}
</div>