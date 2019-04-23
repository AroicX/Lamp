<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Lamp | HOME</title>
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"> -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <!-- <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript" ></script> -->
  <script src="js/jquery.min.js" type="text/javascript" ></script>
  <script src="js/main.js" type="text/javascript" ></script>

<!-- <script src="https://use.fontawesome.com/41f567f59f.js"></script> -->

</head>
<body >

  <div class="banner">
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href="#">LAMP</a>
      <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button> 

      <style>
        .bg-dark {
      background-color: transparent !important;
      }
      </style>

      <div class="navbar-collapse collapse" id="navbarsExampleDefault" style="">
        <ul class="navbar-nav mr-auto">
          
                       @if (Route::has('login'))
               
                    @auth
                       <a href="{{'/home'}}" ><button class="btn btn-danger btn-login">HOME</button></a>

                    @else
                       <a href="{{'register'}}" ><button class="btn btn-danger btn-login">REGISTER</button></a>

                    @endauth
               
            @endif
          
        </ul>
       
      </div>
    </nav>
  </div>

  <div class="space"></div>

  <style>
    #password{
      display: none;
    }
  </style>

  @if (Route::has('login'))
  
    @auth
      <div class="container">
          <div class="row">
            <div class="col-md-6 col-sm-12 wrapper">
              <h4 class="text-white text-uppercase">Welcome {{Auth::User()->name}}</h4>
              <p class="text-white" id="errors">View your recent <a href="/transactions"><kbd>transactions</kbd></a> </p>
             
            
            </div>
          </div>
        </div>
      </div>

    @else
        <div class="container">
          <div class="row">
            <div class="col-md-6 col-sm-12 wrapper">
              <h4 class="text-white">Purchase electricity from <br>the comfort of your home</h4>
              <p class="text-white" id="errors">Enter your Email to begin</p>
              <form action="{{ route('login') }}" method="POST" id="form">
               {{csrf_field()}}
                <div class="form-group">
                  <input id="user_no" class="form-control form-custom" type="email" name="email" placeholder="Arowosegbe67@gmail.com" 
                  required="" autofocus="on" value="" title="Please enter your Phone Number">
                  <label id="labelPassword"></label>
                  <input  id="password" class="form-control form-custom" type="password" name="password"  
                  required="" value=""  title="Please enter your Password">
                </div>
                
                <br>
                <div class="form-group" id="formButton">
                <button id="continue" class="btn btn-success btn-block btn-continue">Continue</button>
                  
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

    @endauth

  @endif       



<script src="js/bootstrap.min.js"></script>
</body>
</html>