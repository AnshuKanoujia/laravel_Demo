<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banana_accounts extends Model
{
    protected $fillable=['account_number','description','user_id','account_type'];

    public static  function  create_account($ins_data)
    {
        return Banana_accounts::create($ins_data); 
    }
    public  static  function  get_all_records()
    {
        return  Banana_accounts::where('status',1)->get(); 
    }
    
    //  delete_address
    public  static function delete_records($column,$value)
    {
        // return Banana_accounts::where($column,$value)->delete();
        return Banana_accounts::where($column,$value)->update(['status' => 0]);
    }

    public  static  function  get_records($column,$value)
    {
        return  Banana_accounts::where('status',1)->where($column,$value)->first();
    }

    public static function  update_records($column,$value,$update_data)
    {
        return Banana_accounts::where($column,$value)->update($update_data);
    }

}
