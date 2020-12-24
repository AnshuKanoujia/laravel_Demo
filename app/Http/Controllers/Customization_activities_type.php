<?php

namespace App\Http\Controllers;
use  App\Customization_activities_types; 
use Illuminate\Http\Request;

class Customization_activities_type extends Controller
{

    
    //  load all  activities And  Add   a New  Activities 
    public function  activities_types()
    {
        $get_all_activities_types = Customization_activities_types::get_all_activities_types(); 
        return view('genral.activities_types')->with('activities_types',$get_all_activities_types); 
    }

    //  Add  Activity  Type 
    public function  add_activities_type(Request $request)
    {
        
        if(session()->get('users_roll_type'))
        {
            $validator=$request->validate(array('title'=>'required')); 
            $add_activities_types_res = Customization_activities_types::add_activities_type($request);
            return redirect('activities_types')->with(['msg'=>'<div class="alert alert-success""><strong>Activity Added Successfully.</strong></div>']); 
        }
        else
        {
          return redirect('admin-login')->with(["msg"=>'<div class="alert alert-danger""><strong>Wrong </strong> First you can do login !!!</div>']); 
        }
    }

      //   Delete  Activity  Type
    public function  delete_activities_type(Request $request)
    {
        if(session()->get('users_roll_type'))
        {
            $delete_activities_type_res = Customization_activities_types::delete_activities_type($request);
            if($delete_activities_type_res){ echo '200'; }
        }
        else
        {
          return redirect('admin-login')->with(["msg"=>'<div class="alert alert-danger""><strong>Wrong </strong> First you can do login !!!</div>']); 
        }

    }
      //   Edit Views   Activity  Type
    public function  edit_activities_type(Request $request)
    {
        if(session()->get('users_roll_type'))
        {
            $get_activities_type = Customization_activities_types::get_by_id($request);
            return view('genral.edit_activities_type')->with('get_activity',$get_activities_type);
        }
        else
        {
            return redirect('admin-login')->with(["msg"=>'<div class="alert alert-danger""><strong>Wrong </strong> First you can do login !!!</div>']); 
        }
    }

    //   update  Activity  Type
    public function  update_activities_type(Request $request)
    {
      if(session()->get('users_roll_type'))
      { 
        $validator=$request->validate(array('title'=>'required')); 
            $update_activities_type_res = Customization_activities_types::update_activities_type_by_id($request);
            if($update_activities_type_res)
            {
                return redirect('activities_types')->with(["msg"=>'<div class="alert alert-success""><strong>Activities Type Update Successfully.. </strong></div>']);
            }
            else{   
                return redirect('activities_types')->with(["msg"=>'<div class="alert alert-danger""><strong>Wrong </strong> Somthing Went wrong ! Try Again ... !!!</div>']);
                
            }
      }
      else{   
       return redirect('admin-login')->with(["msg"=>'<div class="alert alert-danger""><strong>Wrong </strong> First you can do login !!!</div>']);
       
      }
    }
}
