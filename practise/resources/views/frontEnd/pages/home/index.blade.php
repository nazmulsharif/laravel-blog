@extends('frontEnd.layouts.master')
@section('cover-photo')
	
	<div class="cover-photo">

		<img src="{{ asset('images/cover2.jpg')}}">
		<div class="overlay"></div>
	</div>
	
@endsection
@section('content')
	<div class="content-area">
		@foreach($posts as $post)
			<h2>{{$post->name}}</h2>
			<div class="line"></div>
			<p><i class="fa fa-calendar"></i> {{ $post->created_at->timezone('Asia/Dhaka')->format('Y-m-d h:i:s A') }}</p>

			<p class="text-justify lead" style="line-height: 2em;">{{$post->short_desc}}</p>
			<a href="{{ Route('post.view', ['id'=>$post->id,'name' =>$post->name])}}" class="btn btn-danger">বিস্তারিত</a>
			<hr>
		@endforeach			
	</div>
	
	
@endsection
@section('pagination')
	{{ $posts->links()}}
@endsection