@extends('app')

@section('title', $tag->hashtag)

@section('content')

@include('nav')
    <div class="l-container">
        <div class="l-row--central l-row--colum c-tagShow--headWrap">
            <h2 class="c-tagShow--head c-post--title">{{ $tag->hashtag}}</h2>
            <p class="c-tagShow--count">{{ $tag->products->count() }} 件</p>
        </div>
        <div class="l-row l-row--between l-container--card">
            @foreach($tag->products as $product)
                @include('products.card')
            @endforeach
        </div>
    </div>
@endsection