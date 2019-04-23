@extends('layouts.app')

@section('title')
 <title>Profile - {{Auth::User()->name}}</title>
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
       width: 90%;
       position: absolute;
       height: 100% auto;
       top: 200px;
       left: 20px;
       background: #fff;
      /*display: none;*/
       box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
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
   
</style>

<div class="dashboard-container wow slideInLeft" data-wow-delay="0.5s">
  <button class="menu"><img class="span" src="images/span.svg" alt=""></button>

  <div class="user-info">
    <p>Hi, {{Auth::user()->name}} </p><img class="user-image" src="images/user.jpg">
  </div>

     <div class="text">
        <p>My Profile</p>
     </div>

</div>

<div class="card">
  <div class="tabs">
        <div class="tab"><a href="#">Profile</a><a href="#" >Card </a></div>
       
      </div>
  
  <div class="card-body">
     <div class="card-image">
        <img src="images/user.jpg" alt="">
     </div>

     <form action="{{ route('update') }}" method="POST">

      @csrf
        <div class="form-group">
            <span>Name</span>
          <input type="text" name="name" placeholder="{{Auth::user()->name}}" required="on">
        </div>

         <div class="form-group">
            <span>Email</span>
          <input type="text" name="email" placeholder="{{Auth::user()->email}}" required="on">
          <input type="hidden" name="action" value="update">
        </div> 

        <div class="form-group">
            <span>Mobile No</span>
          <input type="text" name="mobile" placeholder="{{Auth::user()->mobile}}" required="on">
        </div> 

        <p>Password:</p>
        <div class="form-group">
            <span>Password</span>
          <input type="password" name="password" value="{{Auth::user()->password}}" required="on">
        </div>

          <button  class="btn-payment">Update Profile</button>
        
     </form>


  </div>


</div>

@endsection

