<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\Tour_bookings;
class Taxi_bookings extends Model
{
    protected $fillable = ['booking_id','booking_request_id','taxi_cost','taxi_id','driver_id','booking_start_date','booking_end_date','tour_start_time','booking_type','customer_id','guest_name','guest_email','arrival_flight_no','departure_flight_no','guest_whatsapp','guest_details','no_of_day','no_of_night','children_below','passengers','start_taxi_meter','end_taxi_meter','total_meter','source_address','source_latitude','source_longitude','destination_address','destination_latitude','destination_longitude','arrival_flight_time','departure_flight_time','special_request','created_by','updated_by','tour_approx_end_time'];

    

    public static function add_booking_taxi($request)
    {



         
        $result = Taxi_bookings::create([
            'booking_start_date' =>$request->booking_start_date,
            'booking_end_date'=>$request->booking_end_date,
            'tour_start_time'=>$request->tour_start_time,
            'tour_approx_end_time'=>$request->driver_approx_time,
            'taxi_id'=>$request->taxi_id,
            'driver_id'=>$request->driver_id,
            'booking_request_id'=>!empty($request->booking_request_id)?$request->booking_request_id:null,
            'booking_type'=>$request->booking_type,
            'customer_id'=>$request->customer_id,
            'guest_name'=>$request->guest_name, 
            'guest_email'=>$request->guest_email, 
            'guest_whatsapp'=>$request->guest_whatsapp,
            'special_request'=>$request->special_request,
            'children_below'=>$request->children_below,
            'passengers'=>$request->passengers,
            'taxi_cost'=>$request->taxi_cost,
            'source_address'=>$request->source_address,
            'source_latitude'=>$request->source_latitude,
            'source_longitude'=>$request->source_longitude,
            'destination_address'=>$request->destination_address,
            'destination_latitude'=>$request->destination_latitude,
            'destination_longitude'=>$request->destination_longitude,
            'created_by'=>session()->get('user_id')
        ]); 

        
        return $result;
    }
    
    //  Check Boking 
    public static function check_booking($request)
    {
        // 'booking_type'=>$request->booking_type,
        // 'booking_start_date' =>$request->booking_start_date,
        // 'arrival_flight_no'=>$request->arrival_flight_no, 
        // 'departure_flight_no'=>$request->departure_flight_no,
        if($request->booking_start_date && $request->guest_name && $request->arrival_flight_no && $request->departure_flight_no){
             return Taxi_bookings::where('status','1')
                           ->where("guest_name", "like","%".$request->guest_name."%")
                           ->where("arrival_flight_no",$request->arrival_flight_no)
                           ->where("departure_flight_no", $request->departure_flight_no)
                           ->where("booking_start_date", $request->booking_start_date)
                          // ->where("booking_type",'tour')
                           ->get();
        }
        else
        {
            echo 'all fields required'; 
        }              
    } 

    /*   get Tour Booking by id  */
    public static function get_taxi_bookings_by_id($request)
    {
      return Tour_bookings::where('id' ,$request->row_id)->where('status','1')->first();  
    }

   /*   get tour booking by booking id  */
    public static function get_taxi_booking_by_booking_id($request)
    {
        return Tour_bookings::where('booking_id' ,$request->booking_id)->first();
    }

    //  chekc this request  Of  booking 
    public static  function  get_this_booking_request($request)
    {
        return Taxi_bookings::where('status','1')
        ->where("booking_request_id",$request->booking_request_id)
        ->get();
    }

   /* Get All taxis  */
    public static function get_all_taxis()
    {
        return Taxi_bookings::where('booking_type','taxi')->where('status','1')->orderBy('created_at','DESC')->get(); 
    }
   
     /* Update Booking  Booking  */
    public static function update_booking_id($request)
    {
        $update['booking_id'] =$request->booking_id;
        return Taxi_bookings::where('id' ,$request->row_id)->update($update);
    }

    //  Delete Bookings 
    public static function  delete_booking_by_id($request)
    {
        //return Taxi::where('id' ,$request->row_id)->delete();
        return Taxi_bookings::where('id' ,$request->row_id)->update(['status' => 0]);
    }

    public static function get_ride_details($request)
     {
        return Taxi_bookings::where('driver_id',$request->driver_id)->where('booking_type','taxi')->get();    
     }

    // get Next  30 day booking details 
    public static function get_taxi_bookings_details()
    {
        $currntdate=date("Y-m-d"); 
        $nextdate=date('Y-m-d', strtotime('today + 30 days'));
        return Taxi_bookings::select('id','booking_start_date','guest_name','booking_type','booking_id')->where('status','1')->whereDate('booking_start_date', '>=', $currntdate)->whereDate('booking_start_date', '<=', $nextdate)->get();
    }
     // get  taxi  booking by  id  
    public static function get_taxi_booking_by_id($request)
    {
        return Taxi_bookings::where('id',$request->row_id)->where('booking_type','taxi')->first();  
    }

     /* Update taxi Booking  Booking  */
     public static function update_taxi_booking_by_id($request)
     {
        $update_data['tour_start_time']=$request->tour_start_time;
        $update_data['tour_approx_end_time']=$request->driver_approx_time;
        $update_data['booking_type']=$request->booking_type;
        $update_data['customer_id']=$request->customer_id;
        $update_data['guest_name']=$request->guest_name; 
        $update_data['guest_email']=$request->guest_email; 
        $update_data['guest_whatsapp']=$request->guest_whatsapp;
        $update_data['children_below']=$request->children_below;
        $update_data['passengers']=$request->passengers;
        $update_data['taxi_cost']=$request->taxi_cost;
        $update_data['source_address']=$request->source_address;
        $update_data['special_request']=$request->special_request;
        $update_data['source_latitude']=$request->source_latitude;
        $update_data['source_longitude']=$request->source_longitude;
        $update_data['destination_address']=$request->destination_address;
        $update_data['destination_latitude']=$request->destination_latitude;
        $update_data['destination_longitude']=$request->destination_longitude;
        $update_data['updated_by']=session()->get('user_id');
        return Taxi_bookings::where('id',$request->row_id)->update($update_data);
     }
      // Update  row by  any column name here 
      public static function update_booking_by_column($update_by,$value,$updated_data)
      {
         return Taxi_bookings::where($update_by,$value)->update($updated_data); 
      }



      public static function get_booking_delete_request($request)
      {  
          return  $result =Taxi_bookings::join('customers','customers.id', '=', 'taxi_bookings.customer_id')
          ->join('users','users.id', '=', 'taxi_bookings.delete_request_by')
          ->select('taxi_bookings.*','customers.name','customers.whatsapp','users.name AS users_name','users.roll_id AS users_type')
          ->where('taxi_bookings.status',1)
          ->where('taxi_bookings.delete_request',1)
          ->where('taxi_bookings.booking_id',$request->booking_id)
          ->first();
      }


   public  static  function get_today_complete_taxi(){
        return Taxi_bookings::where('booking_status','5')->whereDate('updated_at',date('Y-m-d'))->get(); 
   }

 
     



    

}
