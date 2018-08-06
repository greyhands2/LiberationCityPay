@extends('layouts.app')

@section('content')
    <div id="app">
        <Myheader></Myheader>
        <router-view></router-view>
        <MyFooter></MyFooter>
    </div>
@endsection
