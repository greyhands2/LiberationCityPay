@extends('layouts.auth')
@section('title')  Register @endsection
@section('content')

    <div class="container" style="margin-top:100px;">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card">
                    <a class="card-header" href="{{url('/')}}" align="center">
                        <img src="{{asset('/images/liberation.png')}}" style="max-width: 30%;"
                             class="d-inline-block align-top ">
                    </a>
                    <div class="card-body">
                        <h4><i class="icon-user"></i> Register
                            <hr/>
                        </h4>
                        @if($errors->any())
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <strong>Oh snap!</strong>
                                <ul>
                                    @foreach($errors->all() as $serial => $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="post" action="{{url('/register')}}">
                            @csrf
                            <div class="form-group">
                                <label class="sr-only" for="email">Name</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="icon-user"></i></div>
                                    </div>
                                    <input type="text" class="form-control" id="name" name="name"
                                           placeholder="Full name. e.g(John Doe Smith)">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="email">Email</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">@</div>
                                    </div>
                                    <input type="text" class="form-control" id="email" name="email" required
                                           placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="password">Password</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="icon-lock-filled"></i></div>
                                    </div>
                                    <input type="password" required class="form-control"
                                           id="password"
                                           name="password"
                                           v-model="loginDetails.password"
                                           placeholder="Password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="password_confirmation">Confirm Password</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="icon-lock-filled"></i></div>
                                    </div>
                                    <input type="password" required
                                           class="form-control" id="password_confirmation"
                                           name="password_confirmation"
                                           placeholder="Confirm Password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary btn-block"><i
                                            class="icon-lock-filled"></i> Sign Up
                                    </button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <a class="btn btn-outline-primary btn-block" href="{{url('/login')}}">
                                        <strong>Login <i class="icon-user"></i></strong>
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
