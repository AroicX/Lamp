@extends('layouts.app')

@section('title')
 <title>Transactions - {{Auth::User()->name}}</title>
@endsection

@section('content')

<style>
   .dashboard-container{
      height: 120px !important;
   }
   .text{
      margin-top: 30px !important;
      font-weight: 500;
      width: auto;
      text-align: center;
   }

   .card{
       width: 100%;
       position: absolute;
       height: 100% auto;
       top: 150px;
       left: 0;
       background: #fff;
      /*display: none;*/
       /*box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);*/
       border-radius: 5px;
   }
   .tab{
     margin-top: -50px;
   }
   .card-body{
      padding: 20px 20px !important;
   }
   .card-image {
    margin-left: 25%;
   }
   .card-image img{
      width: 70%;
      text-align: center;
      border-radius: 50%;
   }
   .recent-transaction{
    position: relative;
    width: auto;
    margin: 20px !important;
    background: #0C1E29;
    height: 100px  !important;;
    padding: 20px 20px !important;
    color: #fff;
    display: block;
}


.recent-transaction p{
    position: absolute;
    bottom: 0;
    left: 10px;
    margin-bottom: 10px;
}
   
</style>

<div class="dashboard-container wow slideInLeft" data-wow-delay="0.5s">
  <button class="menu"><img class="span" src="images/span.svg" alt=""></button>

  <div class="user-info">
    <p>Hi, {{Auth::user()->name}} </p><img class="user-image" src="images/user.jpg">
  </div>

     <div class="text">
        <p>My Transactions</p>
     </div>

</div>

<div class="card">
	
	    @foreach($transaction as $key => $trans)
	
	    	@if($trans->count() > 0)
				<div class="recent-transaction wow slideInRight" >

				  <img class="ts-image" src="images/user.jpg">
				  <ul>
				    <li><span>Amount</span>#{{$trans->amount}}</li>
				    <li><span>Meter Number</span>{{$trans->meter_number}}</li>
				    <li><span>Time</span>{{ $trans->created_at->diffForHumans() }}</li>
				  </ul>
					
				  <p>Your Meter Credit Code is: <b>{{$trans->mccode}}</b></p>
				</div>    
	    	
	    	@else
			
				<h2 style="color: red;">You have No Transactions</h2>
				
	    	@endif

	    @endforeach 

</div>


</div>



@endsection

