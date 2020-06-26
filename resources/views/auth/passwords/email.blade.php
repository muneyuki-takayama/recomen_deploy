@extends('app')

@section('title', 'RECOMEN | Reset MailForm')

@section('content')
    @include('nav')
    <div class="l-container--form l-row l-row--center l-row--middle l-row--colum">
        <div class="c-title--wrapper">
            <h2 class="c-form--header l-row--central">Password Resetting</h2>
            @include('error_message')
            @if (session('status'))
              <div class="c-sendmail--status">
                <i class="far fa-check-circle c-status--check"></i>
                {{ session('status') }}
              </div>
            @endif
        </div>

        
        <form class="c-form--wrapper" action="{{ route('password.email') }}" method="POST">
            @csrf
            <div class="l-row--central l-row--colum">
                <div class="c-form--container">
                    <input class="c-form--input" type="text" id="email" name="email">
                    <label class="c-form--label" for="email">Email Address</label>
                     <span class="focus_line"></span>
                </div>
                <button class="c-button--form l-row--central" type="submit">Send Email</button>
            </div>
        </form>
        
    </div>
   
@endsection