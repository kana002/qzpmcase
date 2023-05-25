<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Post;
use App\Models\Title;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        return view('admin.auth.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show_index()
    {

        $posts = Post::all();
        $titles = Title::all();

        return view('admin.index', compact('posts','titles'));
    }

    public function post_store(Request $request)
    {
        // dd($request);
        if($request->type == '1')
        {
            Post::create([
    
                'description_kz'=>$request->description_kz,
                'description_ru'=>$request->description_ru,
                'description_en'=>$request->description_en,
                
            ]);
        }
       
        elseif($request->type == '2')
        {
        

            Title::create([
    
                'title_kz'=>$request->title_kz,
                'title_ru'=>$request->title_ru,
                'title_en'=>$request->title_en,
                
            ]);
    
            
        }
         
        
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
        $request->validate ([
            'email'=>'required|email',
            'password'=>'required',
        ]);
        
        $validated = auth()->attempt([
            'email'=>$request->email,
            'password'=>$request->password,
            'is_admin'=>1
        ]);

       // dd($validated);
        if($validated){
            
            return redirect()->route('admin.index');
        }
        else{
            return redirect()->back();
        }
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

    public function logout()
    {
        Session::flush();
        
        Auth::logout();

        return redirect('login');
    }
}
