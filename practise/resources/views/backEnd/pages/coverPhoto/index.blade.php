@extends('backEnd.layouts.master')
@section('content')
<div class="container">
	<h2>Manage coverPhoto</h2>
	<table class="table">
		<thead>
			<tr>
				<th>Sl</th>
				<th>Title</th>
				<th>Slug</th>
				<th>Image</th>
				<th>Category</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@php
				$i=1
			@endphp
			@foreach($coverPhotos as $coverPhoto)
				<tr>
					<td>{{ $i++ }}</td>
					<td>{{ $coverPhoto->title }}</td>
					<td>{{ $coverPhoto->slug }}</td>
					<td>
						@if(!is_null($coverPhoto->image))
							<img src="{{ asset('images/coverPhotos'.$coverPhoto->image)}}" width="100px">
						@else
							No Image
						@endif
					</td>
					
					<td>
						@foreach(App\Models\Category::where('id', $coverPhoto->category_id)->get() as $category)
							{{ $category->name}}
						@endforeach
					</td>
					<td>
						
						<a href="" class="btn btn-primary" data-toggle="modal" data-target="#edit{{$coverPhoto->id}}">edit</a>
						<a href="" class="btn btn-danger"data-toggle="modal" data-target="#delete{{$coverPhoto->id}}">delete</a>
						<!-- Button trigger modal -->
						

						<!-- Modal -->
						<div class="modal fade" id="edit{{$coverPhoto->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						  <div class="modal-dialog" role="document">
						    <div class="modal-content">
						      <div class="modal-header">
						        <h5 class="modal-title" id="exampleModalLabel">Edit coverPhoto</h5>
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						          <span aria-hidden="true">&times;</span>
						        </button>
						      </div>
						      <div class="modal-body">
									@include('frontEnd.partials.messages')
									<form action ="{{ Route('admin.coverPhoto.update')}}" method="post" enctype="multipart/form-data">
										@csrf
										<div class="form-group">
											<input type="text" name="id" class="form-control" value="{{ $coverPhoto->id}}">
										</div>
										<div class="form-group">
											<label>Enter coverPhoto Title</label>
											<input type="text" name="title" class="form-control" value="{{ $coverPhoto->title}}">
										</div>
										<div class="form-group">
											<label>Enter coverPhoto Slug</label>
											<input type="text" name="slug" class="form-control" value="{{ $coverPhoto->slug}}">
										</div>
										<div class="form-group">
											<label>Enter coverPhoto Image</label>
											<input type="file" name="img" class="form-control">
										</div>
										
										<div class="form-group">
											<label>Enter Category</label>
											<select name="category_id">
												<option>--select category--</option>
												@foreach(App\Models\Category::all() as $category)
													<option value="{{$category->id}}" {{ $category->id == $coverPhoto->category_id? 'selected':''}}>{{$category->name}}</option>
												@endforeach
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
						<!---Delete coverPhoto------>
						<div class="modal fade" id="delete{{$coverPhoto->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						  <div class="modal-dialog" role="document">
						    <div class="modal-content">
						      <div class="modal-header">
						        <h5 class="modal-title" id="exampleModalLabel">Delete coverPhoto</h5>
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						          <span aria-hidden="true">&times;</span>
						        </button>
						      </div>
						      <div class="modal-body">
						        <a href="{{ Route('admin.coverPhoto.delete', $coverPhoto->id) }}" class="btn btn-danger"> Confirm Delete</a>
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