@extends('backEnd.layouts.master')
@section('content')
<div class="container">
	<h2>Manage user</h2>
	<table class="table">
		<thead>
			<tr>
				<th>Sl</th>
				<th>Name</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@php
				$i=1
			@endphp
			@foreach($users as $user)
				<tr>
					<td>{{ $i++ }}</td>
					<td>{{ $user->name }}</td>
					<td>
						
						<a href="" class="btn btn-primary" data-toggle="modal" data-target="#edit{{$user->id}}">edit</a>
						<a href="" class="btn btn-danger"data-toggle="modal" data-target="#delete{{$user->id}}">delete</a>
						<!-- Button trigger modal -->
						

						<!-- Modal -->
						<div class="modal fade" id="edit{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						  <div class="modal-dialog" role="document">
						    <div class="modal-content">
						      <div class="modal-header">
						        <h5 class="modal-title" id="exampleModalLabel">Edit user</h5>
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						          <span aria-hidden="true">&times;</span>
						        </button>
						      </div>
						      <div class="modal-body">
						        <form action=" " method="post">
									@include('backEnd.partials.messages')
									@csrf
									<input type="hidden" name="id" value="{{ $user->id}}">
									<div class="form-group">
										<label>user Name</label>
										<input type="text" name="name" class="form-control" value="{{ $user->name }}">
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
						<!---Delete user------>
						<div class="modal fade" id="delete{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						  <div class="modal-dialog" role="document">
						    <div class="modal-content">
						      <div class="modal-header">
						        <h5 class="modal-title" id="exampleModalLabel">Delete user</h5>
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						          <span aria-hidden="true">&times;</span>
						        </button>
						      </div>
						      <div class="modal-body">
						        <a href="{{ Route('admin.user.delete', $user->id) }}" class="btn btn-danger"> Confirm Delete</a>
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