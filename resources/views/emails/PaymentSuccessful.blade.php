@extends('layouts.mail')

@section('title')  Payment Successful  @endsection


@section('content')

    <h5 class="card-title text-success">Payment Successful </h5>
    <p class="card-text">Thank you {{$user['name']}}, your payment was made successfully.</p>
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
