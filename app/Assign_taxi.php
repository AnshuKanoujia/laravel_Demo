<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

// use App\Tour_bookings;
class Assign_Taxi extends Model
{
    //  Get already assign taxi to driver list
    public static function getTaxiAssignList($date)
    {     
         //$currentDate = date('Y-m-d'); 
         return DB::table('taxi_assign_to_driver')->where('assign_date', $date)->first();
    }

    //  Save assign taxi to driver
    public static function saveAssignTaxi($request)
    {
        $result = DB::table('taxi_assign_to_driver')->insert([
            'role_id' => session()->get('users_roll_type'),
            'user_id' => session()->get('user_id'),
            'taxi_id' => json_encode($request['taxi']),
            'driver_id' => json_encode($request['driver']),
            'assign_date' => $request['assign_date'],
        ]);
        return $result;
    }

    //  Edit assign taxi to driver
    public static function editAssignTaxi($request)
    {
        return $data['editAssignTaxiData'] = DB::table('taxi_assign_to_driver')->where('assign_date', $request)->first();
    }

    public static function updateAssignTaxi($request)
    {
        $currentDate = date('Y-m-d H:m:s');
        $result = DB::table('taxi_assign_to_driver')->where('id',$request['rowId'])->update([
            'role_id' => session()->get('users_roll_type'),
            'user_id' => session()->get('user_id'),
            'taxi_id' => json_encode($request['taxi']),
            'driver_id' => json_encode($request['driver']),
            'updated_on' => $currentDate,
            // 'assign_date' => $request['assign_date'],
        ]);
        return $result;
    }

   

}
