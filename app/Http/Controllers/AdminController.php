<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;
use App\Tour_bookings;
use App\Taxi_bookings;
use App\Booking_events; 
use App\Assign_taxi;
use App\Booking_request; 
use Validator,Redirect,Response;
use Auth;
use Session;
use Mail;


class AdminController extends Controller
{

   
  private $data;

  

    public function __construct()
    {
        // if(!Auth::check()) return 'NO';
        
    }
    
    //Admin login
    public function admin()
    {   
      if(session()->get('users_roll_type'))
      {   
        return redirect('dashboard');
       /* $data['all_taxis']=count(Taxi_bookings::get_all_taxis());
        $data['all_tours']=count(Tour_bookings:: get_all_tours()); 
        $data['all_request']=count(Booking_request::get_all());
        $data['booking_tour_details']=Booking_events::get_tour_bookings_details(); 
        $data['booking_taxi_details']=Booking_events::get_taxi_bookings_details(); 
        $m=Booking_events::get_bookings_count();
        $data['booking_count']=json_encode((array) $m);
        // $data['booking_tour_details']=Booking_events::get_tour_bookings_details(); 
        // $data['booking_taxi_details']=Booking_events::get_taxi_bookings_details(); 
        // $m=Booking_events::get_bookings_count();
        // $data['booking_count']=json_encode((array) $m);
        //  get delete  notification 
        //$delete_data=Tour_bookings::get_all_delete_request_booking();
        // $data['delete_notification']=(array) $delete_data; 
        //print_r($data['booking_tour_details']); die("fds"); 
        if((int)(date('H',time())) >=17)
        {
          $data['selected_date']=date('Y-m-d', strtotime(' +1 day'));
        }
        else
        {
          $data['selected_date']=date('Y-m-d');  
        }
        
        $data['assignTaxi'] = Assign_taxi::getTaxiAssignList($data['selected_date']);
        $data['driverData'] = ($data['assignTaxi']!="")?json_decode($data['assignTaxi']->driver_id):array();
          // if ($data['assignTaxi'] != null) {
          //     $data['taxiAssignMsg'] = 'Update assigned taxi to driver.';
          // } else {
          //     $data['taxiAssignMsg'] = 'Assign taxi to driver for today.';
          // }
        $data['taxiAssignMsg'] = 'Assign taxi to driver for today.';

        return view('genral.index')->with($data);*/
      }
      else{    

        return view('genral.login');
      }

    }

    public function dashboard(Request $request)
    {  
        if(session()->get('users_roll_type'))
        {
          
          $data['all_taxis']=count(Taxi_bookings::get_all_taxis());
          $data['all_tours']=count(Tour_bookings:: get_all_tours()); 
          $data['all_request']=count(Booking_request::get_all());
          $data['booking_tour_details']=Booking_events::get_tour_bookings_details(); 
          $data['booking_taxi_details']=Booking_events::get_taxi_bookings_details(); 
          $m=Booking_events::get_bookings_count();
          $data['booking_count']=json_encode((array) $m);
       
          // $data['booking_tour_details']=Tour_bookings::get_tour_bookings_details(); 
          // $data['booking_taxi_details']=Taxi_bookings::get_taxi_bookings_details(); 
          //  $data['booking_count']=Tour_bookings::get_bookings_count();

          //  get delete  notification 
          $delete_data=Tour_bookings::get_all_delete_request_booking();
          $data['delete_notification']=(array) $delete_data;  

         
          if((int)(date('H',time())) >=19)
          {
            $data['selected_date']=date('Y-m-d', strtotime(' +1 day'));
          }
          else
          {
            $data['selected_date']=date('Y-m-d');  
          }
          
          $data['assignTaxi'] = Assign_taxi::getTaxiAssignList($data['selected_date']);
          $data['driverData'] = ($data['assignTaxi']!="")?json_decode($data['assignTaxi']->driver_id):array();
          // if ($data['assignTaxi'] != null) {
          //     $data['taxiAssignMsg'] = 'Update assigned taxi to driver.';
          // } else {
          //     $data['taxiAssignMsg'] = 'Assign taxi to driver for today.';
          // }
          $data['taxiAssignMsg'] = 'Assign taxi to driver for today.';
          
          return view('genral.index')->with($data);
        }
        else{
           return redirect('admin-login');
        }
       
    }

    //  Load the calender page
   public function calender()
   {
   	  return view('genral.calender');
   }
   
   //  load datatable Page 
   public function table()
   {
   	    return view('genral.table');
   }
   
   //  send email  test
   public function sendm()
   {

        $dataar=array('name'=>'pradeep'); 
        $html_page='404'; 
        // Mail::send('genral.'.$html_page, $dataar, function ($message){
        // $message->from('pk1105806@gmail.com', 'Kanpurize vendor Registeration');
        // $message->to('pradeep@augurs.in')->subject('New Shop Registeration !'); 
        // });
          
        // echo 'Emai; Send '; 


      $data = array('name'=>"Virat Gandhi");
      Mail::send('genral.'.$html_page, $data, function($message) {
         $message->to('pk.compaddicts@gmail.com', 'Tutorials Point')->subject
            ('Laravel Basic Testing Mail');
         $message->from('pk1105806@gmail.com','Virat Gandhi');
      });
      echo "Basic Email Sent. Check your inbox.";


      
   }

    

  

  




}
