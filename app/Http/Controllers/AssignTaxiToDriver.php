<?php

namespace App\Http\Controllers;

// namespace App\Exceptions;

use App\Assign_taxi;
use App\Drivers;
// use Exception;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Session;
use App\Taxi;
use Illuminate\Http\Request;
use Redirect;

class AssignTaxiToDriver extends Controller
{
    public $data;

    // Fetch Taxi and Driver List
    public function getTaxiDriverList()
    {
        if (session()->get('users_roll_type')) {
            try {
                $taxies = Taxi::get_all_taxies();
                $drivers = Drivers::get_all_drivers();
                if((int)(date('H',time())) >= 17)
                {
                    $selected_date=date('Y-m-d', strtotime(' +1 day'));
                } 
                else
                {   
                    $selected_date=date('Y-m-d');  
                }
                 
                $currentDateTaxiList = assign_taxi::getTaxiAssignList($selected_date);
                if(count((array)$currentDateTaxiList) > 0)
                {
                    $newTaxiData['driverData'] = json_decode($currentDateTaxiList->driver_id);
                    $data = ['selected_date'=>$selected_date,'taxies' => $taxies, 'drivers' => $drivers,'newTaxiData' => $newTaxiData,'rowId'=>$currentDateTaxiList->id];
                }
                else{
                    $newTaxiData['driverData']=array(); 
                    $data = ['selected_date'=>$selected_date,'taxies' => $taxies, 'drivers' => $drivers,'newTaxiData' => $newTaxiData,'rowId'=>''];
                }
                
                return view('genral.assign_taxi_to_driver')->with('data', $data);
            } catch (error $e) {
                return $e->getMessage();
            }
        } else {    
            return redirect('admin-login')->with(["msg" => '<div class="alert alert-danger""><strong>Wrong </strong> First you can do login !!!</div>']);
        }
    }

    // Submit form(Assign Taxi to driver)
    public function submitAssignTaxi(Request $request)
    {
        if (session()->get('users_roll_type')) {
            try {
               
                $data = $request->all();
                // print_r($data);  die; 
                $currentDateTaxiList = assign_taxi::getTaxiAssignList($request->assign_date);
                if(count((array)$currentDateTaxiList) > 0)
                {
                   if($request->rowId!="")
                   {
                    $taxi = assign_taxi::updateAssignTaxi($data);
                   }
                }
                else
                {
                    $taxi = assign_taxi::saveAssignTaxi($data);
                }
                // print_r($request->rowId); die; 
               
                return redirect('assign_taxi')->with(["msg" => '<div class="alert alert-success"><strong>Driver Assign Successfully.. </strong></div>']);
            } catch (error $e) {
                return redirect('assign_taxi')->with(["msg" => '<div class="alert alert-danger"><strong>' . $e->getMessage() . '</strong></div>']);
            }
        } else {
            return redirect('admin-login')->with(["msg" => '<div class="alert alert-danger""><strong>Wrong </strong> First you can do login !!!</div>']);
        }
    }

    // Fetch data for edit
    public function editTaxiDriver()
    {
        if (session()->get('users_roll_type')) {
            try {
                $taxiArray = [];
                $taxies = Taxi::get_all_taxies();
                $drivers = Drivers::get_all_drivers();
                $currentDateTaxiList = assign_taxi::getTaxiAssignList(date('Y-m-d'));
                $assignTaxies = json_decode($currentDateTaxiList->taxi_id);
                // print_r($assignTaxies);
                for ($i = 0; $i < count($assignTaxies); $i++) {
                    foreach ($taxies as $taxi) {
                        if ($taxi->id == $assignTaxies[$i]) {
                            array_push($taxiArray, $taxi);
                        }
                    }
                }
                $newTaxiData['taxiData'] = $taxiArray;
                $newTaxiData['driverData'] = json_decode($currentDateTaxiList->driver_id);
                $newTaxiData['rowId'] = $currentDateTaxiList->id;
                $data = ['drivers' => $drivers, 'newTaxiData' => $newTaxiData];  
                return view('genral.assign_taxi_to_driver')->with('editData', $data);
            } catch (error $e) {  
                return redirect('assign_taxi')->with(["msg" => '<div class="alert alert-danger"><strong>' . $e->getMessage() . '</strong></div>']);
            }
        } else {
            return redirect('admin-login')->with(["msg" => '<div class="alert alert-danger""><strong>Wrong </strong> First you can do login !!!</div>']);
        }
    }
    
    
    public function updateTaxiDriver(Request $request)
    {
        if (session()->get('users_roll_type')) {
            try {
                $data = $request->all();
                $taxi = assign_taxi::updateAssignTaxi($data);
                // print_r( $taxi);
                return redirect('assign_taxi')->with(["msg" => '<div class="alert alert-success"><strong>Driver Updated Successfully.. </strong></div>']);
            } catch (error $e) {
                return redirect('assign_taxi')->with(["msg" => '<div class="alert alert-danger"><strong>' . $e->getMessage() . '</strong></div>']);
            }
        } else {
            return redirect('admin-login')->with(["msg" => '<div class="alert alert-danger""><strong>Wrong </strong> First you can do login !!!</div>']);
        }
    }

    public  function getAssigntaxiOfDay(Request $request)
    {
       //echo $request->date;
       $currentDateTaxiList = assign_taxi::getTaxiAssignList($request->date);
       $taxies = Taxi::get_all_taxies();
       $drivers = Drivers::get_all_drivers();
       if(count((array)$currentDateTaxiList) > 0)
       {
           $data['method']='updateAssigntaxiOfDay';
           $newTaxiData = json_decode($currentDateTaxiList->driver_id);
           $data['taxies']=$taxies; 
           $data['drivers']=$drivers;
           $data['newTaxiData']=$newTaxiData; 
           $data['rowId']=$currentDateTaxiList->id;
           
        //    $data = ['taxies' => $taxies,'drivers' => $drivers,'newTaxiData' => $newTaxiData,'rowId'=>$currentDateTaxiList->id];
       }
       else{
           $data['method']='getAssigntaxiOfDay';
           $newTaxiData=array();
           $data['taxies']=$taxies; 
           $data['drivers']=$drivers;
           $data['newTaxiData']=$newTaxiData; 
           $data['rowId']='';
           //$data = ['' => , 'drivers' =>$drivers,'newTaxiData' => $newTaxiData,'rowId'=>''];
       }
        // print_r($data['taxies']);  die; 
       return view('genral.ajax')->with($data);
    }

}
