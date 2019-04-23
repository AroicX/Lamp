@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <form method="POST" action="{{ route('register') }}" class="loginCard">
                   @csrf
                   <h1 className="text-center">Register| <a href='/login'>Login</a></h1>
               <section>
                   
                   <div class="form-group row">
                       <label for="name" class="form-label text-md-right">{{ __('Name') }}</label>

                       
                           <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                           @if ($errors->has('name'))
                               <span class="invalid-feedback" role="alert">
                                   <strong>{{ $errors->first('name') }}</strong>
                               </span>
                           @endif
                   </div>

                   <div class="form-group row">
                       <label for="email" class="form-label text-md-right">{{ __('E-Mail Address') }}</label>

                       
                           <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                           @if ($errors->has('email'))
                               <span class="invalid-feedback" role="alert">
                                   <strong>{{ $errors->first('email') }}</strong>
                               </span>
                           @endif
                   </div>

                   <div class="form-group row">
                       <label for="mobile" class="form-label text-md-right">{{ __('Mobile Number') }}</label>

                       
                           <input id="mobile" type="number" class="form-control{{ $errors->has('mobile') ? ' is-invalid' : '' }}" name="mobile" value="{{ old('mobile') }}" required>

                           @if ($errors->has('mobile'))
                               <span class="invalid-feedback" role="alert">
                                   <strong>{{ $errors->first('mobile') }}</strong>
                               </span>
                           @endif
                   </div>

                   <div class="form-group row">
                       <label for="password" class="form-label text-md-right">{{ __('Password') }}</label>

                       
                           <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                           @if ($errors->has('password'))
                               <span class="invalid-feedback" role="alert">
                                   <strong>{{ $errors->first('password') }}</strong>
                               </span>
                           @endif
                   </div>

                   <div class="form-group row">
                       <label for="password-confirm" class="form-label text-md-right">{{ __('Confirm Password') }}</label>

                       
                           <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                      
                   </div>

                   <div class="form-group row mb-0">
                       <div class="col-md-6 offset-md-4">
                           <button type="submit" class="btn btn-primary">
                               {{ __('Register') }}
                           </button>
                       </div>
                   </div>
               </section>
            </form>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>
@endsection
