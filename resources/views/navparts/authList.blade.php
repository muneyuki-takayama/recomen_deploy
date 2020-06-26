<div class="c-list--container">
    <ul class="c-list">
        <li>
            <i class="fas fa-paper-plane c-list--icon"></i>
            <a href="{{ route('products.create') }}">Post</a>
        </li>
        <li>
            <i class="fas fa-door-open c-list--icon"></i>
            <a href="{{ route('logout') }}"
                onclick="event.preventDefault();document.getElementById('logout-form').submit();"
            >
            Logout
            </a>
            <form id="logout-form" name="logout" method="POST" action="{{ route('logout') }}" >
                @csrf
                <input type="hidden" style="display:none;" >
            </form>
            
        </li>
        <li>
            <i class="fas fa-user-lock c-list--icon"></i>
            <a href="{{ route('users.show', ['name' => Auth::user()->name] )}}">Mypage</a>
        </li>
        <li>
            <i class="fas fa-search c-list--icon"></i>
            <a href="{{ route('tags.search') }}">Tag Search</a>
        </li>
        
    </ul>
</div>