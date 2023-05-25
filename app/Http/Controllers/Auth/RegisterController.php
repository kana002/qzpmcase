<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\BlockController;
use App\Http\Controllers\PostController;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Country;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {    
        // dd($request);

        $this->middleware('guest');
    }

    public function register()
    {    
         //dd($request);

        return view('auth.register');
    }

    public function rezident(){

        
        $user = Auth::user();
        $coutries = Country::all();
        //dd($coutry);
        return view('auth.rezident', compact('coutries'));
    }


    public function store(Request $request){
        
        //dd($request);
        $user = Auth::user();

        User::where('id', $request->id)->update([
          
            'name' => $request['subjectCn'],
                            
        ]);


       
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        // dd($data);
        // $user = Auth::user();
        // return Validator::make($data, [
        //     'name' => ['required', 'string', 'max:255'],
        //     'fullname' => ['string', 'max:255'],
        //     'country_id' => ['required', 'string', 'max:255'],
        //     'citizenship_id' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        //     'password' => ['required', 'string', 'min:8', 'confirmed'],
        // ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(Request $request )
    { 
        //dd ($request);
        if($request->type == '1')
        {
            $user = User::create([

                'name' => $request['name'],
                'rez' => $request['rez'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
            ]);
            Auth::login($user);
        }
        
       //dd($data);
       if($request->type == '2')
       {
         $user = User::create([

            'name' => $request['name'],
            'rez' => $request['rez'],
            'country_id' => $request['country_id'],
            'citizenship_id' => $request['citizenship_id'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
          
        ]);
          
        Auth::login($user);

    }

     return redirect()->action([PostController::class, 'index']);

    }
}
