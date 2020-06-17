<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Str;

class PostController extends Controller
{
  
    public function view(Request $request,$id){
    	$post = Post::find($id);
    	return view('frontEnd.pages.post.view', compact('post',$post));
    }
}
