<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ReplyReply;
use Auth;

class ReplyReplyController extends Controller
{
    public function store(Request $request){
    	$replyreply = new ReplyReply();
    	$replyreply->reply = $request->reply;
    	$replyreply->comment_id = $request->comment_id;
    	$replyreply->post_id = $request->post_id;
    	$replyreply->user_id =Auth::id();
    	$replyreply->reply_id = $request->reply_id;
    	$replyreply->save();
    	return back();
    }
}
