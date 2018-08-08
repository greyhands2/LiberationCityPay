<?php

namespace App\Http\Controllers;

use App\PaymentType;
use App\Services\CustomEmailHandler;
use App\TransactionLog;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->InterswitchConfig = new \App\Services\InterswitchConfig();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return view('home');
    }

    public function transactionLogs(){

        $allTransactions = TransactionLog::orderBy('id','desc')
            ->with('user')
            ->get();
        $allSuccessfulTransactionsAmount = TransactionLog::where('response_code',"00")
            ->sum('amount');
        $allSuccessfulTitheTransactionsAmount = TransactionLog::where('response_code',"00")
            ->where('payment_type_id', 1)
            ->sum('amount');
        $allSuccessfulOfferingTransactionsAmount = TransactionLog::where('response_code',"00")
            ->where('payment_type_id', 2)
            ->sum('amount');
        $allSuccessfulPartnersTransactionsAmount = TransactionLog::where('response_code',"00")
            ->where('payment_type_id', 3)
            ->sum('amount');
        $allUserTransactions = TransactionLog::where('user_id', auth()->id())
            ->with('user')
            ->orderBy('id','desc')
            ->get();
        $allUserSuccessfulTransactionsAmount = TransactionLog::where('user_id',auth()->id())->where('response_code',"00")
            ->sum('amount');
        $allUserSuccessfulTitheTransactionsAmount = TransactionLog::where('user_id',auth()->id())->where('response_code',"00")
            ->where('payment_type_id', 1)
            ->sum('amount');
        $allUserSuccessfulOfferingTransactionsAmount = TransactionLog::where('user_id',auth()->id())->where('response_code',"00")
            ->where('payment_type_id', 2)
            ->sum('amount');
        $allUserSuccessfulPartnersTransactionsAmount = TransactionLog::where('user_id',auth()->id())->where('response_code',"00")
            ->where('payment_type_id', 3)
            ->sum('amount');

        $paymentTypes = PaymentType::all();

        return view('transaction_logs',compact('allTransactions','allSuccessfulTransactionsAmount','allUserTransactions','allUserSuccessfulTransactionsAmount','paymentTypes','allSuccessfulTitheTransactionsAmount','allSuccessfulOfferingTransactionsAmount','allSuccessfulPartnersTransactionsAmount','allUserSuccessfulOfferingTransactionsAmount','allUserSuccessfulPartnersTransactionsAmount','allUserSuccessfulTitheTransactionsAmount'));

    }

    public function members(){

        $members = User::orderBy('id',desc)
            ->get();

        return view('members',compact('members'));

    }

    public function paymentConfirmation(Request $r){
        dd($r,$_POST);
            $response = $this->InterswitchConfig->requery($r->txnref,$r->amount);
            if($response['responseCode'] == '00' || $response['responseCode'] == '11' || $response['responseCode'] == '10'){
                $paymentInfo  = [
                    'status'  => 1,
                    'message' => $response['responseDescription'],
                    'amount' => $response['amount'],
                    'reference' => $response['reference']
                ];

                $paymentData = TransactionLog::where('transaction_reference',$response['reference'])->first();
                $paymentData->response_code        = $response['responseCode'];
                $paymentData->response_description = $response['responseDescription'];
                $paymentData->response_full        = $response['responseFull'];
                $paymentData->update();
                CustomEmailHandler::PaymentSuccessful(auth()->user(),$paymentData);

            }
            else{
                $paymentInfo  = [
                    'status'  => 0,
                    'message' => $response['responseDescription'],
                    'amount' => $response['amount'],
                    'reference' => $response['reference']
                ];

                $paymentData = TransactionLog::where('reference',$response['reference'])->first();
                $paymentData->response_code        = $response['responseCode'];
                $paymentData->response_description = $response['responseDescription'];
                $paymentData->response_full        = $response['responseFull'];
                $paymentData->update();

                CustomEmailHandler::PaymentFailed(auth()->user(),$paymentData);

            }
            session()->put('paymentInfo',$paymentInfo);
           redirect(url('/payment-confirmation'));
    }

    public function paymentConfirmationPage(){
        $paymentInfo = session()->get('paymentInfo');
        return view('transaction_result',compact('paymentInfo'));
    }

    public function requery(){

    }


}
