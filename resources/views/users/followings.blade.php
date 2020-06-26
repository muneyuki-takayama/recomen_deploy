@extends('app')

@section('title', $user->name . ' | Followee')

@section('content')
  @include('nav')
  <div class="container">
    @include('users.user')
    @include('users.tabs', ['hasProducts' => false, 'hasLikes' => false])

    <div class="c-follow--container l-row--central">
      @foreach($followings as $person)
        @include('users.person')
      @endforeach
    </div>
    
  </div>
@endsection