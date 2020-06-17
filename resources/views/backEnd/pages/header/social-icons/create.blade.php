@extends('backEnd.layouts.master')
@section('content')
	<div class="container">
		@include('frontEnd.partials.messages')
		<form action ="{{ Route('admin.icon.store')}}" method="post" enctype="multipart/form-data">
			@csrf
			<div class="form-group">
				<label>Enter Icon Name</label>
				<input type="" name="name" class="form-control">
			</div>
			<div class="form-group">
				<label>Enter Icon Link</label>
				<input type="text" name="link" class="form-control">
			</div>
			<div class="form-group">
				<label>Enter Icon class</label>
				<input type="text" name="class" class="form-control">
			</div>
			<div class="form-group">
				<label>Enter Icon image</label>
				<input type="file" name="img" class="form-control">
			</div>
			<div class="form-group">
				<label>Enter Target</label>
				<select name="target" id="">
					<option value="">--Select--</option>
					<option value="_blank">New Page</option>
					<option value="_self">Self Page</option>
				</select>
			</div>
			<div class="form-group">
				<input type="submit" name="" class="btn btn-success">
			</div>
		</form>
		
	</div>
@endsection