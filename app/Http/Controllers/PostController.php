<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\PostLikes;
use App\Models\Post;
use App\Models\Visit;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use Illuminate\Auth\Middleware\Language;
use App\Models\PostSmiles;
use App\Models\PostDislikes;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $ipAddress = $request->ip();

        // $ip = '127.0.0.1';
        DB::table('visits')->insert([
            'user_ip' => ip2long($ipAddress),
        ]);
      
        $user = User::all();
       
        $posts = Post::all();
        //dd($posts);
      
        $postlikes = PostLikes::all();
        $ls=$postlikes->count('likes');

        $postsmiles = PostSmiles::all();
        $sm=$postsmiles->count('smiles');

        $postdislikes = PostDislikes::all();
        $ds=$postdislikes->count('dislikes');

        $visits = Visit::all();
        $vs=$visits->count('user_ip');
      

        return view('index', compact('posts', 'user','postlikes','ls','sm','ds','vs'));
        
        
    }

       
    public function changelocale($locale)
    {
        session(['locale' => $locale]);
        App::setLocale($locale);

        return redirect()->back();
    }


    
    public function create(Request $request)
    {
       
    }


    public function store(Request $request)
    {
      
         
    }

    

    
    public function show($id)
    {
        //
    }

  
    public function edit($id)
    {
        
    }

   
    public function update(Request $request, $id)
    {
        //
    }

   
    public function destroy($id)
    {
        //
    }
}
