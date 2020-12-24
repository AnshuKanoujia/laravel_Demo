<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tour_bookings;
use App\Taxi_bookings;
use App\Customers; 
use App\Tour_lengths; 
use  App\Bookings;
use App\Exports\ServiceExport;
// use Excel; 
use Maatwebsite\Excel\Facades\Excel;
use DB; 
use PDF; 
use App\Flights; 
use App\Taxi;
use App\Drivers; 
use App\Customization_activities; 
use App\Customization_activities_types;
use App\Addresses;
use App\Booking_events; 
use App\Content; 
use App\Booking_request; 
use  App\Rental_bookings; 
use App\Accessories;
use App\Banana_accounts;
use  App\Financial_layouts;
use Validator,Redirect,Response;
use App\Http\Controllers\Driver;

class Booking extends Driver
{
   public function booking(Request $request)
   {   
      if(session()->get('users_roll_type'))
      { 
         $data['bookingtype']=$request->booking_type; 
         $data['bookingdate']=$request->event_date;
         if($request->event_date!=""  && $request->booking_type!="")
         {
               if($request->booking_type=='tour')
               {
                  $data['get_all_flights'] = Flights::get_all_flights();
                  $data['get_all_activities'] = Customization_activities::get_all_activities();
                  $data['get_all_activities_types'] = Customization_activities_types::get_all_activities_types();
                  $data['all_tour_length']= Tour_lengths::get_all_tour_length(); 
                  $data['get_all_Taxies'] = Taxi::get_all_taxi_list();
                  return view('genral.booking')->with('booking_deatils',$data);
               }
               else
               { 
                  $data['get_all_drivers'] = Drivers::get_all_drivers();
                  $data['get_all_Taxies'] = Taxi::get_all_taxies();
                  $data['get_all_address'] = Addresses::get_all_address();
                  return view('genral.taxi_book')->with('booking_deatils',$data); 
               }
         }
         else
         {
            return redirect('dashboard')->with(["msg"=>'<div class="alert alert-danger""> first <strong>Pick </strong> A date for  Booking  !!!</div>']);
         }
         
      }
      else{   
       return redirect('admin-login')->with(["msg"=>'<div class="alert alert-danger""><strong>Wrong </strong> First you can do login !!!</div>']);
      }


   }

   public  function  get_financial_by_activity_id_with_no_of_passenger(Request $request)
   {   
      // $request->row_id=$request->tour_id?$request->tour_id:45;  //  29 ,  35 
      $request->row_id=1; 
      $passenger= $request->passenger?$request->passenger:2;
      if($request->row_id && $passenger)
      {
         //   echo $request->row_id.' ji '.$passenger;
           $activities_data=Customization_activities::get_by_id($request);
         //   print_r($activities_data->internal_financial_details); die; 
         //   echo '<br/>';
         //   print_r($activities_data->internal_financial_details);  
         //   echo '<br/>'; 
           $int_financial_data=array(array('int_no_of_pax0'=>'','int_supplier_value0'=>'','int_extras_per_pax0'=>'','int_extras_per_car0'=>''),array("Internal No of Pax","Supplier <span class=\"add-supplier\">\n\t\t\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"fa fa-plus\"><\/i>\n\t\t\t\t\t\t\t\t\t\t\t\t\t<\/span>","Internal Extras Per Pax","Internal Extras Per Car","Action"));
           $ext_financial_data=array(array('ext_no_of_pax0'=>'','ext_supplier_value0'=>'','ext_extras_per_pax0'=>'','ext_extras_per_car0'=>''),array("External No of Pax","Supplier <span class=\"add-supplier\">\n\t\t\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"fa fa-plus\"><\/i>\n\t\t\t\t\t\t\t\t\t\t\t\t\t<\/span>","External Extras Per Pax","External Extras Per Car","Action"));
           $blankFinancial_data=array('int_financial_data'=>$int_financial_data,'ext_financial_data'=>$ext_financial_data); 
            // $blankFinancial_data=array('int_no_of_pax1'=>"",'int_supplier_value1'=>"",'int_extras_per_pax1'=>'','int_extras_per_car1'=>"",array('dad','asdasd')); 
           if(!empty($activities_data))
           {     
                 if(!empty($activities_data->internal_financial_details) && !empty($activities_data->external_financial_details))
                 {      
                      $internal_financial_details=json_decode($activities_data->internal_financial_details);
                      $external_financial_details=json_decode($activities_data->external_financial_details);
                     //  print_r($internal_financial_details); die; 
                     //  echo count($internal_financial_details);  die; 
                     //  echo gettype($activities_data->internal_financial_details); 
                     // print_r(count($internal_financial_details)); die;   
                     $int_last_data=(integer)count($internal_financial_details)-1;
                     /* echo $int_last_data;
                     echo "Ji "; die;  */ 
                      $int_selectFinancial_data=array(); 
                      foreach ($internal_financial_details as $key => $row) {
                        
                        $column='int_no_of_pax'.$key; 
                        // if($key!=$int_last_data){
                        //    foreach($row as $k=>$v){
                        //       if(preg_replace('/\d+/u', '', $k)=='int_no_of_pax')
                        //       {     
                        //            if($row->$k==$passenger)
                        //            {
                        //             array_push($int_selectFinancial_data,$row);
                        //            }
                        //       }
                              
                        //     }
                        // }
                        foreach($row as $k=>$v){
                           if(preg_replace('/\d+/u', '', $k)=='int_no_of_pax')
                           {
                                if($row->$k==$passenger)
                                {
                                 array_push($int_selectFinancial_data,$row);
                                }
                           }
                           
                        }
                     }

                     
                     // print_r($int_selectFinancial_data);
                     if(count($int_selectFinancial_data)=='0')
                     {
                        array_push($int_selectFinancial_data,array('int_no_of_pax0'=>'','int_supplier_value0'=>'','int_extras_per_pax0'=>'','int_extras_per_car0'=>''));
                        array_push($int_selectFinancial_data,array("Internal No of Pax","Supplier <span class=\"add-supplier\">\n\t\t\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"fa fa-plus\"><\/i>\n\t\t\t\t\t\t\t\t\t\t\t\t\t<\/span>","Internal Extras Per Pax","Internal Extras Per Car","Action"));
                     }  
                     else
                     {
                        array_push($int_selectFinancial_data,$internal_financial_details[$int_last_data]);
                     }

                     // print_r($int_selectFinancial_data);  die; 
                        

                    /*  echo ' <br/> data Return <pre>';
                     print_r($selectFinancial_data); 
                     echo '</pre> Good Pradeep';  */


                     /* Start oF the  External  Financial Details */
                           $ext_last_data=count($external_financial_details)-1;
                           /* echo $last_data;
                           echo "Ji ";  */
                           $ext_selectFinancial_data=array();
                           foreach ($external_financial_details as $key => $row) {
                              //  echo $key;
                              //  echo "<br/>";
                              $column='ext_no_of_pax'.$key;
                              //  echo $row->$column; 
                              // if($key!=$ext_last_data)
                              // {
                                    
                              //       if($row->$column==$passenger)
                              //       {
                              //          //  echo "<br/> Congratulation ".$passenger;
                              //          array_push($ext_selectFinancial_data,$row);
                              //       }
                              // }

                              foreach($row as $k=>$v){
                                 if(preg_replace('/\d+/u', '', $k)=='ext_no_of_pax')
                                 {
                                      if($row->$k==$passenger)
                                      {
                                       array_push($ext_selectFinancial_data,$row);
                                      }
                                 }
                                 
                              }
                             
                           }
                           if(count($ext_selectFinancial_data)=='0')
                           {
                              array_push($ext_selectFinancial_data,array('ext_no_of_pax0'=>'','ext_supplier_value0'=>'','ext_extras_per_pax0'=>'','ext_extras_per_car0'=>''));
                              array_push($ext_selectFinancial_data,array("External No of Pax","Supplier <span class=\"add-supplier\">\n\t\t\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"fa fa-plus\"><\/i>\n\t\t\t\t\t\t\t\t\t\t\t\t\t<\/span>","External Extras Per Pax","External Extras Per Car","Action"));
                           }  
                           else
                           {
                              array_push($ext_selectFinancial_data,$external_financial_details[$ext_last_data]);
                           }
                        /*  echo ' <br/> data Return <pre>';
                           print_r($selectFinancial_data); 
                           echo '</pre> Good Pradeep';  */
                        
                     /* End Of  External Finalcials  Details */
                     /*  print_r($int_selectFinancial_data); */
                     return array('int_financial_data'=>$int_selectFinancial_data,'ext_financial_data'=>$ext_selectFinancial_data);
                 }
                 else
                 {
                  return $blankFinancial_data;
                 }
           }
           else
           {
            return $blankFinancial_data;
           }
      }
      else
      {
         return $blankFinancial_data;
      }
   }

   public function get_arrival_time_scheduled(Request $request){
     $request->row_id=$request->flight_id; 
     $get_flight = Flights::get_by_id($request);
     return $get_flight->time; 
   }


  

   //  Add Booking For Tour 
   public function add_booking(Request $request)
   {
      if(session()->get('users_roll_type'))
      { 
         
           /*  Custom  validation  Redirect to Back  */
         $validator = Validator::make($request->all(), [
            'booking_start_date' => 'required','tour_start_time'=>'required','booking_type' => 'required','guest_email' => 'required','guest_name' => 'required','guest_whatsapp' => 'required','tour_length' => 'required','passengers'=>'required'
          ]);

         /*  Auto validation  Redirect to Back  */
         //  $validator = $request->validate(array(
         //    'booking_start_date' => 'required','booking_type' => 'required','guest_email' => 'required','guest_name' => 'required','arrival_flight_no' => 'required','departure_flight_no' => 'required','guest_whatsapp' => 'required','no_of_day' => 'required | numeric','no_of_night'=>'required','passengers'=>'required','arrival_flight_time'=>'required','departure_flight_time'=>'required'));


         if ($validator->fails()) {
            // return redirect('dashboard')->withErrors($validator);
            echo json_encode(array('success'=>'0','id'=>"",'error'=>$validator));  
            
         }
         else
         {
             //  Chnage The  date Format 
            $var = $request->booking_start_date; // 30/01/2020  
            $datest = str_replace('/', '-', $var);
            $request->booking_start_date=date('Y-m-d', strtotime($datest));

            $var2 = $request->booking_end_date; // 30/01/2020  
            $datest2 = str_replace('/', '-', $var2);
            $request->booking_end_date=date('Y-m-d', strtotime($datest2));
            
            $booking_check = Tour_bookings::check_booking($request);
            if(count($booking_check) <= 0)
            {  
               if($request->guest_email ||  $request->guest_whatsapp)
               {
                  $customer_details = Customers::get_customer($request);
                  if(count($customer_details) > 0 ){   
                    $request->customer_id=$customer_details[0]->id; 
                  }
                  else
                  {
                     $customer_details = Customers::create_customer($request);  
                     $request->customer_id=$customer_details->id; 
                  }
               }
               else
               {
                  $request->customer_id='';
               }

               $booking_details = Tour_bookings::add_booking($request); 
               $last_id=$request->row_id=$booking_details->id;
               //   Create Booking Id 
               if($booking_details->booking_type=='tour'){ $squencedtoday='TOUR';  }
               elseif($booking_details->booking_type=='taxi') { $squencedtoday='CAB';  }

               $ymdhis = date('mydh');
               $booking_id=$squencedtoday.'-'.$ymdhis.'-'.$last_id;
               $request->booking_id=$booking_id;   //  implement this  value  in the request  Array 
               $booking_booking = Tour_bookings::update_booking_id($request);
               session(['booking_id' =>$booking_id]); 
               echo json_encode(array('success'=>'1','id'=>$booking_id,'error'=>"")); 
            } 
            else
            {
               echo json_encode(array('success'=>'1','id'=>"",'details'=>$booking_check)); 
            } 
         }
        // return redirect('dashboard')->with(["msg"=>'<div class="alert alert-success""><strong>'.$request->booking_type.' Booking success.. </strong></div>']);
         

      }
      else{   
       return redirect('admin-login')->with(["msg"=>'<div class="alert alert-danger""><strong>Wrong </strong> First you can do login !!!</div>']);
      }
   }

    //  Add Booking For taxi 
    public function add_booking_taxi(Request $request)
    {
       if(session()->get('users_roll_type'))
       { 

        
         $validator = Validator::make($request->all(), [
            'taxi_cost'=>'required','booking_start_date' => 'required','tour_start_time'=>'required','booking_type' => 'required','guest_name'=>'required','guest_email' => 'required','guest_whatsapp' => 'required','passengers'=>'required','source_address'=>'required','destination_address'=>'required','driver_approx_time'=>'required'
        ]);

         //   $validator = $request->validate(array(
         //    'booking_start_date' => 'required','booking_type' => 'required','guest_name'=>'required','guest_email' => 'required','guest_whatsapp' => 'required','passengers'=>'required','source_address'=>'required','destination_address'=>'required'));
            if ($validator->fails()) {
                 return redirect('dashboard')->withErrors($validator);
             }
                 
              
               $source_address_details=$this->getlat_long($request->source_address);  
               if($source_address_details)
               {
                  $request->source_latitude=$source_address_details['lat']?$source_address_details['lat']:'26.8496217';
                  $request->source_longitude=$source_address_details['long']?$source_address_details['long']:'80.9462193';
               }
               else
               {
                  $request->source_latitude='26.8496217'; //  implement this  value  in the request  Array 
                  $request->source_longitude='80.9462193';//  implement this  value  in the request  Array 
               } 
              $destination_address_details=$this->getlat_long($request->destination_address);  
               if($destination_address_details)
               {
                  $request->destination_latitude=$destination_address_details['lat']?$destination_address_details['lat']:'26.8496217';
                  $request->destination_longitude=$destination_address_details['long']?$destination_address_details['long']:'80.9462193';
               }
               else
               {
                  $request->destination_latitude='26.8496217'; //  implement this  value  in the request  Array 
                  $request->destination_longitude='80.9462193';//  implement this  value  in the request  Array 
               } 
         
               //  Chnage The  date Format 
               $var = $request->booking_start_date; // 30/01/2020 
               $datest = str_replace('/', '-', $var);
               $request->booking_start_date=date('Y-m-d', strtotime($datest));

               

               $request->booking_end_date=$request->booking_start_date; //  implement this  value  in the request  Array 
               // 'guest_name'=>$request->guest_name, 
               // 'guest_email'=>$request->guest_email, 
               // 'guest_whatsapp'=>$request->guest_whatsapp,
               if($request->guest_email ||  $request->guest_whatsapp)
               {
                  $customer_details = Customers::get_customer($request);
                  if(count($customer_details) > 0 ){   
                    $request->customer_id=$customer_details[0]->id; 
                  }
                  else
                  {
                     $customer_details = Customers::create_customer($request);  
                     $request->customer_id=$customer_details->id; 
                  }
               }
               else
               {
                  $request->customer_id='';
               }
               
               $booking_details = Taxi_bookings::add_booking_taxi($request);
               $last_id=$request->row_id=$booking_details->id;
               //   Create Booking Id 
               if($booking_details->booking_type=='tour'){
               $squencedtoday='TOUR'; 
               }
               elseif($booking_details->booking_type=='taxi')
               {
                  $squencedtoday='CAB'; 
               }
               $ymdhis = date('mydh');
               $booking_id=$squencedtoday.'-'.$ymdhis.'-'.$last_id;
               $request->booking_id=$booking_id;   //  implement this  value  in the request  Array 
               $booking_booking = Taxi_bookings::update_booking_id($request);

               $request->booking_type=$booking_details->booking_type; 

               $request->start_time=date("H:i:s", strtotime($request->tour_start_time)); 
               $request->end_time=date("H:i:s", strtotime($request->tour_start_time)); 
               
               $request->start_date=$request->booking_start_date.' '.$request->start_time; 
               $request->end_date=$request->booking_start_date.' '.$request->end_time; 
               $request->customer_id=$booking_details->customer_id;
               $save_taxi_events=Booking_events::save_events($request); 
               session(['booking_id' =>$booking_id]); 

              return redirect('taxi_bookings')->with(["msg"=>'<div class="alert alert-success""><strong>'.ucfirst($request->booking_type).' Booking success.. </strong></div>']);
       }
       else{  
          return redirect('admin-login')->with(["msg"=>'<div class="alert alert-danger""><strong>Wrong </strong> First you can do login !!!</div>']);
       }
    }
   
    //  taxi  Rental  Booking  of  the  Request  base 
   public  function  taxi_rental_booking(Request  $request )
   {
      if(session()->get('users_roll_type'))
       {
         //  print_r($request->all()); die; 
         $validator = Validator::make($request->all(), [
            'booking_start_date' => 'required','booking_end_date' => 'required','tour_start_time'=>'required','booking_type' => 'required','guest_name'=>'required','guest_email' => 'required','guest_whatsapp' => 'required','passengers'=>'required','source_address'=>'required','destination_address'=>'required'
            ]);
         if ($validator->fails()) 
         {
               return Response::json(array( 'success' => false,'errors' => $validator->getMessageBag()->toArray()), 400); 
         }
         else
         {
            $booking_details=Taxi_bookings::get_this_booking_request($request);
            if(count($booking_details))
            {
               $events_details=$booking_details; 
            }
            else
            {
               $source_address_details=$this->getlat_long($request->source_address);  
               if($source_address_details)
               {
                  $request->source_latitude=$source_address_details['lat']?$source_address_details['lat']:'26.8496217';
                  $request->source_longitude=$source_address_details['long']?$source_address_details['long']:'80.9462193';
               }
               else
               {
                  $request->source_latitude='26.8496217'; //  implement this  value  in the request  Array 
                  $request->source_longitude='80.9462193';//  implement this  value  in the request  Array 
               } 
            $destination_address_details=$this->getlat_long($request->destination_address);  
               if($destination_address_details)
               {
                  $request->destination_latitude=$destination_address_details['lat']?$destination_address_details['lat']:'26.8496217';
                  $request->destination_longitude=$destination_address_details['long']?$destination_address_details['long']:'80.9462193';
               }
               else
               {
                  $request->destination_latitude='26.8496217'; //  implement this  value  in the request  Array 
                  $request->destination_longitude='80.9462193';//  implement this  value  in the request  Array 
               } 
         
               //  Chnage The  date Format 
               $var = $request->booking_start_date; // 30/01/2020 
               $datest = str_replace('/', '-', $var);
               $request->booking_start_date=date('Y-m-d', strtotime($datest));

               

               $request->booking_end_date=$request->booking_start_date; //  implement this  value  in the request  Array 
               // 'guest_name'=>$request->guest_name, 
               // 'guest_email'=>$request->guest_email, 
               // 'guest_whatsapp'=>$request->guest_whatsapp,
               if($request->guest_email ||  $request->guest_whatsapp)
               {
                  $customer_details = Customers::get_customer($request);
                  if(count($customer_details) > 0 ){   
                  $request->customer_id=$customer_details[0]->id; 
                  }
                  else
                  {
                     $customer_details = Customers::create_customer($request);  
                     $request->customer_id=$customer_details->id; 
                  }
               }
               else
               {
                  $request->customer_id='';
               }
               
               $booking_details = Taxi_bookings::add_booking_taxi($request);
               $last_id=$request->row_id=$booking_details->id;
               //   Create Booking Id 
               if($booking_details->booking_type=='tour'){
               $squencedtoday='TOUR'; 
               }
               elseif($booking_details->booking_type=='taxi')
               {
                  $squencedtoday='CAB'; 
               }
               $ymdhis = date('mydh');
               $booking_id=$squencedtoday.'-'.$ymdhis.'-'.$last_id;
               $request->booking_id=$booking_id;   //  implement this  value  in the request  Array 
               $booking_booking = Taxi_bookings::update_booking_id($request);
               
               $request->booking_type=$booking_details->booking_type; 

               $request->start_time=date("H:i:s", strtotime($request->tour_start_time)); 
               $request->end_time=date("H:i:s", strtotime($request->tour_start_time)); 
               
               $request->start_date=$request->booking_start_date.' '.$request->start_time; 
               $request->end_date=$request->booking_start_date.' '.$request->end_time; 
               $request->customer_id=$booking_details->customer_id;
               $events_details=$save_taxi_events=Booking_events::save_events($request); 
          }
            return Response::json(array('success' => true,'details'=>$events_details), 200);
         }
      }
      else{  
         return redirect('admin-login')->with(["msg"=>'<div class="alert alert-danger""><strong>Wrong </strong> First you can do login !!!</div>']);
      }
   }

//  Update Conversation 
public  function  update_conversation(Request  $request )
{
   if(session()->get('users_roll_type'))
   {
      //  $validator = Validator::make($request->all(), ['conversation'=>'required']);
      // if($validator->fails()) 
      // {
      //    return Response::json(array( 'success' => false,'errors' => $validator->getMessageBag()->toArray()), 400); 
      // }
      // else
      // {
      //    $update_conversation=Booking_request::update_booking_request('id',$request->rowId,array('conversation'=>$request->conversation,'action_by'=>session()->get('user_id')));
      //    return Response::json(array('success' => true,'details'=>$update_conversation), 200);
      // }

      $update_conversation=Booking_request::update_booking_request('id',$request->rowId,array('conversation'=>$request->conversation,'action_by'=>session()->get('user_id')));
      return Response::json(array('success' => true,'details'=>$update_conversation), 200);

   }
   else
   {  
      return redirect('admin-login')->with(["msg"=>'<div class="alert alert-danger""><strong>Wrong </strong> First you can do login !!!</div>']);
   }
}


   /* Get  Conversation  */
   public  function  get_conversation(Request  $request)
   {
      $get_conversation=Booking_request::get_where(array('id'=>$request->rowId));
      
      if(!empty($get_conversation))
      {
          return Response::json(array('success' => true,'conversation'=>$get_conversation), 200);
      }
      else
      {
         return Response::json(array('success' => true,'conversation'=>json_encode(array())), 200);
      }
   }

   /*  taxi  Booking Listing  Managenent  */
   public function  taxi_bookings()
   {
      
       $get_all_taxis=Taxi_bookings::get_all_taxis();
       if(session()->get('users_roll_type')=='2')
       { 
         return view('employee.taxi_bookings')->with(['get_all_taxis'=>$get_all_taxis]);  
       }
       else if(session()->get('users_roll_type')=='3')
       { 
          return view('manager.taxi_bookings')->with(['get_all_taxis'=>$get_all_taxis]); 
       }

       else if(session()->get('users_roll_type')=='1')
       { 
         return view('genral.taxi_bookings')->with(['get_all_taxis'=>$get_all_taxis]); 
       }
       else{   
         return redirect('admin-login')->with(["msg"=>'<div class="alert alert-danger""><strong>Wrong </strong> First you can do login !!!</div>']);
       }
   }
   
  /*  tour  Booking Listing  Managenent  */
   public function   tour_bookings()
   {
       $get_all_tours=Tour_bookings:: get_all_tours(); 
       if(session()->get('users_roll_type')=='2')
       { 
          return view('employee.tour_bookings')->with(['get_all_tours'=>$get_all_tours]); 
       }
       else if(session()->get('users_roll_type')=='3')
       { 
          return view('manager.tour_bookings')->with(['get_all_tours'=>$get_all_tours]); 
       }
       else if(session()->get('users_roll_type')=='1')
       { 
          return view('genral.tour_bookings')->with(['get_all_tours'=>$get_all_tours]); 
       }
       else{   
       return redirect('admin-login')->with(["msg"=>'<div class="alert alert-danger""><strong>Wrong </strong> First you can do login !!!</div>']);
       }
     
   }

     //  delete booking 
     public function delete_tour_booking(Request $request)
     {
         if(session()->get('users_roll_type'))
         { 
               $get_tour_booking_details=Tour_bookings::get_tour_bookings_by_id($request);  
               $delete_tour_events=Booking_events:: update_events_by_id('booking_id',$get_tour_booking_details->booking_id,array('status'=>'0'));
               $delete_booking=Tour_bookings::delete_booking_by_id($request);
               echo '200';
         }
         else{   
         return redirect('admin-login')->with(["msg"=>'<div class="alert alert-danger""><strong>Wrong </strong> First you can do login !!!</div>']);
         }
     }
     //  delete booking 
     public function delete_taxi_booking(Request $request)
     {
         if(session()->get('users_roll_type'))
         { 
               $get_taxi_booking_details=Taxi_bookings::get_taxi_booking_by_id($request); 
               $delete_taxi_events=Booking_events:: update_events_by_id('booking_id',$get_taxi_booking_details->booking_id,array('status'=>'0'));
               $delete_booking=Taxi_bookings::delete_booking_by_id($request);
               if($delete_booking && $delete_taxi_events){ echo '200'; }
         }
         else{   
          return redirect('admin-login')->with(["msg"=>'<div class="alert alert-danger""><strong>Wrong </strong> First you can do login !!!</div>']);
         }
     }
     //  delete  booking by admin  as  notification  

     public  function delete_booking(Request $request)
     {
         if(session()->get('users_roll_type'))
         { 
            if($request->booking_type=='taxi')
            {
               $get_booking_details=Taxi_bookings::get_taxi_booking_by_id($request); 
               if($get_booking_details->delete_request=='1' && $get_booking_details->status=='1' )
               {
                    //$delete_booking=Taxi_bookings::delete_booking_by_id($request);
                   $delete_booking=Taxi_bookings::update_booking_by_column('id',$request->row_id,array('status' => 0,'delete_request_action'=>'approved ','delete_request_action_by'=>session()->get('user_id')));
                   $delete_taxi_events=Booking_events:: update_events_by_id('booking_id',$get_booking_details->booking_id,array('status'=>'0'));
               }
            }
            if($request->booking_type=='tour')
            {
               $get_booking_details=Tour_bookings::get_tour_bookings_by_id($request); 
               if($get_booking_details->delete_request=='1' && $get_booking_details->status=='1' )
               {
                  //$delete_booking=Tour_bookings::delete_booking_by_id($request); 
                   $delete_booking=Tour_bookings::update_booking_by_column('id',$request->row_id,array('status' => 0,'delete_request_action'=>'approved ','delete_request_action_by'=>session()->get('user_id')));
                   $delete_tour_events=Booking_events:: update_events_by_id('booking_id',$get_booking_details->booking_id,array('status'=>'0'));
               }
            }
            //$getAll_delete_request= Tour_bookings::get_all_delete_request_booking();
            //echo count((array)$getAll_delete_request);
            return redirect('dashboard')->with(["msg"=>'<div class="alert alert-success"> '.ucfirst($request->booking_type?$request->booking_type:'').' <strong> '.$get_booking_details->booking_id.' </strong> deleted ....</div>']);
         }
         else{   
         return redirect('admin-login')->with(["msg"=>'<div class="alert alert-danger""><strong>Wrong </strong> First you can do login !!!</div>']);
         }
     }
      // cancel  Booking delete Request 
      public function delete_booking_request_cancel(Request $request)
      {   
         if($request->booking_type=='taxi' && $request->row_id)
         {
            $get_booking_details=Taxi_bookings::get_taxi_booking_by_id($request); 
            if($get_booking_details->delete_request=='1')
            {
               $delete_booking=Taxi_bookings::update_booking_by_column('id',$request->row_id,array('delete_request'=>'0','delete_request_action'=>'cancelled ','delete_request_action_by'=>session()->get('user_id')));
            }
         }
         if($request->booking_type=='tour' && $request->row_id )
         {
            $get_booking_details=Tour_bookings::get_tour_bookings_by_id($request); 
            if($get_booking_details->delete_request=='1')
            {
               $delete_booking=Tour_bookings::update_booking_by_column('id',$request->row_id,array('delete_request'=>'0','delete_request_action'=>'cancelled ','delete_request_action_by'=>session()->get('user_id')));
            }
         }
         //   $getAll_delete_request= Tour_bookings::get_all_delete_request_booking();
         //   echo count((array)$getAll_delete_request);
         return redirect('dashboard')->with(["msg"=>'<div class="alert alert-success"> '.ucfirst($request->booking_type?$request->booking_type:'').' <strong> '.$get_booking_details->booking_id.' </strong> Delete request <strong> Cancelled</strong> ....</div>']);
      }


     //  delete  booking request  details 
     public function delete_booking_request_details(Request $request)
     {
        if(session()->get('users_roll_type')=='1')
         {

                  //  get delete  notification 
                  $delete_data=Tour_bookings::get_all_delete_request_booking();
                  $data['delete_notification']=(array) $delete_data; 

                  //  get  a specific  request
                  if($request->booking_id && ($request->booking_type=='taxi' || $request->booking_type=='tour'))
                  {       
                      
                      if($request->booking_type=='taxi')
                      {
                        $data['delete_details']=Taxi_bookings::get_booking_delete_request($request);  
                      }
                      else if($request->booking_type=='tour')
                      {
                        $data['delete_details']=Tour_bookings::get_booking_delete_request($request);  
                      }
                  }
                  else
                  {
                    $data['delete_details']=json_encode(array()); 
                  }
                  //print_r($data['delete_details']);  die; 
                 //$getAll_delete_request= Tour_bookings::get_booking_delete_request_booking(); 
                  return  view('genral.delete_booking_request')->with($data);    
         }
         else{   
             return redirect('dashboard')->with(["msg"=>'<div class="alert alert-danger""><strong>Wrong </strong> you can not access!!!</div>']);
         }

     }


  

     //  Create A delete request  for taxi Booking  
     public function delete_request_taxi_booking(Request $request)
     {     // user_id    users_roll_type
        $get_taxi_booking_details=Taxi_bookings::get_taxi_booking_by_id($request); 
        if($get_taxi_booking_details->delete_request=='0'){ $delete_request=1; }else{ $delete_request=0; }
        $create_request=Taxi_bookings::update_booking_by_column('id',$request->row_id,array('delete_request'=>$delete_request,'delete_reason'=>$request->delete_reason,'delete_request_by'=>session()->get('user_id')));
        if($create_request){ echo $get_taxi_booking_details->delete_request;  }  
     }

     //  Create A delete request  for  tour  Booking  
     public function delete_request_tour_booking(Request $request)
     {            //  1user_id    users_roll_type
        
         $get_tour_booking_details=Tour_bookings::get_tour_bookings_by_id($request);
         if($get_tour_booking_details->delete_request=='0'){ $delete_request=1; }else{ $delete_request=0; }
         $create_request=Tour_bookings::update_booking_by_column('id',$request->row_id,array('delete_request'=>$delete_request,'delete_reason'=>$request->delete_reason,'delete_request_by'=>session()->get('user_id')));
          if($create_request){ echo $get_tour_booking_details->delete_request; }
     }




   //  save  event  only 
   public  function save_event(Request  $request)
   {
      // data:{ _token: "{{ csrf_token() }}",event_data:myJSON,booking_id:'Tour-238846355-23',start_date:'2020-02-12',end_date:'2020-02-12' },
      if($request->booking_type=='tour')
      {
         $dataJson=$request->event_data;   
         $get_tour_details=Tour_bookings::get_tour_booking_by_booking_id($request); 
         //$update['events_data'] =$dataJson;
         //$up=Tour_bookings::where('booking_id' ,$request->booking_id)->update($update);
         $result = json_decode($dataJson);
         // print_r($dataJson);  die("hi"); 
         $events_arraydata =[]; 
         $internal_tour_cost=0;
         $external_tour_cost=0;
         $booking_id='';

         foreach ($result as $key => $value) {
         $single_eventdata=json_encode($value); 

         $booking_id=$request->booking_id;   //  set  Booking id  to  update Tour Booking Record 
          // print_r($dataJson);  die;  

        // $new_array=array(
        //       'external_transportation_cost'=>(integer)($value->internal[0]->transportation_cost0?$value->internal[0]->transportation_cost0:0),
        //       'internal_transportation_cost'=>(integer)($value->external[0]->transportation_cost0?$value->external[0]->transportation_cost0:0)
        //      );
            
             $sum_of_this_event_internal_discount=0;
             $sum_of_this_event_internal_suplier=0;
             if( isset($value->internal[0]) ){
                 foreach($value->internal[0] as  $key=>$row){
               
                  if(preg_replace('/\d+/u', '', $key)=='int_supplier_value' ||  preg_replace('/\d+/u', '', $key)=='int_supplier_value-')
                  {
                     $sum_of_this_event_internal_suplier=$sum_of_this_event_internal_suplier+(integer)($row?$row:0);
                  }
                  if(preg_replace('/\d+/u', '', $key)=='int_discount' || preg_replace('/\d+/u', '', $key)=='int_discount-' || preg_replace('/\d+/u', '', $key)=='discount' )
                  {
                     $sum_of_this_event_internal_discount=$sum_of_this_event_internal_discount+(integer)($row?$row:0);
                  }
               } 
             }
             
               // echo  $sum_of_this_event_internal_discount;
               // echo  $sum_of_this_event_internal_suplier;
               
               $sum_of_this_event_external_discount=0;
               $sum_of_this_event_external_suplier=0;
               if(isset($value->external[0]) ){
                foreach($value->external[0] as  $key2=>$row2){
                  if(preg_replace('/\d+/u', '', $key2)=='ext_supplier_value' ||  preg_replace('/\d+/u', '', $key2)=='ext_supplier_value-')
                  {
                     $sum_of_this_event_external_suplier=$sum_of_this_event_external_suplier+(integer) ($row2?$row2:0);
                  }
                  if(preg_replace('/\d+/u', '', $key2)=='ext_discount_value' || preg_replace('/\d+/u', '', $key2)=='ext_discount_value-' || preg_replace('/\d+/u', '', $key2)=='discount' )
                  {
                     $sum_of_this_event_external_discount=$sum_of_this_event_external_discount+(integer) ($row2?$row2:0);
                  }
               } 

               }
               if(isset($value->internal[0]) ){
                 $internal_transportation_cost=(integer)($value->internal[0]->transportation_cost0?$value->internal[0]->transportation_cost0:0);
               }
               else{
                $internal_transportation_cost=0;
               }
               if(isset($value->external[0]) ){
               $external_transportation_cost=(integer)($value->external[0]->transportation_cost0?$value->external[0]->transportation_cost0:0);
             }
             else{
               $external_transportation_cost=0;
             }

               $internal_tour_cost=$internal_tour_cost+($sum_of_this_event_internal_suplier+$internal_transportation_cost)-$sum_of_this_event_internal_discount;
               $external_tour_cost=$external_tour_cost+($sum_of_this_event_external_suplier+$external_transportation_cost)-$sum_of_this_event_external_discount;
               
               //  echo $sum_of_this_event_external_discount; 
               //  echo $sum_of_this_event_external_suplier;
               //  echo '||';

          array_push($events_arraydata,[
            'booking_id'=>$request->booking_id,
            'customer_id'=>$get_tour_details->customer_id,
            // 'start_date'=>$value->start,0,10),
            // 'end_date'=>substr($value->end,0,10),str_replace('T',' ',substr('2020-02-25T00:00:00.000Z',0,19))
            'start_date'=>str_replace('T',' ',substr($value->start,0,19)),
            'end_date'=>str_replace('T',' ',substr($value->end,0,19)),
            'start_time'=>substr($value->start,11,8),
            'end_time'=>substr($value->end,11,8),
            'event_data'=>$single_eventdata,
            'internal_financial_details'=>json_encode($value->internal),
            'external_financial_details'=>json_encode($value->external),
            'external_transportation_cost'=>isset($value->internal[0])?$value->internal[0]->transportation_cost0:0,
            'internal_transportation_cost'=>isset($value->external[0])?$value->external[0]->transportation_cost0:0,
            // 'event_data'=>$eventDetails,
            'booking_type'=>$request->booking_type
            ]);  
         } 
                 
         /* echo $internal_tour_cost;
         echo '#'; 
         echo $external_tour_cost;

         die("hi ");  */

        // print_r($events_arraydata); die; 
         $tour_cost_data=array('internal_tour_cost'=>$internal_tour_cost,'external_tour_cost'=>$external_tour_cost); 
         $tour_update=Tour_bookings::update_booking_by_column('booking_id',$request->booking_id,$tour_cost_data);

         $save_events=Booking_events::insert($events_arraydata); 
      }
      else
      {
         $save_events=Booking_events::save_events($request);
      }
      echo '200'; 
     
      // return redirect('dashboard')->with(["msg"=>'<div class="alert alert-success""><strong>Created </strong>Successfully!!!</div>']);
   }

   //  get Booking  Events  Details 
   public function get_booking_events_details(Request $request)
   {
      $data['booking_tour_events_details']=Booking_events::get_booking_tour_events_details($request);
      $data['booking_taxi_events_details']=Booking_events::get_booking_taxi_events_details($request);
      $data['method']='modal_event_listing';
      return view('genral.ajax')->with($data); 
   }

  //  get  booked Taxi And  Driver on this  date 
  public function get_taxi_and_driver(Request $request)
  {   
      $data['get_all_drivers'] = Drivers::get_all_drivers();
      $data['get_all_Taxies'] = Taxi::get_all_taxies();
      $booked_taxi= Booking_events::get_all_booked_taxi_in_range($request);
      $booked_driver= Booking_events::get_all_booked_driver_in_range($request);
       
      $data['get_all_booked_taxies']=(array) $booked_taxi;
      $data['get_all_booked_driver']=(array) $booked_driver;

      $data['single_event_details']=Booking_events::get_event_by_id($request); 
      $data['tour_bookings_details']=Tour_bookings::get_tour_booking_by_booking_id($request);
       
      $data['row_id']=$request->row_id;
      $data['method']='modal_assign_taxi_driver';
      return view('genral.ajax')->with($data); 
  }
 //  Driver & taxi  Assign  For Tour 
  public function taxi_driver_assign_for_tour(Request $request)
  {
     $up_result=Booking_events::taxi_driver_update_by_id_for_cab($request); 
     if($up_result){ echo '200'; }  
  }
  public function taxi_driver_assign_for_taxi(Request $request)
  {
     $up_result=Booking_events::taxi_driver_update_by_id_for_cab($request); 
     if($up_result){ echo '200'; }  
  }


  //  Edit  tour  Booking  
  public function edit_tour_booking(Request $request)
  {
      $data['tour_bookings_details']=$tour_bookings_details=Tour_bookings::get_tour_bookings_by_id($request); 
      $request->booking_id=$tour_bookings_details->booking_id; 
      $booking_events_result=Booking_events::get_tour_bookings_events_by_booking_id($request); 
      $events_arraydata=array(); 
      if($booking_events_result) {
         foreach($booking_events_result as $value){
            $decodedata=json_decode($value->event_data);
            array_push($events_arraydata,$decodedata); 
         }
         $result=json_encode($events_arraydata); 
      }else { $result=''; }
      $data['tour_bookings_events_details'] =$result; 
      $data['get_all_activities'] = Customization_activities::get_all_activities();
      $data['get_all_activities_types'] = Customization_activities_types::get_all_activities_types();
      $data['get_all_Taxies'] = Taxi::get_all_taxi_list();
      return view('genral.edit_tour_booking')->with('booking_deatils',$data);
  }
  
  public function  update_tour_financials(Request $request)
  {
      // print_r($request->all()); 
      // echo json_encode($request->internal_financial_details);
      // echo json_encode($request->external_financial_details);
     $updated_data['internal_financial_details']=json_encode($request->internal_financial_details);
     $updated_data['external_financial_details']=json_encode($request->external_financial_details);
     $up=Tour_bookings::update_booking_by_column('booking_id',$request->booking_id,$updated_data);
     if($up){ echo '200'; }
  }

  //  update booking Events 
  public  function update_event(Request $request)
  {
      if($request->booking_type=='tour')
      {
         $dataJson=$request->event_data; 
         $get_tour_details=Tour_bookings::get_tour_booking_by_booking_id($request); 
         $delete=Booking_events::where('booking_id' ,$request->booking_id)->delete();
         $result = json_decode($dataJson);
         $events_arraydata =[]; 

         $internal_tour_cost=0;
         $external_tour_cost=0;
         $booking_id='';


         foreach ($result as $key => $value) {
         $single_eventdata=json_encode($value); 
         $booking_id=$request->booking_id;   //  set  Booking id  to  update Tour Booking Record 
         
        $new_array=array(
              'external_transportation_cost'=>(integer)($value->internal[0]->transportation_cost0?$value->internal[0]->transportation_cost0:0),
              'internal_transportation_cost'=>(integer)($value->external[0]->transportation_cost0?$value->external[0]->transportation_cost0:0)
             );
            
             $sum_of_this_event_internal_discount=0;
             $sum_of_this_event_internal_suplier=0;
             foreach($value->internal[0] as  $key=>$row){
               
                  if(preg_replace('/\d+/u', '', $key)=='int_supplier_value' ||  preg_replace('/\d+/u', '', $key)=='int_supplier_value-')
                  {
                     $sum_of_this_event_internal_suplier=$sum_of_this_event_internal_suplier+(integer)($row?$row:0);
                  }
                  if(preg_replace('/\d+/u', '', $key)=='int_discount' || preg_replace('/\d+/u', '', $key)=='int_discount-' || preg_replace('/\d+/u', '', $key)=='discount' )
                  {
                     $sum_of_this_event_internal_discount=$sum_of_this_event_internal_discount+(integer)($row?$row:0);
                  }
                  
               } 
               // echo  $sum_of_this_event_internal_discount;
               // echo  $sum_of_this_event_internal_suplier;
               
               $sum_of_this_event_external_discount=0;
               $sum_of_this_event_external_suplier=0;
               foreach($value->external[0] as  $key2=>$row2){
                  if(preg_replace('/\d+/u', '', $key2)=='ext_supplier_value' ||  preg_replace('/\d+/u', '', $key2)=='ext_supplier_value-')
                  {
                     $sum_of_this_event_external_suplier=$sum_of_this_event_external_suplier+(integer) ($row2?$row2:0);
                  }
                  if(preg_replace('/\d+/u', '', $key2)=='ext_discount_value' || preg_replace('/\d+/u', '', $key2)=='ext_discount_value-' || preg_replace('/\d+/u', '', $key2)=='discount' )
                  {
                     $sum_of_this_event_external_discount=$sum_of_this_event_external_discount+(integer) ($row2?$row2:0);
                  }
               } 
               $internal_transportation_cost=(integer)($value->internal[0]->transportation_cost0?$value->internal[0]->transportation_cost0:0);
               $external_transportation_cost=(integer)($value->external[0]->transportation_cost0?$value->external[0]->transportation_cost0:0);

               $internal_tour_cost=$internal_tour_cost+($sum_of_this_event_internal_suplier+$internal_transportation_cost)-$sum_of_this_event_internal_discount;
               $external_tour_cost=$external_tour_cost+($sum_of_this_event_external_suplier+$external_transportation_cost)-$sum_of_this_event_external_discount;
               
               //  echo $sum_of_this_event_external_discount; 
               //  echo $sum_of_this_event_external_suplier;
               //  echo '||';

         array_push($events_arraydata,[
            'booking_id'=>$request->booking_id,
            'customer_id'=>$get_tour_details->customer_id,
            // 'start_date'=>$value->start,0,10),
            // 'end_date'=>substr($value->end,0,10),str_replace('T',' ',substr('2020-02-25T00:00:00.000Z',0,19))
            'start_date'=>str_replace('T',' ',substr($value->start,0,19)),
            'end_date'=>str_replace('T',' ',substr($value->end,0,19)),
            'start_time'=>substr($value->start,11,8),
            'end_time'=>substr($value->end,11,8),
            'event_data'=>$single_eventdata,
            'internal_financial_details'=>json_encode($value->internal),
            'external_financial_details'=>json_encode($value->external),
            'external_transportation_cost'=>(integer)($value->internal[0]->transportation_cost0?$value->internal[0]->transportation_cost0:0),
            'internal_transportation_cost'=>(integer)($value->external[0]->transportation_cost0?$value->external[0]->transportation_cost0:0),
            'booking_type'=>$request->booking_type
            ]);
          }
         /* echo $internal_tour_cost;
         echo '#'; 
         echo $external_tour_cost;
         echo '#';
         echo $request->booking_id;
        
         die("hi "); */ 

         $tour_cost_data=array('internal_tour_cost'=>$internal_tour_cost,'external_tour_cost'=>$external_tour_cost); 
         $tour_update=Tour_bookings::update_booking_by_column('booking_id',$request->booking_id,$tour_cost_data);


          $save_events=Booking_events::insert($events_arraydata);
          echo '200'; 
      }
      // return redirect()->back()->with(["msg"=>'<div class="alert alert-success"">Tour <strong> Updated</strong>Successfully!!!</div>']);
  }


  public function update_booked_driver_name(Request  $request)
  {
      if($request->date)
      {
         $data['validate']=count(Booking_events::check_booking_satatus_of_day($request->date));
         $data['all_events']=Booking_events::get_all_car_driver_list_today($request->date);

         $data['all_events_of_the_day']=Booking_events::get_all_events_of_today($request->date);
         $data['get_all_taxi']=Taxi::get_all_taxi_with_id_title();

          $allevent=$data['all_events_of_the_day'];
          // print_r($allevent);
          foreach ($allevent as $key => $value) {
            // print_r($value->driver_id);
            if($value->resourceId == $request->taxi){
              $update['driver']=$request->driver_id;
              $Up=Booking_events::update_events_by_id('id',$value->id,$update); 
            }
          }

          $update['start_date']=$request->start_date;
          $update['end_date']=$request->end_date;
          $update['driver']=$request->driver_id;
          $update['taxi']=$request->taxi;
          $Up=Booking_events::update_events_by_id('id',$request->row_id,$update); 

          echo '200'; 
      }
  }


  public function update_booking_status(Request  $request)
  {
    $get_booking_events=Booking_events::get_event_by_id($request);
    if(!empty($get_booking_events) && $request->status && $request->row_id )
    {
       if($request->status!="" && $request->status!='booking' &&  $get_booking_events->taxi && $get_booking_events->driver )
       {  
         if($request->status=='incomplete'){ $request->status='drive_time'; }
         if($request->status){ $update['booking_status']=$request->status;  }
         if($request->start_date){ $update['start_date']=$request->start_date; }
         if($request->end_date){ $update['end_date']=$request->end_date;  }
         if($request->taxi){ $update['taxi']=$request->taxi;  }
         $Up=Booking_events::update_events_by_id('id',$request->row_id,$update); 
       }
       else
       {  
         $update['booking_status']=$request->status; 
         $Up=Booking_events::update_events_by_id('id',$request->row_id,$update); 
       }
       echo '200'; 
    }
    else
    {
       echo '800'; 
    }
  }

  public function structure_booking_status(Request  $request)
  {
    $get_booking_events=Booking_events::get_event_by_id($request);
    if(!empty($get_booking_events) && $request->status && $request->row_id )
    {
       if($request->status!="" && $request->status!='booking' &&  $get_booking_events->taxi && $get_booking_events->driver )
       {  
         if($request->status=='incomplete'){ $request->status='drive_time'; }
         if($request->status){ $update['booking_status']=$request->status;  }
         if($request->start_date){ $update['start_date']=$request->start_date; }
         if($request->end_date){ $update['end_date']=$request->end_date;  }
         $Up=Booking_events::update_events_by_id('id',$request->row_id,$update); 
       }
       else
       {
         $update['booking_status']=$request->status; 
         $Up=Booking_events::update_events_by_id('id',$request->row_id,$update); 
       }
       //  2020-03-13 07:30:00
       $date=substr($request->start_date,0,10); 
       $data['validate']=count(Booking_events::check_booking_satatus_of_day($date));
       return response()->json($data);
    }
    else
    {
       echo '800'; 
    }
  }


  //  Edit  taxi  Booking ..
  public function edit_taxi_booking(Request $request)
  {
      
      $data['booking_deatils']=Taxi_bookings::get_taxi_booking_by_id($request); 
      $data['get_all_address'] = Addresses::get_all_address();
      return view('genral.edit_taxi_book')->with($data);   
  }

  public function update_booking_taxi(Request $request)
  {
      if(session()->get('users_roll_type'))
      { 
         // $validator = Validator::make($request->all(), [
         //    'booking_start_date' => 'required','tour_start_time'=>'required','booking_type' => 'required','guest_name'=>'required','guest_email' => 'required','guest_whatsapp' => 'required','passengers'=>'required','source_address'=>'required','destination_address'=>'required'
         //  ]);
          
           $validator = $request->validate(array(
               'taxi_cost'=>'required','booking_start_date' => 'required','tour_start_time'=>'required','booking_type' => 'required','guest_name'=>'required','guest_email' => 'required','guest_whatsapp' => 'required','passengers'=>'required','source_address'=>'required','destination_address'=>'required'
            ));
           
            $source_address_details=$this->getlat_long($request->source_address);  
               if($source_address_details)
               {
                  $request->source_latitude=$source_address_details['lat']?$source_address_details['lat']:'26.8496217';
                  $request->source_longitude=$source_address_details['long']?$source_address_details['long']:'80.9462193';
               }
               else
               {
                  $request->source_latitude='26.8496217'; //  implement this  value  in the request  Array 
                  $request->source_longitude='80.9462193';//  implement this  value  in the request  Array 
               } 
              $destination_address_details=$this->getlat_long($request->destination_address);  
               if($destination_address_details)
               {
                  $request->destination_latitude=$destination_address_details['lat']?$destination_address_details['lat']:'26.8496217';
                  $request->destination_longitude=$destination_address_details['long']?$destination_address_details['long']:'80.9462193';
               }
               else
               {
                  $request->destination_latitude='26.8496217'; //  implement this  value  in the request  Array 
                  $request->destination_longitude='80.9462193';//  implement this  value  in the request  Array 
               } 

               //  Chnage The  date Format 
               $var = $request->booking_start_date; // 30/01/2020 
               $datest = str_replace('/', '-', $var);
               $request->booking_start_date=date('Y-m-d', strtotime($datest));
               $request->booking_end_date=$request->booking_start_date; //  implement this  value  in the request  Array 
               if($request->guest_email ||  $request->guest_whatsapp)
               {
                  $customer_details = Customers::get_customer($request);
                  if(count($customer_details) > 0 ){   
                    $request->customer_id=$customer_details[0]->id; 
                  }
                  else
                  {
                     $customer_details = Customers::create_customer($request);  
                     $request->customer_id=$customer_details->id; 
                  }
               }
               else
               {
                  $request->customer_id='';
               }

               $update_taxi_booking=Taxi_bookings::update_taxi_booking_by_id($request);
               if($update_taxi_booking)
               {
                  $update_booking_deatils=Taxi_bookings::get_taxi_booking_by_id($request);
               } 
               $up['booking_type']=$request->booking_type; 
               $up['customer_id']=$request->customer_id; 
               $up['start_time']=date("H:i:s", strtotime($request->tour_start_time)); 
               $up['end_time']=date("H:i:s", strtotime($request->driver_approx_time));
               $up['start_date']=$request->booking_start_date.' '.$request->start_time; 
               $up['end_date']=$request->booking_start_date.' '.$request->end_time; 
               $update_taxi_booking_events=Booking_events::update_events_by_id('booking_id',$update_booking_deatils->booking_id,$up); 

             return redirect('taxi_bookings')->with(["msg"=>'<div class="alert alert-success""><strong>'.ucfirst($request->booking_type).' Booking updated.. </strong></div>']);

         
      }
      else{   
         return redirect('admin-login')->with(["msg"=>'<div class="alert alert-danger""><strong>Wrong </strong> First you can do login !!!</div>']);
         }
  }




 /* get Tour  Booking Details  */

  public  function get_tour_details()
  {
     if(session()->get('users_roll_type'))
     {    
        $booking_id=session()->get('booking_id')?session()->get('booking_id'):'';
        if($booking_id)
        {
             // $data['get_tour_data']=Tour_bookings::select_records('booking_id',$booking_id);    
              $data['get_tour_data']=Tour_bookings::get_tour_booking_details('booking_id',$booking_id);
              $data['get_all_days']=Tour_bookings::get_all_days('booking_id',$booking_id); 
              // print_r($data['get_tour_data']);  die('Hi pradeep This is Last  Events '); 
              $data['get_tour_events_data']=Booking_events::select_records('booking_id',$booking_id); 
              $data['all_contents']=Content::get_all_contents(); 
              $data['all_distrinct']=Content::get_district_record('title');   
              return  view('genral.tour_details')->with($data); 
        } 
        else
        {
           return  view('genral.tour_details'); 
        }
     }
     else{   
       return redirect('admin-login')->with(["msg"=>'<div class="alert alert-danger""><strong>Wrong </strong> First you can do login !!!</div>']);
     }
  }

  public  function  create_tour_pdf(Request $request)
  {
     //  Storage 
   // print_r($request->all());  die;  
      if(session()->get('users_roll_type'))
      {
        /* This  data array will be passed to our PDF blade */
       /*$data = [
         'title' => 'First PDF for Medium',
         'heading' => 'Hello from 99Points.info',
         'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry`s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.'        
           ];
       
       $pdf = PDF::loadView('genral.pdf_view', $data);
         // return view('genral.pdf_view')->with($data);   
         return $pdf->download('Tour_details.pdf'); 
         // $m= $pdf->download('genral.tour_details');
         //  return view('htmltopdfview');  */
// echo 'Hi'; die; 
         $booking_id=session()->get('booking_id')?session()->get('booking_id'):'';
        if($booking_id)
        {     
              $data['get_tour_data']=Tour_bookings::get_tour_booking_details('booking_id',$booking_id);
              $data['get_all_days']=Tour_bookings::get_all_days('booking_id',$booking_id); 
              $data['get_tour_events_data']=Booking_events::select_records('booking_id',$booking_id); 
              $data['all_contents']=Content::get_all_contents(); 
              $data['all_distrinct']=Content::get_district_record('title'); 

              $pdf = PDF::loadView('genral.pdf_view', $data);
             // return view('genral.pdf_view')->with($data);  

                 // echo 'Hi';   die('Hi Pk'); 
             // return $pdf->download('Tour_details.pdf'); 
              $package="Tour_Package_".$booking_id.".pdf";
              Tour_bookings::update_booking_by_column('booking_id',$booking_id,array('package_doc'=>$package)); 
              file_put_contents("storage/tour_package/".$package,base64_decode($request->ab));
              echo '200';

             // $m= $pdf->download('genral.tour_details');
             //  return view('htmltopdfview'); 

        } 
        else
        {
           return  view('genral.tour_details'); 
        }

      }
      else{   
      return redirect('admin-login')->with(["msg"=>'<div class="alert alert-danger""><strong>Wrong </strong> First you can do login !!!</div>']);
      }
   }

    public  function  tour_complete(Request $request)
    {
      // $data['booking_id']=session()->get('booking_id')?session()->get('booking_id'):'';
      $request->booking_id=session()->get('booking_id')?session()->get('booking_id'):'';
      $data['tour_data']=Tour_bookings::get_tour_booking_by_booking_id($request);
      return view('genral.tour_complete')->with($data); 
    }


   public  function  all_request(Request $request)
   {
         if(session()->get('users_roll_type'))
         {   
             $data['all_stock_accesory']=Accessories::get_all_accessory_in_stock();
             $data['all_products']=Accessories::get_accessories(); 
             $data['all_request']=Booking_request::get_all(); 
             $data['get_all_address'] = Addresses::get_all_address();
             return  view('genral.booking_request')->with($data); 
         }
         else{   
              return redirect('admin-login')->with(["msg"=>'<div class="alert alert-danger""><strong>Wrong </strong> First you can do login !!!</div>']);
         }
   }

   public  function  update_request_status(Request $request )
   {
      $update_res=Booking_request::update_booking_status($request); 
      if($update_res){ echo '200'; }
   }

   public  function  update_tour_booking_status(Request $request )
   {   
      $update_res=Tour_bookings::update_booking_by_column('id',$request->row_id,array('booking_status'=>$request->status_value)); 
      $get_tour_booking=Tour_bookings::get_tour_bookings_by_id($request); 
      if($get_tour_booking)
      {
         $booking_id=$get_tour_booking->booking_id;
         if($request->status_value=='1'){
            $status_value='booking';
         }
         else if($request->status_value=='2')
         {
            $status_value='booking_comfirm';
         }
         else if($request->status_value=='1')
         {
              $status_value='canceled';
         }
         else if($request->status_value=='5')
         {
              $status_value='completed';
         }
         else{
               $status_value='unresponded';
         }
         $update_events=Booking_events::update_events_by_id('booking_id',$booking_id,array('booking_status'=>$status_value)); 
      }
      if($update_res){ echo '200'; }
   }

   public  function  update_taxi_booking_status(Request $request )
   {   
      $update_res=Taxi_bookings::update_booking_by_column('id',$request->row_id,array('booking_status'=>$request->status_value)); 
      $get_tour_booking=Taxi_bookings::get_taxi_bookings_by_id($request); 
      if($get_tour_booking)
      {
         $booking_id=$get_tour_booking->booking_id;
         if($request->status_value=='1'){
            $status_value='booking';
         }
         else if($request->status_value=='2')
         {
            $status_value='booking_comfirm';
         }
         else if($request->status_value=='1')
         {
              $status_value='canceled';
         }
         else if($request->status_value=='5')
         {
              $status_value='completed';
         }
         else{
               $status_value='unresponded';
         }
         $update_events=Booking_events::update_events_by_id('booking_id',$booking_id,array('booking_status'=>$status_value)); 
      }
      if($update_res){ echo '200'; }
   }

   public  function  update_rental_status(Request $request )
   {
      $update_res=Rental_bookings::update_booking_status($request); 
      if($update_res){ echo '200'; }
   }

/* Update Booking Status  */

public  function  update_booking_other(Request $request)
{
    if(session()->get('users_roll_type'))
    {
        $validator = Validator::make($request->all(), ['comments' => 'required']);

        if ($validator->fails()) 
        {
            return Response::json(array('success' => false,'errors' => $validator->getMessageBag()->toArray()), 400); 
        }
        else
        {
               //  print_r($request->all());  die; 
               $comments=$request->comments;
               $row_id=$request->rowId; 
               $update_data=array(
                  'comments'=>$request->comments?$request->comments:"",
                  'action_by'=>session()->get('user_id')
               );   
               $update_details=Tour_bookings::update_booking_by_column('id',$row_id,$update_data);
               return Response::json(array('success' => true,'details'=>$update_details), 200);
            }
            
        }
        else
        {   
            return redirect('admin-login')->with(["msg"=>'<div class="alert alert-danger""><strong>Wrong </strong> First you can do login !!!</div>']);
        }
}
public  function  update_taxi_booking_other(Request $request)
{
    if(session()->get('users_roll_type'))
    {
        $validator = Validator::make($request->all(), ['comments' => 'required']);

        if ($validator->fails()) 
        {
            return Response::json(array('success' => false,'errors' => $validator->getMessageBag()->toArray()), 400); 
        }
        else
        {
               //  print_r($request->all());  die; 
               $comments=$request->comments;
               $row_id=$request->rowId; 
               $update_data=array(
                  'comments'=>$request->comments?$request->comments:"",
                  'action_by'=>session()->get('user_id')
               );   
               $update_details=Taxi_bookings::update_booking_by_column('id',$row_id,$update_data);
               return Response::json(array('success' =>true,'details'=>$update_details), 200);
            }
            
        }
        else
        {   
            return redirect('admin-login')->with(["msg"=>'<div class="alert alert-danger""><strong>Wrong </strong> First you can do login !!!</div>']);
        }
}


/* Update Tour Approve Booking Status  */

public  function  update_tour_booking_approve(Request $request)
{
      if(session()->get('users_roll_type'))
      {
         $validator = Validator::make($request->all(), ['comments' => 'required']);

         if ($validator->fails()) 
         {
               return Response::json(array('success' => false,'errors' => $validator->getMessageBag()->toArray()), 400); 
         }
         else
         {
               $comments=$request->comments;
               $row_id=$request->rowId; 
               
               $update_data=array(
                  'comments'=>$request->comments?$request->comments:"",
                  'advanced_amount'=>$request->advanced_amount?$request->advanced_amount:"",
                  'action_by'=>session()->get('user_id')
               );   
               $update_details=Tour_bookings::update_booking_by_column('id',$row_id,$update_data);
                  return Response::json(array('success' => true,'details'=>$update_details), 200);
         }
      }
      else
      {   
         return redirect('admin-login')->with(["msg"=>'<div class="alert alert-danger""><strong>Wrong </strong> First you can do login !!!</div>']);
      }
}


public  function  financial_layout()
{
     if(session()->get('users_roll_type'))
      {
         // echo date('Y-m-d H:i:s'); die; 
         $all_acc=array();
         $get_today_accesories=Rental_bookings::get_today_returned_accesories(); 
         foreach($get_today_accesories as $row){
            $package1['type']='accessories';
            $package1['datetime']=$row->updated_at;
            $package1['status']='complete';
            $package1['amount']=$row->amount;
            $package1['guest_name']=$row->guest_name;
            // $package1['debit_account']='4654645645';
            // $package1['credit_account']='5654654654';
            $all_acc[] = $package1;
         }
         $all_taxi=array();
         $get_today_taxi=Taxi_bookings::get_today_complete_taxi();
         foreach($get_today_taxi as $row){
               $package2['type']='taxi';
               $package2['datetime']=$row->updated_at;
               $package2['status']='complete';
               $package2['amount']=$row->taxi_cost;
               $package2['guest_name']=$row->guest_name;
               // $package2['debit_account']='4654645645';
               // $package2['credit_account']='5654654654';
               $all_taxi[] = $package2;
         }
         $all_tour=array();
         $get_today_complete_tour=Tour_bookings::get_today_complete_tour(); 
         foreach($get_today_complete_tour as $row){
            $package3['type']='tour';
            $package3['datetime']=$row->updated_at;
            $package3['status']='complete';
            $package3['amount']=($row->external_tour_cost!=null)?$row->external_tour_cost:0;
            $package3['guest_name']=$row->guest_name;
            // $package3['debit_account']='4654645645';
            // $package3['credit_account']='5654654654';
            $all_tour[] = $package3;
         }
         $data['All_layout'] = array_merge($all_acc, $all_taxi,$all_tour);  
         $data['all_banana_accounts']=Banana_accounts::get_all_records(); 
         $data['financials_of_day']=Financial_layouts::get_financial_report_data(date('Y-m-d'));
         return  view('genral.financial_layout')->with($data); 
      }
      else
      {   
         return redirect('admin-login')->with(["msg"=>'<div class="alert alert-danger""><strong>Wrong </strong> First you can do login !!!</div>']);
      }
}

public  function  export_financial()
{
   if(session()->get('users_roll_type'))
      {  
         $get_data=Bookings::get_financial_report_data();
         if(count($get_data))
         {
            // return Excel::download(new ServiceExport,'Financial_layout_'.date("Yisdm").'.xlsx');
            return Excel::download(new ServiceExport,'Financial_layout_'.date("Yisdm").'.csv');
         }
         else
         {
            return redirect('financial_layout')->with(["msg"=>'<div class="alert alert-danger"">There are <strong>No Data</strong> to  Export!!!</div>']);
         }
         
      }
      else
      {   
         return redirect('admin-login')->with(["msg"=>'<div class="alert alert-danger""><strong>Wrong </strong> First you can do login !!!</div>']);
      }
}

//  save financial details 
public  function  save_financial(Request $request)
{
   //  print_r($request->all()); die;
   if(session()->get('users_roll_type'))
   {       
     $validator = $request->validate(array('date'=>'required','credit_acc'=>'required','debit_acc'=>'required'));  
   //   echo $request->date[0];  die; 
     $day_data=Financial_layouts::get_details('date',$request->date[0]); 
     if(count($day_data)){
         $day_data=Financial_layouts::delete_records('date',$request->date[0]); 
      } 

     for($i=0;$i < count($request->date); $i++)
     {
      //   echo "<br/>";
      //   echo ' date '.$request->date[$i].' credit ac :'.$request->credit_acc[$i];   'booking_status'=>$request->booking_status[$i] 
        $ins_data=array('date'=>$request->date[$i],'booking_type'=>$request->booking_type[$i],'debit_acc'=>$request->debit_acc[$i],'credit_acc'=>$request->credit_acc[$i],'external_amount'=>$request->external_amount[$i],'description'=>$request->description[$i]);  
        $res=Financial_layouts::save_financial($ins_data); 
       
      } 
      echo '200'; 
   }
   else{   
    return redirect('admin-login')->with(["msg"=>'<div class="alert alert-danger""><strong>Wrong </strong> First you can do login !!!</div>']);
   }
}
  




}


