@extends('app')

@section('title', 'RECMEN | Password Reset')

@section('content')
    @include('nav')

    <div class="l-container--form l-row l-row--center l-row--middle l-row--colum">

        <div class="c-title--wrapper">
            <h2 class="c-form--header l-row--central">Setting New Password</h2>
        </div>

            @include('error_message')
            
            <form class="c-form--wrapper" method="POST" action="{{ route('password.update')}}">
                @csrf
                <div class="l-row--central l-row--colum">
                    <div class="c-form--container">
                        <input type="hidden" name="email" value="{{ $email }}">
                        <input type="hidden" name="token" value="{{ $token }}">
                    </div>

                    <div class="c-form--container">
                        <input class="c-form--input" type="password" id="password" name="password" required> 
                        <label class="c-form--label" for="password">New Password</label>
                        <span class="focus_line"></span>
                    </div>
                    <div class="c-form--container">
                        <input class="c-form--input" type="password" id="password_confirmation" name="password_confirmation" required>
                        <label class="c-form--label" for="password_confirmation">Confirm</label>
                        <span class="focus_line"></span>
                    </div>

                    <button class="c-button--form l-row--central" type="submit">Submit</button>
                </div>
            </form>
            

    </div>
@endsection