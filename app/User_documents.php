<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class User_documents extends Model
{
    protected $fillable = ['user_id','document_type', 'documents'];

     //  Upload Documents 
     public static  function create_document($request)
     {
         $result = User_documents::create([
             'user_id' =>$request->user_id,
             'document_type'=>$request->file_type,
             'documents' =>$request->file
         ]); 
         return $result;
     }
 
 
 
     //   get Driver  Documents 
     public  static function get_driver_documents($request)
     { 
        // DB::enableQuerylog();
         return User_documents::where('status' ,1)->where('user_id' ,$request->row_id)->orderBy('id','DESC')->get();
        //  dd(DB::getQueryLog()); die; 
     }
 
     //  delete  Documents 
     public  static   function delete_document($request)
     {
         // return Driver_documents::where('id' ,$request->row_id)->where('id' ,$request->driver_id)->delete();
         return User_documents::where('id',$request->row_id)->where('user_id' ,$request->user_id)->update(['status' => 0]);
     }
 
      // update documents title 
      public static function update_documents_title($request)
      {
          
          return User_documents::where('id',$request->row_id)->update(['document_title' =>$request->documents_title]);
      }

}
