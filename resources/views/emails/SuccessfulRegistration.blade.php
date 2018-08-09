@extends('layouts.mail')

@section('title') Registration Successful  @endsection

@section('content')
            <h5 class="card-title">Registration Successful </h5>
            <p class="card-text">Hi, {{$data['name']}}, an account has been created for you on our website, you
                can login to you account through the link below</p>
            <table class="table table-responsive">
                <tbody>
                <tr>
                    <td>Email</td>
                    <td>{{$data['email']}}</td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td>{{$data['password']}}</td>
                </tr>
                </tbody>
            </table>
            <a href="{{url('/login')}}" class="btn btn-primary">Login</a>
            <p class="card-text">
                <small class="text-muted"> With love, <cite title="Source Title">{{config('app.name')}}</cite>
                </small>
            </p>
@endsection
