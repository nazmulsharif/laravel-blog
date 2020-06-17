<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Session;
use App\Notifications\VerifyRegistration;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('web')->except('logout');
    }
    public function login(Request $request){
        $this->validate($request,[
            'email'=>'required',
            'password'=>'required',
        ]);
        $user = User::where('email',$request->email)->first();
        if(!is_null($user)){
            if($user->status == 1){
                if(Auth::guard('web')->attempt(['email'=>$request->email,'password'=>$request->password], $request->remember_token)){
                    return redirect()->intended(route('index'));
                }
             }
             else{
                Session::flash('error','User is not successfully confirmed');
                $user->notify(new VerifyRegistration($user));
                Session::flash('success','A new Confirmation email has sent to you.');
                return back();
             }
        }
        else{
            Session::flash('error', 'Error!!you are not registered yet');
            return back();
        }
        
    }
   
    public function logout(Request $request) {
      Auth::logout();
      return redirect('/');
    }

}
