<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\PostController;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\PostLikes;
use App\Models\PostSmiles;
use App\Models\PostDislikes;
use App\Models\Comment;
use App\Models\Visit;

class LikesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $comments = Comment::all();
        $user_auth = Auth::user() ? User::where('id', Auth::user()->id)->first() : null;
        $user = User::all();
        //$us = mb_strtolower($user->name);

        $postlikes = PostLikes::all();
        $ls=$postlikes->count('likes');

        $postsmiles = PostSmiles::all();
        $sm=$postsmiles->count('smiles');

        $postdislikes = PostDislikes::all();
        $ds=$postdislikes->count('dislikes');

        $visits = Visit::all();
        $vs=$visits->count('user_ip');


        return view ('reviews', compact('comments','user','postlikes','ls','sm','ds','vs','user_auth'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response

     */


     public function get_likes($id)
    {
        $postlikes = PostLikes::all();
        $ls=$postlikes->count('likes');

        return response()->json($ls);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         //dd($request);
        //$ipAddress = $request->ip();
         //dd($ipAddress);
        // validate([
        //     'type' => 'required'
        // ]);
        if($request->type == '1')
        {
            PostLikes::create([

                'likes'=>$request->user_id,
                'user_id'=>$request->user_id,
            ]);
        }
        elseif($request->type == '2')
        {


            PostSmiles::create([

                'smiles'=>$request->user_id,
                'user_id'=>$request->user_id,
            ]);



        }
        elseif($request->type == '3')
        {

            PostDislikes::create([

                'dislikes'=>$request->user_id,
                'user_id'=>$request->user_id,

            ]);
        }


        // dd($request);


        return back()->withInput();
        // dd($request);
    }

    public function smile(Request $request)
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');


        $post = PostSmiles::create([

            'smiles'=>$request->user_id,

        ]);


        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        return back()->withInput();
    }


    public function dislike(Request $request)
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');


        $post = PostDislikes::create([

            'dislikes'=>$request->user_id,

        ]);


        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        return back()->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
