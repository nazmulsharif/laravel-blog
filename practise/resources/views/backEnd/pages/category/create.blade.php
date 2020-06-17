@extends('backEnd.layouts.master')
@section('content')
<div class="container">
	<h2>Create Category</h2>

	<form action="{{ Route('admin.category.store') }}" method="post">
		@include('backEnd.partials.messages')
		@csrf
		<div class="form-group">
			<label>Category Name</label>
			<input type="text" name="name" class="form-control">
		</div>
		<div class="form-group">
			<input type="submit" name="" class="btn btn-success">
		</div>
	</form>
	
</div>
@endsection