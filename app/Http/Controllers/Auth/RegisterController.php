<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function signup_verification($token){
        $userDetails = User::find($token);
        $userDetails->email_verified_at = date('Y-m-d H:i:s');
        if( $userDetails->save() ){
            Auth::login($userDetails);
            if($userDetails->roll_id == 1){
              return redirect()->back()->with(["login_success"=>'<div class="notice notice-success notice-sm"><strong>Success </strong> Login Successfully  !!! </div>']);  
            }
            elseif($userDetails->roll_id == 2){
                 return redirect()->back()->with(["login_success"=>'<div class="notice notice-success notice-sm"><strong>Success </strong> Login Successfully  !!! </div>']);
                }
        }
    }
   
    protected function sign_in(Request $request){ 
         $validatedData = $request->validate([
              'name' => 'required', 'email'=>'required|email|unique:users' , 'password'=>'required' , 'confirm_password'=>'required' , 'roll_type'=>'required' ]);
        $result=  User::sign_in($request);
		// print_r($request->input->post()); die; 
        if($result != NULL){
        //    Notification::send($result, new SignupVerification($result->id));
		   return redirect()->back()->with(["msg"=>'<div class="notice notice-success notice"><strong>Success </strong> Registration  Successfully  ,  verification mail send in your registered mail , please verify . !!! </div>']);  
			}
		  elseif($result->roll_id == 2){
			  return redirect()->back()->with(["msg"=>'<div class="notice notice-danger notice"><strong> Wrong </strong> Please try again  !!! </div>']);
			}
    }

}
