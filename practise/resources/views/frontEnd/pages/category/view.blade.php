
@extends('frontEnd.layouts.master')
@section('title',$category->name)
@section('cover-photo')
	
	<div class="cover-photo">
		@if(!is_null($category->coverphoto))
			@foreach($category->coverphoto as $image)
		  		<img src="{{ asset('images/coverphotos'.$image->image)}}">
				<div class="overlay">
					
				</div>
				<div class="text">
					<h1>{{$category->name}}</h1>
				</div>
		  	@endforeach
		@endif
	</div>
	
@endsection
@section('content')
	<div class="content-area">
		@if(count($posts)>0)
			
		@foreach($posts as $post)
			<h2>{{$post->name}}</h2>
			<div class="line"></div>
			<p><i class="fa fa-calendar"></i> {{ $post->created_at->timezone('Asia/Dhaka')->format('Y-m-d h:i:s A') }}</p>


			<p class="text-justify lead" style="line-height: 2em;">{{$post->short_desc}}</p>
			<a href="{{ Route('post.view', ['id'=>$post->id,'name' =>$post->name])}}" class="btn btn-danger">বিস্তারিত</a>
			<hr>
		@endforeach	
		@else
				<h6 class="text-danger">There is no post int this category</h6>
		@endif
		
	</div>
	
	
@endsection
@section('pagination')
	{{ $posts->links()}}
@endsection