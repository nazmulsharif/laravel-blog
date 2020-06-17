@if($errors->any())
	@foreach($errors->all() as $error)
		<h6 class="alert alert-danger">{{ $error }}</h6>
	@endforeach
@endif