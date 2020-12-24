<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Taxi as Taximodel;
use Validator,Redirect,Response;
use  App\Banana_accounts;

class Taxi extends Controller
{

    
    // All Taxi 
    public function booktaxi()
    {  
       
      if(session()->get('users_roll_type'))
       {  
         $get_all_Taxies = Taximodel::get_all_taxies();
         return view('genral.booktaxi')->with('all_taxies',$get_all_Taxies);
       }
       else{   
           return redirect('admin-login')->with(["msg"=>'<div class="alert alert-danger""><strong>Wrong </strong> First you can do login !!!</div>']);
         }
        
    }

    // Add Taxi
    public function  addtaxi(Request $request)
    {     
       if(session()->get('users_roll_type'))
       {    
        $validator = $request->validate(array(
        'title' => 'required','model' => 'required','category' => 'required',
        'model_year' => 'required','taxi_no' => 'required | unique:taxis','account_number'=>'required | unique:banana_accounts','description'=>'required',
        'luggage' => 'required','seats' => 'required | numeric','make'=>'required',
        'registration_no'=>'required','full_value'=>'required','amortization_gap'=>'required','resell_value'=>'required','amortization_total'=>'required',
        'amortization_value_per_day'=>'required','amortization_day_per_month'=>'required','rides_per_day_for_taxi'=>'required','rides_per_day_for_tour'=>'required',
        'rides_per_day_for_airport_transfer'=>'required','taxi_value'=>'required','tour_value'=>'required','airport_transfer_value'=>'required'
         )); 
          
         $user_details = Taximodel::add_taxi($request);     
         $ins_acc=Banana_accounts::create_account(array('account_number'=>$request->account_number,'description'=>$request->description,'account_type'=>'vehicle','user_id'=>$user_details->id)); 
         return redirect('booktaxi')->with(["msg"=>'<div class="alert alert-success""><strong>Taxi Added Successfully.. </strong></div>']);
       }
       else{   
        return redirect('admin-login')->with(["msg"=>'<div class="alert alert-danger""><strong>Wrong </strong> First you can do login !!!</div>']);
       }
    }
    //  Delete taxi
    public function  delete_taxi(Request $request)
    {
       $delete_taxi_res = Taximodel::delete_taxi($request);
       if($delete_taxi_res){ echo '200'; }
    }

    //     Edit  Taxi 
    public function edit_taxi(Request $request)
    {
      
       $get_taxi = Taximodel::get_by_id($request);
       return view('genral.edit_taxi')->with('get_taxi',$get_taxi);
    }


    //   Update Drivers 
    public   function  update_taxi(Request $request)
    {   
     if(session()->get('users_roll_type'))
     { 
         // $validator = $request->validate(array(
        // 'title' => 'required','model' => 'required','category' => 'required','model_year' => 'required','taxi_no' => 'required','luggage' => 'required','seats' => 'required | numeric','make'=>'required','registration_no'=>'required'));
        
        $validator = $request->validate(array(
         'title' => 'required','model' => 'required','category' => 'required',
         'model_year' => 'required','taxi_no' => 'required',
         'luggage' => 'required','seats' => 'required | numeric','make'=>'required',
         'registration_no'=>'required','full_value'=>'required','amortization_gap'=>'required','resell_value'=>'required','amortization_total'=>'required',
         'amortization_value_per_day'=>'required','amortization_day_per_month'=>'required','rides_per_day_for_taxi'=>'required','rides_per_day_for_tour'=>'required',
         'rides_per_day_for_airport_transfer'=>'required','taxi_value'=>'required','tour_value'=>'required','airport_transfer_value'=>'required'
          ));
         $update_taxi_res = Taximodel::update_taxi_by_id($request);
         if($update_taxi_res)
         {
            return redirect('booktaxi')->with(["msg"=>'<div class="alert alert-success""><strong>Vehicle Updated Successfully.. </strong></div>']);
         }
         else
         {   
            return redirect('booktaxi')->with(["msg"=>'<div class="alert alert-danger""><strong>Wrong </strong> Somthing Went wrong ! Try Again ... !!!</div>']);
         }
     }
     else{   
      return redirect('admin-login')->with(["msg"=>'<div class="alert alert-danger""><strong>Wrong </strong> First you can do login !!!</div>']);
      
     }
    }

   /* third  Party  Vehicle  */
   public  function  third_party_vehicle()
   {  
      if(session()->get('users_roll_type'))
      {  
         $get_all_Taxies = Taximodel::get_all_taxies();
         return view('genral.third_party_vehicle')->with('all_taxies',$get_all_Taxies);; 
       }
       else
       {   
         return redirect('admin-login')->with(["msg"=>'<div class="alert alert-danger"><strong>Wrong </strong> First you can do login !!!</div>']);
       }
   }

   
   public  function  add_third_party_vehicle(Request $request)
   {
      if(session()->get('users_roll_type'))
      {   
         
          $validator = $request->validate(array(
            'title' => 'required','model' => 'required','category' => 'required',
            'model_year' => 'required','taxi_no' => 'required | unique:taxis',
            'luggage' => 'required','seats' => 'required | numeric','make'=>'required','registration_no'=>'required',
            'owner_name'=>'required','internal_airport_pickup'=>'required','external_airport_pickup'=>'required',
            'full_day_price_internal'=>'required','full_day_price_external'=>'required'
             )); //  'owner_phone'=>'required',
         
         $ins_data=[
            'title' =>$request->title, 'model'=>$request->model, 'make'=>$request->make , 
            'model_year'=>$request->model_year,  'taxi_no'=>$request->taxi_no,'luggage'=>$request->luggage, 
            'seats'=>$request->seats,'category'=>$request->category,'registration_no'=>$request->registration_no,'taxi_owner'=>'third_party',
            'owner_name'=>$request->owner_name,'owner_phone'=>$request->owner_phone,'internal_airport_pickup'=>$request->internal_airport_pickup,
            'external_airport_pickup'=>$request->external_airport_pickup,'full_day_price_internal'=>$request->full_day_price_internal,
            'full_day_price_external'=>$request->full_day_price_external,'driver_included'=>$request->driver_included?$request->driver_included:'0' ]; 
         $user_details = Taximodel::add_third_party_vehicle($ins_data); 
         return redirect('third_party_vehicle')->with(["msg"=>'<div class="alert alert-success">Vehicle <strong>'.ucfirst($request->title).'</strong> Added Successfully.. </div>']);

       }
       else{   
           return redirect('admin-login')->with(["msg"=>'<div class="alert alert-danger""><strong>Wrong </strong> First you can do login !!!</div>']);
         }
   }

   /* Edit  Third  Party  Vehicle  */
   public  function  edit_third_party_vehicle(Request $request)
   {   
      if(session()->get('users_roll_type'))
      { 
        $get_taxi['get_taxi'] = Taximodel::get_by_id($request); 
        return view('genral.edit_third_party_vehicle')->with($get_taxi);
      }
      else{   
          return redirect('admin-login')->with(["msg"=>'<div class="alert alert-danger""><strong>Wrong </strong> First you can do login !!!</div>']);
        }
   }

   /* Update  Thoird  Party  Vehicle  */
   public  function  update_third_party_vehicle(Request $request)
   {
      if(session()->get('users_roll_type'))
      { 
         $validator = $request->validate(array(
            'title' => 'required','model' => 'required','category' => 'required',
            'model_year' => 'required','taxi_no' => 'required',
            'luggage' => 'required','seats' => 'required | numeric','make'=>'required','registration_no'=>'required',
            'owner_name'=>'required','owner_phone'=>'required','internal_airport_pickup'=>'required','external_airport_pickup'=>'required',
            'full_day_price_internal'=>'required','full_day_price_external'=>'required'
             ));
         
         $upd_data=[
            'title' =>$request->title, 'model'=>$request->model, 'make'=>$request->make , 
            'model_year'=>$request->model_year,  'taxi_no'=>$request->taxi_no,'luggage'=>$request->luggage, 
            'seats'=>$request->seats,'category'=>$request->category,'registration_no'=>$request->registration_no,'taxi_owner'=>'third_party',
            'owner_name'=>$request->owner_name,'owner_phone'=>$request->owner_phone,'internal_airport_pickup'=>$request->internal_airport_pickup,
            'external_airport_pickup'=>$request->external_airport_pickup,'full_day_price_internal'=>$request->full_day_price_internal,
            'full_day_price_external'=>$request->full_day_price_external,'driver_included'=>$request->driver_included?$request->driver_included:'0' ]; 
       
            $update_data = Taximodel::update_third_party_vehicle('id',$request->row_id,$upd_data); 
         return redirect('third_party_vehicle')->with(["msg"=>'<div class="alert alert-success">Vehicle <strong>'.ucfirst($request->title).'</strong> Updated Successfully.. </div>']);

      }
      else{   
          return redirect('admin-login')->with(["msg"=>'<div class="alert alert-danger""><strong>Wrong </strong> First you can do login !!!</div>']);
        }
   }


    

}
