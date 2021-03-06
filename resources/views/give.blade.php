@extends('layouts.app')

@section('title') Give @endsection

@section('content')
    {{-- NOTE!!!! this view recieves all its data from the DirectToRightPageController  --}}



    <div id="app">

        <div class="container sci" style=" margin-top:30px; ">
            <div class="row">
                <div class="col align-self-center">

                    <div class="card">

                        @if(auth()->guest())
                            <div id="header" class=" card-header center">Give as a Guest</div>
                        @elseif(auth()->user())
                            <div id="header" class=" card-header center">Welcome back {{auth()->user()->name}}</div>
                        @endif

                        <div class="card-body">

                            <form id="myForm" method="post" name="form1" action="">
                                @csrf
                                <div id="holder">

                                    @if(auth()->guest())
                                        <div class="form-group">
                                            <label class="sr-only" for="email">Name</label>
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="icon-user"></i></div>
                                                </div>
                                                <input type="text" class="form-control" id="name" name="name"

                                                       placeholder="Full name. e.g(John Doe Smith)" required>


                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="sr-only" for="email">Email</label>
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">@</div>
                                                </div>
                                                <input type="text" class="form-control" id="email" name="email"

                                                       placeholder="Email" required>


                                            </div>
                                        </div>
                                    @elseif(auth()->user())
                                        <div class="form-group">
                                            <label class="sr-only" for="email">Name</label>
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="icon-user"></i></div>
                                                </div>
                                                <input type="text" class="form-control" id="name" name="name" disabled

                                                       value="{{auth()->user()->name}}" required>


                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="sr-only" for="email">Email</label>
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">@</div>
                                                </div>
                                                <input type="text" class="form-control" id="email" name="email" disabled

                                                       value="{{auth()->user()->email}}" required>


                                            </div>
                                        </div>
                                    @endif


                                    <div class="form-group">
                                        <label class="sr-only" for="email">Amount</label>
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="icon-dollar"></i></div>
                                            </div>
                                            <input type="number" class="form-control" id="amount1" name="amount"

                                                   placeholder="Amount e.g 500" required>


                                        </div>
                                    </div>
                                </div>

                                <!-- REQUIRED HIDDEN FIELDS -->
                                <!-- <input name="email" id="email" type="text" class="" placeholder="" required> -->
                                <input name="product_id" id="product_id" type="hidden"
                                       value=""/>
                                <input name="pay_item_id" id="pay_item_id" type="hidden"
                                       value=""/>
                                <input name="amount" id="amount" type="hidden" value=""/>
                                <input name="currency" id="currency" type="hidden"
                                       value=""/>
                                <input name="site_redirect_url" id="site_redirect_url" type="hidden"
                                       value=""/>
                                <input name="txn_ref" type="hidden" id="txn_ref"
                                       value=""/>
                                <input name="cust_id" type="hidden" id="cust_id" value=""/>
                                <input name="site_name" type="hidden" id="site_name"
                                       value=""/>
                                <input name="cust_name" type="hidden" id="cust_name" value=""/>
                                <input name="hash" type="hidden" id="hash" value=""/>
                                <input name="giving_type" type="hidden" id="giving_type"
                                       value="{{$page_content_determiner}}"/>
                                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                                <div class="row no-gutters">
                                    <div class="col-12 col-sm-6 col-md-8 ">
                                        <div class="form-group row">
                                            <div class="col-sm-10">
                                                <input type="button" id="submit" value="Process"
                                                       style="width:90px; border: 1px solid #fff; background-color: #400040;"
                                                       class="btn btn-primary ">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>


                        <div class=" card-footer center container">
                            <div id="row">
                                <div id="feedback" class="col-sm" style="font-weight:bold; color:orange;">
                                </div>
                                <div class="col-sm">
                                    <div class="form-group row"><img class="img-thumbnail" src="/images/pay.png"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    </div>
@endsection






