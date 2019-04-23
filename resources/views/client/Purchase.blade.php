@extends('layouts.app')

@section('title')
 <title>Purchase Power</title>
@endsection

@section('style')
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
<link href="{{ asset('css/media.css') }}" rel="stylesheet">
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-9">
            <ul class="progressbar">
                <li class="active"><a href="#step1">Order Electricity</a></li>
                <li><a href="#step2">Review Order</a></li>
                <li><a href="#step3">Complete Payment</a></li>
               
            </ul>
 
        <section>
              
                {{csrf_field()}}
                <div class="form-group">
                    <label for="meter_num">Meter Number</label>
                    <input class="form-control" type="text" name="meter_num" required="on">
                </div>
                <div class="form-group">
                    <label for="phone_num">Phone Number</label>
                    <input class="form-control" type="text" name="phone_num" required="on">
                </div>
                <div class="form-group">
                    <label for="amount">How much electricity do you want to buy?</label>
                    <input class="form-control" type="text" name="amount" required="on">
                </div>   
                <div class="form-group">
                    <label for="amount">Payment Type</label>
                    <select class="form-control" name="payment_type" id="myselect" required="on">
                        <option value="master_card">Master Card / Visa Card</option>
                        <option value="verve_card">Verve Card </option>
                        <option value="ussd_trn">Ussd Transfer</option>
                    </select>
                </div>
               
                
                    <button  class="btn btn-success next">Contiune with Payment Information</button>
                

        
           
        </section>

        
        <section>
            <h2>Review Details</h2>
            <div class="card">
                <li>Meter Number: <b id="meter"></b></li>
                <li>Phone Number: <b id="phone"></b></li>
                <li>Amount: <b id="amount"></b></li>
                <li>Payment Type: <b id="payment" class="text-uppercase"></b></li>
            </div>
            <br>
            <button  class="btn btn-success prev">Edit Information</button>
            <button  class="btn btn-success next">Next</button>
        </section>

        <section>
            <h2>Complete Payment <b id="code"></b></h2>
            <button  class="btn btn-warning prev btn-sm close">Go back </button>

           
            <p>Please Enter your mail address to complete payment:</p>
                <div class="form-group">
                    <input type="text" name="email" class="form-control">
                    <br>
                  
                </div>
                <div class="checkbox">
                    <label><input type="checkbox"> Agree to terms and coondition</label>
                  </div>
            <br>
            
            <button  class="btn btn-success done">Next</button>
    
            <button  class="btn btn-success" id="stripe_button" >Make Payment</button>
        </section>
   
            
        </div>

        <div class="col-md-2"></div>

    </div>
</div>


@endsection

@section('script')
<script>
$(document).ready(function() {
    
    $('input[name=phone_num]').keypress(function(e) {
          var charCode = (e.which) ? e.which : event.keyCode;
             if (charCode != 46 && charCode > 31 
               && (charCode < 48 || charCode > 57))
                return false;

             return true;
       });   
    $('input[name=meter_num]').keypress(function(e) {
          var charCode = (e.which) ? e.which : event.keyCode;
             if (charCode != 46 && charCode > 31 
               && (charCode < 48 || charCode > 57))
                return false;

             return true;
       });   

    $('input[name=amount]').keypress(function(e) {
          var charCode = (e.which) ? e.which : event.keyCode;
             if (charCode != 46 && charCode > 31 
               && (charCode < 48 || charCode > 57))
                return false;

             return true;
       });    
 
});

</script>
<script src="{{ asset('js/wizard.js') }}" defer></script>
 <script src="https://checkout.stripe.com/checkout.js"></script>
@endsection
