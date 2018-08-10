<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }} - @yield('title')</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <style>
       @media screen and  (max-width : 420px){
          .mail-view {
              max-width: 90%;
          }
       }
       @media screen and  (min-width : 421px){
           .mail-view{
               max-width: 65%;
           }
       }
    </style>


</head>
<body>

<br/>

<div class="container">
    <div class="row justify-content-center">
        <div align="center">
            <div class="mail-view ">
                <div class="card mb-3">
                    <a class="card-header" href="{{url('/')}}">
                        <img src="https://www.liberationcity.org/wp-content/uploads/2018/04/liberation-city-logo-1.png" style="max-width: 30%;" class="d-inline-block align-top ">
                    </a>
                    @yield('inline-image')
                    <div class="card-body" align="left">
                         @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('partials.footer')
</body>
@include('partials.js')
</html>
