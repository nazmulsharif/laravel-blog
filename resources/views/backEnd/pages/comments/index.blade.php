@extends('backEnd.layouts.master')
@section('content')
<div class="container">
	<h2>Manage comment</h2>
	<table class="table">
		<thead>
			<tr>
				<th>Sl</th>
				<th>User Name</th>
				<th>User Image</th>
				<th>Post Title</th>
				<th>Comment</th>
				<th>Status</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@php
				$i=1
			@endphp
			@foreach($comments as $comment)
				<tr>
					<td>{{ $i++ }}</td>
					<td>
						@foreach(App\Models\User::where('id', $comment->user_id)->get() as $user)
							{{ $user->name }}
						@endforeach
					</td>
					<td>
						@foreach(App\Models\User::where('id', $comment->user_id)->get() as $user)
							<img src="{{  asset('images/user/'.$user->image)}}" alt="" width="80px">
						@endforeach
					</td>
					<td>
						@foreach(App\Models\Post::where('id', $comment->post_id)->get() as $post)
							{{ $post->name  }}
						@endforeach
					</td>
					<td>{{ $comment->comment }}</td>
					<td>
						@if($comment->accepted == true)
							<a href="{{ route('comment.change',$comment->id) }}" class="btn btn-success">accepted</a>
						@else
							<a href="{{ route('comment.change', $comment->id) }}" class="btn btn-danger">not accepted</a>
						@endif
					</td>
					<td>
						
						<a href="" class="btn btn-primary" data-toggle="modal" data-target="#edit{{$comment->id}}">edit</a>
						<a href="" class="btn btn-danger"data-toggle="modal" data-target="#delete{{$comment->id}}">delete</a>
						<!-- Button trigger modal -->
						

						<!-- Modal -->
						<div class="modal fade" id="edit{{$comment->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						  <div class="modal-dialog" role="document">
						    <div class="modal-content">
						      <div class="modal-header">
						        <h5 class="modal-title" id="exampleModalLabel">Edit comment</h5>
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						          <span aria-hidden="true">&times;</span>
						        </button>
						      </div>
						      <div class="modal-body">
						        <form action=" " method="post">
									@include('backEnd.partials.messages')
									@csrf
									<input type="hidden" name="id" value="{{ $comment->id}}">
									<div class="form-group">
										<label>comment Name</label>
										<input type="text" name="name" class="form-control" value="{{ $comment->name }}">
									</div>
									<div class="form-group">
										<input type="submit" name="" class="btn btn-success" value="update">
									</div>
								</form>
						      </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						  
						      </div>
						    </div>
						  </div>
						</div>
						<!---Delete comment------>
						<div class="modal fade" id="delete{{$comment->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						  <div class="modal-dialog" role="document">
						    <div class="modal-content">
						      <div class="modal-header">
						        <h5 class="modal-title" id="exampleModalLabel">Delete comment</h5>
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						          <span aria-hidden="true">&times;</span>
						        </button>
						      </div>
						      <div class="modal-body">
						      	<form action="{{ Route('comment.del')}}" method="post">
						      		@csrf
						      		<input type="hidden" name = "comment_id" value="{{ $comment->id }} ">
						      		<input type="submit" class="btn btn-danger" value=" Confirm Delete">
						      	</form>
						      
						      </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						  
						      </div>
						    </div>
						  </div>
						</div>
					</td>
				</tr>
			@endforeach
		</tbody>
		<tfoot></tfoot>
	</table>
</div>
@endsection