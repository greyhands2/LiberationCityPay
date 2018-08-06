@extends('layouts.app')
@include('partials.css')
@include('header')
@section('content')
    {{-- NOTE!!!! this view recieves all its data from the DirectToRightPageController  --}}
    @php(session_start())
@php($variableName = session('payload'))
{{$variableName}}
    <div id="app">

        {{--{{$_SESSION['payload'] = $aray_from_wildcard['arr']['serialized_obj']}}--}}

        <div class="container sci" style=" margin-top:30px; ">
            <div class="row">
                <div class="col align-self-center">

                    <div class="card" >
                        <div class=" card-header center"><strong>Your Transaction Results</strong></div>

                        <div class="card-body" >


                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

    @include('footer')
    </div>
@endsection








