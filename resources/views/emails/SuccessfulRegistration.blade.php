@extends('layouts.mail')

@section('title') Registration Successful  @endsection

@section('content')
            <h5 class="card-title">Registration Successful </h5>
            <p class="card-text">Hi, {{$user['name']}}, an account has been created for you on our website, you
                can login to you account through the link below</p>
            <a href="{{url('/login')}}" class="btn btn-primary">Login</a>
            <p class="card-text">
                <small class="text-muted"> With love, <cite title="Source Title">{{config('app.name')}}</cite>
                </small>
            </p>
@endsection
