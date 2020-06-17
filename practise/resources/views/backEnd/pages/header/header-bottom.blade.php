@extends('backEnd.layouts.master')
@section('content')
<div class="container">
	<h2>Manage header </h2>
	<table class="table">
		<thead>
			<tr>
				<th>Sl</th>
				<th>Title</th>
				<th>Slug</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@php
				$i=1
			@endphp
			@foreach(App\Models\HeaderBottom::all() as $header)
				<tr>
					<td>{{ $i++ }}</td>
					<td>{{ $header->title }}</td>
					<td>{{ $header->slug }}</td>
					<td>
						
						<a href="" class="btn btn-primary" data-toggle="modal" data-target="#edit{{$header->id}}">edit</a>
						
						<!-- Button trigger modal -->
						

						<!-- Modal -->
						<div class="modal fade" id="edit{{$header->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						  <div class="modal-dialog" role="document">
						    <div class="modal-content">
						      <div class="modal-header">
						        <h5 class="modal-title" id="exampleModalLabel">Edit Title and Slug</h5>
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						          <span aria-hidden="true">&times;</span>
						        </button>
						      </div>
						      <div class="modal-body">
						        <form action="{{ Route('admin.headerBottom.update') }}" method="post">
									@include('backEnd.partials.messages')
									@csrf
									<input type="hidden" name="id" value="{{ $header->id}}">
									<div class="form-group">
										<label>Enter Title</label>
										<input type="text" name="title" class="form-control" value="{{ $header->title }}">
									</div>
									<div class="form-group">
										<label>Enter Slug</label>
										<input type="text" name="slug" class="form-control" value="{{ $header->slug }}">
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
						
					</td>
				</tr>
			@endforeach
		</tbody>
		<tfoot></tfoot>
	</table>
</div>
@endsection