@if(Session::has('errors'))
	<h3 class="alert alert-danger">{{ Session::get('errors')}}</h3>
@endif
@if(Session::has('error'))
	<h3 class="alert alert-danger">{{ Session::get('error')}}</h3>
@endif
@if(Session::has('success'))
	<h3 class="alert alert-success">{{ Session::get('success') }}</h3>
@endif