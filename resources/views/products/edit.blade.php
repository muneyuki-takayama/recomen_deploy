@extends('app')

@section('title', 'RECOMEN | Edit')

@include('nav')

@section('content')
        <h2 class="c-post--title">Edit</h2>
        @include('error_message')
        <form method="POST" action="{{ route('products.update', ['product' => $product]) }} " enctype="multipart/form-data"> 
            @method('PATCH')
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
                     <button type="submit" class="c-button--post">Update</button>
                </div>
            </div>
        </form>
@endsection