    <div class="c-follow--wrapper l-row--central l-row--colum">
        <a href="{{ route('users.show', ['name' => $person->name]) }}">
        
            @if($person->prof_photo)
            <img 
            class="c-person--img"
            src="{{$person->prof_photo}}" alt="">
            @endif

            @if(!$person->prof_photo) 
                <i class="fas fa-user-circle fa-2x c-card--userCircle c-person--icon"></i>
            @endif    
        </a>

        <p class="c-person--name">
            <a href="{{ route('users.show', ['name' => $person->name]) }}" class="">{{ $person->name }}</a>
        </p>

    @if( Auth::id() !== $person->id )
        <follow-button
          class=""
          :initial-is-followed-by='@json($person->isFollowedBy(Auth::user()))'
          :authorized='@json(Auth::check())'
          endpoint="{{ route('users.follow', ['name' => $person->name]) }}"
        >
        </follow-button>
    @endif
 
    </div>