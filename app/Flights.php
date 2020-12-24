<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flights extends Model
{
    

    protected $fillable = ['flight_no','service_provider','flight_from', 'flight_to','departure_time','arrival_time' ];




    public static function get_all_flights(){
	    return Flights::where('status' ,1)->orderBy('id', 'desc')->get();
    }


    public static function add_flight($request){
        //   echo $request->time;  die;  
        $result = Flights::create([
            'flight_no' =>$request->flight_no,
            'service_provider'=>$request->service_provider,
            'flight_from'=>$request->flight_from,
            'flight_to'=>$request->flight_to, 
            'departure_time'=>$request->departure_time,
            'arrival_time'=>$request->arrival_time
        ]); 
        return $result;
      }

      //  delete Flight
    public static function  delete_flight($request)
    {
        //return Taxi::where('id' ,$request->row_id)->delete();
        return Flights::where('id' ,$request->row_id)->update(['status' => 0]);
    }


    //  get A Flight 
    public static function get_by_id($request){
	    return Flights::where('id' ,$request->row_id)->first();
    }

    //  Update Flight 
    public static function update_flight_by_id($request){
        $update['flight_no'] =$request->flight_no;
        $update['service_provider'] =$request->service_provider;
        $update['flight_from'] =$request->flight_from;
        $update['flight_to'] =$request->flight_to;
        $update['departure_time']=$request->departure_time;
        $update['arrival_time']=$request->arrival_time;
        $update['status']='1';
        return Flights::where('id' ,$request->row_id)->update($update);
    }




   

}
