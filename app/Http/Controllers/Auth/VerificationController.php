<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\VerifiesEmails;
use App\Models\User;
use Session;
class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

   
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    public function verify($token){
        $user = User::where('remember_token',$token)->first();
        if(!is_null($user)){
            $user->status = 1;
            $user->remember_token = null;
            $user->save();
            Session::flash('success','Your email is confirmed');
            return redirect('/login');
        }
        else{
             Session::flash('error','Your email is not confirmed');
            return redirect('/register');
        }
    }
}
