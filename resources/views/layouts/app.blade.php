<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('title')
   

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/jquery.min.js') }}" defer></script>
    <script src="{{ asset('js/bootstrap.min.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
    <script src="{{ asset('js/easing.min.js') }}" defer></script>
    <script src="{{ asset('js/custom.js') }}" defer></script>

    <script type="text/javascript" src="{{ asset('js/wow.js') }}"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/preflight.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/utilities.min.css" rel="stylesheet">
    <script defer src="https://use.fontawesome.com/releases/v5.8.1/js/all.js" integrity="sha384-g5uSoOSBd7KkhAMlnQILrecXvzst9TdC09/VM+pjDTCM+1il8RHz5fKANTFFb+gQ" crossorigin="anonymous"></script>
    <script
    src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('css/toastr.css') }}" rel="stylesheet">
    <script src="{{ asset('js/toastr.js') }}"></script>
    @yield('style')
</head>
<body>
   
        

        
            @yield('content')


            <div class="main-nav wow bouneIn" data-wow-delay="2s">
             <a href="{{ url('/home') }}" class="main-items"><img class="menu-image" src="images/user.jpg" alt="">{{Auth::user()->name}}</a>
             <a href="{{ url('/profile') }}" class="main-items">
              <img class="menu-svg" src="images/user.svg" alt="">Profile
               </a>
             <a href="#" class="main-items">
              <img class="menu-svg" src="images/wallet.svg" alt="">Wallet
               </a>
             <a href="{{ url('/transactions') }}" class="main-items">
              <img class="menu-svg" src="images/credit-cards-payment.svg" alt="">Transactions
               </a>
             <a href="#" class="main-items">
              <img class="menu-svg" src="images/house.svg" alt="">Buy Airtime
               </a>
             

               <a href="{{ route('logout') }}" class="main-items"
                      onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                    <img class="menu-svg" src="images/logout.svg" alt="">LogOut
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" >
                      {{ csrf_field() }}
                  </form>
            </div> 

    
    @yield('script')

    <script>
            @if(Session::has('message'))
              var type = "{{ Session::get('alert', 'info') }}";
              switch(type){
                  case 'info':
                      toastr.info("{{ Session::get('message') }}");
                      break;
                  
                  case 'warning':
                      toastr.warning("{{ Session::get('message') }}");
                      break;
        
                  case 'success':
                      toastr.success("{{ Session::get('message') }}");
                      break;
        
                  case 'error':
                      toastr.error("{{ Session::get('message') }}");
                      break;
              }
            @endif
          </script>
        
</body>
</html>
