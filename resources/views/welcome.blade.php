@extends('layouts.app')
@include('partials.css')
@include('partials.header')
@section('content')
<div >

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
                  <a href="/givehere/tithe"  class="btn btn-primary"
                     style="border: 1px solid #800080; background-color: #400040;"><strong>TITHE </strong><i
                             class="icon-mail"></i></a>
               </div>
            </div>


         </div>

         <div  class="col-lg-4 d-flex align-items-stretch" >

            <div class="card">
               <img class="card-img-top" src="/images/mm.png" alt="Card image cap"/>
               <div class="card-body">
                  <h5 class="card-title">Give Your Offering</h5>
                  <p class="card-text">This card has supporting text below as a natural lead-in to additional
                     content.</p>
               </div>
               <div class="card-footer">
                  <a href="/givehere/offering"  class="btn btn-primary"
                     style="border: 1px solid #800080; background-color: #400040;"><strong>OFFERING </strong><i
                             class="icon-mail"></i></a>
               </div>
            </div>



         </div>





         <div class="col-lg-4 d-flex align-items-stretch" >
            <div class="card">
               <img class="card-img-top" src="/images/mm.png" alt="Card image cap">
               <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
               </div>
               <div class="card-footer">
                  <a href="/givehere/partnership" class="btn btn-primary" style=" border: 1px solid #800080; background-color: #400040;"><strong>PARTNERSHIP </strong><i class="icon-mail"></i></a>
               </div>
            </div>
         </div>
      </div>
   </div>

</div>
   @include('partials.footer')
@endsection
