<?php

namespace App;
use Laravel\Passport\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email','email_verified_at','phone','password','confirm_password','address','join_date','image','remember_token','roll_id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public static function sign_in($request){



       
        if($request->image)
        {
            $imageName=date('Ymdhisa').time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('images/users'), $imageName);
            $request->image=$imageName; 
        } 
            
         $result = User::create([
              'name' =>$request->name, 
              'email'=>$request->email, 
              'phone'=>$request->phone,  
              'password'=>Hash::make($request->password),
              'confirm_password'=>Hash::make($request->confirm_password),
              'address'=>$request->address, 
              'latitude'=>$request->latitude,
              'longitude'=>$request->longitude,
              'email_verified_at'=>date('Y-m-d H:i:s'),
              'join_date'=>$request->join_date, 
              'image'=>$request->image,
              'roll_id'=>$request->roll_id
          ]);
          return $result;
      }
      
    public static function get_user_details($request){
	   return User::where('email' , $request->email)->first();
    }
    public static function get_all_users()
    {
        // return User::where('status' , '1')->where('roll_id', '!=' , '1')->get();
        return User::where('status' , '1')->get();
    }

    public static function get_by_id($request){
	    return User::where('id' ,$request->row_id)->first();
    }

    // delete users 
    public static function delete_user($request)
    {
        if($request->image){
            $res=File::delete('public/images/users/' .$request->image);
        }
        return User::where('id' ,$request->row_id)->delete();
        //return User::where('id' ,$request->row_id)->update(['status' => 0]);
    }
    
    //  Update users 
    public static function update_user_by_id($request)
    {    
        if($request->image)
        {
            $imageName=date('Ymdhisa').time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('images/users/'), $imageName);
            $update['image']=$imageName; 
        }
        
        if($request->password &&  $request->confirm_password && ($request->password ==$request->confirm_password) )
        {
          $update['password']=Hash::make($request->password);
          $update['confirm_password']=Hash::make($request->confirm_password);
        }
        // print_r(Hash::make($request->password));  
        // die; 
       // die; 
        $update['name'] =$request->name;
        $update['email']=$request->email;
        $update['phone']=$request->phone; 
        
        $update['address']=$request->address;

        $update['latitude']=$request->latitude;
        $update['longitude']=$request->longitude;

        $update['join_date']=$request->join_date;
        $update['roll_id']=$request->roll_id?$request->roll_id:1;
        $update['status']='1';
        
        return User::where('id' ,$request->row_id)->update($update);
    }
    
}
