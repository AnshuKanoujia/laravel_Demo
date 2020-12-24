<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Banana_accounts;

class Banana_account extends Controller
{
    public  function  all_banana_accounts(Request $request)
    {
       if(session()->get('users_roll_type'))
        {     
             $data['all_accounts']=Banana_accounts::get_all_records(); 
             return  view('genral.banana_accounts')->with($data); 
        }
        else{   
            return redirect('admin-login')->with(["msg"=>'<div class="alert alert-danger""><strong>Wrong </strong> First you can do login !!!</div>']);
        }
    }

    public  function add_accounts(Request $request)
    {
        if(session()->get('users_roll_type'))
        { 
            $validator = $request->validate(array('account_number'=>'required | unique:banana_accounts','description'=>'required')); 
            Banana_accounts::create_account(array('account_number'=>$request->account_number,'description'=>$request->description,'account_type'=>'banana'));     
            
            return redirect('banana_accounts')->with(["msg"=>'<div class="alert alert-success""><strong> Account Number `'.$request->account_number.'`</strong> Created !!!</div>']);
        }
        else{   
            return redirect('admin-login')->with(["msg"=>'<div class="alert alert-danger""><strong>Wrong </strong> First you can do login !!!</div>']);
         }
        }
        
        public function delete_accounts(Request $request)
        {  
            $delete_accounts=Banana_accounts::delete_records('id',$request->row_id); 
            if($delete_accounts){ echo '200'; }
        }
        
        public  function  edit_account(Request $request)
        {
            $data['account']=Banana_accounts::get_records('id',$request->row_id); 
            return  view('genral.edit_banana_accounts')->with($data); 
        }
        
        public  function  update_accounts(Request $request)
        {
            $update_result=Banana_accounts::update_records('id',$request->row_id,array('account_number'=>$request->account_number,'description'=>$request->description)); 
            return redirect('banana_accounts')->with(["msg"=>'<div class="alert alert-success""><strong> Account Number `'.$request->account_number.'`</strong> Updated !!!</div>']);
        }




}
