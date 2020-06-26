@extends('app')

@section('title', 'RECOMEN | Tag Search')
    
@section('content')
    @include('nav')

    <div class="l-container--tagsearch l-row l-row--center l-row--colum l-row--middle">

      <div class="c-title--wrapper">
        <h2 class="l-row--central">Tag Search</h2>
      </div>

      <div class="c-tag--wrapper l-row--central ">
        
          <ul class="c-tag--cover">
            @foreach ($registeredTags as $registeredTag)
              <li class="c-tag--link">
                <a class="c-tag--hash" href="{{ route('tags.show', ['name' => $registeredTag->name]) }}">
                  {{ $registeredTag->hashtag }}
                </a> 
              </li>
             @endforeach
          </ul>

      </div>

    </div>
    
@endsection