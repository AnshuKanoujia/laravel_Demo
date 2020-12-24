<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User; 
use App\Driver_documents; 
use App\User_documents; 
use App\Banana_accounts;

class RegisterController extends Driver
{
    public function registration()
    {
       
        $data['all_users']=  User::get_all_users();
        return  view('genral.registration')->with($data);  
    } 

    public function sign_up(Request $request){ 
      // required|confirmed|min:6
      $validatedData = $request->validate([
          'name' => 'required','account_number'=>'required | unique:banana_accounts','description'=>'required', 'email'=>'required|email|unique:users' ,'phone'=>'required|min:10','password'=>'required|min:6' , 'confirm_password'=>'required_with:password|same:password|min:6' ,'address'=>'required','join_date'=>'required','image'=>'required','roll_id'=>'required','roll_id'=>'required' ]);
          
          $result=$this->getlat_long($request->address); 
          if($result)
          {
           $request->latitude=$result['lat']?$result['lat']:'26.8496217';
           $request->longitude=$result['long']?$result['long']:'80.9462193';
          }
          else
          {
             $request->latitude='26.8496217';
             $request->longitude='80.9462193';
          }      
          $result = User::sign_in($request); 
          $ins_acc=Banana_accounts::create_account(array('account_number'=>$request->account_number,'description'=>$request->description,'account_type'=>'user','user_id'=>$result->id));
          if($result != NULL){
            return redirect('registration')->with(["msg"=>'<div class="alert alert-success""><strong>Success </strong> Registration  Successfully..</strong></div>']);
              }
            else{
                return redirect()->back()->with(["msg"=>'<div class="notice notice-danger notice"><strong> Wrong </strong> Please try again  !!! </div>']);
              }
  }

  public function delete_users(Request $request)
  {
    $getdata= User::get_by_id($request); 
    if($getdata->image) { $request->image=$getdata->image; }else{$request->image=''; }
    $delete_user=  User::delete_user($request);
    if($delete_user) echo '200'; 
  }

  //  Edit  users 
  public function edit_user(Request $request)
  {
    $data['get_user']= User::get_by_id($request); 
    return  view('genral.edit_registration')->with($data); 
  }

   //  update Users 
   public function update_user(Request $request){
      
            if($request->address)
            {
                $result=$this->getlat_long($request->address); 
                if($result)
                {
                $request->latitude=$result['lat']?$result['lat']:'26.8496217';
                $request->longitude=$result['long']?$result['long']:'80.9462193';
                }
                else
                {
                  $request->latitude='26.8496217';
                  $request->longitude='80.9462193';
                }
            }
            else
            {
              $request->latitude='26.8496217';
              $request->longitude='80.9462193';
            }

            $update_users_res =  User::update_user_by_id($request);
            if($update_users_res)
            {
               //return redirect('registration')->with(["msg"=>'<div class="alert alert-success""><strong>Updated Successfully.. </strong></div>']);
               return redirect()->back()->with(["msg"=>'<div class="alert alert-success""><strong>Updated Successfully.. </strong></div>']);
            }
            else{   
               // return redirect('registration')->with(["msg"=>'<div class="alert alert-danger""><strong>Wrong </strong> Somthing Went wrong ! Try Again ... !!!</div>']);
              return redirect()->back()->with(["msg"=>'<div class="alert alert-danger""><strong>Wrong </strong> Somthing Went wrong ! Try Again ... !!!</div>']);
               
            }
   }


    // Driver  Details 
    public function user_details(Request $request)
    {
       $request->row_id=$request->user_id; 
       $data['get_user']= User::get_by_id($request); 
       $data['get_user_documents']=User_documents::get_driver_documents($request);
       
       return view('genral.user_details')->with($data); 
    }


    /*   Add Documents ---*/
   public function users_documents(Request $request) 
   {    
      
      if(session()->get('users_roll_type'))
      { 
        $request->row_id=$request->user_id; 
        $data['get_user_documents']= User_documents::get_driver_documents($request); 
        $data['user_id']=$request->user_id; 
        $data['usertype']=session()->get('users_roll_type'); 
        return view('genral.user_documents')->with($data);
      }
      else{   
          return redirect('admin-login')->with(["msg"=>'<div class="alert alert-danger""><strong>Wrong </strong> First you can do login !!!</div>']);
         }
    }

    //   Upload Documents   
    public function  upload_user_document(Request $request)
    {
      
      //echo 'Helllo';     
    
     if($request->file)
        {
           $file_type=$request->file->getClientMimeType(); 
           $imageName = date('YmdHis').'.'.$request->file->getClientOriginalExtension();
           $result=$request->file->move(public_path('images/users/'), $imageName); 
           
           if($result==true)
           {
              
              $request->file=$imageName;  //echo $request->gellery_id; 
              $request->file_type=$file_type; 
              $create_documents = User_documents::create_document($request);
              //echo json_encode(array('filename'=>$imageName)); 
             //echo $file_type=$request->file->getClientMimeType();  //  image/png  ,  image/jpeg 
             //return redirect('drivers')->with(["msg"=>'<div class="alert alert-success""><strong>Driver Added Successfully.. </strong></div>']);
             echo json_encode(array('success'=>'1','error'=>'0','documents_type'=>$create_documents->document_type,'filename'=>$create_documents->documents,'row_id'=>$create_documents->id,'user_id'=>$create_documents->user_id,'document_title'=>$create_documents->document_title));
           }
           else
           {
              // echo $request->file->getErrorMessage();
              echo json_encode(array('success'=>'0','error'=>'1','documents_type'=>"",'filename'=>"",'row_id'=>'','row_id'=>'','user_id'=>'','document_title'=>''));
           }
        }

    }


    // Delete  Documents 
    public function delete_user_documents(Request $request)
    {
        $delete_document = User_documents::delete_document($request);
        if($delete_document){ echo '200'; }
    }


    //  Update the documents title 
    public function  update_user_documents_title(Request $request)
    {
        // $request->row_id; 
        // $request->documents_title;
        $update_documnets_title=User_documents::update_documents_title($request);
        if($update_documnets_title){ echo '200'; }
    }


    




}
