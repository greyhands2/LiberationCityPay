@extends('layouts.mail')

@section('content')

    <h5 class="card-title">Registration Successful !!!</h5>
    <blockquote class="blockquote mb-0">
        <p class="card-text">Hi, {{$user['name']}}, an account has been created for you on our website, you can login to you account through the link below</p>
        <a href="{{url('/login')}}" class="btn btn-primary">Login</a>
        <footer class="blockquote-footer">With love, <cite title="Source Title">{{config('app.name')}}</cite></footer>
    </blockquote>

@endsection
