<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Booking_request extends Model
{
   protected $fillable=['start_date_time','end_date_time','request_type','name','email','contact','description','status','booking_status','created_at','updated_at'];
   
   
   public  static  function  add_request($ins_data)
   {
     return  Booking_request::create($ins_data); 
   }
   public static function  get_all()
   {
      return Booking_request::where('status',1)->orderBy('id', 'DESC')->get(); 
   }
   public  static  function  update_booking_status($request)
   {
     
     return   Booking_request::where('id',$request->row_id)->update(['booking_status'=>$request->status_value,'action_by'=>session()->get('user_id')]); 
     
    }
    
    /*  update  Booking  Request  */
    public  static  function  update_booking_request($column,$value,$update_data)
    {
      return Booking_request::where($column,$value)->update($update_data); 
    }

    public  static  function  get_where($where)
    {
      return Booking_request::where($where)->orderBy('id', 'DESC')->first(); 
    }

}
