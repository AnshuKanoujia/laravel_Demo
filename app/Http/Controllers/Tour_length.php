<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tour_lengths;
class Tour_length extends Controller
{
    
    //  load  create tour length  page 
    public  function add_day(Request $request)
    {
        $data['all_tour_length']= Tour_lengths::get_all_tour_length(); 
        if(session()->get('users_roll_type')=='2')
        { 
            return  view('employee.tour_length')->with($data);     
        }
        else if(session()->get('users_roll_type')=='3')
        {   
            return  view('manager.tour_length')->with($data); 
        }
        else if(session()->get('users_roll_type')=='1')
        { 
            return  view('genral.tour_length')->with($data); 
        }
        else
        {
            return redirect('admin-login')->with(["msg"=>'<div class="alert alert-danger""><strong>Wrong </strong> First you can do login !!!</div>']);
        }
       

    }

   //  add  tour  length 
   public function add_tour_length(Request $request)
   {
       

       if(session()->get('users_roll_type'))
      { 
        $validator = $request->validate(array('no_of_day'=>'required|unique:tour_lengths|max:3|min:1','no_of_night'=>'required|unique:tour_lengths|max:3|min:1'));  
          
         $add_details = Tour_lengths::add_tour_length($request); 

          return redirect('add_day')->with(["msg"=>'<div class="alert alert-success""><strong>Length Added Successfully.. </strong></div>']);
      }
      else{   
          return redirect('admin-login')->with(["msg"=>'<div class="alert alert-danger""><strong>Wrong </strong> First you can do login !!!</div>']);
         }
         
       
   }

   //  edit  tour  length 
   public function edit_tour_length(Request $request)
   {
    if(session()->get('users_roll_type'))
    { 
       $data['tour_details'] = Tour_lengths::get_tour_length_by_id($request); 
       return  view('genral.edit_tour_length')->with($data); 
    }
    else{   
        return redirect('admin-login')->with(["msg"=>'<div class="alert alert-danger""><strong>Wrong </strong> First you can do login !!!</div>']);
       }
   }

   //  update tour length 
   public function update_tour_length(Request $request)
   {
        if(session()->get('users_roll_type'))
        { 
            $update_data = Tour_lengths::update_tour_length($request); 
            return redirect('add_day')->with(["msg"=>'<div class="alert alert-success""><strong>Length Updated Successfully.. </strong></div>']);
        }
        else{   
            return redirect('admin-login')->with(["msg"=>'<div class="alert alert-danger""><strong>Wrong </strong> First you can do login !!!</div>']);
        }
   }

   //  delete tour  length 

   public function  delete_tour_length(Request $request)
   {
        $delete_tour_length = Tour_lengths::delete_tour_length($request);
        if($delete_tour_length){ echo '200'; }
   }

   public function get_tour_length_days(Request $request)
   {
       $data_result = Tour_lengths::get_tour_length_by_id($request);
       if($data_result)
       {
        echo json_encode(array('success'=>'1','result'=>$data_result));
       }
       else
       {
        echo json_encode(array('success'=>'0','result'=>""));
       }
   }



}
