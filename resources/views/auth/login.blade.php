@extends('layouts.auth')
@section('title')   Login @endsection
@section('content')

    <div class="container" style="margin-top:100px;">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="col align-self-center">
                    <div class="card">
                        <a class="card-header" href="{{url('/')}}" align="center">
                            <img src="{{asset('/images/liberation.png')}}" style="max-width: 30%;"
                                 class="d-inline-block align-top ">
                        </a>
                        <div class="card-body">
                            <h4><i class="icon-user"></i> Login
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
                            <form method="post" action="{{url('/login')}}">
                                @csrf
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
                                        <input type="password" class="form-control" required
                                               id="password"
                                               name="password"
                                               placeholder="Password">
                                    </div>
                                </div>
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                    <label class="form-check-label" for="remember">Remember me</label>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-primary btn-block">Sign
                                            In <i class="icon-lock-filled"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <a class="text-justify" href="{{url('/password/reset')}}">
                                            Can't remember password ? Click here.
                                        </a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <a class="btn btn-outline-primary btn-block" href="{{url('/register')}}">
                                            <strong>Join Us <i class="icon-user"></i></strong>
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
