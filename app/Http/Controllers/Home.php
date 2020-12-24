<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Booking_request; 
use Validator,Redirect,Response;

class Home extends Controller
{
      public  function  index(Request $request)
      {
          return  view('front.index'); 
      }
    //save Booking  Request 
     public  function  send_request(Request $request)
     {
         $validator = Validator::make($request->all(), [
            'start_date_time' => 'required','end_date_time'=>'required','request_type' => 'required','name' => 'required','email'=>'required','contact' => 'required'
          ]);

          
          if ($validator->fails()) {
            return Response::json(array(
                'success' => false,
                'errors' => $validator->getMessageBag()->toArray()
            ), 400); 
        }
        else
        {
            $data_ins=array( 'start_date_time' =>$request->start_date_time,'name' => $request->name,'contact' => $request->contact,'end_date_time' =>$request->end_date_time,'request_type' => $request->request_type,'email' => $request->email,'description'=>$request->description); 
            $request_details = booking_request::add_request($data_ins);
            return Response::json(array('success' => true,'details'=>$request_details), 200);
         }
           
    }


   




}
