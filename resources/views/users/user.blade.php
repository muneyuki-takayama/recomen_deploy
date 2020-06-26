        <div class="l-row--central l-row--colum ">
            <h2 class="c-users--name">
                {{ $user->name }}
            </h2>

            <div>
            <a href="{{ route('users.show', ['name' => $user->name]) }}">
                @if(!$user->prof_photo) 
                    <i class="fas fa-user-circle fa-3x"></i>
                @endif  
                <img src="{{ $user->prof_photo }}" alt="">
            </a>
            </div>
            
            
            <div class="c-users--prof l-row--central">
                <p>{{  $user->prof_body }}</p>
            </div>
            @if(Auth::id() === $user->id)
            <a href="{{ route('users.edit', ['name' => $user->name]) }}">
                <button class="c-users--edit__button">
                    <i class="far fa-arrow-alt-circle-right"></i>
                    Edit Profile
                </button>
            </a>
            @endif
        </div>

            <div class="c-users--follow l-row--central">
                <a href="{{ route('users.followings', ['name' => $user->name]) }}">
                    {{ $user->count_followings }}フォロー
                    <i class="fas fa-running"></i>
                    
                </a>
                <a href="{{ route('users.followers', ['name' => $user->name]) }}">
                    {{ $user->count_followers}}フォロワー
                    <i class="fas fa-child"></i>
                </a>
            <div>
                @if( Auth::id() !== $user->id )
                    <follow-button
                        class=""
                        :initial-is-followed-by='@json($user->isFollowedBy(Auth::user()))'
                        :authorized='@json(Auth::check())'
                        endpoint="{{ route('users.follow', ['name' => $user->name]) }}"
                    >
                    </follow-button>
                @endif
            </div>
        </div>