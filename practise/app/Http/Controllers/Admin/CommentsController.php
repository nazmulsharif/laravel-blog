<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
class CommentsController extends Controller
{
    public function manage(){
    	$comments = Comment::all();
    	return view('backEnd.pages.comments.index', compact('comments', $comments));
    }
    public function delete(Request $request){
    	$id = $request->comment_id;
    	$comment = Comment::find($id);
    	$comment->delete();
    	return back();
    }
    public function change($id){
    	$comment = Comment::find($id);
    	if($comment->accepted){
    		$comment->accepted = false;
    	}
    	else
    		$comment->accepted = true;
    	$comment->save();
    	return back();
    }
}
