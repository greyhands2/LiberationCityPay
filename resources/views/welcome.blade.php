@extends('layouts.app')

@section('title')  Welcome ot Liberation City @endsection


@section('content')

<div >
   <div class="container" style="margin-top:30px; ">
      <div class="row">
         <div class="col-lg-4 d-flex align-items-stretch">


            <div class="card">
               <div class="card-header" align="center">
                  <a href="/givehere/tithe"  class="btn btn-primary"
                     style="border: 1px solid #800080; background-color: #400040;"><strong>PAY TITHE </strong><i
                             class="icon-mail"></i></a>
               </div>
               <img class="card-img-top img-fluid d-sm-none d-none d-sm-block d-md-none d-lg-block" src="/images/tite.jpg" alt="Card image cap" style="height:250px;"/>
               <div class="card-body" style="padding:10px;">
                  <h5 class="card-title"><b>Pay Your Tithe</b></h5>
                  <p class="card-text">Malachi 3:10 :  Bring ye all the tithes into the storehouse, that there may be meat in mine house, and prove me now herewith, saith the Lord of hosts, if I will not open you the windows of heaven, and pour you out a blessing, that there shall not be room enough to receive it</p>
               </div>

            </div>


         </div>

         <div  class="col-lg-4 d-flex align-items-stretch" >

            <div class="card">
               <div class="card-header" align="center">
                  <a href="/givehere/offering"  class="btn btn-primary"
                     style="border: 1px solid #800080; background-color: #400040;"><strong>PAY OFFERING </strong><i
                             class="icon-mail"></i></a>
               </div>
               <img class="card-img-top img-fluid d-sm-none d-none d-sm-block d-md-none d-lg-block" src="/images/offer.jpg" alt="Card image cap"  style="height:250px;"/>
               <div class="card-body" style="padding:10px;">
                  <h5 class="card-title"><b>Give Your Offering</b></h5>
                  <p class="card-text">2 COR 9:7 : Each one must give as he has decided in his heart, not reluctantly or under compulsion, for God loves a cheerful giver.</p>
               </div>

            </div>



         </div>





         <div class="col-lg-4 d-flex align-items-stretch" >
            <div class="card">
               <div class="card-header" align="center">
                  <a href="/givehere/partnership"  class="btn btn-primary"
                     style="border: 1px solid #800080; background-color: #400040;"><strong>PAY PARTNERSHIP </strong><i
                             class="icon-mail"></i></a>
               </div>
               <img class="card-img-top img-fluid d-sm-none d-none d-sm-block d-md-none d-lg-block" src="/images/par.jpg" alt="Card image cap" style="height:250px;">
               <div class="card-body" style="padding:10px;>
                  <h5 class="card-title"><b>PARTNERSHIP</b></h5>
                  <p class="card-text">PHIL 1:4-6:In all my prayers for all of you, I always pray with joy 5 because of your partnership in the gospel from the first day until now.</p>
               </div>

            </div>
         </div>
      </div>
   </div>

</div>

@endsection

