<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Taxi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Drivers;
use App\Tour_bookings;
use App\Taxi_bookings;
use App\Driver_documents; 
use App\Http\Controllers\Session;
use App\Addresses; 
use App\Banana_accounts;
use Validator,Redirect,Response;


class Driver extends Taxi
{
     //  Load  Driver  
     public function drivers()
     {
        if(session()->get('users_roll_type'))
        { 
         $data['all_drivers'] = Drivers::get_all_drivers(); 
         $data['get_all_address'] = Addresses::get_all_address();
         return view('genral.drivers')->with($data);    
        }
        else{   
           return redirect('admin-login')->with(["msg"=>'<div class="alert alert-danger""><strong>Wrong </strong> First you can do login !!!</div>']);
           }
     }

     public function add_drivers(Request $request)
     {
        
       if(session()->get('users_roll_type'))
       {       
        
        $validator = $request->validate(array(
          'name'=>'required',
          // 'email'=>'required|email|unique:drivers',
          'phone'=>'required|numeric|unique:drivers|min:10',
          'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:6048',
          'address'=>'required',
          'license_no'=>'required',
          'join_date'=>'required',
          'type'=>'required',
          'account_number'=>'required | unique:banana_accounts',
          'description'=>'required'
          ));     
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
          
         $user_details = Drivers::add_driver($request);
         $ins_acc=Banana_accounts::create_account(array('account_number'=>$request->account_number,'description'=>$request->description,'account_type'=>'driver','user_id'=>$user_details->id)); 

         return redirect('add_documents/'.$user_details->id);    
         // return view('genral.upload_documents')->with('driver_id',$user_details->id);
         // return redirect('drivers')->with(["msg"=>'<div class="alert alert-success""><strong>Driver Added Successfully.. </strong></div>']);
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
      //   var_dump($json->results[0]->geometry->location); die;
      if(count((array)$json->results))
      { 
        $data['lat'] = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lat'};
        $data['long'] = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lng'};
      }
      else
      {
         $data=0;
      }
     
         return $data; 
     }

     //  Delete Driver
     public function  delete_driver(Request $request)
     {
        if(session()->get('users_roll_type'))
        { 
            $delete_driver_res = Drivers::delete_driver($request);
            if($delete_driver_res){ echo '200'; }
        }
        else{   
           return redirect('admin-login')->with(["msg"=>'<div class="alert alert-danger""><strong>Wrong </strong> First you can do login !!!</div>']);
         }
     }

     //     Edit  Driver 
     public function edit_driver(Request $request)
     {
         if(session()->get('users_roll_type'))
         { 
            $data['get_driver'] = Drivers::get_by_id($request);
            $data['get_all_address'] = Addresses::get_all_address();
            return view('genral.edit_drivers')->with($data);
         }
         else{   
            return redirect('admin-login')->with(["msg"=>'<div class="alert alert-danger""><strong>Wrong </strong> First you can do login !!!</div>']);
            }
        
     }

     //   Update Drivers 
     public   function  update_driver(Request $request)  
     {   
      if(session()->get('users_roll_type'))
      { 
         $validator = $request->validate(array('name'=>'required','phone'=>'required|numeric|min:10','address'=>'required','license_no'=>'required','join_date'=>'required','type'=>'required')); 
         //  'email'=>'required|email',
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
         
            $update_driver_res = Drivers::update_driver_by_id($request);
            if($update_driver_res)
            {
               return redirect('drivers')->with(["msg"=>'<div class="alert alert-success""><strong>Driver Updated Successfully.. </strong></div>']);
            }
            else{   
               return redirect('drivers')->with(["msg"=>'<div class="alert alert-danger""><strong>Wrong </strong> Somthing Went wrong ! Try Again ... !!!</div>']);
               
            }
      }
      else{   
       return redirect('admin-login')->with(["msg"=>'<div class="alert alert-danger""><strong>Wrong </strong> First you can do login !!!</div>']);
       
      }
     }


    /*   Add Documents ---*/
   public function add_documents(Request $request) 
   {     
      
      if(session()->get('users_roll_type'))
      { 
        $data['get_driver_documents']= Driver_documents::get_driver_documents($request); 
        $data['driver_id']=$request->driver_id; 
        $data['usertype']=session()->get('users_roll_type'); 
        return view('genral.upload_documents')->with($data);
      }
      else{   
          return redirect('admin-login')->with(["msg"=>'<div class="alert alert-danger""><strong>Wrong </strong> First you can do login !!!</div>']);
         }
    }



     //   Upload Documents   
     public function  upload_images(Request $request)
     {
       
       //echo 'Helllo';     
     
      if($request->file)
         {
            $file_type=$request->file->getClientMimeType(); 
            $imageName = date('YmdHis').'.'.$request->file->getClientOriginalExtension();
            $result=$request->file->move(public_path('images'), $imageName); 
            
            if($result==true)
            {
               
               $request->file=$imageName;  //echo $request->gellery_id; 
               $request->file_type=$file_type; 
               $create_documents = Driver_documents::create_document($request);
               //echo json_encode(array('filename'=>$imageName)); 
              //echo $file_type=$request->file->getClientMimeType();  //  image/png  ,  image/jpeg 
              //return redirect('drivers')->with(["msg"=>'<div class="alert alert-success""><strong>Driver Added Successfully.. </strong></div>']);
              echo json_encode(array('success'=>'1','error'=>'0','documents_type'=>$create_documents->document_type,'filename'=>$create_documents->documents,'row_id'=>$create_documents->id,'driver_id'=>$create_documents->driver_id,'document_title'=>$create_documents->document_title));
            }
            else
            {
               // echo $request->file->getErrorMessage();
               echo json_encode(array('success'=>'0','error'=>'1','documents_type'=>"",'filename'=>"",'row_id'=>'','row_id'=>'','driver_id'=>'','document_title'=>''));
            }
         }

     }

     //  Upload Documents Confirm 
     public function upload_confirm()
     {
        return redirect('drivers')->with(["msg"=>'<div class="alert alert-success""><strong>Driver Added Successfully.. </strong></div>']);
     }

     // Delete  Documents 
     public function delete_documents(Request $request)
     {
         $delete_document = Driver_documents::delete_document($request);
         if($delete_document){ echo '200'; }
     }

     // Driver  Details 
     public function driver_details(Request $request)
     {
        $request->row_id=$request->driver_id; 
        $data['get_driver_details']=Drivers::get_by_id($request); 
        $data['get_driver_documents']=Driver_documents::get_driver_documents($request); 
        $data['get_ride_details']=Tour_bookings::get_ride_details($request); 
        return view('genral.driver_details')->with($data); 
     }


     //  Update the documents title 
     public function  update_documents_title(Request $request)
     {
         // $request->row_id; 
         // $request->documents_title;
         $update_documnets_title=Driver_documents::update_documents_title($request);
         if($update_documnets_title){ echo '200'; }
     }
    


}
