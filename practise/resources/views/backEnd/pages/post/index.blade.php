@extends('backEnd.layouts.master')
@section('content')
<div class="container">
	<h2>Manage post</h2>
	<table class="table">
		<thead>
			<tr>
				<th>Sl</th>
				<th>Name</th>
				<th>Image</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@php
				$i=1
			@endphp
			@foreach($posts as $post)
				<tr>
					<td>{{ $i++ }}</td>
					<td>{{ $post->name }}</td>
					@if(count($post->images)<1)
						<td>No image</td>
					@endif
					@foreach($post->images as $image)
					<td>
						@if(!is_null($image->image))
							<img src="{{ asset('images/posts'.$image->image)}}" width="100px">
						@else
							No Image
						@endif
					</td>
					@endforeach
					<td>
						
						<a href="" class="btn btn-primary" data-toggle="modal" data-target="#edit{{$post->id}}">edit</a>
						<a href="" class="btn btn-danger"data-toggle="modal" data-target="#delete{{$post->id}}">delete</a>
						<!-- Button trigger modal -->
						

						<!-- Modal -->
						<div class="modal fade" id="edit{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						  <div class="modal-dialog" role="document">
						    <div class="modal-content">
						      <div class="modal-header">
						        <h5 class="modal-title" id="exampleModalLabel">Edit post</h5>
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						          <span aria-hidden="true">&times;</span>
						        </button>
						      </div>
						      <div class="modal-body">
									@include('frontEnd.partials.messages')
									<form action ="{{ Route('admin.post.update')}}" method="post" enctype="multipart/form-data">
										@csrf
										<div class="form-group">
											<input type="hidden" name="id" class="form-control" value="{{ $post->id}}">
										</div>
										<div class="form-group">
											<label>Enter Post Title</label>
											<input type="text" name="name" class="form-control" value="{{ $post->name}}">
										</div>
										<div class="form-group">
											<label>Enter Post Image</label>
											<input type="file" name="img" class="form-control">
										</div>
										<div class="form-group">
											<label>Enter Post Short Description</label>
											<textarea name="short_desc" class="form-control" rows="5">{{$post->short_desc}}</textarea>
										</div>
										<div class="form-group">
											<label>Enter Post Description</label>
											<textarea name="desc" class="form-control" rows="5">{{$post->desc}}</textarea>
										</div>
										<div class="form-group">
											<label>Enter Category</label>
											<select name="category_id">
												<option>--select category--</option>
												@foreach(App\Models\Category::all() as $category)
													<option value="{{$category->id}}" {{ $category->id == $post->category_id? 'selected':''}}>{{$category->name}}</option>
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
						<!---Delete post------>
						<div class="modal fade" id="delete{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						  <div class="modal-dialog" role="document">
						    <div class="modal-content">
						      <div class="modal-header">
						        <h5 class="modal-title" id="exampleModalLabel">Delete post</h5>
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						          <span aria-hidden="true">&times;</span>
						        </button>
						      </div>
						      <div class="modal-body">
						        <a href="{{ Route('admin.post.delete', $post->id) }}" class="btn btn-danger"> Confirm Delete</a>
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