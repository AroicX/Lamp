<?php

namespace App\Http\Controllers;

use App\Transactions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionsController extends Controller
{

	public function  generatePin($length) {
	   $key = '';
	   $keys = array_merge(range(0, 9));
	  for ($i = 0; $i < $length; $i++) {
	        $key .= $keys[array_rand($keys)];
	    }
	     return $key;
	}

   public function makePurchase(Request $request)
   {

     // return $request->all();
     
      $code = $this->generatePin(6);
      $transaction = new Transactions();
      $transaction->user_id = Auth::user()->id;
      $transaction->meter_number =  $request->meter;
      $transaction->mccode = 'none';
      $transaction->amount = $request->amount;
      $transaction->card = $request->card_num;
      $transaction->cvc = $request->cvc;
      $transaction->card_expiration = $request->expiration;
      $transaction->code = $code;


      $transaction->save();


   return response()->json($code);
   }

   public function Payment(Request $request) {

   	$code = $request->code;
      // $code = $this->generatePin(6);

 
   	$stripeCharge = $request->token;
   	 $meter = $request->meter;
       $data = array('completed' => 1,
         'mccode' => $this->generatePin(12));
   	
   	 
       Transactions::where('code', $code)->update($data);
   	 // Transactions::where('code', $code)->update($data);
   	 // Transactions::where('code', $code)->update($transaction->stripe = $request->token);
   	 //return response()->json($stripeCharge);
   	return $stripeCharge;
   
   }

   
}
