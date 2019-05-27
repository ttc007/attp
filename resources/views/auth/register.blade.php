@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/separate/pages/login.min.css')}}">
 
                    <form class="sign-box" method="POST" action="{{ route('register') }}">
                    <!-- <form class="sign-box" method="POST" action="/dang-ki"> -->
                        {{ csrf_field() }}
                         <div class="sign-avatar no-photo">&plus;</div>
                    <header class="sign-title">Sign Up</header>
                   
                       <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                       

                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus placeholder="Name">

                                @if ($errors->has('name'))
                                    <span class="help-block text-danger">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                          
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                      
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required placeholder="E-Mail Address">

                                @if ($errors->has('email'))
                                    <span class="help-block text-danger">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                          
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                 
                                <input id="password" type="password" class="form-control" name="password" required placeholder="Password">

                                @if ($errors->has('password'))
                                    <span class="help-block text-danger">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                           
                        </div>

                        <div class="form-group">
                          
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Confirm Password">
                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block text-danger">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group">
                          
                                <button type="submit" class="btn btn-rounded">
                                    Register
                                </button>
                           
                        </div>
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

