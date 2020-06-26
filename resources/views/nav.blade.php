<header class="l-header">
    <nav class="l-row l-row--between l-row--middle">
        <div class="p-header--logo">
            <a href="/">RECOMEN</a>
        </div>
        @guest
            @include('navparts.trigger')
        <div class="c-menu--list__sp js-toggle-sp-menu-target">
            @include('navparts.guestList')
        </div>
         <div class="c-menu--list__pc">
            @include('navparts.guestList')
        </div>
        @endguest
        
        @auth           
         @include('navparts.trigger')
        <div class="c-menu--list__sp js-toggle-sp-menu-target">
            @include('navparts.authList')
        </div>
        <div class="c-menu--list__pc">
            @include('navparts.authList')
        </div>
        @endauth
    </nav>
</header>