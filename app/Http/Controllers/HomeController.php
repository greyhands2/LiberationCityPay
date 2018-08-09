<?php

namespace App\Http\Controllers;

use App\Mail\PaymentFailed;
use App\Mail\PaymentSuccessful;
use App\PaymentType;
use App\Services\CustomEmailHandler;
use App\TransactionLog;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
    public function index()
    {
        return view('home');
    }

    public function transactionLogs()
    {

        $allTransactions = TransactionLog::orderBy('id', 'desc')
            ->with('user')
            ->get();
        $allSuccessfulTransactionsAmount = TransactionLog::where('response_code', "00")
            ->sum('amount');
        $allSuccessfulTitheTransactionsAmount = TransactionLog::where('response_code', "00")
            ->where('payment_type_id', 1)
            ->sum('amount');
        $allSuccessfulOfferingTransactionsAmount = TransactionLog::where('response_code', "00")
            ->where('payment_type_id', 2)
            ->sum('amount');
        $allSuccessfulPartnersTransactionsAmount = TransactionLog::where('response_code', "00")
            ->where('payment_type_id', 3)
            ->sum('amount');
        $allUserTransactions = TransactionLog::where('user_id', auth()->id())
            ->with('user')
            ->orderBy('id', 'desc')
            ->get();
        $allUserSuccessfulTransactionsAmount = TransactionLog::where('user_id', auth()->id())->where('response_code', "00")
            ->sum('amount');
        $allUserSuccessfulTitheTransactionsAmount = TransactionLog::where('user_id', auth()->id())->where('response_code', "00")
            ->where('payment_type_id', 1)
            ->sum('amount');
        $allUserSuccessfulOfferingTransactionsAmount = TransactionLog::where('user_id', auth()->id())->where('response_code', "00")
            ->where('payment_type_id', 2)
            ->sum('amount');
        $allUserSuccessfulPartnersTransactionsAmount = TransactionLog::where('user_id', auth()->id())->where('response_code', "00")
            ->where('payment_type_id', 3)
            ->sum('amount');

        $paymentTypes = PaymentType::all();

        return view('transaction_logs', compact('allTransactions', 'allSuccessfulTransactionsAmount', 'allUserTransactions', 'allUserSuccessfulTransactionsAmount', 'paymentTypes', 'allSuccessfulTitheTransactionsAmount', 'allSuccessfulOfferingTransactionsAmount', 'allSuccessfulPartnersTransactionsAmount', 'allUserSuccessfulOfferingTransactionsAmount', 'allUserSuccessfulPartnersTransactionsAmount', 'allUserSuccessfulTitheTransactionsAmount'));

    }

    public function members()
    {

        $members = User::orderBy('id', desc)
            ->get();

        return view('members', compact('members'));

    }

    public function paymentConfirmation(Request $r)
    {
        if (!isset($r->txnref) || is_null($r->txnref)) {
            $paymentInfo = [
                'status' => 101,
                'message' => $r->desc,
                'amount' => '0000',
                'reference' => '0000'
            ];
        }
        else {
            $response = $this->InterswitchConfig->requery($r->txnref, $r->amount);
            if ($response['response_code'] == '00' || $response['response_code'] == '11' || $response['response_code'] == '10') {
                $paymentInfo = [
                    'status' => 1,
                    'message' => $response['response_description'],
                    'amount' => $response['amount'],
                    'reference' => $response['reference']
                ];

                $paymentData = TransactionLog::where('transaction_reference', $response['reference'])->first();
                $paymentData->response_code = $response['response_code'];
                $paymentData->response_description = $response['response_description'];
                $paymentData->response_full = $response['response_full'];
                $paymentData->update();
                CustomEmailHandler::PaymentSuccessful(auth()->user(), $paymentData);

            }
            else {
                $paymentInfo = [
                    'status' => 0,
                    'message' => $response['response_description'],
                    'amount' => $response['amount'],
                    'reference' => $response['reference']
                ];

                $paymentData = TransactionLog::where('transaction_reference', $response['reference'])->first();
                $paymentData->response_code = $response['response_code'];
                $paymentData->response_description = $response['response_description'];
                $paymentData->response_full = $response['response_full'];
                $paymentData->update();
                CustomEmailHandler::PaymentFailed(auth()->user(), $paymentData);

            }
        }
        session()->put('paymentInfo', $paymentInfo);
        return redirect(url('/payment-confirmation'));
    }

    public function paymentConfirmationPage()
    {
        $paymentInfo = session()->get('paymentInfo');
        $data = TransactionLog::where('transaction_reference',$paymentInfo['reference'])->first();
        return view('transaction_result', compact('paymentInfo','data'));
    }

    public function requery($id)
    {
        $payment = TransactionLog::find($id);
        $response = $this->InterswitchConfig->requery($payment->transaction_reference, $payment->amount);
        if ($response['response_code'] == '--') {
            return response()->json([
                'status' => 422,
                'message' => 'Requery failed, bad internet connection',
                'data' => ''
            ], 422);
        }
        $paymentData = TransactionLog::where('transaction_reference', $response['reference'])->first();
        $paymentData->response_code = $response['response_code'];
        $paymentData->response_description = $response['response_description'];
        $paymentData->response_full = $response['response_full'];
        $paymentData->update();

        return response()->json([
            'status' => 200,
            'message' => 'Requery successful',
            'data' => $paymentData
        ], 200);

    }


}
