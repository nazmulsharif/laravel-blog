<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Notifications\VerifyRegistration;
use Illuminate\Support\Str;
use Session;
use Image;
use Illuminate\Support\Facades\File;
class UsersController extends Controller
{
	public function create(){
		return view('backEnd.pages.user.create');
	}
	public function store(Request $request){
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->remember_token = Str::random(50);
        if(!is_null($request->image)){
                $img = time().'.'.$request->file('image')->getClientOriginalExtension();
                $location = public_path('images/user/'.$img);
                Image::make($request->image)->save($location);
                 $user->image =$img;
                
        }
        $user->save();
        return back();
    }
	
    public function manage(){
    	$users = User::all();
    	return view('backEnd.pages.user.index', compact('users',$users));
    }
    public function delete($id){
    	$user =  User::find($id);
    	$user->delete();
    	return back();
    }
}
