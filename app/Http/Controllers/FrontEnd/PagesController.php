<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Models\PostImage;
use Session;
use Image;
class PagesController extends Controller
{
   
    public function index(){
        $posts = Post::orderBy('id','desc')->paginate(2);
        return view('frontEnd.pages.home.index', compact('posts',$posts));
    }


    
}
