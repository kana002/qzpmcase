<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use App\Http\Controllers\PostController;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
 
    public function home()
    {

        $comments = Comment::all();
        // dd($posts);
        $user = User::where('id', Auth::user()->id)->first();
        $us = mb_strtolower($user->name);

        
        return view('home', compact('us','comments','user'));
    }

    public function logout()
    {
        //return view('home');
    }
    public function likes()
    {
        return view('likes');
    }
    public function mainmenu()
    {
        return view('pages.mainmenu');
    }
}
