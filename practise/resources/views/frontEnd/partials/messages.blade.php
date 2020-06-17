


@if(Session::has('success'))
	<p class="alert alert-success">{{ Session::get('success')}}</p>
@endif
@if(Session::has('errros'))
	<p class="alert alert-danger">{{ Session::get('errors')}}</p>
@endif
@if(Session::has('reply_error'))
	<p class="alert alert-danger">{{ Session::get('reply_error')}}</p>
@endif