<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Addresses extends Model
{

    protected $fillable = ['address','latitude','longitude'];

    public static function add_address($request)
    {
        $result = Addresses::create([
             'address'=>$request->address,
             'latitude'=>$request->latitude,
             'longitude'=>$request->longitude,
         ]);
         return $result;   
    }

    //  get All  Address 
    public static function get_all_address()
    {
        return Addresses::where('status','1')->get(); 
    }

    //  delete_address
    public  static function delete_address($request)
    {
        // return Addresses::where('id' ,$request->row_id)->delete();
        return Addresses::where('id' ,$request->row_id)->update(['status' => 0]);
    }

    //  get data By id 
    public static function get_by_id($request){
	    return Addresses::where('id' ,$request->row_id)->first();
    }

    //  update Address 
    public static function update_address($request)
    {
        $update['address']=$request->address?$request->address:'';
        $update['latitude']=$request->latitude?$request->latitude:'';
        $update['longitude']=$request->longitude?$request->longitude:'';
        return Addresses::where('id' ,$request->row_id)->update($update);
    }
}
