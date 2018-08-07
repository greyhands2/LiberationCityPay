@extends('layouts.mail')

@section('title')  Payment Failed  @endsection

@section('content')

    <h5 class="card-title text-danger">Payment Failed</h5>
    <p class="card-text">Sorry, {{$user['name']}}. You attempt to make payment failed, the reason is giving below.</p>
    <table class="table table-responsive">
        <tbody>
        <tr>
            <td>Reference</td>
            <td>{{$data['transaction_reference']}}</td>
        </tr>
        <tr>
            <td>Amount</td>
            <td>&#x20a6; {{number_format(($data['amount'] / 100),2)}}</td>
        </tr>
        <tr>
            <td>Description</td>
            <td>{{$data['response_description']}}</td>
        </tr>
        <tr>
            <td>Date/Time</td>
            <td>{{date('d, D, M Y G:i A',strtotime($data['created_at']))}}</td>
        </tr>
        </tbody>
    </table>

@endsection
