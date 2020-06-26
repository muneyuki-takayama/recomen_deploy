<div class="c-list--container">
    <ul class="c-list">
        <li>
            <i class="fas fa-home c-list--icon"></i>
            <a href="{{ route('products.index') }}">Top</a>
        </li>
        <li>
           <i class="fas fa-sign-in-alt c-list--icon"></i>
           <a href="{{ route('login') }}">Login</a>
        </li>
        <li>
            <i class="far fa-check-circle c-list--icon"></i>
            <a href="{{ route('register') }}">Register</a>
        </li>
        <li>
            <i class="fas fa-search c-list--icon"></i>
            <a href="{{ route('tags.search') }}">Tag Search</a>
        </li>
    </ul>
</div>