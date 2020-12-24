<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use  DB;

class Rental_bookings extends Model
{
    protected $fillable=['customer_id','booking_request_id','start_date_time','end_date_time','guest_name','guest_email','guest_mobile','request_type','booking_type','accessories','amount','description','booked_by'];
    
    public static  function  save_rental_booking($insdata)
    {
        return Rental_bookings::create($insdata); 
    }

    // get  all  rental  booking 
    public  static  function  get_all_rental()
    {
        return  Rental_bookings::where('status',1)->orderBy('id', 'DESC')->get(); 
    }

    //  update by  the  column 
    public static function  update_by_column_name($column,$value,$update_data)
    {
        return Rental_bookings::where($column ,$value)->update($update_data);
    }
    //  check Booking  request  if  exist 
    public  static  function  get_booking_request($booking_request_id)
    {
        return  Rental_bookings::where('status',1)->where('booking_request_id',$booking_request_id)->get(); 
    }
    
    public  static  function  update_booking_status($request)
    {
        // DB::enableQueryLog();
        return   Rental_bookings::where('id',$request->row_id)->update(['booking_status'=>$request->status_value,'action_by'=>session()->get('user_id')]); 
        // dd(DB::getQueryLog());  die; 
    }
    
    public static function  get_today_returned_accesories()
    {  
       return Rental_bookings::whereDate('updated_at',date('Y-m-d'))->where('booking_status','3')->get();
    }



}
