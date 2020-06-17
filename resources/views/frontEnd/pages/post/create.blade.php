@extends('frontEnd.layouts.master')
@section('content')
	<div class="container">
		@include('frontEnd.partials.messages')
		<form action ="{{ Route('post.store')}}" method="post" enctype="multipart/form-data">
			@csrf
			<div class="form-group">
				<label>Enter Post Title</label>
				<input type="" name="title" class="form-control">
			</div>
			<div class="form-group">
				<label>Enter Post Image</label>
				<input type="file" name="img" class="form-control">
			</div>
			<div class="form-group">
				<label>Enter Post Description</label>
				<textarea name="desc" class="form-control" rows="5"></textarea>
			</div>
			<div class="form-group">
				<label>Enter Category</label>
				<select name="category_id">
					<option>--select category--</option>
					@foreach(App\Models\Category::all() as $category)
						<option value="{{$category->id}}">{{$category->name}}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<input type="submit" name="" class="btn btn-success">
			</div>
		</form>
		
	</div>
@endsection