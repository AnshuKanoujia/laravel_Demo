<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB; 
use Illuminate\Support\Facades\Hash;
class Customers extends Model
{
    protected $fillable = ['name','email','password','whatsapp','dob','address','latitude','longitude'];

    /// ##  Add new Customers 
    public static  function create_customer($request)
    {
        $result = Customers::create([
            'name' =>$request->guest_name,
            'email'=>$request->guest_email,
            'whatsapp'=>$request->guest_whatsapp,
            'password'=>Hash::make('123456')
        ]); 
        return $result;
    }

    public static function get_customer($request)
    {
        $result=Customers::where('status',1)
        ->where('email',$request->guest_email)
        ->orWhere('whatsapp',$request->guest_whatsapp)
        // ->where(function($query)
        //     {  
        //         $query->where('email','awfafsfs')
        //               ->orWhere('whatsapp','4234234234');
        //     })
        ->get(); 
       return  $result; 
    }

    


}
