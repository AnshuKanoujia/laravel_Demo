<?php

namespace App;
// use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use DB;
class Driver_documents extends Model
{
    
    protected $fillable = ['driver_id','document_type', 'documents'];

    //  Upload Documents 
    public static  function create_document($request)
    {
        $result = Driver_documents::create([
            'driver_id' =>$request->gellery_id,
            'document_type'=>$request->file_type,
            'documents' =>$request->file
        ]); 
        return $result;
    }



    //   get Driver  Documents 
    public  static function get_driver_documents($request)
    {   // DB::enableQuerylog();
         return Driver_documents::where('status' ,1)->where('driver_id' ,$request->driver_id)->orderBy('id','DESC')->get();
        // dd(DB::getQueryLog());
    }

    //  delete  Documents 
    public  static   function delete_document($request)
    {
        // return Driver_documents::where('id' ,$request->row_id)->where('id' ,$request->driver_id)->delete();
        return Driver_documents::where('id',$request->row_id)->where('driver_id' ,$request->driver_id)->update(['status' => 0]);
    }

     // update documents title 
     public static function update_documents_title($request)
     {
         
         return Driver_documents::where('id',$request->row_id)->update(['document_title' =>$request->documents_title]);
     }
   

}
