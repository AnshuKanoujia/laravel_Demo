<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pickup_drop_points; 

class Pickup_drop_point extends Driver
{
    //

    public function pickup_drop()
    {
        if(session()->get('users_roll_type')=='2')
        { 
            $data['pickup_drop_list']=Pickup_drop_points::get_all_pickup_drop_list();   
            return view('employee.pickup_drop')->with($data); 
        }
        else if(session()->get('users_roll_type'))
        { 
            $data['pickup_drop_list']=Pickup_drop_points::get_all_pickup_drop_list();   
            return view('genral.pickup_drop')->with($data); 
        }
        else{   
        return redirect('admin-login')->with(["msg"=>'<div class="alert alert-danger""><strong>Wrong </strong> First you can do login !!!</div>']);
        }
    }


    //  add  pickup drop  Address 
    public  function add_pickup_drop(Request $request)
    {
        if(session()->get('users_roll_type'))
        { 
              /*  Custom  validation  Redirect to Back  */
          $validator = $request->validate(array(
            'address' => 'required','pick_address' => 'required','region' => 'required'));

            $address_details=$this->getlat_long($request->pick_address);  
            if($address_details)
            {
            $request->pick_latitude=$address_details['lat']?$address_details['lat']:'26.8496217';
            $request->pick_longitude=$address_details['long']?$address_details['long']:'80.9462193';
            }
            else
            {
               $request->pick_latitude='26.8496217'; //  implement this  value  in the request  Array 
               $request->pick_longitude='80.9462193';//  implement this  value  in the request  Array 
            } 

            $add_result=Pickup_drop_points::create_pickup_drop_point($request);   
         
         return redirect('pickup_drop')->with(["msg"=>'<div class="alert alert-success""><strong>Address Added Successfully.. </strong></div>']);


        }
        else{   
        return redirect('admin-login')->with(["msg"=>'<div class="alert alert-danger""><strong>Wrong </strong> First you can do login !!!</div>']);
        }
        
    }

    //  Edit pickup Drop  Address 
    public  function edit_pickup_drop(Request $request)
    {
      //   echo $request->row_id; die; 
      $data['edit_data'] = Pickup_drop_points::get_by_id($request); 
      $data['pickup_drop_list']=Pickup_drop_points::get_all_pickup_drop_list();
      return  view('genral.edit_pickup_drop')->with($data);  
    }

    //  update pickup Drop  Address 
    public function update_pickup_drop(Request $request)
    {
        if(session()->get('users_roll_type'))
        { 
                $validator = $request->validate(array( 'address' => 'required','pick_address' => 'required','region' => 'required'));
                $address_details=$this->getlat_long($request->pick_address);  
                if($address_details)
                {
                $request->pick_latitude=$address_details['lat']?$address_details['lat']:'26.8496217';
                $request->pick_longitude=$address_details['long']?$address_details['long']:'80.9462193';
                }
                else
                {
                   $request->pick_latitude='26.8496217'; //  implement this  value  in the request  Array 
                   $request->pick_longitude='80.9462193';//  implement this  value  in the request  Array 
                } 
           
              $update_picup_drop = Pickup_drop_points::update_pickup_drop_by_id($request);
              if($update_picup_drop)
              {
                 return redirect('pickup_drop')->with(["msg"=>'<div class="alert alert-success""><strong>Address Updated Successfully.. </strong></div>']);
              }
              else{   
                 return redirect('pickup_drop')->with(["msg"=>'<div class="alert alert-danger""><strong>Wrong </strong> Somthing Went wrong ! Try Again ... !!!</div>']);
                 
              }
        }
        else{   
         return redirect('admin-login')->with(["msg"=>'<div class="alert alert-danger""><strong>Wrong </strong> First you can do login !!!</div>']);
        }
    }


    //  delete pickup drop 

    public function delete_pickup_drop(Request $request)
    {
        $delete_drop_point = Pickup_drop_points::delete_drop_point($request);
       if($delete_drop_point){ echo '200'; }
    }



}
