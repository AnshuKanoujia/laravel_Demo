<?php

namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Drivers extends Model
{
    
    protected $fillable = ['type','rate', 'name','email','phone','image','address','latitude','longitude','license_no','join_date' ];

    public static function add_driver($request){
        $imageName = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('images'), $imageName);
        $result = Drivers::create([
            'type' =>$request->type,
            'rate' =>$request->rate,
            'name' =>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone, 
            'image'=>$imageName, 
            'address'=>$request->address, 
            'latitude'=>$request->latitude, 
            'longitude'=>$request->longitude, 
            'license_no'=>$request->license_no, 
            'join_date'=>$request->join_date, 
            
        ]); 
        return $result;
      }

      public static function get_all_drivers(){
	    return Drivers::where('status' ,1)->orderBy('id','DESC')->get();
    }

    public static function  delete_driver($request)
    {
        // return Drivers::where('id' ,$request->row_id)->delete();
        return Drivers::where('id' ,$request->row_id)->update(['status' => 0]);
    }
    public static function get_by_id($request){
	    return Drivers::where('id' ,$request->row_id)->first();
    }

    public static function update_driver_by_id($request){

        if($request->image)
        {
            $imageName=time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('images'), $imageName);
            $update['image']=$imageName; 
        }
        
        $update['type'] =$request->type;
        $update['rate'] =$request->rate;
        $update['name'] =$request->name;
        $update['email']=$request->email;
        $update['phone']=$request->phone; 
        
        $update['address']=$request->address;
        $update['latitude']=$request->latitude;
        $update['longitude']=$request->longitude; 
        $update['license_no']=$request->license_no; 
        $update['join_date']=$request->join_date;
        $update['status']='1';
       
        
        return Drivers::where('id' ,$request->row_id)->update($update);
    }

     
    


}
