<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Auth;
use Notification;
use App\Notifications\SignupVerification;
use Session;
use App\Providers\RouteServiceProvider;


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
    // protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      $this->middleware('guest')->except('logout');
    }
    
    public function sign_in(Request $request){
	      $validatedData = $request->validate(array('email' => 'required','password' => 'required'));
        $user_details = User::get_user_details($request);
        
		if($user_details != NULL){ 
      
		     if(Hash::check($request->password, $user_details->password)){ 
           
           if($user_details->email_verified_at != NULL){  
            
                    session(['users_roll_type' =>$user_details->roll_id,'user_id'=>$user_details->id,'email'=>$user_details->email,'name'=>$user_details->name,'join_date'=>$user_details->join_date,'image'=>$user_details->image]); 
                    Auth::login($user_details); 
                   if($user_details->roll_id > 0 ){
                    return redirect('/dashboard')->with(["login_success"=>'<div class="alert alert-success""><strong>Success </strong> Login Successfully  !!! </div>']);
                   }
				  } 
				 else{   
				   return redirect('admin-login')->with(["msg"=>'<div class="alert alert-danger""><strong>Note </strong> Your email is not verified at , verification code send in your registered mail ,please verify your mail   !!! </div>']);
				  }  
	
				}
		     else{ 
				  return redirect('admin-login')->with(["msg"=>'<div class="alert alert-danger""><strong>Wrong </strong> Password does not match !!!</div>']);  
				}		
		 }
		else{ 
		  return redirect('admin-login')->with(["msg"=>'<div class="alert alert-danger""><strong>Wrong </strong> Email does not  match with this credential !!! </div>']);
		} 
	}

}
