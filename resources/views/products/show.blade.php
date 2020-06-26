@extends('app')

@section('title', 'Recomen | Detail')

@include('nav')

@section('content')

    <h2 class="c-post--title">Detail</h2>
            <div class="c-show--container__product">
                <div class="c-photo--input">
                    <div class="c-photo--block__show">
                        <img class="c-upload--img__show" src="{{ $product->pic1}}" alt="">
                    </div>
                   
                        @if($product->pic2)
                            <div class="c-photo--block__show">
                                <img class="c-upload--img__show" src="{{ $product->pic2}}" alt="">
                            </div>
                        @endif
                    
                    
                        @if($product->pic3)
                            <div class="c-photo--block__show">
                                <img class="c-upload--img__show" src="{{ $product->pic3}}" alt="">
                            </div>
                        @endif
                </div>
            </div>

            <div class="c-tag--wrapper l-row--central">
                @foreach ($product->tags as $tag)
                    @if($loop->first)
                        <div>
                        @endif
                            <a class="c-show--tag" href="{{ route('tags.show', ['name' => $tag->name]) }}">
                                {{ $tag->hashtag}}
                            </a>
                        @if($loop->last)
                        </div>
                    @endif
                @endforeach
            </div>

            <div class="c-show--container__product">
                <div class="l-row l-row--middle l-row--center c-show--icon">
                    <a 
                    href="{{ route('users.show', ['name' => $product->user->name]) }}">

                    @if(!$product->user->prof_photo) 
                            <i class="fas fa-user-circle fa-2x c-card--userCircle c-card--userIcon"></i>
                    @endif    

                    @if($product->user->prof_photo) 
                        <img 
                        class="c-card--userPic"
                        src="{{ $product->user->prof_photo}}" alt="">
                    @endif

                    </a> 
                
                    <a href="{{ route('users.show', ['name' => $product->user->name]) }}">
                        {{ $product->user->name }}
                    </a>  
                </div>

                <div class="c-show--title__form">
                    <div class="c-show--title__wrapper">
                        <p class="c-show--title__head">Title</p>
                        <p class="c-show--title__title">{{ $product->title }}</p>
                    </div>
                    <div class="c-show--title__wrapper">
                       <p class="c-show--comment__head">Comment</p>
                       <p class="c-show--comment__comment">{{ $product->body}}</p>
                    </div>
                </div>
                
                <div class="c-show--reaction__wrapper l-row">
                    <div class="c-show--reaction__block">
                    <a class="c-show--reaction__sns"
                        href="https://twitter.com/share?url={{ url()->current() }}&text={{ $product->title }}" rel="nofollow" target="_blank">
                        <i class="fab fa-twitter c-show--twitter__icon"></i>
                    </a>
                    </div>

                    <div class="c-show--reaction__block">
                        <product-like
                        :initial-is-liked-by='@json($product->isLikedBy(Auth::user()))'
                        :initial-count-likes='@json($product->count_likes)'
                        :authorized='@json(Auth::check())'
                        endpoint="{{ route('products.like', ['product' => $product]) }}"
                        >
                        </product-like>
                    </div>
                </div>

            </div>
@endsection