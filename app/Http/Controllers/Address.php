<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Addresses; 
class Address extends Controller
{
     public  function address()
     {
         if(session()->get('users_roll_type')=='2')
          { 
               $data['get_all_address']= Addresses::get_all_address(); 
               return view('employee.address')->with($data);
          }
          else if(session()->get('users_roll_type'))
          { 
             $data['get_all_address']= Addresses::get_all_address(); 
             return view('genral.address')->with($data);
          }
          else{   
             return redirect('admin-login')->with(["msg"=>'<div class="alert alert-danger""><strong>Wrong </strong> First you can do login !!!</div>']);
           }

     }
     public function add_address(Request $request)
     {
        if(session()->get('users_roll_type'))
        { 
            $validator = $request->validate(array('address'=>'required'));     
            $result=$this->getlat_long($request->address); 
            if($result['status'])
            {
               $request->latitude=$result['lat']?$result['lat']:'26.8496217';
               $request->longitude=$result['long']?$result['long']:'80.9462193';
               $address_details = Addresses::add_address($request);
               return redirect('address')->with(["msg"=>'<div class="alert alert-success""><strong>Address Added Successfully.. </strong></div>']);
            }
            else
            {
               // $request->latitude='26.8496217';
               // $request->longitude='80.9462193';
              // return redirect()->back()->with(["msg"=>'<div class="alert alert-danger""><strong> '.$result['message'].' </strong></div>']);
              return redirect()->back()->with(["msg"=>'<div class="alert alert-danger""><strong> Something Went Wrong !</strong></div>']);
            } 
            // $get_data=Addresses::where(array('latitude'=>$request->latitude,'longitude'=>$request->longitude))->get();
            
            
        }
        else{   
           return redirect('admin-login')->with(["msg"=>'<div class="alert alert-danger""><strong>Wrong </strong> First you can do login !!!</div>']);
         }

       

     }

     public function getlat_long($address)
     { 
         
        $address = str_replace(" ", "+", $address);
        //$address = str_replace(",", "+", $address);
        $json = file_get_contents("https://maps.google.com/maps/api/geocode/json?address=$address&sensor=false&key=AIzaSyBuCIAfY1ODCoVTvJyBtkZe-irKy0ljPXY");
        $json = json_decode($json);
       
     
        // var_dump($json->results[0]->geometry->location); die; 
        // print_r($json); die; 
      if(count((array)$json->results))
      {
         $data['lat'] = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lat'};
         $data['long'] = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lng'};
         $data['status']=1;
      }
      else
      { 
         $data['status']=0;
         $data['message']=$json->error_message;
      }
     
         return $data; 
     }

     //  delete Address 
     public function delete_address(Request $request)
     {
        if(session()->get('users_roll_type'))
        { 
            $delete_address = Addresses::delete_address($request);
            if($delete_address){ echo '200'; }
        }
        else{   
           return redirect('admin-login')->with(["msg"=>'<div class="alert alert-danger""><strong>Wrong </strong> First you can do login !!!</div>']);
         }
       
     }

     //  Edit  Address 
     public function edit_address(Request $request)
     {
        if(session()->get('users_roll_type'))
        { 
            $data['get_address'] = Addresses::get_by_id($request);
            return view('genral.edit_address')->with($data);
        }
        else{   
           return redirect('admin-login')->with(["msg"=>'<div class="alert alert-danger""><strong>Wrong </strong> First you can do login !!!</div>']);
         }
     }


     //  update Address 

     public function update_address(Request $request)
     {
        if(session()->get('users_roll_type'))
        { 
            $validator = $request->validate(array('address'=>'required'));     
            $result=$this->getlat_long($request->address); 
            if($result)
            {
             $request->latitude=$result['lat']?$result['lat']:'26.8496217';
             $request->longitude=$result['long']?$result['long']:'80.9462193';
            }
            else
            {
               $request->latitude='26.8496217';
               $request->longitude='80.9462193';
            } 
    
            $address_details = Addresses::update_address($request);
            return redirect('address')->with(["msg"=>'<div class="alert alert-success""><strong>Address Updated Successfully.. </strong></div>']); 
        }
        else{   
           return redirect('admin-login')->with(["msg"=>'<div class="alert alert-danger""><strong>Wrong </strong> First you can do login !!!</div>']);
         }
     }

        


}
