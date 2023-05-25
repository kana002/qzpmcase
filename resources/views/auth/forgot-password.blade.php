@extends('layouts.master', ['forgot-password' => 'active bg-secondary rounded'])

@section('content')

        <div id="centered-div">
          <h1>Forgot your password?</h1>
          <!-- <h2>Don't have an account? <a href="/register">Sign Up</a></h2> -->
@if(session('status'))
          <span class="invalid-feedback" role="alert">
                                        <strong>We have emailed your passord</strong>
                                    </span>
                                    @endif                                   
          <form id="login-form" method="POST" action="{{ route('email.password') }}">
                        @csrf

            <input type="text" id="email-input" name="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" >

        
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                           

            <button type="submit" id="login-button">Send Reset Link</button>

            </form>
            </div>

@endsection
