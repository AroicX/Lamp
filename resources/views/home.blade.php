@extends('layouts.app')

@section('title')
  <title>{{ config('app.name', 'Laravel') }}</title>
@endsection

@section('content')
<div class="container mx-auto">
      <div class="dashboard-container wow slideInLeft" data-wow-delay="0.5s">
        <button class="menu"><img class="span" src="images/span.svg" alt=""></button>

        <div class="user-info">
          <p>Hi, {{Auth::user()->name}} </p><img class="user-image" src="images/user.jpg">
        </div>

        <div class="user-details">
            <p >Welcome back</p>
            <p ><b>{{Auth::user()->name}}</b> your last login was</p>
            <h1>19:00 <span>PM</span></h1>
            <div class="user-time">
              14th Jan, 2019
            </div>

        </div>

      </div>
      <div class="new-transaction wow slideInDown" data-wow-delay="0.8s">
       <button class="button-new">New Transactions</button>

       <div class="common-link">
         <a href="{{ url('/profile') }}" class="quick"><img src="images/user.svg" alt=""></a>
         <a href="{{ url('/transactions') }}" class="quick"><img src="images/wallet.svg" alt=""></a>
         <a href="{{ url('/transactions') }}" class="quick"><img src="images/credit-cards-payment-1.svg" alt=""></a>
       </div>
      </div>

      <div class="recent wow bounceIn" data-wow-delay="1s">
        <p>Recent Transaction</p>

    
        @foreach($transactions as $key => $transaction)
        @if($transaction->count() > 0)
          <div class="recent-transaction wow slideInRight" >

            <img class="ts-image" src="images/user.jpg">
            <ul>
              <li><span>Amount</span>#{{$transaction->amount}}</li>
              <li><span>Meter Number</span>{{$transaction->meter_number}}</li>
              <li><span>Time</span>{{ $transaction->created_at->diffForHumans() }}</li>
            </ul>
          </div> 
        @else
          <p>You Have No Recent Transactions</p>
        @endif 
        @endforeach

        

      </div>
   </div>





   <div class="modal-nav wow bouneIn" data-wow-delay="2s">
    <button class="close">Close</button>
  
      <form id="trans-form" action="" method="POST">
          <p>New Transactions</p>
      {{csrf_field()}}
        <div class="form-group">
            <span>Meter Number</span>
          <input type="text" name="meter_num" placeholder="001234567890" required="on">
        </div>

        <div class="form-group">
            <span>Amount</span>
          <input type="text" name="amount" placeholder="#5,0000" required="on">
        </div>
      <p>Payment Method</p>

      <div class="tabs">
        <div class="tab"><a href="#">Card</a><a href="#" >Bank</a></div>
       
      </div>
       
       <div class="form-group">
           <span>Card Number</span>
         <input type="text" name="card_num" placeholder="5555-5555-5555-4444" required="on">
       </div>

       <div class="form-group">
           <span>CVC</span>
         <input type="text" name="cvc" placeholder="232" required="on">
       </div>

       <div class="form-group">
           <span>Card Expiration</span>
         <input type="text" name="card-expiration" placeholder="02/21" required="on">
       </div>

       
         <button id="proceed" class="btn-payment"><img src="images/credit-cards-payment-1.svg" alt=""> &nbsp; Proceed to Payment</button>
        
      </form>

      <section>
        <p  id="code-span">Your Transaction code is: <span id="code"></span> </p>
         <button id="stripe_button" class="btn-payment">Pay with Stripe</button>

      </section>
   </div>

   
 <script src="https://checkout.stripe.com/checkout.js"></script>
 <script scr="js/custom.js"></script>
@endsection
