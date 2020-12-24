<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pickup_drop_points extends Model
{
    protected $fillable = ['region','address','pick_address', 'pick_latitude','pick_longitude' ];

    public static function get_all_pickup_drop_list()
    {
        return Pickup_drop_points::where('status','1')->get();
    }

    // create Pickup  And  Drop  Address 
    public static  function create_pickup_drop_point($request)
    {
        $result =Pickup_drop_points::create([
            'region'=>$request->region,
            'address'=>$request->address,
            'pick_address'=>$request->pick_address,
            'pick_latitude'=>$request->pick_latitude,
            'pick_longitude'=>$request->pick_longitude
        ]); 
        return  $result; 
    }

    //  get data by id 
    public static function get_by_id($request)
    {
        return  Pickup_drop_points::where('status',1)->where('id',$request->row_id)->first(); 
    }

    //  update  Pickup Drop  Address 
    public static function update_pickup_drop_by_id($request)
    {
        $update['region'] =$request->region;
        $update['address'] =$request->address;
        $update['pick_address'] =$request->pick_address;
        $update['pick_latitude'] =$request->pick_latitude;
        $update['pick_longitude'] =$request->pick_longitude;
        return Pickup_drop_points::where('id' ,$request->row_id)->update($update);
    }

    // delete  pick up Drop 

    public static  function delete_drop_point($request)
    {
         //return Pickup_drop_points::where('id' ,$request->row_id)->delete();
         return Pickup_drop_points::where('id' ,$request->row_id)->update(['status' => 0]);
    }


}
