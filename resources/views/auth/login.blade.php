@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/separate/pages/login.min.css')}}">
 
                    <form class="sign-box" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                         <div class="sign-avatar">
                        <img src="img/avatar-sign.png" alt="">
                    </div>
                    <header class="sign-title">Sign In</header>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="E-Mail">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                           
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                          
                 
                                <input id="password" type="password" class="form-control" name="password" required placeholder="Password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                           
                        </div>

                        <div class="form-group">
                           
                                <div class="checkbox float-left">
                                 
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label for="signed-in">Keep me signed in</label>
                                </div>
                         
                        </div>

                        
                          
                              <button type="submit" class="btn btn-rounded">Sign in</button>
                    <p class="sign-note">New to our website? <a href="/register">Sign up</a>
                        <br>
                        <a class="" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                        </a>
                         </p>
                    </form>
<script type="text/javascript" src="{{ asset('js/lib/match-height/jquery.matchHeight.min.js')}}"></script>
    <script>
        $(function() {
            $('.page-center').matchHeight({
                target: $('html')
            });

            $(window).resize(function(){
                setTimeout(function(){
                    $('.page-center').matchHeight({ remove: true });
                    $('.page-center').matchHeight({
                        target: $('html')
                    });
                },100);
            });
        });
    </script>
@endsection
