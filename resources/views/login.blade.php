@extends('layout')

@section('contents')
    <div class="login-container">
        <div class="notifications">
            @if(Session::has('fail message'))
                <div class="message">
                    <span class="far fa-circle-xmark message-icon"></span>
                    <div class="text">
                        {{Session::get('fail message')}}
                    </div>
                </div>
            @endif
            @if(Session::has('success message'))
                <div class="success-message">
                    <span class="far fa-circle-xmark message-icon"></span>
                    <div class="text">
                        {{Session::get('success message')}}
                    </div>
                </div>
            @endif
            @error("email")
                <div class="message">
                    <span class="far fa-circle-xmark message-icon"></span>
                    <div class="text">
                        {{$message}}
                    </div>
                </div>
            @enderror
            @error("password")
                <div class="message">
                    <span class="far fa-circle-xmark message-icon"></span>
                    <div class="text">
                        {{$message}}
                    </div>
                </div>
            @enderror
        </div>
        <div class="login-form">
            <h1 class="login-title">
                <span class="fas fa-user-lock"></span>
                Sign In to your Account
            </h1> 
            <form action="{{route('login.post')}}" method="post">
                @csrf
                <label for="email-input">Enter your email address:</label>
                <input type="email" name="email" id="email-input" class="input-field">
                <label for="pass-input">enter your password or secret key:</label>
                <input type="password" name="password" id="pass-input" class="input-field">
                <p class="reset-password">
                    <a href="#" class="reset-link">forgot your password ?</a>
                </p>
                <button type="submit" class="login-btn">Login</button>
            </form>
        </div>      
    </div>
@endsection