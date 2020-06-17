<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Reply;
use Session;
class ReplyController extends Controller
{
   public function store(Request $request){
   		$reply = new Reply();
   		if(Auth::check()){
   			$reply->reply = $request->reply;
	   		$reply->comment_id = $request->comment_id;
	   		$reply->post_id = $request->post_id;
	   		$reply->user_id = Auth::id();
	   		$reply->ip_address = $request->ip();
	   		$reply->save();
   		}
   		else{
   			Session::flash('reply_error','you must sign up or login to reply any post');
   			return back();
   		}
   		return back();
   }
}
