@extends('app')

@section('title', 'RECOMEN | Post')

@include('nav')

@section('content')
        <h2 class="c-post--title">Post</h2>
            @include('error_message')
            <form method="POST" action="{{ route('products.store') }} " enctype="multipart/form-data"> 
                @csrf
                <div class="l-post--container">
                    @include('products.form_photo')
                </div>

                <div class="l-post--container">
                    <div class="c-tag--container">
                        @include('products.form_title')

                        <p class="c-tag--title">Tag</p>
                        <product-tags-input
                        :initial-tags = '@json($tagNames ?? [])'
                        :autocomplete-items='@json($allTagNames ?? [])'
                        >
                        </product-tags-input>

                        <div class="c-explain--wrapper l-row--central l-row--colum">
                            <p>＊Image_1 | Required</p>
                            <p>＊Upload File Size | Max 5MB</p>
                            <p>＊Title | Max 30 characters</p>
                            <p>＊Comment | Max 500 characters</p>
                        </div>
                        <button class="c-button--post"type="submit" class="">Post</button>
                    </div>

                </div>
            </form>
@endsection