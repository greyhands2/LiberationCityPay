
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }} - Givings</title>

    <!-- Scripts -->

    @include('partials.css')
</head>
<body>
<div class="container" style="margin-top:30px; ">
    <div class="row">
        <div class="col-lg-4 d-flex align-items-stretch">


            <div class="card">
                <img class="card-img-top" src="/images/mm.png" alt="Card image cap"/>
                <div class="card-body">
                    <h5 class="card-title">Pay Your Tithe</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                        additional content. This content is a little bit longer.</p>
                </div>
                <div class="card-footer">
                    <a v-on:click="sendUrl('/givehere/tithe')"  class="btn btn-primary"
                       style="border: 1px solid #800080; background-color: #400040;"><strong>TITHE </strong><i
                                class="icon-mail"></i></a>
                </div>
            </div>

            <div class="card">
                <img class="card-img-top" src="/images/mm.png" alt="Card image cap"/>
                <div class="card-body">
                    <h5 class="card-title">Give Your Offering</h5>
                    <p class="card-text">This card has supporting text below as a natural lead-in to additional
                        content.</p>
                </div>
                <div class="card-footer">
                    <a v-on:click="sendUrl('/givehere/offering')"  class="btn btn-primary"
                       style="border: 1px solid #800080; background-color: #400040;"><strong>OFFERING </strong><i
                                class="icon-mail"></i></a>
                </div>
            </div>
        </div>

        <div class="col-lg-4 d-flex align-items-stretch">
            <div class="card">
                <img class="card-img-top" src="/images/mm.png" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                </div>
                <div class="card-footer">
                    <a v-on:click="sendUrl('/givehere/partnership')" class="btn btn-primary" style=" border: 1px solid #800080; background-color: #400040;"><strong>PARTNERSHIP </strong><i class="icon-mail"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
z</html>
