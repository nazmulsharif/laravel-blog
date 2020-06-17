@extends('backEnd.layouts.master')
@section('content')
<div class="container">
	<h2>Manage Social Icons</h2>
	<table class="table">
		<thead>
			<tr>
				<th>Sl</th>
				<th>Name</th>
				<th>Link</th>
				<th>Class</th>
				<th>Icon</th>
				<th>Target</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@php
				$i=1
			@endphp
			@foreach(App\Models\SocialIcon::all() as $social)
				<tr>
					<td>{{ $i++ }}</td>
					<td>{{ $social->name }}</td>
					<td>{{ $social->link }}</td>
					<td>{{ $social->class }}</td>
					<td>{{ $social->icon }}</td>
					<td>{{ $social->target }}</td>
					<td>
						
						<a href="" class="btn btn-primary" data-toggle="modal" data-target="#edit{{$social->id}}">edit</a>
						<a href="" class="btn btn-danger"data-toggle="modal" data-target="#delete{{$social->id}}">delete</a>
						<!-- Button trigger modal -->
						

						<!-- Modal -->
						<div class="modal fade" id="edit{{$social->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						  <div class="modal-dialog" role="document">
						    <div class="modal-content">
						      <div class="modal-header">
						        <h5 class="modal-title" id="exampleModalLabel">Edit social</h5>
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						          <span aria-hidden="true">&times;</span>
						        </button>
						      </div>
						      <div class="modal-body">
						        <form action="{{ Route('admin.icon.update') }}" method="post">
									@include('backEnd.partials.messages')
									@csrf
									<input type="hidden" name="id" value="{{ $social->id}}">
									<div class="form-group">
										<label>Icon Name</label>
										<input type="text" name="name" class="form-control" value="{{ $social->name }}">
									</div>
									<div class="form-group">
										<label>Link</label>
										<input type="text" name="link" class="form-control" value="{{ $social->link }}">
									</div>
									<div class="form-group">
										<label>Class</label>
										<input type="text" name="class" class="form-control" value="{{ $social->class }}">
									</div>
									<div class="form-group">
										<label>Icon</label>
										<input type="text" name="img" class="form-control" value="{{ $social->icon }}">
									</div>
									<div class="form-group">
										<label>Target</label>
										<select name="target" id="">
											<option value="">--Select--</option>
											<option value="_blank"{{ $social->target=='_blank'?'selected':''}}>New Page</option>
											<option value="_self"{{ $social->target=='_self'?'selected':''}}>Self Page</option>
										</select>
									</div>
									
									<div class="form-group">
										<input type="submit" name="" class="btn btn-success" value="update">
									</div>
								</form>
						      </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						  
						      </div>
						    </div>
						  </div>
						</div>
						<!---Delete social------>
						<div class="modal fade" id="delete{{$social->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						  <div class="modal-dialog" role="document">
						    <div class="modal-content">
						      <div class="modal-header">
						        <h5 class="modal-title" id="exampleModalLabel">Delete social</h5>
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						          <span aria-hidden="true">&times;</span>
						        </button>
						      </div>
						      <div class="modal-body">
						        <a href="{{ Route('admin.icon.delete', $social->id) }}" class="btn btn-danger"> Confirm Delete</a>
						      </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						  
						      </div>
						    </div>
						  </div>
						</div>
					</td>
				</tr>
			@endforeach
		</tbody>
		<tfoot></tfoot>
	</table>
</div>
@endsection