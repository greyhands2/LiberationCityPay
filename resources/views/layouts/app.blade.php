<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" type="image/x-icon" href="https://www.liberationcity.org/wp-content/uploads/2018/04/glc-fav.png"/>
    <title>{{ config('app.name') }} - @yield('title')</title>
@include('partials.css')
    @yield('css')

<!-- Scripts -->


</head>
<body>

@include('partials.header')

@yield('content')

@include('partials.footer')
</body>

@include('partials.js')
@yield('javascript')
</html>
