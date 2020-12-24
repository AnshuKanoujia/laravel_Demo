<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB; 

class Accessories extends Model
{
    protected $fillable=['title','type_of_product','rental','amount','image','purchase_date','invoice_attachment','sku','barcode','description'];
    
    public  static  function  get_accessories()
    {
        return Accessories::where('status',1)->select('type_of_product',DB::raw("count(*) as counting"))->groupBy('type_of_product')->get(); 
        //  return DB::select("SELECT *,COUNT(*) as all_count FROM `accessories` WHERE `status`=1 GROUP  BY `type_of_product`  ");
    }
    public  static function  get_where($where)
    {
        return  Accessories::where($where)->get(); 
    }
    
    //  get  all products 
    // public  static  function  get_all_product()
    // {
    //     return  Accessories::where('status',1)->get(); 
    // } 
    
        
    //  get  price  by sku 
    public  static  function  get_price_by_sku($sku)
    {
       return Accessories::where('sku',$sku)->where('status',1)->where('rental',1)->first(); 
    }
    //  get  all  stock Accessory products
    public  static  function get_all_accessory_in_stock()
    {
        return  Accessories::where('status',1)->where('rental',1)->where('in_stock',0)->get(); 
    }

    //  save  the  products 
    public  static  function  save_accessories($ins_data)
    {
       return  Accessories::create($ins_data); 
    }

    //  update data
    public  static  function  update_sku($where_column,$value,$update_data)
    {
         return  Accessories::where($where_column,$value)->update($update_data);
    }

    //  delete_address
    public  static function delete_accessories($request)
    {
        // return Addresses::where('id' ,$request->row_id)->delete();
        return Accessories::where('id' ,$request->row_id)->update(['status' => 0]);
    }


    public static function accessories_list_as_type($request)
    {
        // DB::enableQueryLog();
        return Accessories::leftJoin('rental_bookings', 'rental_bookings.id', '=', 'accessories.in_stock')
        ->select('accessories.*','rental_bookings.guest_name','rental_bookings.guest_mobile','rental_bookings.guest_email','rental_bookings.start_date_time','rental_bookings.end_date_time')
        ->where('accessories.type_of_product',$request->accessories_type)
       ->get();
    //    dd(DB::getQueryLog());  die; 
    }




}
