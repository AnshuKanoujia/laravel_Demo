<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Taxi_bookings; 
use DB;

class Tour_bookings extends Model
{
    protected $fillable = ['booking_id','taxi_id','driver_id','booking_start_date','booking_end_date','tour_start_time','booking_type','customer_id','guest_name','guest_email','arrival_flight_no','departure_flight_no','guest_whatsapp','guest_details','tour_length','no_of_day','no_of_night','children_below_3','children_below_8','passengers','start_taxi_meter','end_taxi_meter','total_meter','source_address','source_latitude','source_longitude','destination_address','destination_latitude','destination_longitude','arrival_flight_time','departure_flight_time','special_request','created_by','updated_by','package_doc'];

    public static function add_booking($request)
    {
        
        $result = Tour_bookings::create([
            'booking_start_date' =>$request->booking_start_date,
            'booking_end_date'=>$request->booking_end_date,
            'tour_start_time'=>$request->tour_start_time,
            
            'booking_type'=>$request->booking_type,
            'customer_id'=>$request->customer_id,
            'guest_name'=>$request->guest_name, 
            'guest_email'=>$request->guest_email, 
            'arrival_flight_no'=>$request->arrival_flight_no?$request->arrival_flight_no:'', 
            'departure_flight_no'=>$request->departure_flight_no?$request->departure_flight_no:'', 
            'guest_whatsapp'=>$request->guest_whatsapp, 
            'tour_length'=>$request->tour_length,
            'children_below_3'=>$request->children_below_3,
            'children_below_8'=>$request->children_below_8,
            'passengers'=>$request->passengers,
            'arrival_flight_time'=>$request->arrival_flight_time?$request->arrival_flight_time:'',
            'departure_flight_time'=>$request->departure_flight_time?$request->departure_flight_time:'',
            'special_request'=>$request->special_request?$request->special_request:'',
            'created_by'=>session()->get('user_id')
        ]); 

        
        return $result;
    }


    //  Check Boking 
    public static function check_booking($request)
    {
        
        if($request->booking_start_date && $request->guest_email && $request->guest_whatsapp){
             return Tour_bookings::where('status','1')
                    ->where("guest_email", $request->guest_email)
                    ->where("guest_whatsapp",$request->guest_whatsapp)
                    ->where("booking_start_date", $request->booking_start_date)
                    // ->where("booking_type",'tour')
                    ->get();
        }
        else
        {
            echo 'all fields required'; 
        }              
    } 
   /* Get All taxis  */
    public static function get_all_taxis()
    {
        return Tour_bookings::where('booking_type','taxi')->where('status','1')->orderBy('created_at','DESC')->get(); 
    }
    /* Get All Tour  */
    public static function get_all_tours()
    {
        return DB::select("select `tour_bookings`.* , (select flight_no from flights WHERE id=tour_bookings.arrival_flight_no) as arrival_flight_no, (select flight_no from flights WHERE id=tour_bookings.departure_flight_no) as departure_flight_no from `tour_bookings` where `tour_bookings`.`booking_type` = 'tour' and `tour_bookings`.`status` = 1 ORDER BY `created_at` DESC");
        // ->orderBy('lastname', 'asc') 
    }
     /* Update Booking  Booking  */
    public static function update_booking_id($request)
    {
        $update['booking_id'] =$request->booking_id;
        return Tour_bookings::where('id' ,$request->row_id)->update($update);
    }

    //  Delete Bookings 
    public static function  delete_booking_by_id($request)
    {
        //return Taxi::where('id' ,$request->row_id)->delete();
        return Tour_bookings::where('id' ,$request->row_id)->update(['status' => 0]);
        
    }

    public static function get_ride_details($request)
     {
        return Tour_bookings::where('driver_id' ,$request->driver_id)->where('booking_type','taxi')->get();    
     }

      /*  get Next  30 day booking details  */
      public static function get_tour_bookings_details()
      {
         $currntdate=date("Y-m-d"); 
         $nextdate=date('Y-m-d', strtotime('today + 30 days'));
         return Tour_bookings::select('id','booking_start_date','guest_name','booking_type','booking_id')->where('status','1')->whereDate('booking_start_date', '>=', $currntdate)->whereDate('booking_start_date', '<=', $nextdate)->get();
      }
 
      /*  get Next 30 day booking details  count */
      public static function get_bookings_count()
      {
         
          $currntdate=date("Y-m-d"); 
          $nextdate=date('Y-m-d', strtotime('today + 30 days'));
          $result= DB::select("select booking_start_date as start, count(*) as title from (select booking_start_date from taxi_bookings where `status` = 1 and date(`booking_start_date`) >= '$currntdate' and date(`booking_start_date`) <= '$nextdate' union ALL select booking_start_date from tour_bookings where `status` = 1 and date(`booking_start_date`) >= '$currntdate' and date(`booking_start_date`) <= '$nextdate') v group by booking_start_date");
        
          return  (object) $result; 
      }
      /*   get Tour Booking by id  */
       public static function get_tour_bookings_by_id($request)
       {
         return Tour_bookings::where('id' ,$request->row_id)->where('status','1')->first();  
       }

      /*   get tour booking by booking id  */
       public static function get_tour_booking_by_booking_id($request)
       {
           return Tour_bookings::where('booking_id' ,$request->booking_id)->first();
       }

    //  get records  by  column name 
    public  static  function  select_records($column,$value)
    {
        return Tour_bookings::where('status',1)->where($column,$value)->first(); 
    }


       // Update  row by  any column name here 
      public static function update_booking_by_column($update_by,$value,$updated_data)
      {
         return Tour_bookings::where($update_by,$value)->update($updated_data); 
      }
      public static function  get_all_delete_request_booking()
      {
       
        //  $result= DB::select("select id,booking_id,booking_type,customer_id,guest_name,guest_whatsapp,delete_request,delete_request_by,status from taxi_bookings where `status` = 1 and  delete_request=1 union ALL select id,booking_id,booking_type,customer_id,guest_name,guest_whatsapp,delete_request,delete_request_by,status from tour_bookings where `status` = 1 and  delete_request=1 ");

       $result= DB::select("select taxi_bookings.id,taxi_bookings.booking_id,taxi_bookings.booking_type,taxi_bookings.customer_id,taxi_bookings.guest_name,taxi_bookings.guest_whatsapp,taxi_bookings.delete_request,taxi_bookings.delete_request_by,taxi_bookings.status,users.name as delete_request_by_name from taxi_bookings LEFT join users ON users.id=taxi_bookings.delete_request_by where taxi_bookings.`status` = 1 and  taxi_bookings.delete_request=1 union ALL select tour_bookings.id,tour_bookings.booking_id,tour_bookings.booking_type,tour_bookings.customer_id,tour_bookings.guest_name,tour_bookings.guest_whatsapp,tour_bookings.delete_request,tour_bookings.delete_request_by,tour_bookings.status,users.name as delete_request_by_name  from tour_bookings LEFT join users ON users.id=tour_bookings.delete_request_by where tour_bookings.`status` = 1 and  tour_bookings.delete_request=1  ");
        
        return  (object) $result;  
      }

      public static function get_booking_delete_request($request)
      {
         return  $result =Tour_bookings::join('customers','customers.id', '=', 'tour_bookings.customer_id')
         ->join('users','users.id', '=', 'tour_bookings.delete_request_by')
         ->select('tour_bookings.*','customers.name','customers.whatsapp','users.name AS users_name','users.roll_id AS users_type')
         ->where('tour_bookings.status',1)
         ->where('tour_bookings.delete_request',1)
         ->where('tour_bookings.booking_id',$request->booking_id)
         ->first();
      }

      //  get  tour  booking details 
      public  static  function  get_tour_booking_details($column,$value)
      {  
        return  Tour_bookings::join('customers','customers.id', '=', 'tour_bookings.customer_id')
        ->join('tour_lengths','tour_lengths.id', '=', 'tour_bookings.tour_length')
        ->join('users','users.id', '=', 'tour_bookings.created_by')
        ->select('tour_bookings.*','customers.name as  guest_name','customers.whatsapp as guest_whatsapp','users.name AS users_name','users.roll_id AS users_type','tour_lengths.no_of_day','tour_lengths.no_of_night')
        ->where('tour_bookings.status',1)
        ->where('tour_bookings.'.$column,$value)
        ->first();
        
      }

      public static function get_all_days($column,$value)
      {  
         return Booking_events::where('status',1)
        ->where($column,$value)->select(DB::raw(' date(`start_date`) as start_date '))->groupBy(DB::raw('date(`start_date`)'))->get(); 
      }  
      
    public  static  function get_today_complete_tour(){
        // return Tour_bookings::where('booking_status','5')->whereDate('updated_at',date('Y-m-d'))->get();
        return Tour_bookings::where('booking_status','5')->where('booking_end_date',date('Y-m-d'))->get(); 
    }





}
