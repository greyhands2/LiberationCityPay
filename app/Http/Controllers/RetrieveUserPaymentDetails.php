<?php

namespace App\Http\Controllers;

use App\Services\CustomEmailHandler;
use App\TransactionLog;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RetrieveUserPaymentDetails extends Controller
{

    public function __construct(){
        $this->Interswitch = new \App\Services\InterswitchConfig();
    }


    public function index(Request $request){
        $data = $request->all();
        if(auth()->guest()){
            $user = User::where('email',$request->email)->first();
            if($user != null) {
                Auth::loginUsingId($user->id);
            }else{

                $password = strtoupper(str_random(6));
                $data['password'] = $password;
                $user = User::create([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'password' => bcrypt($data['password'])
                ]);
                $user->attachRole(2);
                CustomEmailHandler::successfulRegistrationEmail($data);
                Auth::loginUsingId($user->id);
            }
        }
        $user = auth()->user();
        $reference = strtoupper(str_random(8));
        $getHash = $this->Interswitch->transactionHash($reference,$data['amount']);
        $paymentInfo = [
            'hash' => $getHash,
            'product_id' => $this->Interswitch->product_id,
            'item_id' => $this->Interswitch->item_id,
            'currency' => $this->Interswitch->currency,
            'site_name' => $this->Interswitch->siteUrl,
            'redirect_url' => $this->Interswitch->redirect_url,
            'user_id' => auth()->id(),
            'user_name' => auth()->user()->name,
            'payment_type_id' => $data['giving_type'],
            'transaction_reference' => $reference,
            'amount' => $data['amount'],
            'response_code' => '--',
            'response_description' => 'pending',
            'response_full' => '',
            'action_url' => $this->Interswitch->requestActionUrl
        ];
        $saveLog = TransactionLog::create($paymentInfo);
        $sendPaymentNotification = CustomEmailHandler::PaymentNotification($data,$paymentInfo);
        if($saveLog AND $sendPaymentNotification){
            return response()->json([
                'status' => 200,
                'message' => 'Processed. Click on Pay Now',
                'data' => $paymentInfo
            ],200);
        }
            return response()->json([
                'status' => 422,
                'message' => 'Unable to process transaction',
                'data' => []
            ],422);

    }
}
