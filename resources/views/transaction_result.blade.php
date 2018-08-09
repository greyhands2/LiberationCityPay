@extends('layouts.app')

@section('title') Payment Confirmation @endsection

@section('content')

    <style>
        @media screen and  (max-width : 420px){
            .mail-view {
                max-width: 90%;
            }
        }
        @media screen and  (min-width : 421px){
            .mail-view{
                max-width: 65%;
            }
        }
    </style>
    <br/>

    <div class="container">
        <div class="row justify-content-center">
            <div align="center">
                <div class="mail-view ">
                    <div class="card mb-3">
                        @if($paymentInfo['status'] == 1)
                        <div class="card-body bg-success text-white" align="left">
                            <h5 class="card-title"><i class="icon-check"></i> {{$paymentInfo['message']}} </h5>
                            <p class="card-text">Thank you {{auth()->user()->name}}, your payment was successful.</p>
                            <table class="table table-responsive">
                                <tbody>
                                <tr>
                                    <td>Amount</td>
                                    <td>{{number_format($data['amount']/100,2)}}</td>
                                </tr>
                                <tr>
                                    <td>Reference</td>
                                    <td>{{$data['transaction_reference']}}</td>
                                </tr>
                                </tbody>
                            </table>
                            <p class="card-text" style="color:black;">
                                <small class="text-black"> With love, <cite title="Source Title">{{config('app.name')}}</cite>
                                </small>
                            </p>
                        </div>

                        @elseif($paymentInfo['status'] == 0)
                        <div class="card-body bg-danger text-white" align="left">
                            <h5 class="card-title"><i class="icon-cancel"></i> Payment Failed </h5>
                            <p class="card-text">Sorry {{auth()->user()->name}}, your payment was not successful.<br/>
                            <b>Reason : {{$paymentInfo['message']}}</b>
                            </p>

                            <table class="table table-responsive">
                                <tbody>
                                <tr>
                                    <td>Amount</td>
                                    <td>{{number_format($data['amount']/100,2)}}</td>
                                </tr>
                                <tr>
                                    <td>Reference</td>
                                    <td>{{$data['transaction_reference']}}</td>
                                </tr>
                                </tbody>
                            </table>
                            <p class="card-text"  style="color:black;">
                                <small class="text-black"> With love, <cite title="Source Title">{{config('app.name')}}</cite>
                                </small>
                            </p>
                        </div>
                            @else
                            <div class="card-body bg-danger text-white" align="left">
                            <h5 class="card-title ">Payment Failed </h5>
                            <p class="card-text">Sorry {{auth()->user()->name}}, your payment was not successful.<br/>
                                <b>Reason : {{$paymentInfo['message']}}</b>
                            </p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection








