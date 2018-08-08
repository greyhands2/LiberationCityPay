@extends('layouts.app')

@section('title') Payment Confirmation @endsection

@section('content')

    <style>
        @media screen and  (max-width : 420px){
            .mail-view {
                max-width: 120%;
            }
        }
        @media screen and  (min-width : 421px) and (max-width : 919px){
            .mail-view{
                max-width: 65%;
            }
        }
        @media screen and  (min-width : 920px){
            .mail-view{
                max-width: 50%;
            }
        }
    </style>
    <br/>

    <div class="container">
        <div class="row justify-content-center">
            <div align="center">
                <div class="mail-view ">
                    <div class="card mb-3">
                        @if($paymentInfo['payment_status'] == 1)
                        <div class="card-body" align="left">
                            <h5 class="card-title">{{$paymentInfo['message']}} </h5>
                            <p class="card-text">Thank you {{auth()->user()->name}}, your payment was successful.</p>
                            <table class="table table-responsive">
                                <tbody>
                                <tr>
                                    <td>Amount</td>
                                    <td>{{$data['email']}}</td>
                                </tr>
                                <tr>
                                    <td>Reference</td>
                                    <td>{{$data['password']}}</td>
                                </tr>
                                </tbody>
                            </table>
                            <p class="card-text">
                                <small class="text-muted"> With love, <cite title="Source Title">{{config('app.name')}}</cite>
                                </small>
                            </p>
                        </div>
                        @elseif($paymentInfo['payment_status' == 0])
                        <div class="card-body" align="left">
                            <h5 class="card-title">Payment Failed </h5>
                            <p class="card-text">Sorry {{auth()->user()->name}}, your payment was not successful.
                            <b>{{$paymentInfo['message']}}</b>
                            </p>

                            <table class="table table-responsive">
                                <tbody>
                                <tr>
                                    <td>Amount</td>
                                    <td>{{$data['email']}}</td>
                                </tr>
                                <tr>
                                    <td>Reference</td>
                                    <td>{{$data['password']}}</td>
                                </tr>
                                </tbody>
                            </table>
                            <p class="card-text">
                                <small class="text-muted"> With love, <cite title="Source Title">{{config('app.name')}}</cite>
                                </small>
                            </p>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection








