<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use App\Tour_bookings;
use App\Taxi_bookings;
use  App\Rental_bookings; 
use DB; 

class Bookings extends Model
{
    protected $fillable = ['booking_id','taxi_id','driver_id','booking_start_date','booking_end_date','tour_start_time','booking_type','guest_name','guest_email','arrival_flight_no','departure_flight_no','guest_whatsapp','guest_details','no_of_day','no_of_night','children_below','passengers','start_taxi_meter','end_taxi_meter','total_meter','source_address','source_latitude','source_longitude','destination_address','destination_latitude','destination_longitude','arrival_flight_time','departure_flight_time','special_request'];

    public static function add_booking($request)    
    {
        
        $result = Bookings::create([
            'booking_start_date' =>$request->booking_start_date,
            'booking_end_date'=>$request->booking_end_date,
            'tour_start_time'=>$request->tour_start_time,
           
            'booking_type'=>$request->booking_type,
            'guest_name'=>$request->guest_name, 
            'guest_email'=>$request->guest_email, 
            'arrival_flight_no'=>$request->arrival_flight_no, 
            'departure_flight_no'=>$request->departure_flight_no, 
            'guest_whatsapp'=>$request->guest_whatsapp, 
            'no_of_day'=>$request->no_of_day,
            'no_of_night'=>$request->no_of_night,
            'children_below'=>$request->children_below,
            'passengers'=>$request->passengers,
            'arrival_flight_time'=>$request->arrival_flight_time,
            'departure_flight_time'=>$request->departure_flight_time,
            'special_request'=>$request->special_request
        ]); 

        
        return $result;
    }

    public static function add_booking_taxi($request)
    {
        $result = Bookings::create([
            'booking_start_date' =>$request->booking_start_date,
            'booking_end_date'=>$request->booking_end_date,
            'tour_start_time'=>$request->tour_start_time,
            'taxi_id'=>$request->taxi_id,
            'driver_id'=>$request->driver_id,

            'booking_type'=>$request->booking_type,
            'guest_name'=>$request->guest_name, 
            'guest_email'=>$request->guest_email, 
            'guest_whatsapp'=>$request->guest_whatsapp,
            'children_below'=>$request->children_below,
            'passengers'=>$request->passengers,
            
            'source_address'=>$request->source_address,
            'source_latitude'=>$request->source_latitude,
            'source_longitude'=>$request->source_longitude,
            'destination_address'=>$request->destination_address,
            'destination_latitude'=>$request->destination_latitude,
            'destination_longitude'=>$request->destination_longitude,
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
             return Bookings::where('status','1')
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
   /* Get All taxis  */
    public static function get_all_taxis()
    {
        return Bookings::where('booking_type','taxi')->where('status','1')->get(); 
    }
    /* Get All Tour  */
    public static function get_all_tours()
    {
        return DB::select("select `bookings`.* , (select flight_no from flights WHERE id=bookings.arrival_flight_no) as arrival_flight_no, (select flight_no from flights WHERE id=bookings.departure_flight_no) as departure_flight_no from `bookings` where `bookings`.`booking_type` = 'tour' and `bookings`.`status` = 1 ");
    }
     /* Update Booking  Booking  */
    public static function update_booking_id($request)
    {
        $update['booking_id'] =$request->booking_id;
        return Bookings::where('id' ,$request->row_id)->update($update);
    }

    

    //  Delete Bookings 
    public static function  delete_booking_by_id($request)
    {
        //return Taxi::where('id' ,$request->row_id)->delete();
        return Bookings::where('id' ,$request->row_id)->update(['status' => 0]);
    }

    public static function get_ride_details($request)
     {
        return Bookings::where('driver_id' ,$request->driver_id)->where('booking_type','taxi')->get();    
     }

      //  get Next  30 day booking details 
      public static function get_bookings_details()
      {
         $currntdate=date("Y-m-d"); 
         $nextdate=date('Y-m-d', strtotime('today + 30 days'));
         return Bookings::select('id','booking_start_date','guest_name','booking_type','booking_id')->where('status','1')->whereDate('booking_start_date', '>=', $currntdate)->whereDate('booking_start_date', '<=', $nextdate)->get();
      }
 
      //  get Next 30 day booking details  count
      public static function get_bookings_count()
      {
          $currntdate=date("Y-m-d"); 
          $nextdate=date('Y-m-d', strtotime('today + 30 days'));
          return Bookings::select('booking_start_date', DB::raw("count(*) as counting"))->where('status','1')->whereDate('booking_start_date', '>=', $currntdate)->whereDate('booking_start_date', '<=', $nextdate)->groupBy('booking_start_date')->get();
      }
      
      public  static  function  update_records($column,$value,$update_data)
      {
        return Bookings::where($column,$value)->update($update_data); 
      }

      public  static function get_financial_report_data() 
      {
        $first=Rental_bookings::select(DB::raw("id,'accessories' as type,updated_at as datetime,'65756765' as credit_account,'65756765' as debit_account,'complete' as status"))
        ->whereDate('updated_at',date('Y-m-d'))->where('booking_status','3');
        $second=Taxi_bookings::select(DB::raw("id,'taxi' as type,updated_at as datetime,'65756765' as credit_account,'65756765' as debit_account,'complete' as status"))
        ->where('booking_status','5')->whereDate('updated_at',date('Y-m-d')); 
        $query_result=Tour_bookings::select(DB::raw("id,'tour' as type,updated_at as datetime,'65756765' as credit_account,'65756765' as debit_account,'complete' as status"))
        ->where('booking_status','5')->where('booking_end_date',date('Y-m-d'))->union($first)->union($second)->get();
          return $query_result;
      }  

    
      


}
