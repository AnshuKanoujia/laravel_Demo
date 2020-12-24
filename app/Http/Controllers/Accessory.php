<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Accessories; 
use  App\Customers;
use App\Rental_bookings;
use Validator,Response,Redirect;

class Accessory extends Controller 
{
    public  function new_accessories()
    {
        if(session()->get('users_roll_type'))
        { 
            $data['all_products']=Accessories::get_accessories();  
            return  view('genral.new_accessories')->with($data); 
        }
        else
        { 
           return redirect('admin-login')->with(["msg"=>'<div class="alert alert-danger""><strong>Wrong </strong> First you can do login !!!</div>']);
        }
         
    }

    public  function  accessories()
    {
        if(session()->get('users_roll_type'))
        {
            $data['all_products']=Accessories::get_accessories(); 
            //$data['all_products']=Accessories::get_all_product();
            return  view('genral.accessories')->with($data); 
        }
        else
        {   
            return redirect('admin-login')->with(["msg"=>'<div class="alert alert-danger""><strong>Wrong </strong> First you can do login !!!</div>']);
        }
    }

    public  function  accessories_list_as_type(Request $request)
    {   
        if(session()->get('users_roll_type'))
        {
            // $where=array('type_of_product'=>$request->accessories_type); 
            $data['all_products']=Accessories::accessories_list_as_type($request); 
            
            return  view('genral.accessories_list')->with($data); 
        }
        else{   
            return redirect('admin-login')->with(["msg"=>'<div class="alert alert-danger""><strong>Wrong </strong> First you can do login !!!</div>']);
        }
    }
    //  add accessories
    public  function  add_accessories(Request $request)
    {
        $validator = $request->validate(array('title'=>'required','rental'=>'required','amount'=>'required','image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:8048','type_of_product'=>'required'));
        // 'invoice_attachment'=>'image|mimes:jpeg,png,jpg,gif,svg|max:8048',
        $imageName=""; $invoice_attachment="";
        if($request->image){
            $imageName = 'IMG_Product_'.time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('images'), $imageName);
        }
        
        if($request->invoice_attachment){
            $invoice_attachment = 'IMG_Invoice_'.time().'.'.$request->invoice_attachment->getClientOriginalExtension();
            $request->invoice_attachment->move(public_path('images'), $invoice_attachment);
        }
        $ins_data=array('title'=>$request->title,'rental'=>$request->rental,'amount'=>$request->rental=='0'?'0':$request->amount,'image'=>$imageName,'invoice_attachment'=>$invoice_attachment,'type_of_product'=>$request->type_of_product,'purchase_date'=>$request->purchase_date,'created_by'=>session()->get('user_id'),'description'=>$request->description); 
        $ins_details=Accessories::save_accessories($ins_data);  
        $rand_no=$ins_details->id.date('md'); 
        $sku=strtoupper(substr($request->type_of_product,0,3)).'-'.$rand_no;
        $update_data=array('sku'=>$sku,'barcode'=>$rand_no); 
        $ins_details=Accessories::update_sku('id',$ins_details->id,$update_data); 
        return redirect('accessories')->with(["msg"=>'<div class="alert alert-success""><strong>New  Product  Added Succesfully .. </strong></div>']);
    }

    // delete  data
    public  function  delete_accessories(Request  $request)
    {
        $delete_Accessories = Accessories::delete_accessories($request); 
        if($delete_Accessories){ echo '200'; }
    }

    public function  edit_accessories(Request $request)
    {
        $data['all_products']=Accessories::get_accessories(); 
        $where=array('id'=>$request->row_id); 
        $data['products_details']=Accessories::get_where($where);
        return  view('genral.edit_accessories')->with($data);
    }
    
    public  function  update_accessories(Request  $request )
    {
        $validator = $request->validate(array('title'=>'required','rental'=>'required','amount'=>'required','image'=>'image|mimes:jpeg,png,jpg,gif,svg|max:8048','type_of_product'=>'required'));
        //  'invoice_attachment'=>'image|mimes:jpeg,png,jpg,gif,svg|max:8048',
        if($request->image){
            $imageName='IMG_Product_'.time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('images'), $imageName);
            $update_data['image']=!empty($imageName)?$imageName:'';
        }
        if($request->invoice_attachment){
            $invoice_attachment='IMG_Invoice_'.time().'.'.$request->invoice_attachment->getClientOriginalExtension();
            $request->invoice_attachment->move(public_path('images'), $invoice_attachment); 
            $update_data['invoice_attachment']=!empty($invoice_attachment)?$invoice_attachment:'';
        }
            
        $update_data['title']=$request->title;
        $update_data['rental']=$request->rental;
        
        $update_data['type_of_product']=$request->type_of_product;
        $update_data['purchase_date']=$request->purchase_date;
        $update_data['description']=$request->description; 
        $update_data['amount']=($request->rental=='0')?'0':$request->amount; 
        $update_data['created_by']=session()->get('user_id');
        
        $update_details=Accessories::update_sku('id',$request->row_id,$update_data); 
        return redirect('accessories')->with(["msg"=>'<div class="alert alert-success""><strong>  Product  '.ucfirst($request->title).' Update Succesfully .. </strong></div>']);
        
    }
    public  function  new_rental_bookings(Request $request)
    {
        if(session()->get('users_roll_type'))
        {   
            $data['all_stock_accesory']=Accessories::get_all_accessory_in_stock();
            $data['all_rental_bookings']=Rental_bookings::get_all_rental(); 
            return  view('genral.new_rental_bookings')->with($data);
        }
        else{   
           return redirect('admin-login')->with(["msg"=>'<div class="alert alert-danger""><strong>Wrong </strong> First you can do login !!!</div>']);
        }
    }
    
    public  function  rental_bookings(Request $request)
    {
        if(session()->get('users_roll_type'))
        { 
            $data['all_rental_bookings']=Rental_bookings::get_all_rental(); 
            return  view('genral.rental_bookings')->with($data);
        }
        else
        {   
            return redirect('admin-login')->with(["msg"=>'<div class="alert alert-danger""><strong>Wrong </strong> First you can do login !!!</div>']);
        }
    }
    
    public  function  add_rental_bookings(Request $request)
    {
        
        if(session()->get('users_roll_type'))
        {
            $validator = $request->validate(array('start_date' => 'required','start_time'=>'required','end_date'=>'required','end_time'=>'required','guest_name'=>'required','guest_email'=>'required','mobile'=>'required','request_type' => 'required','accessories' => 'required','total_amount'=>'required'));
            
            $request->guest_whatsapp=$request->mobile;  
            if($request->guest_email ||  $request->guest_whatsapp)
            {
                $customer_details = Customers::get_customer($request);
                if(count($customer_details) > 0 ){   
                    $request->customer_id=$customer_details[0]->id; 
                }
                else
                {
                    $customer_details = Customers::create_customer($request);  
                    $request->customer_id=$customer_details->id; 
                }
            }
            else
            {
                $request->customer_id='';
            }
            $ins_data=array(
            'customer_id'=>$request->customer_id?$request->customer_id:'',
            'start_date_time'=>$request->start_date.' '.$request->start_time,
            'end_date_time'=>$request->end_date.' '.$request->end_time,
            'guest_name'=>$request->guest_name?$request->guest_name:'',
            'guest_email'=>$request->guest_email?$request->guest_email:'',
            'guest_mobile'=>$request->mobile?$request->mobile:'',
            'request_type'=>$request->request_type?$request->request_type:'',
            'booking_type'=>$request->booking_type?$request->booking_type:'',
            'accessories'=>$request->accessories?$request->accessories:'',
            'amount'=>$request->total_amount?$request->total_amount:'0',
            'description'=>$request->description?$request->description:'',
            'booked_by'=>session()->get('user_id')
        );  
        $save_details=Rental_bookings::save_rental_booking($ins_data);  
        return redirect('rental_bookings')->with(["msg"=>'<div class="alert alert-success""><strong>  New Rental Booking created Succesfully .. </strong></div>']);
    }
    else{   
        return redirect('admin-login')->with(["msg"=>'<div class="alert alert-danger""><strong>Wrong </strong> First you can do login !!!</div>']);
    }
  }
  
    public  function  rental_booking_by_user(Request $request)
    {
        if(session()->get('users_roll_type'))
        {
            $validator = Validator::make($request->all(), [
                'start_date' => 'required','start_time'=>'required','end_date'=>'required','end_time'=>'required','guest_name'=>'required','guest_email'=>'required','mobile'=>'required','request_type' => 'required','accessories' => 'required','total_amount'=>'required'
            ]);
            
            if ($validator->fails())  
            {
                return Response::json(array('success' => false,'errors' => $validator->getMessageBag()->toArray()), 400); 
            }
            else
            {

                    $request->guest_whatsapp=$request->mobile; 
                    if($request->guest_email ||  $request->guest_whatsapp)
                    {
                        $customer_details = Customers::get_customer($request);
                        if(count($customer_details) > 0 ){   
                            $request->customer_id=$customer_details[0]->id; 
                        }
                        else
                        {
                            $customer_details = Customers::create_customer($request);  
                            $request->customer_id=$customer_details->id; 
                        }
                    }
                    else
                    {
                        $request->customer_id='';
                    }
                    $ins_data=array(
                        'customer_id'=>$request->customer_id?$request->customer_id:'',
                        'booking_request_id'=>$request->booking_request_id?$request->booking_request_id:null,
                        'start_date_time'=>$request->start_date.' '.$request->start_time,
                        'end_date_time'=>$request->end_date.' '.$request->end_time,
                        'guest_name'=>$request->guest_name?$request->guest_name:'',
                        'guest_email'=>$request->guest_email?$request->guest_email:'',
                        'guest_mobile'=>$request->mobile?$request->mobile:'',
                        'request_type'=>$request->request_type?$request->request_type:'',
                        'booking_type'=>$request->booking_type?$request->booking_type:'',
                        'accessories'=>$request->accessories?$request->accessories:'',
                        'amount'=>$request->total_amount?$request->total_amount:'0',
                        'description'=>$request->description?$request->description:'',
                        'booked_by'=>session()->get('user_id')
                    );   
                    $booking_details=Rental_bookings::get_booking_request($request->booking_request_id); 
                    if(count($booking_details))
                    {   
                        $save_details=Rental_bookings::update_by_column_name('booking_request_id',$request->booking_request_id,$ins_data);
                    }
                    else
                    {  
                        $save_details=Rental_bookings::save_rental_booking($ins_data); 
                    }
                    return Response::json(array('success' => true,'details'=>$save_details), 200);
                }
                
            }
            else
            {   
                return redirect('admin-login')->with(["msg"=>'<div class="alert alert-danger""><strong>Wrong </strong> First you can do login !!!</div>']);
            }
  }

  public  function  accessories_alloted(Request $request)
  {
        if(session()->get('users_roll_type'))
        {
            $validator = Validator::make($request->all(), ['alloted_date' => 'required','advanced_amount'=>'required','terms'=>'required']);
            
            $alloted_accessories=!empty($request->alloted_accessories)?explode(',',$request->alloted_accessories):array();
            $rental_booking_id=!empty($request->rowId)?$request->rowId:'';  
            if(count($alloted_accessories)>0 && $rental_booking_id)
            {
                foreach($alloted_accessories as $value)
                {
                    $accessories_alloted=Accessories::update_sku('sku',$value,array('in_stock'=>$rental_booking_id));
                }
            }

            if($validator->fails()) 
            {
              return Response::json(array('success' => false,'errors' => $validator->getMessageBag()->toArray()), 400); 
            }
            else
            {
               
                $update_details=Rental_bookings::update_by_column_name('id',$request->rowId,array('alloted_date'=>$request->alloted_date,'advanced_amount'=>$request->advanced_amount));
                
                return Response::json(array('success' => true,'details'=>$update_details), 200);
            }
              
        }
        else
        {   
            return redirect('admin-login')->with(["msg"=>'<div class="alert alert-danger""><strong>Wrong </strong> First you can do login !!!</div>']);
        }
  } 
  

  //  return  Accessory 

  public  function  accessories_returned(Request $request)
  {
      if(session()->get('users_roll_type'))
      {
          $validator = Validator::make($request->all(), ['return_date' => 'required','paid_amount'=>'required','terms'=>'required']);

            $returned_accessories=!empty($request->returned_accessories)?explode(',',$request->returned_accessories):array();
            
            $rental_booking_id=!empty($request->rowId)?$request->rowId:'';  
            if(count($returned_accessories)>0 && $rental_booking_id)
            {
                foreach($returned_accessories as $value)
                {
                    $accessories_alloted=Accessories::update_sku('sku',$value,array('in_stock'=>0));
                }
            }

            if($validator->fails()) 
            {
              return Response::json(array('success' => false,'errors' => $validator->getMessageBag()->toArray()), 400); 
            }
            else
            { 
                $update_details=Rental_bookings::update_by_column_name('id',$request->rowId,array('return_date'=>$request->alloted_date,'paid_amount'=>$request->paid_amount));
                return Response::json(array('success' => true,'details'=>$update_details), 200);
            }
              
    }
    else
    {   
        return redirect('admin-login')->with(["msg"=>'<div class="alert alert-danger""><strong>Wrong </strong> First you can do login !!!</div>']);
    }
  }




  //  get  price by sku 
  public function  get_price_by_sku(Request  $request)
  { 
        if ($request->inputdata=="")  
        {
           return Response::json(array('success' => false,'price' =>0 ), 400); 
        }
        else
        {
            $accessories=explode(',',$request->inputdata);
            $amount=0; 
            foreach($accessories as $value)
            {
                $product=Accessories::get_price_by_sku($value); 
                $amount+=(int)$product->amount; 
            }
            return Response::json(array('success' => true,'price'=>$amount), 200); 
        }
  }


 public function get_rental_booking(Request  $request){
    $product=Accessories::where('id',$request->row_id)->first(); 
    return Response::json($product, 200); 
 } 





}

