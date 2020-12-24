<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;
use App\Customization_activities; 
class Customization_activities_types extends Model
{
    protected $fillable=['title','description']; 


    public  static  function search_row_column($column1,$column2,$value)
    {
        //return Customization_activities_types::where($column1,'LIKE', '%'.$value.'%')->first();
         return Customization_activities_types::where($column1,$value)->first();
    }
    public  static  function  get_all_activities_types()
    {
        return Customization_activities_types::where('status',1)->orderBy('id', 'desc')->get(); 
    }
    
    //  Add Activities  Models 
    public static function  add_activities_type($request)
    {      
        $result=Customization_activities_types::create([
              'title'=>$request->title,
              'description'=>$request->description ?$request->description:''
        ]); 
        return $result; 
    }


    //  delete  activities type 
    public  static function delete_activities_type($request)
    {
         // return Customization_activities_types::where('id' ,$request->row_id)->delete();
       return Customization_activities_types::where('id',$request->row_id)->update(['status'=>0]); 
    }

    public  static function  get_by_id($request)
    {
        return Customization_activities_types::where('id',$request->row_id)->first(); 
    }

    // update activities type
    public  static  function  update_activities_type_by_id($request)
    {
        $update['title']=$request->title; 
        $update['description']=$request->description ?$request->description :''; 
        $update['status']='1';
        return  Customization_activities_types::where('id',$request->row_id)->update($update); 
    }

   
    

}
