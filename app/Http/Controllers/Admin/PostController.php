<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Session;
use App\Models\PostImage;
use Image;
use Illuminate\Support\Facades\File; 
class PostController extends Controller
{
    
    public function index(){
    	$posts = Post::all();
    	return view('backEnd.pages.post.index', compact('posts',$posts));
    }
    public function create(){
    	return view('backEnd.pages.post.create');
    }
    public function store(Request $request){
    	$this->validate($request,[
    		'title'=>'required',
    		'short_desc'=>'required',
            'desc'=>'required',
    		'category_id'=>'required'],
    		[
    			'title.required'=> 'Post Title is must be required',
                'short_desc.required'=> 'Short description is must be required',
    			'desc.required'=> 'Description is must be required',

    		]

    	);
    	$post = new Post();
    	$post->name = $request->title;
    	$post->short_desc = $request->short_desc;
        $post->desc = $request->desc;
        $post->admin_id = 1;
    	$post->category_id = $request->category_id;
    	$post->save();
    	if(!is_null($request->img)){
        		$postImage = new PostImage();
        		$img = time().'.'.$request->file('img')->getClientOriginalExtension();
                $location = public_path('images/posts'.$img);
                Image::make($request->img)->save($location);
	    		$postImage->image = $img;
	    		$postImage->post_id = $post->id;
	    		$postImage->save();
                
    	}
       
    	Session::flash('success','Post has been added successfully');
    	return back();
    }
    public function update(Request $request){
    $this->validate($request,[
    		'name'=>'required',
    		'desc'=>'required',
    		'category_id'=>'required'],
    		[
    			'name.required'=> 'Post Title is must be required',
    			'desc.required'=> 'Description is must be required',

    		]

    	);
    	$post = Post::find($request->id);
    	$post->name = $request->name;
    	$post->desc = $request->desc;
    	$post->category_id = $request->category_id;
    	$post->save();
    	if(!is_null($request->img)){
        		$postImage = new PostImage();
        		$img = time().'.'.$request->file('img')->getClientOriginalExtension();
                $location = public_path('images/posts'.$img);
                Image::make($request->img)->save($location);
	    		$postImage->image = $img;
	    		$postImage->post_id = $post->id;
	    		$postImage->save();
                
    	}
    	Session::flash('success','Post has been added successfully');
    	return back();
    }
    public function delete($id){
    	$post = Post::find($id);
    	$post->delete();
    	if(!is_null($post->images)){
	    		foreach($post->images as $image){
	    		$image->delete();
	    		$image_path = public_path('images/posts'.$image);
	    		if (File::exists($image_path)) {
			        //File::delete($image_path);
			        unlink($image_path);
			    }
    		}
    	}
    	
    	return back();

    }
}
