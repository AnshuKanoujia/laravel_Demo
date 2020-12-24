<?php

namespace App\Http\Controllers;
use  App\Customization_activities_types; 
use Illuminate\Http\Request;
use App\Customization_activities;
class Customization_activity extends Controller
{
    //  all  custom_activities
    public  function  custom_activities()
    {
        if(session()->get('users_roll_type'))
        {  
            $data['get_all_activities_types'] = Customization_activities_types::get_all_activities_types(); 
            $data['get_all_activities'] = Customization_activities::get_all_activities(); 
            return view('genral.custom_activities')->with('activities_details',$data);
        }
       else
       {   
         return redirect('admin-login')->with(["msg"=>'<div class="alert alert-danger""><strong>Wrong </strong> First you can do login !!!</div>']);
       }
    }


    //  add custom activity 
    public  function add_custom_activity(Request $request)
    {
        if(session()->get('users_roll_type'))
        {  
            //  ,'time_duration'=>'numeric|min:1|max:12','distance'=>'numeric|min:1|max:400' 
            $validator=$request->validate(array(
                'activity_type'=>'required' ,'activity_name'=>'required','description'=>'required'  
            )); 

            $result=Customization_activities::add_custom_activity($request); 
            return redirect('custom_activities')->with(["msg"=>'<div class="alert alert-success"><strong>Custom Activity </strong> Added Successfully..</div>']);
        }
       else
       {   
         return redirect('admin-login')->with(["msg"=>'<div class="alert alert-danger"><strong>Wrong </strong> First you can do login !!!</div>']);
       }
    }

    //  delete_custom_activity 
    public  function delete_custom_activity(Request $request)
    {
    
        if(session()->get('users_roll_type'))
        {  
            $delete_custom_activity_res = Customization_activities::delete_custom_activity($request);
            if($delete_custom_activity_res){ echo '200'; }
        }
       else
       {   
         return redirect('admin-login')->with(["msg"=>'<div class="alert alert-danger"><strong>Wrong </strong> First you can do login !!!</div>']);
       }
    }

    //   edit_custom_activity
    public function edit_custom_activity(Request $request)
    {
        if(session()->get('users_roll_type'))
        {  
            $data['get_customization_activity']= Customization_activities::get_by_id($request);
            $data['get_all_activities_types'] = Customization_activities_types::get_all_activities_types(); 
            return view('genral.edit_custom_activity')->with('activities_details',$data);
        }
       else
       {   
         return redirect('admin-login')->with(["msg"=>'<div class="alert alert-danger"><strong>Wrong </strong> First you can do login !!!</div>']);
       }
    }

    //  update_custom_activity
    public function update_custom_activity(Request $request)
    {
        if(session()->get('users_roll_type'))
        {  
            $validator=$request->validate(array('activity_type'=>'required' ,'activity_name'=>'required','description'=>'required'));
            $update_custom_activity_res = Customization_activities::update_custom_activity_by_id($request);
            if($update_custom_activity_res)
            {
               return redirect('custom_activities')->with(["msg"=>'<div class="alert alert-success""><strong>Custom  Activity Updated Successfully.. </strong></div>']);
            }
            else
            {   
               return redirect('custom_activities')->with(["msg"=>'<div class="alert alert-danger""><strong>Wrong </strong> Somthing Went wrong ! Try Again ... !!!</div>']);
            }
        }
       else
       {   
         return redirect('admin-login')->with(["msg"=>'<div class="alert alert-danger"><strong>Wrong </strong> First you can do login !!!</div>']);
       }
    }

}
