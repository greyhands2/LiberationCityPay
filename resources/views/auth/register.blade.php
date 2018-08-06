@extends('layouts.auth')
@section('title')  Register @endsection
@section('content')

    <div class="container sci " style=" margin-top:30px; ">
        <div class="row justify-content-center">
            <div class="col align-self-center">
                <div class="card">
                    <div class=" card-header center">Register</div>
                    <div class="card-body">
                        <form method="post" action="{{url('/register')}}">
                            <div class="form-group row">
                                <label class="sr-only" for="email">Name</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="icon-user"></i></div>
                                    </div>
                                    <input type="text" class="form-control" id="name" name="name"
                                           placeholder="Full name. e.g(John Doe Smith)">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="sr-only" for="email">Email</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">@</div>
                                    </div>
                                    <input type="text" class="form-control" id="email" name="email" required
                                           placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group row">
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
                            <div class="form-group row">
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
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Sign Up
                                    </button>
                                </div>
                            </div>
                            <a class="btn btn-link" href="{{url('/login')}}">
                                <strong>Login</strong>
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
