<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Content; 
class Contents extends Controller
{
     public function  term_condition(Request $request)
     {
           $data['all_contents']=Content::get_all_contents();
           $data['all_distrinct']=Content::get_district_record('title'); 
           return view('genral.term_condition')->with($data); 
     }


     //  add  contents  of  terms  and  condition  
     public function add_terms(Request $request)
     {

       if(session()->get('users_roll_type'))
       { 
            $validator = $request->validate(array('title' => 'required','contents'=>'required'));
            $add_terms=Content::add_contents($request);
            return redirect('term_condition')->with(["msg"=>'<div class="alert alert-success""><strong> Contents created.. </strong></div>']);
        }
        else
        { 
           return redirect('admin-login')->with(["msg"=>'<div class="alert alert-danger""><strong>Wrong </strong> First you can do login !!!</div>']);
        }
       
     }

     //  delete  contents  by  coumn name 

     public  function  delete_contents(Request $request)
     {
        if(session()->get('users_roll_type'))
        {
            $delete=Content::delete_records('id',$request->row_id); 
            if($delete)
            echo '200'; 
        }
        else
        {   
           return redirect('admin-login')->with(["msg"=>'<div class="alert alert-danger""><strong>Wrong </strong> First you can do login !!!</div>']);
        }

     }


     //  edit contents 

     public  function  edit_contents(Request $request)
     {
        if(session()->get('users_roll_type'))
        {
            $data['select_a_records']=Content::select_records('id',$request->row_id); 
            $data['all_distrinct']=Content::get_district_record('title');  
            return  view('genral.edit_term_condition')->with($data); 
        }
        else
        {   
           return redirect('admin-login')->with(["msg"=>'<div class="alert alert-danger""><strong>Wrong </strong> First you can do login !!!</div>']);
        }
     }
    //  update contents  by  id 
    public  function  update_contents(Request $request)
    {
        if(session()->get('users_roll_type'))
        {
            if($request->title){ $update['title']=$request->title;  }
            if($request->description){$update['description']=$request->description;  } 
            if($request->contents){ $update['contents']=$request->contents; }
            $update['status']=1; 
            $data['select_a_records']=Content::update_records('id',$request->row_id,$update); 
            return redirect('term_condition')->with(["msg"=>'<div class="alert alert-success""><strong> Contents updated.. </strong></div>']);
        }
        else
        {   
           return redirect('admin-login')->with(["msg"=>'<div class="alert alert-danger""><strong>Wrong </strong> First you can do login !!!</div>']);
        }
    }





}
