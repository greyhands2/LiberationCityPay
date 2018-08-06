@extends('layouts.auth')
@section('title')   Login @endsection
@section('content')

    <div class="container sci " style=" margin-top:30px; ">
        <div class="row justify-content-center">
            <div class="col align-self-center">
                <div class="card">
                    <div class=" card-header center">Login</div>
                    <div class="card-body">
                        <form method="post" action="{{url('/login')}}">
                            @csrf
                            <div class="form-group row">
                                <label class="sr-only" for="email">Email</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">@</div>
                                    </div>
                                    <input type="text" class="form-control" id="email" name="email"
                                           placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="sr-only" for="password">Password</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="icon-lock-filled"></i></div>
                                    </div>
                                    <input type="password" class="form-control"
                                           id="password"
                                           name="password"
                                           placeholder="Password">
                                </div>
                            </div>
                            <div class="form-check" style="border-left:4px;">
                                <input class="form-check-input" type="checkbox"
                                       id="remember" name="remember">
                                <label class="form-check-label" for="remember">
                                    Remember me
                                </label>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Sign
                                        In
                                    </button>
                                </div>
                            </div>
                            <a class="btn btn-link" href="">
                                Forgot Your Password?
                            </a>
                            <a class="btn btn-link" href="/register">
                                <strong>REGISTER</strong>
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
