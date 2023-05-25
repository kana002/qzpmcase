<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\PostLikes;
use App\Models\Post;
use App\Models\Comment;
use App\Models\AnswersToComment;


class CommentController extends Controller
{

    public function index()
    {

    }


    public function create(Request $request)
    {
        //dd($request);
        if($request->type == '1'){
            Comment::create([
                'description' => $request->description,
                'user_id'=>$request->user_id,
                'answer_for_comment_id' => 0
            ]);
        }

        if($request->type == '2'){
            AnswersToComment::create([
                'description' => $request->answer_description,
                'user_id'=>$request->user_id,
                'comment_id'=>$request->comment_id,
            ]);
        }



        return back()->withInput();
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
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
