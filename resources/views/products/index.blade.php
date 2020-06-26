@extends('app')

@section('title', 'RECOMEN | Products')

@section('content')
@include('nav')

<div class="l-container">
    <div class="l-row l-row--between l-container--card">
    @foreach($products as $product)
        @include('products.card')
    @endforeach
    </div>
</div>
@endsection
