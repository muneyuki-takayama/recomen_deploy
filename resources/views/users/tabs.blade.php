<div class="c-users--tab__wrapper l-row--central l-row--colum">
    <ul>
        <li class="c-users--tab__item">
            <a class="{{ $hasProducts ? 'active' : '' }}"
                href="{{ route('users.show', ['name' => $user->name]) }}">
                Articles
            </a>
        </li>
        <li class="c-users--tab__item">
            <a class="{{ $hasLikes ? 'active' : '' }}"
            href="{{ route('users.likes', ['name' => $user->name]) }}">
                Likes
            </a>
        </li>
    </ul>
</div>