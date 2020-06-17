<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
class CategoryController extends Controller
{
    public function category(Request $request, $id){
	    $category = Category::query()
	        ->where('id', $id)
	        ->first();

	    $posts = Post::query()
	        ->where('category_id', $category->id)
	        ->orderBy('id','desc')
	        ->paginate(3);
    	return view('frontEnd.pages.category.view', with(['posts'=>$posts, 'category'=>$category]));
    }
}
