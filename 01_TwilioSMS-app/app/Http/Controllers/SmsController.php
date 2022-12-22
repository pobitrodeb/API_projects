<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Exception;
use Twilio\Rest\Client;

class SmsController extends Controller
{
 public function sms_page()
 {
    return view('sms.index');
 }

 public function send_sms(Request $request)
    {
       $request->validate([
            'number' => 'required',
            'message' => 'required',
       ]);
        $receiver_number = $request->number;
        $receiver_message = 'Congratulations';
        // try{
            $account_sid = getenv('TWILIO_SID');
            $account_token = getenv("TWILIO_TOKEN");
            $twilio_number = getenv("TWILIO_FROM");

            $client = new Client($account_sid,$account_token);
            $client->message->create('+88' .$receiver_number, [
            'from' => $twilio_number,
            'body' => $receiver_message,
            ]);
           return redirect()->back();
        // } catch(Exception $e){

        // }
    }
 }


 // for whatsapp syntax 

// <?php

//  Update the path below to your autoload.php,
//  see https://getcomposer.org/doc/01-basic-usage.md
// require_once '/path/to/vendor/autoload.php';

// use Twilio\Rest\Client;

// Find your Account SID and Auth Token at twilio.com/console
// and set the environment variables. See http://twil.io/secure
// $sid = getenv("TWILIO_ACCOUNT_SID");
// $token = getenv("TWILIO_AUTH_TOKEN");
// $twilio = new Client($sid, $token);

// $message = $twilio->messages
//                   ->create("+15558675310", // to
//                            ["from" => "+15017122661", "body" => "Hi there"]
//                   );

// print($message->sid);
