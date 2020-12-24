<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
   protected  $fillable=['page','title','description','contents','image','link','status','updated_at']; 

    public  static  function  add_contents($request)
    {
        $result = Content::create([
            'page'=>$request->page,
            'title' =>$request->title,
            'description'=>$request->description,
            'contents'=>$request->contents
        ]); 
    }

    // get  all  contents 
    public  static  function  get_all_contents()
    {
        return Content::where('status',1)->get(); 
    }

    //  get  distrinct records  by  column name 
    public  static  function get_district_record($column)
    {
        return Content::where('status',1)->select($column)->groupBy($column)->get(); 
    }

    //  delete  records  by  column name and  value 
    public  static  function  delete_records($column,$value)
    {
        //return Content::where($column,$value)->delete();
        return Content::where($column,$value)->update(['status' => 0]);
    }

    //  select records by  column name and value 
    public  static  function  select_records($column,$value)
    {
        return Content::where('status',1)->where($column,$value)->first(); 
    }

   //  update  records 
   public  static  function update_records($column,$value,$update_data)
   {
      return Content::where($column,$value)->update($update_data);
   }


}
