<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CoverPhoto;
use Session;
use Image;
use Illuminate\Support\Facades\File;

class CoverPhotosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function manage()
    {
        $coverPhotos = coverPhoto::all();
        return view('backEnd.pages.coverPhoto.index', compact('coverPhotos',$coverPhotos));
        
    }
    public function create()
    {
         return view('backEnd.pages.coverPhoto.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
            'slug'=>'nullable',
            'img'=>'required',
        ]);
        $cover = new CoverPhoto();
        $cover->title = $request->title;
        $cover->slug = $request->slug;
        $cover->category_id = $request->category_id;   
        if(!is_null($request->img)){
                $img = time().'.'.$request->file('img')->getClientOriginalExtension();
                $location = public_path('images/coverphotos'.$img);
                Image::make($request->img)->save($location);
                $cover->image = $img;
                
        }
        $cover->save();
        Session::flash('success','Cover Photo has been added successfully');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
         $this->validate($request,[
            'title'=>'required',
            'slug'=>'nullable',
            'img'=>'nullable',
        ]);
        $cover = CoverPhoto::find($request->id);
        $cover->title = $request->title;
        $cover->slug = $request->slug;
        $cover->category_id = $request->category_id;   
        if(!is_null($request->img)){
                $img = time().'.'.$request->file('img')->getClientOriginalExtension();
                $location = public_path('images/coverphotos'.$img);
                Image::make($request->img)->save($location);
                $cover->image = $img;
                
        }
        $cover->save();
        Session::flash('success','Cover Photo has been updated successfully');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $coverPhoto = CoverPhoto::find($id);
       
        $image_path = public_path('images/cover'.$coverPhoto->image);
            if (File::exists($image_path)) {
                    //File::delete($image_path);
                    unlink($image_path);
        }
         $coverPhoto->delete();
        
        return back();

    }
    
}
