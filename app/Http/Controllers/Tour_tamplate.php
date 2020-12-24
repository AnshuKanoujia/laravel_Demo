<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customization_activities_types; 
use  App\Customization_activities; 
use  App\Taxi; 
class Tour_tamplate extends Controller
{
      public  function  tour_tamplating(Request  $request)
      {
        if (session()->get('users_roll_type')) { 
          $data['get_all_activities_types'] = Customization_activities_types::get_all_activities_types(); 
          $data['get_all_activities'] = \App\Customization_activities::get_all_activities(); 
          
          $data['get_tour_type_row']=Customization_activities_types::search_row_column('title','description','tour');
          $data['pickup_drop_list']= \App\Pickup_drop_points::get_all_pickup_drop_list(); 
          $data['get_Freq']= Customization_activities::get_records_gruop_by_where('tourFreq','status',1); 
          
          return  view('genral.tour_template')->with($data);  
        }
        else 
        {    
          return redirect('admin-login')->with(["msg" => '<div class="alert alert-danger""><strong>Wrong </strong> First you can do login !!!</div>']);
        }
      }
       
      public function  update_finanencial_details(Request $request)
      {
        print_r($request->all());  die;  
          $validator = \Validator::make($request->all(), ['no_of_pax' => 'required','suppliers_name' => 'required',
              'suppliers_value' => 'required', 'cost_to_client' => 'required','extras_per_car' => 'required']);
             
          
          if ($validator->fails())
          {
              return response()->json(['success'=>false,'result'=>$validator->errors()->all()]);
          }
          $All_from_value=Array(
           'no_of_pax' =>$request->no_of_pax,
           'supplier_cost' => $request->supplier_cost,
           'suppliers_name' => $request->suppliers_name,
           'suppliers_value' => $request->suppliers_value,
           'cost_to_client' => $request->cost_to_client,
           'extras_per_car' => $request->extras_per_car
          );
         $update_data['financial_info_details']=json_encode($All_from_value); 
         $updated=Customization_activities::update_custom_activities('id',$request->template_id,$update_data); 
        //  if($updated){ return Response::json(array('success'=>true,'result'=>$update_data)); } 
          return response()->json(['success'=>true,'result'=>json_encode($All_from_value)]);

      }
      // all tour  template 
      public  function tour_tamplates()
      {
        if (session()->get('users_roll_type')) { 
          $data['get_all_activities_types'] = Customization_activities_types::get_all_activities_types(); 
          $data['get_all_activities'] = \App\Customization_activities::get_all_activities(); 
          
          $data['get_tour_type_row']=Customization_activities_types::search_row_column('title','description','tour');
          $data['pickup_drop_list']= \App\Pickup_drop_points::get_all_pickup_drop_list();
          $data['get_Freq']= Customization_activities::get_records_gruop_by_where('tourFreq','status',1); 
          return  view('genral.all_tour_template')->with($data);  
        }
        else 
        {    
          return redirect('admin-login')->with(["msg" => '<div class="alert alert-danger""><strong>Wrong </strong> First you can do login !!!</div>']);
        }
      }
      
      /* Edit  Tour  Template  */
      public  function  edit_tour_template(Request  $request)
      {
            if (session()->get('users_roll_type')) 
            {
              $data['get_tour_type_row']=Customization_activities_types::search_row_column('title','description','tour');
              $data['pickup_drop_list']= \App\Pickup_drop_points::get_all_pickup_drop_list();
              $data['get_Freq']= Customization_activities::get_records_gruop_by_where('tourFreq','status',1); 
              $data['tour_template']=Customization_activities::get_by_id($request);  
              $data['all_taxis']=Taxi::get_all_taxies(); 
              // print_r($data['tour_template']);  die('Hy  '); 
              return  view('genral.edit_tour_template')->with($data);
            }
            else 
            {    
              return redirect('admin-login')->with(["msg" => '<div class="alert alert-danger""><strong>Wrong </strong> First you can do login !!!</div>']);
            }
      }

      // add  tour  template 
      public  function add_tour_template(Request $request)
      {
        if (session()->get('users_roll_type')) {
              // print_r(json_encode($request->internal_financial_details)); die("Hello");
              // $validator = Validator::make($request->all(), ['return_date' => 'required','paid_amount'=>'required','terms'=>'required']);

              if($request->tourName && $request->tourFreq && $request->address && $request->tourDur && $request->start_time && $request->end_time && $request->travelTimeMin  )
              {      
               
                
                // var_dump(json_encode($request->internal_financial_details));
                // die("ji");
                  $Responce=Customization_activities::get_this_tour(array('tourFreq'=>$request->tourFreq,'origin'=>$request->address,'time_duration'=>str_replace(',','',$request->tourDur),'activity_name'=>$request->tourName)); 
                  if( count((array)$Responce) =='0'  )
                  {   
                         
                        $insdata['activity_type']=$request->activity_type;
                        $insdata['activity_name']=$request->tourName;  
                        $insdata['tourFreq']=$request->tourFreq;
                        $insdata['origin']=$request->address;
                        $insdata['start_time']=!empty($request->start_time)?$request->start_time:'';
                        $insdata['end_time']=!empty($request->end_time)?$request->end_time:'';
                        $insdata['travelTimeMin']=!empty($request->travelTimeMin)?$request->travelTimeMin:'';
                        $insdata['internal_financial_details']=json_encode($request->internal_financial_details);
                        $insdata['external_financial_details']=json_encode($request->external_financial_details); 
                        
                        // $insdata['internal_financial_details']="Hi pradeep";
                        // $insdata['external_financial_details']="Hi hjkh";

                        $insdata['time_duration']=str_replace(',','',$request->tourDur);
                        // print_r($insdata);die; 
                        $Responce=Customization_activities::add_tour_template($insdata); 
                        
                        if($Responce)
                        {
                          echo json_encode(array('success'=>1,'template_id'=>$Responce->id)); 
                        }
                        else
                        {
                          echo json_encode(array('success'=>0,'template_id'=>"")); 
                        }    
                  }
                  else
                  {
                        $updata['activity_type']=$request->activity_type;
                        $updata['activity_name']=$request->tourName;
                        $updata['tourFreq']=$request->tourFreq;
                        $updata['origin']=$request->address;
                        $updata['start_time']=!empty($request->start_time)?$request->start_time:'';
                        $updata['end_time']=!empty($request->end_time)?$request->end_time:'';
                        $updata['travelTimeMin']=!empty($request->travelTimeMin)?$request->travelTimeMin:'';
                        $updata['internal_financial_details']=json_encode($request->internal_financial_details);
                        $updata['external_financial_details']=json_encode($request->external_financial_details);
                        $updata['time_duration']=str_replace(',','',$request->tourDur);
                        // print_r($updata);die('Update'); 
                        $up=Customization_activities::update_custom_activities('id',$Responce->id,$updata);
                        echo json_encode(array('success'=>1,'template_id'=>$Responce->id));
                  }
              }
              else
              {
                echo json_encode(array('success'=>0,'template_id'=>"")); 
              }
        }
        else 
        {    
          return redirect('admin-login')->with(["msg" => '<div class="alert alert-danger""><strong>Wrong </strong> First you can do login !!!</div>']);
        }

      }

      public function  update_template_step1(Request $request)
      {
            if(session()->get('users_roll_type')) 
             {
                //print_r($request->all());  die; 
                // $validator = Validator::make($request->all(), ['return_date' => 'required','paid_amount'=>'required','terms'=>'required']);

                if($request->tour_template_id && $request->tourName && $request->tourFreq && $request->address && $request->tourDur && $request->start_time && $request->end_time && $request->travelTimeMin  )
                {
                    
                    $Responce=Customization_activities::get_this_tour(array('id'=>$request->tour_template_id)); 
                    
                    if( count((array)$Responce) =='0'  )
                    {     
                        $insdata['activity_type']=$request->activity_type;
                        $insdata['activity_name']=$request->tourName;  
                        $insdata['tourFreq']=$request->tourFreq;
                        $insdata['origin']=$request->address;
                        $insdata['start_time']=!empty($request->start_time)?$request->start_time:'';
                        $insdata['end_time']=!empty($request->end_time)?$request->end_time:'';
                        $insdata['travelTimeMin']=!empty($request->travelTimeMin)?$request->travelTimeMin:'';
                        $insdata['internal_financial_details']=json_encode($request->internal_financial_details);
                        $insdata['external_financial_details']=json_encode($request->external_financial_details); 
                        
                        // $insdata['internal_financial_details']="Hi pradeep";
                        // $insdata['external_financial_details']="Hi hjkh";

                        $insdata['time_duration']=str_replace(',','',$request->tourDur);
                        // print_r($insdata);die; 
                        $Responce=Customization_activities::add_tour_template($insdata); 
                        
                        if($Responce)
                        {
                          echo json_encode(array('success'=>1,'template_id'=>$Responce->id)); 
                        }
                        else
                        {
                          echo json_encode(array('success'=>0,'template_id'=>"")); 
                        }   
                    }
                    else
                    {      
                      $updata['activity_type']=$request->activity_type;
                      $updata['activity_name']=$request->tourName;
                      $updata['tourFreq']=$request->tourFreq;
                      $updata['origin']=$request->address;
                      $updata['start_time']=!empty($request->start_time)?$request->start_time:'';
                      $updata['end_time']=!empty($request->end_time)?$request->end_time:'';
                      $updata['travelTimeMin']=!empty($request->travelTimeMin)?$request->travelTimeMin:'';
                      $updata['internal_financial_details']=json_encode($request->internal_financial_details);
                      $updata['external_financial_details']=json_encode($request->external_financial_details);
                      $updata['time_duration']=str_replace(',','',$request->tourDur);
                      // print_r($updata);die('Update'); 
                      $up=Customization_activities::update_custom_activities('id',$Responce->id,$updata);
                      echo json_encode(array('success'=>1,'template_id'=>$Responce->id));  
                    }
                }
                else
                {
                  echo json_encode(array('success'=>0,'template_id'=>"")); 
                }
                
                //return redirect('custom_activities')->with(["msg"=>'<div class="alert alert-success""><strong> Tour Template created.. </strong></div>']);
          
          }
          else 
          {    
            return redirect('admin-login')->with(["msg" => '<div class="alert alert-danger""><strong>Wrong </strong> First you can do login !!!</div>']);
          }
      }

      public  function update_template_contents(Request $request)
      {
        
        if($request->tour_template_id)
        {
            $request->short_details=$request->allPopoverData?$request->allPopoverData:'';
            $request->activities_details=$request->allPopoverData2?$request->allPopoverData2:'';
            $request->row_id=$request->tour_template_id; 
            $updateResult=Customization_activities::update_custom_activity_by_id($request); 
            echo '200'; 
        }
        else
        {
           echo '400'; 
        }
      }

      public  function  tour_success(Request $request)
      {
         return view('genral.tour_success'); 
      }







}
