<?php

namespace App\Http\Controllers;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;
use Twilio\Rest\Client;
use App\Tour_bookings;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class ChatBotController extends Controller
{

    public function  send_whatsappmsg()
    {
       return  view('genral.sendmsg'); 
    }
  /* public function listenToReplies(Request $request)
    {
        $from = $request->input('From');
        $body = $request->input('Body');
        $client = new \GuzzleHttp\Client();  
        try { 
                $message=$body;
                $res=$this->sendWhatsAppMessage($message, $from);
                echo $res; 
            
        } catch (RequestException $th) {   
            $response = json_decode($th->getResponse()->getBody());
            $this->sendWhatsAppMessage($response->message, $from); 
        }
        return;
    }

   
    public function sendWhatsAppMessage(string $message, string $recipient)
    {
        $twilio_whatsapp_number = getenv('TWILIO_WHATSAPP_NUMBER');
        $account_sid = getenv("TWILIO_SID");
        $auth_token = getenv("TWILIO_AUTH_TOKEN");
        $client = new Client($account_sid, $auth_token);
        $image='https://images.unsplash.com/photo-1545093149-618ce3bcf49d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=668&q=800';
       $pdf='https://jeecup.nic.in/WebInfo/Handler/FileHandler.ashx?i=File&ii=186&iii=Y';
        $whatsapp_api_responce= $client->messages->create("whatsapp:$recipient", array('from' => "whatsapp:$twilio_whatsapp_number", 
            'body' =>"$message",
             "mediaUrl" => 'https://jeecup.nic.in/WebInfo/Handler/FileHandler.ashx?i=File&ii=186&iii=Y'
            )); 

        return  $whatsapp_api_responce; 
    }*/
     public function listenToReplies(Request $request)
    {
        $from = $request->input('whatsapp_no');
        $body = $request->input('whatsapp_msg');
        $booking_id = $request->input('booking_id');
        $client = new \GuzzleHttp\Client();  
        try { 
                $message='Tour Package'.$body;
                $res=$this->sendWhatsAppMessage($message, $from,$booking_id);
                if($res){ 
                  return redirect('tour_complete')->with(["msg"=>'<div class="alert alert-success"> Tour <strong> Package </strong> Send Successfully.</div>']);
                 } 
            
        } catch (RequestException $th) {   
            $response = json_decode($th->getResponse()->getBody());
            $this->sendWhatsAppMessage($response->message, $from,$booking_id); 
        }
        return;
    }

   
    public function sendWhatsAppMessage(string $message, string $recipient,string $booking_id)
    {
        $twilio_whatsapp_number = getenv('TWILIO_WHATSAPP_NUMBER');
        $account_sid = getenv("TWILIO_SID");
        $auth_token = getenv("TWILIO_AUTH_TOKEN");
        $client = new Client($account_sid, $auth_token);

        
        /*$m=redirect('loadpdf/'.$booking_id);     
        echo  $m;  die; 
        // echo $doc;  die; 
        $pdf='http://localhost/taxi/storage/tour_package/'.$tour_data->package_doc; 
        echo  $pdf;  die; 
        //echo  (string)$pdf; die;  //  URLEncode()

        echo   'https://jeecup.nic.in/WebInfo/Handler/FileHandler.ashx?i=File&ii=186&iii=Y';  die; */
        //  'http://localhost/taxi/package/'.$booking_id
        // $p='http://localhost/taxi/package/'.$booking_id


        /*   New */

        $request=new request(); 
        $request->booking_id=$booking_id;   
        $tour_data=Tour_bookings::get_tour_booking_by_booking_id($request);


        $p='https://jeecup.nic.in/WebInfo/Handler/FileHandler.ashx?i=File&ii=186&iii=Y'; 

        $whatsapp_api_responce= $client->messages->create("whatsapp:$recipient", array('from' => "whatsapp:$twilio_whatsapp_number", 
            'body' =>"$message",
             "mediaUrl" => 'http://34.68.35.26/taxi/storage/tour_package/'.$tour_data->package_doc
            )); 
          
        return  $whatsapp_api_responce;
    }

    public  function  package(Request $request)
    {   
        $request=new request(); 
        $request->booking_id=$request->file?$request->file:'TOUR-06202912-38';   
        $tour_data=Tour_bookings::get_tour_booking_by_booking_id($request);
        $data['file']=$tour_data->package_doc; 
        return view('genral.package_pdf')->with($data);
    }



}



