
	<div class="sidebar-area">
		<h3>আমার সম্পর্কে</h3>
		<hr>
		<p> শরীফ, সফটওয়্যার ইঞ্জিনিয়ার</p>
		<div class="sidebar-icons mb-2">
				<!-- <a href="" class="fb"><i class="fa fa-facebook"></i></a>
				<a href="" class="tt"><i class="fa fa-twitter"></i></a>
				<a href="" class="li"><i class="fa fa-linkedin"></i></a>
				<a href="" class="yt"><i class="fa fa-youtube"></i></a> -->
				@foreach(App\Models\SocialIcon::all() as $icon)
					@php 
						$name = strtolower($icon->name);
						switch($name){
							case 'facebook':
								$class='fb';
								break;
							case 'twitter':
								$class='tt';
								break;
							case 'linkedin':
								$class='li';
								break;
							case 'youtube':
								$class='yt';
								break;
							default:
								$class = 'tt';
								break;

						}
					@endphp
					<a href="{{ $icon->link}}" target = {{ $icon->target }} class={{$class}}><i class="{{$icon->class}}"></i></a>
				@endforeach
			</div>
		<iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fweb.facebook.com%2Fnazmulict94%2F%3Fmodal%3Dadmin_todo_tour&tabs=timeline&width=340&height=500&small_header=true&adapt_container_width=false&hide_cover=false&show_facepile=false&appId" width="340" height="400" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
		<div class="all-post mt-2">
			<h5>এক নজরে-</h5>
			<div class="line"></div>
			@foreach(App\Models\Post::orderBy('id','desc')->get() as $post)
				<ul class="list-unstyled">
					<li class="list-item"><a href="{{ Route('post.view',$post->id)}}">{{ $post->name }}</a></li>
				</ul>
				
			@endforeach
		</div>
		
	</div>
	
	
