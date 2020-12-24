<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use  DB;

class Financial_layouts extends Model
{
    protected  $fillable=['date','booking_type','debit_acc','credit_acc','internal_amount','external_amount','booking_status','description'];
    
    public  static  function  save_financial($ins_data)
    {
       return Financial_layouts::create($ins_data); 
    }
    
    public static function  get_details($column,$value){
        return Financial_layouts::where($column,$value)->where('status',1)->get();
    }

    //  delete_address
    public  static function delete_records($column,$value)
    {
        return Financial_layouts::where($column,$value)->delete();
        // return Financial_layouts::where($column,$value)->update(['status' => 0]);
    }

    //  to Export  data

    public  static  function  get_financial_report_data($date)
    {
        //DB::raw("id
        return  Financial_layouts::select('date','doc','description','booking_type','debit_acc','credit_acc','external_amount','cc1','cc2','cc3')->where('date',$date)->get(); 
        
        // 'date','booking_type','debit_acc','credit_acc','external_amount','booking_status' ,  'booking_status'
    }
}
