<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Taxi extends Model
{


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = ['title','model', 'make','model_year','taxi_no','luggage','seats','category','registration_no','full_value','amortization_gap','resell_value','amortization_total',
    'amortization_value_per_day','amortization_day_per_month','rides_per_day_for_taxi','rides_per_day_for_tour',
    'rides_per_day_for_airport_transfer','taxi_value','tour_value','airport_transfer_value','taxi_owner','owner_name','owner_phone','internal_airport_pickup',
    'external_airport_pickup','full_day_price_internal','full_day_price_external','driver_included'];

    public static function add_taxi($request){ 
          
        $result = Taxi::create([
            'title' =>$request->title, 'model'=>$request->model, 'make'=>$request->make , 
            'model_year'=>$request->model_year,  'taxi_no'=>$request->taxi_no,'luggage'=>$request->luggage, 
            'seats'=>$request->seats,'category'=>$request->category,'registration_no'=>$request->registration_no,
            'full_value'=>$request->full_value,'amortization_gap'=>$request->amortization_gap,'resell_value'=>$request->resell_value,'amortization_total'=>$request->amortization_total,
            'amortization_value_per_day'=>$request->amortization_value_per_day,'amortization_day_per_month'=>$request->amortization_day_per_month,
            'rides_per_day_for_taxi'=>$request->rides_per_day_for_taxi,'rides_per_day_for_tour'=>$request->rides_per_day_for_tour,
            'rides_per_day_for_airport_transfer'=>$request->rides_per_day_for_airport_transfer,'taxi_value'=>$request->taxi_value,
            'tour_value'=>$request->tour_value,'airport_transfer_value'=>$request->airport_transfer_value

        ]); 
        return $result;
      }
    public static function add_third_party_vehicle($insert_data)
    {
        $result = Taxi::create($insert_data); 
        return $result;
    }

    public static function get_all_taxies(){
	    return Taxi::where('status' ,1)->orderBy('id','DESC')->get();
    }


    // get  id  And Title 
    public  static  function  get_all_taxi_with_id_title()
    {
      return Taxi::select('id','title')->where('status' ,1)->orderBy('id','DESC')->get();
     
    }
    
    public static function  delete_taxi($request)
    {
        //return Taxi::where('id' ,$request->row_id)->delete();
        return Taxi::where('id' ,$request->row_id)->update(['status' => 0]);
    }

     //  get A taxi 
     public static function get_by_id($request){
	    return Taxi::where('id' ,$request->row_id)->first();
    }

    public static function update_taxi_by_id($request){
        $update['title'] =$request->title;
        $update['model'] =$request->model;
        $update['make'] =$request->make;
        $update['model_year']=$request->model_year;
        $update['taxi_no']=$request->taxi_no; 
        $update['luggage']=$request->luggage;
        $update['seats']=$request->seats; 
        $update['category']=$request->category;
        $update['registration_no']=$request->registration_no;

        $update['full_value']=$request->full_value;
        $update['amortization_gap']=$request->amortization_gap;
        $update['resell_value']=$request->resell_value;
        $update['amortization_total']=$request->amortization_total;
        $update['amortization_value_per_day']=$request->amortization_value_per_day;
        $update['amortization_day_per_month']=$request->amortization_day_per_month;
        $update['rides_per_day_for_taxi']=$request->rides_per_day_for_taxi;
        $update['rides_per_day_for_tour']=$request->rides_per_day_for_tour;
        $update['rides_per_day_for_airport_transfer']=$request->rides_per_day_for_airport_transfer;
        $update['taxi_value']=$request->taxi_value;
        $update['tour_value']=$request->tour_value;
        $update['airport_transfer_value']=$request->airport_transfer_value;
        
        
        $update['status']='1';
        return Taxi::where('id' ,$request->row_id)->update($update);
    }

    /* Update third  PArty  Vehicle  Data  */
    public  static function update_third_party_vehicle($column,$value,$up_data)
    {
        return Taxi::where($column,$value)->update($up_data);
    }  

    public  static  function  get_all_taxi_list()
    { 
        return $result= Taxi::select(DB::raw("id,title,seats,CASE WHEN taxi_owner='self' THEN tour_value WHEN taxi_owner='third_party' THEN full_day_price_internal
        ELSE tour_value END AS tour_cost_internal,
        CASE WHEN taxi_owner='self' THEN tour_value WHEN taxi_owner='third_party' THEN full_day_price_external
        ELSE tour_value END AS tour_cost_external,
        
        CASE WHEN taxi_owner='self' THEN taxi_value WHEN taxi_owner='third_party' THEN 0
        ELSE taxi_value END AS taxi_cost_internal,
        CASE WHEN taxi_owner='self' THEN taxi_value WHEN taxi_owner='third_party' THEN 0
        ELSE taxi_value END AS taxi_cost_external,
        CASE WHEN taxi_owner='self' THEN airport_transfer_value WHEN taxi_owner='third_party' THEN internal_airport_pickup
        ELSE airport_transfer_value END AS airport_cost_internal,
        CASE WHEN taxi_owner='self' THEN airport_transfer_value WHEN taxi_owner='third_party' THEN external_airport_pickup
        ELSE airport_transfer_value END AS airport_cost_external"))->where('status',1)->get();
    }
    


}
