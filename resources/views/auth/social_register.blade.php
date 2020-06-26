@extends('app')

@section('title', 'Register')

@section('content')
    @include('nav')
    
     <div class="l-container--form l-row l-row--center l-row--middle l-row--colum">
    
        <div class="c-title--wrapper">
            <h2 class="c-form--header l-row--central">Register</h2>
        </div>

        @include('error_message')

        <form class="c-form--wrapper" method="POST" action="{{ route('register.{provider}', ['provider' => $provider]) }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="l-row--central l-row--colum">
                <div class="c-form--container">
                    <input class="c-form--input" type="text" id="name" name="name">
                    <label class="c-form--label" for="name">User Name</label>
                    <span class="focus_line"></span>
                </div>
                <div class="c-form--container">
                    <input class="c-form--input" type="text" id="email" name="email" required value="{{ $email }}" >
                    <label class="c-form--label" for="email">Mail Address</label>
                    <span class="focus_line"></span>
                </div>
                 <div class="c-form--container l-row--central l-row--colum">
                    <p>＊User Name | 4~16 characters</p>
                </div>
                <button class="c-button--form l-row--central" type="submit">Submit</button>
            </div>
        </form>
     </div>
@endsection