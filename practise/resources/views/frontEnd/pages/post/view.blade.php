@extends('frontEnd.layouts.master')
@section('content')
		<h4 class="text-center">{{$post->name}}</h4>
		<div class="line"></div>
			@foreach($post->images as $image)
				<img src="{{ asset('images/posts'.$image->image) }}" width="100%">
			@endforeach
			<p class="text-justify lead" style="line-height: 2em;">{{$post->desc}}</p>
			<p><a href=""></a></p>
			@if(Auth::check()) 
				<h6 class="text-success">হেলো, {{ Auth::user()->name}} <span class="text-primary">মন্তব্য করুন, </span></h6>
				<form action="{{ Route('comment.store' )}}" method="post">
					@csrf
					<div class="form-group">
						<input type="hidden" class="form-control" name="post_id" value="{{ $post->id }}">
					</div>
					<div class="form-group">
						<textarea class="form-control" placeholder="মন্তব্য করুন" name="comment"></textarea>
					</div>
					<input type="submit" name="" class="btn btn-primary" value="মন্তব্য করুন">
				</form>
				@else
					<p>মন্তব্য করতে <a href="{{Route('login')}}">লগইন করুন</a> অথবা <a href="{{Route('register')}}">নিবন্ধন করুন</a></p>
			@endif
			<h4 class="mb-2 text-center text-success">Display Comments ({{ count($post->comments) }})</h4>
			<div class="comment-area my-4">

				@include('frontEnd.partials.messages')
				
				@if(count($post->comments)<1)
					<h6 class="text-center">{{ "There are no comments in this post." }}</h6>
				@else
					@foreach( $post->comments as $comment)
						@if($comment->accepted)
							@foreach(App\Models\User::where('id',$comment->user_id)->get() as $user)
								<div class="line"></div>
								<div class="my-2">
									@if(!is_null($user->image))
										<img src="{{ asset('images/user/'.$user->image)}}" alt=""width="50px" height="50px">
									@endif
									<span>{{ $user->name }} <span class="text-success font-weight-bold"> {{ $comment->comment }}</span></span><br>
								
									@foreach(App\Models\Reply::where('comment_id',$comment->id)

																->where('parent_id',NULL)->get() as $reply )
										<div class="my-2">
											<div class="row">
												<div class="col-md-2"></div>
												<div class="col-md-10">
													@foreach(App\Models\User::where('id',$reply->user_id)->get() as $user )
													<!-- @php 
														$grav_url = "https://www.gravatar.com/avatar/" . md5( strtolower( trim( 'nazmulictcou@gmail.com' ) ) );
														@endphp -->
														<img src="{{ asset('images/user/'.$user->image)}}" alt=""width="50px" height="50px">{{ $user->name}} <span class="text-success font-weight-bold">{{ $reply->reply }}</span><br>
														<input type="button" class="btn btn-dark py-0 px-1" value="reply" id="reply{{$reply->id}}">
														

														@foreach(App\Models\Reply::where('comment_id',$comment->id)															
																->where('parent_id',$reply->id)->get() as $reply )
																@foreach(App\Models\User::where('id',$reply->user_id)->get() as $user )
																	<div class="my-2 ml-5">
																		<img src="{{ asset('images/user/'.$user->image)}}" alt=""width="50px">{{ $user->name}} <span class="text-success font-weight-bold">{{ $reply->reply }}</span><br>
																		<input type="button" class="btn btn-dark py-0 px-1" value="reply">
																	</div>

																	
																@endforeach
														@endforeach
														<!-- @foreach(App\Models\ReplyReply::where('reply_id',$reply->id)->get() as $replyreply )
														-----------------------------------------------------------{{ $replyreply->reply }}<br>
														
														@endforeach
														<div class="reply-area my-1" id="reply-area{{$reply->id}}">
															<div class="row">
																<div class="col-md-6"></div>
																<div class="col-md-6">
																	<form action="{{ Route('replyreply.store') }}" method="post">
																		@csrf
																		<input type="text" name="reply">
																		<input type="hidden" name="reply_id" value="{{$reply->id}}">
																		<input type="hidden" name="comment_id" value="{{ $comment->id }}">
																		<input type="hidden" name="post_id" value="{{ $post->id }}">
																		<input type="submit" name="submit" class="btn btn-primary" value="reply">
																	</form>
																</div>
															</div>
															
														</div>
														 -->
														<br>

													@endforeach
												</div>
											</div>
											
										</div>
										
									@endforeach
									<form action="{{Route('reply.store')}}" method="post">
										@csrf
										<input type="hidden" class="" name ="comment_id" value="{{ $comment->id }}">
										<input type="hidden" class="" name ="post_id" value="{{ $comment->post_id }}">
										<input type="text" class="" name ="reply">
										<input type="submit" class="btn btn-success" value="reply" id="reply">
									</form>
									
								</div>
								
							@endforeach
						@endif
						<!-- <div class="my-2">
							@foreach(App\Models\User::where('id',$comment->user_id)->get() as $user)
								
								<img src="{{ asset('images/user/'.$user->image)}}" width="80px">
								<span>{{ $user->name }} <span class="text-success">{{ $comment->comment }}</span></span>
								@foreach(App\Models\Reply::where('comment_id',$comment->id)->get() as $reply)
									<p>-----------------------------------------{{$reply->reply}}</p>
								@endforeach
							
							@if(Auth::check())
									
								@if(Auth::user()->id == $comment->user_id)
									<a  class="btn btn-primary" id="edit">edit</a>
									<a href=""data-toggle="modal" data-target="#delete{{$comment->id}}"class="btn btn-danger">delete</a>
									<div class="edit-area mt-2" id="edit-area">
										<form action="{{ Route('comment.update', $comment->id ) }}">
											<div class="">
												<div class="row">
													<div class="col-md-3"></div>
													<div class="col-md-6">
														<textarea  class="form-control"name="comment" >{{ $comment->comment}}</textarea>
													</div>
												</div>
												
												<div class="row mt-2">
													<div class="col-md-4"></div>
													<div class="col-md-6">
														<input type="submit" class="btn btn-success" value="update">
													</div>
												</div>
											</div>														
										</form>
									</div>
									
						
									Modal
									<div class="modal fade" id="delete{{$comment->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
									  <div class="modal-dialog" role="document">
									    <div class="modal-content">
									      <div class="modal-header">
									        <h5 class="modal-title" id="exampleModalLongTitle">Are you sure?</h5>
									        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
									          <span aria-hidden="true">&times;</span>
									        </button>
									      </div>
									      <div class="modal-body">
									        <a href = "{{ Route('comment.delete', $comment->id)}}" class="btn btn-danger" style="cursor: pointer;">Delete</a>
									      </div>
									      <div class="modal-footer">
									        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									       
									      </div>
									    </div>
									  </div>
									</div>
								@endif
							@endif
						
							@endforeach
						</div> -->
					@endforeach
				@endif
			</div>
				
@endsection

	@section('scripts')
	<script>
		/*$('#edit').click(function(){
			$('#edit-area').toggle();
		});
		$('#reply').click(function(){
			$('#reply-area').toggle();
		});*/
		var value = $('#replyreply').val();
		
		$('#replyreply').click(function(){
			console.log("Hello");
		})
	</script>
	
@endsection