@extends('layouts.mail')

@section('title')  Payment Notification  @endsection

@section('content')

    <h5 class="card-title">Payment Notification</h5>
    <p class="card-text">Hi, {{$user['name']}}. You are about to make payment on our website. Below are the transaction details</p>
    <table class="table table-responsive">
        <thead>
        </thead>
        <tbody>
        <tr>
            <td>Reference</td>
            <td>{{$data['transaction_reference']}}</td>
        </tr>
        <tr>
            <td>Amount</td>
            <td>&#x20a6; {{number_format(($data['amount'] / 100),2)}}</td>
        </tr>
        </tbody>
    </table>
@endsection
