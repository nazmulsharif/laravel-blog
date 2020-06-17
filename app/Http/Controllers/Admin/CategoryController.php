<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Session;

class CategoryController extends Controller
{
    
    public function index(){
    	return view('backEnd.pages.category.index');
    }
    public function create(){
    	return view('backEnd.pages.category.create');	
    }
     public function store(Request $request){
     	$this->validate($request,[
     		'name'=>'required'],
     		[
     			'name.required'=> 'Please Enter category name'
     		]
     	);
     	$category = new Category();
     	$category->name = $request->name;
     	$category->save();
     	Session::flash('success','A new Category has successfully created');
    	return back();	
    }
    public function update(Request $request){
    	$this->validate($request,[
     		'name'=>'required'],
     		[
     			'name.required'=> 'Please Enter category name'
     		]
     	);
     	$category = Category::find($request->id);
     	$category->name = $request->name;
     	$category->save();
     	return back();
    }
    public function delete($id){
    	$category = Category::find($id);
    	$category->delete();
    	return back();

    }
}
