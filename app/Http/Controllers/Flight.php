<?php

namespace App\Http\Controllers;
use App\Flights;
use Illuminate\Http\Request;

class Flight extends Controller
{
    

      // All Flight 
    public function flight()
    {  
       
      if(session()->get('users_roll_type'))
       {  
         $get_all_flights
          = Flights::get_all_flights();
         return view('genral.flight')->with('all_flights',$get_all_flights);
       }
       else{   
           return redirect('admin-login')->with(["msg"=>'<div class="alert alert-danger""><strong>Wrong </strong> First you can do login !!!</div>']);
         }
        
    }

    //  Add Flight 
    public function add_flight(Request $request)
    {
        if(session()->get('users_roll_type'))
        {   
         $validator = $request->validate(array(
         'flight_no' => 'required','service_provider'=>'required','flight_from' => 'required','flight_to' => 'required','arrival_time' => 'required','departure_time' => 'required'));
          
          $m=Flights::where(array('flight_no'=>$request->flight_no,'flight_to'=>$request->flight_to,'flight_from'=>$request->flight_from,'service_provider'=>$request->service_provider))->get();
           
          
          if(count($m)){
               return redirect()->back()->with(["msg"=>'<div class="alert alert-danger""><strong> This Record Allready    </strong> Taken.</div>']);
          }
          else
          {
           $flight_details = Flights::add_flight($request);
          return redirect('flight')->with(["msg"=>'<div class="alert alert-success""><strong>Flight Added Successfully.. </strong></div>']); 
          }
        }
        else{   
         return redirect('admin-login')->with(["msg"=>'<div class="alert alert-danger""><strong>Wrong </strong> First you can do login !!!</div>']);
         
        }
    }

    //  Delete taxi
    public function  delete_flight(Request $request)
    {
       $delete_flight_res = Flights::delete_flight($request);
       if($delete_flight_res){ echo '200'; }
    }

    //     Edit  Flight 
    public function edit_flight(Request $request)
    {
      
       $get_flight = Flights::get_by_id($request);
       return view('genral.edit_flight')->with('get_flight',$get_flight);
    }

    //   Update Flight 
    public   function  update_flight(Request $request)
    {   
     if(session()->get('users_roll_type'))
     { 
        $validator = $request->validate(array(
            'flight_no' => 'required','service_provider'=>'required','flight_from' => 'required','flight_to' => 'required','arrival_time' => 'required','departure_time' => 'required'));
        
           $update_flight_res = Flights::update_flight_by_id($request);
           if($update_flight_res)
           {
              return redirect('flight')->with(["msg"=>'<div class="alert alert-success""><strong>Flight Updated Successfully.. </strong></div>']);
           }
           else{   
              return redirect('flight')->with(["msg"=>'<div class="alert alert-danger""><strong>Wrong </strong> Somthing Went wrong ! Try Again ... !!!</div>']);
              
           }
     }
     else{   
      return redirect('admin-login')->with(["msg"=>'<div class="alert alert-danger""><strong>Wrong </strong> First you can do login !!!</div>']);
      
     }
    }




    

}
