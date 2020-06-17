<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use Auth;
use Session;
class CommentsController extends Controller
{
    public function store(Request $request){
    	$this->validate($request,[
    		'comment'=> 'required'
    	]);
    	$comment = new Comment();
    	$comment->comment = $request->comment;
    	$comment->user_id= Auth::id();
        $comment->post_id= $request->post_id;
    	$comment->ip_address = $request->ip();
        $comment->accepted = true;
    	$comment->save();
    	/*Session::flash('success','Your Comment has sent to admin for approve');*/
    	return back();
    }
    public function update(Request $request,$id){
    	$this->validate($request,[
    		'comment'=> 'required'
    	]);
    	$comment = Comment::find($id);
    	$comment->comment = $request->comment;
    	$comment->user_id= Auth::id();
    	$comment->ip_address = $request->ip();
    	$comment->status = 0;
    	$comment->save();
    	Session::flash('success','Your Comment has sent to admin for approve');
    	return back();
    }
    public function delete($id){
    	$comment = Comment::find($id);
    	$comment->delete();
    	return back();
    }
}
