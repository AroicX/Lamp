<?php

namespace App\Http\Controllers;
use App\Transactions;
// use GuzzleHttp\Client;
// use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Request;

class SmsController extends Controller
{
     private $SMS_SENDER = "Sample";
        private $RESPONSE_TYPE = 'json';
        private $SMS_USERNAME = 'john@yopmail.com';
        private $SMS_PASSWORD = '_Arowosegbe1';
        public function getUserNumber(Request $request)
        {
            $code = $request->input('code');
            $getTC = Transactions::where('code', $code)->first();
            $phone_number = $getTC->phone_number;
           
            $message = "A message has been sent to you";
            $this->initiateSmsActivation($phone_number, $message);
    //        $this->initiateSmsGuzzle($phone_number, $message);
            return response()->json('Confirmation sms sent....');
        }
        public function initiateSmsActivation($phone_number, $message){
            $basic  = new \Nexmo\Client\Credentials\Basic('f4a866c3', 'Yee7yI6i6nALmiXI');
            $client = new \Nexmo\Client($basic);

            $message = $client->message()->send([
                'to' => $phone_number,
                'from' => $this->SMS_USERNAME,
                'text' => $message
            ]);

        }
        public function initiateSmsGuzzle($phone_number, $message)
        {
            // $client = new Client();
            // $response = $client->post('http://portal.bulksmsnigeria.net/api/?', [
            //     'verify'    =>  false,
            //     'form_params' => [
            //         'username' => $this->SMS_USERNAME,
            //         'password' => $this->SMS_PASSWORD,
            //         'message' => $message,
            //         'sender' => $this->SMS_SENDER,
            //         'mobiles' => $phone_number,
            //     ],
            // ]);



            $basic  = new \Nexmo\Client\Credentials\Basic('f4a866c3', 'Yee7yI6i6nALmiXI');
            $client = new \Nexmo\Client($basic);

            $message = $client->message()->send([
                'to' => $phone_number,
                'from' => $this->SMS_USERNAME,
                'text' => $message
            ]);

            $response = json_decode($response->getBody(), true);
        }
}

