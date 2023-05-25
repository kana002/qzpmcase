<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Mail\ForgotPassword;
use Illuminate\Support\Facades\Password;
use Illuminate\Mail\Mailable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

 


    public function create()

    {
        return view('auth.forgot-password');
    }


    public function store(Request $request)
    {
       // dd($request);
       $data = $request->validate ([
            'email'=>'required|email|exists:users,email',
     
        ]);
  
        $user = User::where(["email" => $data["email"]])->first();      
        $password = uniqid();

        $user->password = bcrypt($password);
        $user->save();
        
        Mail::to($user)->send(new ForgotPassword($password));
        return back();

     
}
}