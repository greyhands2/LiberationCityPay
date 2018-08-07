<?php

namespace App\Http\Controllers;

use App\PaymentType;
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
        $this->middleware('auth');
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

}
