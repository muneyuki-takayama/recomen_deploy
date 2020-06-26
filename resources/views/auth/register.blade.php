@extends('app')

@section('title', 'Register')

@section('content')
    @include('nav')

    <div class="l-container--form l-row l-row--center l-row--middle l-row--colum">
        
        <div class="c-title--wrapper">
            <h2 class="c-form--header l-row--central">Register</h2>

            <a href="{{ route('login.{provider}', ['provider' => 'google']) }}" class="c-google--link">
                <i class="fab fa-google"></i>
                Googleで登録
            </a>
        </div>

        @include('error_message')

        <form class="c-form--wrapper" method="POST" action="{{ route('register') }}">
            @csrf
            <div class="l-row--central l-row--colum">
                <div class="c-form--container">
                    <input class="c-form--input" type="text" id="name" name="name" value="{{ old('name') }}" placeholder="">
                    <label class="c-form--label" for="name">User Name</label>
                    <span class="focus_line"></span>
                </div>
                <div class="c-form--container">
                    <input class="c-form--input" type="text" id="email" name="email" value="{{ old('email') }}" >
                    <label class="c-form--label" for="email">Mail Address</label>
                    <span class="focus_line"></span>
                </div>
                <div class="c-form--container">
                    <input class="c-form--input" type="password" id="password" name="password">
                    <label class="c-form--label" for="password">Password</label>
                    <span class="focus_line"></span>
                </div>
                <div class="c-form--container">
                    <input class="c-form--input" type="password" id="password_confirmation" name="password_confirmation">
                    <label class="c-form--label" for="password_confirmation">Pass Confirm</label>
                    <span class="focus_line"></span>
                </div>
                <div class="c-form--container l-row--central l-row--colum">
                    <p>＊User Name | 4~16 characters</p>
                    <p>＊Password | Min 8 characters</p>
                </div>
                <button class="c-button--form l-row--central" type="submit">Submit</button>
            </div>
        </form>
    </div>
@endsection