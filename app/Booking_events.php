<?php

namespace App;
use DB; 
use Illuminate\Database\Eloquent\Model;

class Booking_events extends Model
{
 protected $fillable=['booking_id','customer_id','internal_financial_details','external_financial_details','internal_transportation_cost','external_transportation_cost','start_date','end_date','event_data','resource','driver','taxi','booking_type','start_time','end_time']; 
    

   public static function  save_events($request)
   {
        if($request->event_data!=""){ $event_data=json_encode($request->event_data); }else{ $event_data=''; }
        $result = Booking_events::create([
            'booking_id' =>$request->booking_id,
            'customer_id'=>$request->customer_id,
            'start_date'=>$request->start_date,
            'end_date'=>$request->end_date,
            'start_time'=>$request->start_time,
            'end_time'=>$request->end_time,
            'event_data'=>$event_data,
            'booking_type'=>$request->booking_type?$request->booking_type:''
        ]); 
        return $result;
   }

   public static function  get_booking_tour_events_details($request)
   {
        return  DB::table('booking_events')
        ->join('tour_bookings','tour_bookings.booking_id','booking_events.booking_id')
        ->select('tour_bookings.booking_id','tour_bookings.booking_start_date','tour_bookings.booking_end_date','tour_bookings.guest_name','tour_bookings.guest_email','tour_bookings.guest_whatsapp','booking_events.id','booking_events.start_date','booking_events.end_date','booking_events.start_time','booking_events.end_time','booking_events.event_data','booking_events.resource','booking_events.taxi','booking_events.driver','booking_events.booking_type','booking_events.booking_status')
        ->whereDate('booking_events.start_date','=',$request->start_date)
        ->where('booking_events.booking_type','tour')
        ->where('booking_events.status',1)
        ->where('booking_events.booking_status', '!=' ,'unresponded')
        ->where('booking_events.booking_status', '!=' , 'canceled')
        ->where('booking_events.booking_status', '!=' ,'booking')
        ->where('tour_bookings.status',1)
        ->orderBy('booking_events.start_date','ASC')
        ->orderBy('booking_events.start_time','ASC')
        ->get();
   }
   public static function  get_booking_taxi_events_details($request)
   {
         return  DB::table('booking_events')
        ->join('taxi_bookings','taxi_bookings.booking_id','booking_events.booking_id')
        ->select('taxi_bookings.booking_id','taxi_bookings.booking_start_date','taxi_bookings.booking_end_date','taxi_bookings.guest_name','taxi_bookings.guest_email','taxi_bookings.guest_whatsapp','booking_events.id','booking_events.start_date','booking_events.end_date','booking_events.start_time','booking_events.end_time','booking_events.event_data','booking_events.resource','booking_events.taxi','booking_events.driver','booking_events.booking_type','booking_events.booking_status')
        ->whereDate('booking_events.start_date',$request->start_date)
        ->where('booking_events.booking_type','taxi')
        ->where('booking_events.status',1)
        ->where('taxi_bookings.status',1)
        ->orderBy('booking_events.start_date','ASC')
        ->orderBy('booking_events.start_time','ASC')
        ->get(); 
   }

   //  get  booked  taxi list  on the date time  range 
   public static function get_all_booked_taxi_in_range($request)
   {
       if($request->start_date_time && $request->end_date_time)
        return DB::select("SELECT taxi,booking_id,booking_type,`start_date` FROM `booking_events` WHERE  taxi IS NOT NULL AND (  ( `start_date` BETWEEN '$request->start_date_time' AND '$request->end_date_time' ) OR ( end_date BETWEEN '$request->start_date_time' AND '$request->end_date_time' ) OR ( '$request->start_date_time' BETWEEN `start_date` AND end_date ) OR  ('$request->end_date_time' BETWEEN `start_date` AND end_date ) )");
   }
   //  get  booked  driver list  on the date time  range 
   public static function get_all_booked_driver_in_range($request)
   {
      // booking_id,booking_type,`start_date`
       if($request->start_date_time && $request->end_date_time)
        return DB::select("SELECT driver,booking_id,booking_type,`start_date` FROM `booking_events` WHERE  taxi IS NOT NULL AND (  ( `start_date` BETWEEN '$request->start_date_time' AND '$request->end_date_time' ) OR ( end_date BETWEEN '$request->start_date_time' AND '$request->end_date_time' ) OR ( '$request->start_date_time' BETWEEN `start_date` AND end_date ) OR  ('$request->end_date_time' BETWEEN `start_date` AND end_date ) )");
   }


   //  get  Event  By Id 
   public static function get_event_by_id($request)
   {
     return  Booking_events::where('status','1')->where('id',$request->row_id)->first(); 
   }

   //  Update taxi & Driver  & Resources  by  Row_id 
   public static  function taxi_driver_update_by_id_for_cab($request)
   {
       $update['taxi']=$request->taxi; 
       $update['driver']=$request->driver; 
       $update['resource']=$request->resources;
       if($request->end_date!=""){ $update['end_date']=$request->end_date; }
       if($request->end_time!=""){ $update['end_time']=$request->end_time; }
       $update['booking_status']='drive_time'; 
    return Booking_events::where('id',$request->row_id)->update($update); 
   }


      public static function get_taxi_bookings_details()
       {
          $currntdate=date("Y-m-d");  
          $nextdate=date('Y-m-d', strtotime('today + 30 days'));
          // return Booking_events::select('id','booking_id','start_date','end_date','resource','taxi','driver','booking_type')->where('status','1')->where('booking_type','taxi')->whereDate('start_date', '>=', $currntdate)->whereDate('start_date', '<=', $nextdate)->get();

          return  DB::table('booking_events')
          ->join('taxi_bookings','taxi_bookings.booking_id','booking_events.booking_id')
          ->select('taxi_bookings.booking_id','taxi_bookings.booking_start_date','taxi_bookings.booking_end_date','taxi_bookings.guest_name','taxi_bookings.guest_email','taxi_bookings.guest_whatsapp','booking_events.id','booking_events.start_date','booking_events.end_date','booking_events.start_time','booking_events.end_time','booking_events.resource','booking_events.taxi','booking_events.driver','booking_events.booking_type')
          ->where('booking_events.booking_type','taxi')
          ->whereDate('booking_events.start_date', '>=', $currntdate)->whereDate('booking_events.start_date', '<=', $nextdate)
          ->orderBy('booking_events.start_date','ASC')
          ->orderBy('booking_events.start_time','ASC')
          ->get(); 
       }

   
      // get Next  30 day booking details 
      public static function get_tour_bookings_details()
      {
            $currntdate=date("Y-m-d");  
            $nextdate=date('Y-m-d', strtotime('today + 30 days'));
            //return Booking_events::select('id','booking_id','start_date','end_date','resource','taxi','driver','booking_type')->where('status','1')->where('booking_type','tour')->whereDate('start_date', '>=', $currntdate)->whereDate('start_date', '<=', $nextdate)->get();

            return  DB::table('booking_events')
            ->join('tour_bookings','tour_bookings.booking_id','booking_events.booking_id')
            ->select('tour_bookings.booking_id','tour_bookings.booking_start_date','tour_bookings.booking_end_date','tour_bookings.guest_name','tour_bookings.guest_email','tour_bookings.guest_whatsapp','booking_events.id','booking_events.start_date','booking_events.end_date','booking_events.start_time','booking_events.end_time','booking_events.resource','booking_events.taxi','booking_events.driver','booking_events.booking_type')
            ->where('booking_events.booking_type','tour')
            // ->where('tour_bookings.booking_status','2')
            ->whereDate('booking_events.start_date', '>=', $currntdate)->whereDate('booking_events.start_date', '<=', $nextdate)
            ->orderBy('booking_events.start_date','ASC')
            ->orderBy('booking_events.start_time','ASC')
            ->get(); 
      }

    /// get Next 30 day booking details  count
      public static function get_bookings_count()
      {
         //  DB::enableQueryLog(); 
          $currntdate=date("Y-m-d"); 
          $nextdate=date('Y-m-d', strtotime('today + 30 days'));
          $result= DB::select("select date(`start_date`) as start, count(*) as title from booking_events  where `status` = 1 and `booking_status` !='booking' AND `booking_status` !='unresponded' AND `booking_status` !='canceled' AND  date(`start_date`) >= '$currntdate' and date(`start_date`) <= '$nextdate'  group by date(`start_date`) ");
          return  (object) $result; 
         //  print_r(DB::getQueryLog());  die; 
      }
       
      //  get  events  by  id 
      public static  function  get_tour_bookings_events_by_booking_id($request)
      {
         return Booking_events::where('booking_id',$request->booking_id)->get();  
      }
      
      public static function update_events_by_id($update_by,$value,$updated_data)
      {
         return Booking_events::where($update_by,$value)->update($updated_data); 
      }

      public static  function gettaxi_for_driver($driver_id)
      {
         
          $currentDate=date('Y-m-d'); 
          if($driver_id!="")
          {
            return Booking_events::join('customers','customers.id','booking_events.customer_id')
            ->join('drivers','drivers.id','booking_events.driver')
            ->select('booking_events.id','booking_events.booking_id','booking_events.customer_id','booking_events.start_date','booking_events.end_date','booking_events.start_time','booking_events.end_time','booking_events.resource','booking_events.taxi','booking_events.driver','booking_events.booking_type','booking_events.status','booking_events.created_at','customers.id As customers_id','customers.name','customers.email','customers.whatsapp','drivers.id As driver_id','drivers.name As driver_name','drivers.email As driver_email','drivers.phone As driver_phone')
            ->whereDate('booking_events.start_date',$currentDate)
            ->where('booking_events.driver',$driver_id)
            ->where('booking_events.status',1)
            ->orderBy('booking_events.start_date','ASC')
            ->orderBy('booking_events.start_time','ASC')
            ->get(); 
          }
          else 
          {
            return Booking_events::join('customers','customers.id','booking_events.customer_id')
            ->join('drivers','drivers.id','booking_events.driver')
            ->select('booking_events.id','booking_events.booking_id','booking_events.customer_id','booking_events.start_date','booking_events.end_date','booking_events.start_time','booking_events.end_time','booking_events.resource','booking_events.taxi','booking_events.driver','booking_events.booking_type','booking_events.status','booking_events.created_at','customers.id As customers_id','customers.name','customers.email','customers.whatsapp','drivers.id As driver_id','drivers.name As driver_name','drivers.email As driver_email','drivers.phone As driver_phone')
            ->whereDate('booking_events.start_date',$currentDate)
            ->where('booking_events.status',1)
            ->orderBy('booking_events.start_date','ASC')
            ->orderBy('booking_events.start_time','ASC')
            ->get(); 
          }
         
      }


      public static  function get_all_events_of_today($date)
      {
         //$currentDate=date('Y-m-d'); 
         // DB::enableQueryLog();   
         return  Booking_events::join('customers','customers.id','booking_events.customer_id')
         ->join('drivers','drivers.id','booking_events.driver')
         ->join('taxis','taxis.id','booking_events.taxi')
         ->select('booking_events.id','booking_events.booking_id','booking_events.customer_id',DB::raw(' DATE_FORMAT(booking_events.start_date, "%Y-%m-%dT%TZ") as start '), DB::raw(' DATE_FORMAT(booking_events.end_date, "%Y-%m-%dT%TZ") as end '),'booking_events.resource','booking_events.taxi As resourceId','booking_events.driver','booking_events.booking_type',DB::raw(' (CASE 
         WHEN booking_events.booking_status="booking" THEN "incomplete" 
         WHEN booking_events.booking_status="completed" THEN "completed"
         WHEN booking_events.booking_status="drive_time" THEN "incomplete"
         WHEN booking_events.booking_status="delayed" THEN "incomplete"
         ELSE "incomplete"
         END) as status') ,'booking_events.created_at','customers.id As customers_id','customers.name','customers.email','customers.whatsapp','drivers.id As driver_id','drivers.name As driver_name','drivers.email As driver_email','drivers.phone As driver_phone')
         
         ->whereDate('booking_events.start_date',$date)
         ->where('booking_events.status',1)->get(); 

         //print_r( DB::getQueryLog());die; 
   
        
      }
      public static function  get_all_car_driver_list_today($date)
      {
         //$currentDate=date('Y-m-d');   
          return  Booking_events::join('customers','customers.id','booking_events.customer_id')
         ->join('drivers','drivers.id','booking_events.driver')
         ->join('taxis','taxis.id','booking_events.taxi')
         ->select('booking_events.id','booking_events.booking_id','booking_events.customer_id',DB::raw(' DATE_FORMAT(booking_events.start_date, "%Y-%m-%dT%TZ") as start '), DB::raw(' DATE_FORMAT(booking_events.end_date, "%Y-%m-%dT%TZ") as end '),'booking_events.start_time', 'booking_events.end_time','booking_events.resource','booking_events.taxi As resourceId','booking_events.driver','booking_events.booking_type','booking_events.status','booking_events.created_at','customers.id As customers_id','customers.name','customers.email','customers.whatsapp','drivers.id As driver_id','drivers.name As driver_name','drivers.email As driver_email','drivers.phone As driver_phone','taxis.id As taxi_id','taxis.title As taxi_title')
         ->whereDate('booking_events.start_date',$date)
         ->where('booking_events.status',1)->get(); 
         
      }
         
      //  get  Taxi  And  Driver  DEtails   for  Customers 
      public static  function gettaxi_driver_for_customers($customer_id)
      {
         $currentDate=date('Y-m-d'); 
           if($customer_id!="")
           {
            return Booking_events::join('customers','customers.id','booking_events.customer_id')
            ->join('drivers','drivers.id','booking_events.driver')
            ->select('booking_events.id','booking_events.booking_id','booking_events.customer_id','booking_events.start_date','booking_events.end_date','booking_events.start_time','booking_events.end_time','booking_events.resource','booking_events.taxi','booking_events.driver','booking_events.booking_type','booking_events.status','booking_events.created_at','customers.id As customers_id','customers.name','customers.email','customers.whatsapp','drivers.id As driver_id','drivers.name As driver_name','drivers.email As driver_email','drivers.phone As driver_phone')
            ->whereDate('booking_events.start_date',$currentDate)
            ->where('booking_events.customer_id',$customer_id)
            ->where('booking_events.status',1)
            ->orderBy('booking_events.start_date','ASC')
            ->orderBy('booking_events.start_time','ASC')
            ->get();
           }
           else
           {
            return Booking_events::join('customers','customers.id','booking_events.customer_id')
            ->join('drivers','drivers.id','booking_events.driver')
            ->select('booking_events.id','booking_events.booking_id','booking_events.customer_id','booking_events.start_date','booking_events.end_date','booking_events.start_time','booking_events.end_time','booking_events.resource','booking_events.taxi','booking_events.driver','booking_events.booking_type','booking_events.status','booking_events.created_at','customers.id As customers_id','customers.name','customers.email','customers.whatsapp','drivers.id As driver_id','drivers.name As driver_name','drivers.email As driver_email','drivers.phone As driver_phone')
            ->whereDate('booking_events.start_date',$currentDate)
            ->where('booking_events.status',1)
            ->orderBy('booking_events.start_date','ASC')
            ->orderBy('booking_events.start_time','ASC')
            ->get();
           }
      }

      public static  function get_today_customers_list()
      {
         $currentDate=date('Y-m-d');    
         return Booking_events::where('status',1)
         ->select('customer_id')->groupBy('customer_id')->whereDate('start_date',$currentDate)->get();   
      }

      public static  function  check_booking_satatus_of_day($date)
      {
         
         return  Booking_events::whereDate('start_date',$date)
          ->where('booking_status','!=' ,'completed')
          ->whereNotNull('taxi')
          ->whereNotNull('driver')
          ->get();  
        
      }



      //  select records by  column name and value  
      public  static  function  select_records($column,$value)
      {
         return Booking_events::where('status',1)->where($column,$value)->get(); 
      }




}
