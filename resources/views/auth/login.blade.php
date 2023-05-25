@extends('layouts.master', ['login' => 'active bg-secondary rounded'])

@section('content')

        <div id="centered-div">
          <h1>Log In</h1>
          <h2>{{__('register.dontaccount')}}<a href="/register">{{__('register.sign_up')}}</a></h2>

        
          <form id="login-form" method="POST" action="{{ route('login') }}">
                        @csrf

            <input type="text" id="email-input" name="email" placeholder="Email">

            <input type="password" id="password-input" name="password" placeholder="{{__('register.password')}}">

            <input type="checkbox" id="remember-check" name="remember-check" placeholder="Remember me">
            <label for="remember-check">{{__('register.remember')}}</label>


            <a href="{{route('forgot.password')}}">{{__('register.forgot')}}</a>

            <button type="submit" id="login-button">{{__('register.login')}}</button>

            </form>
            </div>

@endsection
