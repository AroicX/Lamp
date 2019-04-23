@extends('layouts.auth')

@section('content')
<div class="container">
   <div class="row">
   <div class="col-md-3"></div>
     <div class="col-md-6 ">
        <form method="POST" action="{{ route('login') }}" class="loginCard">
                <h1 className="text-center">Login| <a href='/register'>Register</a></h1>

                                @csrf
    <section>
                                <div class="form-group">
                                    <label for="email" class="form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                  
                                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                   
                                </div>

                                <div class="form-group">
                                    <label for="password" class="form-label text-md-right">{{ __('Password') }}</label>

                                  
                                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    
                                </div>

                                <div class="form-group">
                                   
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>

                                            @if (Route::has('password.request'))
                                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                                    {{ __('Forgot Your Password?') }}
                                                </a>
                                            @endif
                                        </div>
                                    
                                </div>

                                <div class="form-group">
                                   
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Login') }}
                                        </button>

                    
                                </div>
    </section>

                            </form>
      
     </div>
     <div class="col-md-3"></div>
   </div>
</div>
@endsection
