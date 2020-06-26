@extends('app')

@section('title', 'Login')

@section('content')

    @include('nav')
    
    <div class="l-container--form l-row l-row--center l-row--middle l-row--colum">

        <div class="c-title--wrapper">
            <h2 class="c-form--header l-row--central">Login</h2>

            <a href="{{ route('login.{provider}', ['provider' => 'google']) }}" class="c-google--link">
                <i class="fab fa-google"></i>
                Googleでログイン
            </a>
        </div>

        @include('error_message')
            
        <form class="c-form--wrapper" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="l-row--central l-row--colum">
                <div class="c-form--container">
                    <input class="c-form--input" type="text" id="email" name="email" required value="{{ old('email') }}">
                    <label class="c-form--label" for="email">Mail Address</label>
                    <span class="focus_line"></span>
                </div>
                <div class="c-form--container">
                    <input class="c-form--input" type="password" id="password" name="password" required>
                    <label class="c-form--label" for="password">Password</label>
                    <span class="focus_line"></span>
                </div>

                <input type="hidden" name="remember" id="remember" value="on">

                <div class="c-form--container l-row--central">
                    <button class="c-button--underline">
                        <a href="{{ route('password.request') }}">Forgot Password?</a>
                    </button>
                </div>

                <button class="c-button--form l-row--central" type="submit">Login</button>
            </div>
        </form>
    </div>
@endsection