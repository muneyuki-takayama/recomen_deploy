@extends('app')

@section('title', $user->name)

@section('content')
    @include('nav')

    <div class="l-container">
        @include('users.user')
        @include('users.tabs', ['hasProducts' => true, 'hasLikes' => false])

        <div class="l-row l-row--between l-container--card">
            @foreach($products as $product)
                @include('products.card')
            @endforeach
        </div>
    </div>
@endsection