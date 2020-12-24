<?php

namespace App\Http\Controllers;



use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Drivers;
use App\User;
use App\Booking_events;
use App\Taxi; 
use Mail;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


   public function getUrl(Request $request)
   {
   	  $data['url_list']=DB::table('links')->get();
   	  if(preg_match("/Mozilla/i",$request->header('user-agent')) ) 
        {
           return view('index',[$data]);
        }
        else
        {
          return json_encode($data);
        }  
   }


   public function  sendTodayDetails()
   {
      $get_all_drivers = Drivers::get_all_drivers();
      foreach ($get_all_drivers as $key => $value) {
            $data['get_all_events_of_today']=$get_taxi_driver_details_for_customers=Booking_events::gettaxi_for_driver($value->id);  
           return view('genral.taxis_list_for_driver')->with($data);
            // echo $value->id;   
            // echo '<br/><br/>';  
            // $dataar=array('name'=>'pradeep'); 
            // $html_page='404';
            // $data = array('name'=>"Virat Gandhi");
            // Mail::send('genral.'.$html_page, $data, function($message) {
            //     $message->to('pk.compaddicts@gmail.com', 'Tutorials Point')->subject('Laravel Basic Testing Mail');
            //     $message->from('pk1105806@gmail.com','Virat Gandhi');
            // });  
      }


      $get_all_events_of_today=Booking_events::get_today_customers_list(); 
       foreach ($get_all_events_of_today as $key => $value) {
          // echo $value->customer_id;  
          // echo '<br/><br/>';  
          // $get_taxi_driver_details_for_customers=Booking_events::gettaxi_driver_for_customers($value->customer_id);
          // $data['get_all_events_of_today']=$get_taxi_driver_details_for_customers;
          // return view('genral.taxi_driver_list_for_customer')->with($data);
           
       }
   }

   /* Booking Structure  Page For  Admin */
   public function booking_structure()
   {
      if(session()->get('users_roll_type'))
      { 
         
        $data['get_today_car_driver_list']=Booking_events::get_all_car_driver_list_today(date('y-m-d')); 
        $data['get_all_events_of_today']=Booking_events::get_all_events_of_today(date('Y-m-d')); 
        $data['get_all_taxi']=Taxi::get_all_taxi_with_id_title(); 
        return view('genral.booking_structure')->with($data);  
      }
      else{   
         return redirect('admin-login')->with(["msg"=>'<div class="alert alert-danger""><strong>Wrong </strong> First you can do login !!!</div>']);
         }
   }


    


   public function get_events_of_day(Request $request)
   {
      //$request->date='2020-03-17';
      if($request->date)
      {

         $data['validate']=count(Booking_events::check_booking_satatus_of_day($request->date));
         $data['all_car_driver_list']=Booking_events::get_all_car_driver_list_today($request->date);

         //$data['method']='all_events_of_the_day'; 
         // $result= view('genral.ajax')->with($data);   //  data['events_listing']
         $data['all_events_of_the_day']=Booking_events::get_all_events_of_today($request->date);
         $data['get_all_taxi']=Taxi::get_all_taxi_with_id_title();

          return response()->json($data);
      }
   }

   public  function page()
   {
      return view('front.page'); 
   }




}
