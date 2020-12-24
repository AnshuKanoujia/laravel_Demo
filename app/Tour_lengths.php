<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tour_lengths extends Model
{

    protected $fillable=['no_of_day','no_of_night']; 
    public static  function get_all_tour_length()
    {
        return  Tour_lengths::where('status',1)->orderBy('no_of_day', 'ASC')->get(); 
    }

    //  add  tour  length 
    public static function add_tour_length($request)
    {
       return  Tour_lengths::create([
           'no_of_day'=>$request->no_of_day,
           'no_of_night'=>$request->no_of_night
       ]); 
    }


    public static function get_tour_length_by_id($request){
	    return Tour_lengths::where('id' ,$request->row_id)->first();
    }
    

    public static function update_tour_length($request)
    {
        $update['no_of_day'] =$request->no_of_day;
        $update['no_of_night'] =$request->no_of_night;
        $update['status']='1';
        return Tour_lengths::where('id' ,$request->row_id)->update($update);
    }
   


    public static function  delete_tour_length($request)
    {
        return Tour_lengths::where('id' ,$request->row_id)->delete();
        // return Tour_lengths::where('id' ,$request->row_id)->update(['status' => 0]);
    }







}
