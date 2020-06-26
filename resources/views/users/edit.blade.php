@extends('app')

@section('title', $user->name . ' | Edit')

@include('nav')

@section('content')
    <h2 class="c-post--title">Edit Profile</h2>
    @include('error_message')

    <form method="POST" action="{{ route('users.update', ['user' => $user]) }}" enctype="multipart/form-data"> 
     @csrf
        <div class="l-post--container__profEdit">
            <div class="c-photo--block">
                <img-view
                select-user-prof="prof_photo"
                img-data-user-prof="{{ $user->prof_photo}}"
                >
                </img-view>
            </div>
        </div>
        <div class="l-post--container__profEdit">
            <div class="l-title--form">
                <div class="c-title--wrap">
                    <p>Your Name</p>
                    <input class="c-title--input" type="text" name="name" class="" required value="{{ $user->name ?? old('name') }}">
                </div>
            
                <div class="c-comment--wrap">
                    <p>Introduction</p>
                    <textarea class="c-comment--text" name="prof_body" class="" rows="16" placeholder="Write yourself">{{ $user->prof_body ?? old('prof_body') }}</textarea>
                </div>
                <button class="c-button--post" type="submit" class="">Update</button>
            </div>
        </div>
    </form>

@endsection
