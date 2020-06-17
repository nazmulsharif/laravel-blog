<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SocialIcon;
use Image;
use Session;
use App\Models\HeaderBottom;
use Illuminate\Support\Facades\File; 
class PagesController extends Controller
{
	
    public function index(){
    	return view('backEnd.pages.home.index');
    }
    public function socialIcons(){
    	return view('backEnd.pages.header.social-icons.index');
    }
    public function socialIconsCreate(){
    	return view('backEnd.pages.header.social-icons.create');
    }
    public function socialIconsStore(Request $request){

    	$this->validate($request,[
    		'name'=>'required',
    		'link'=>'required',
            'img'=>'nullable|image',
    	]);
    	$icon = new SocialIcon();
    	$icon->name = $request->name;
    	$icon->link = $request->link;
    	$icon->class = $request->class;
        $icon->target = $request->target;
    	if(!is_null($request->img)){
        		$img = time().'.'.$request->file('img')->getClientOriginalExtension();
                $location = public_path('images/social-icons/'.$img);
                Image::make($request->img)->save($location);
	    		$icon->icon = $img;
                
    	}
      	$icon->save();
    	Session::flash('success','icon has been added successfully');
    	return back();
    }
     public function socialIconsUpdate(Request $request){

    	$this->validate($request,[
    		'name'=>'required',
    		'link'=>'required',
            'img'=>'nullable|image',
    	]);
    	$icon = SocialIcon::find($request->id);
    	$icon->name = $request->name;
    	$icon->link = $request->link;
    	$icon->class = $request->class;
        $icon->target = $request->target;
    	if(!is_null($request->img)){
        		$img = time().'.'.$request->file('img')->getClientOriginalExtension();
                $location = public_path('images/social-icons/'.$img);
                Image::make($request->img)->save($location);
	    		$icon->icon = $img;
                
    	}
      	$icon->save();
    	Session::flash('success','icon has been updated successfully');
    	return back();
    }
    
     public function socialIconsDelete($id){
     	$icon = SocialIcon::find($id);
     	$icon->delete();
    	return back();
    }
    public function headerManage(){
    	return view('backEnd.pages.header.header-bottom');
    }
    public function headerUpdate(Request $request){
    	$header = HeaderBottom::find($request->id);
    	$header->title = $request->title;
    	$header->slug = $request->slug;
    	$header->save();
    	return back();
    }
}
