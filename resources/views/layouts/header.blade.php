<div class="header">
    <div class="header__primary">
        <a href="{{ url('/') }}">
            <svg class="icon icon-grid">
                <use xlink:href="#icon-grid"></use>
            </svg>
            <span>Dashboard</span>
        </a>
    </div>

    <!-- Branding Image -->
    <div class="header__brand">
        <a href="{{ url('/') }}">
            <img class="header__logo" src="{{ config('app.logo_url') }}"/>
        </a>
    </div>

    <nav class="header__nav">
        <a class="nav__user user__avatar" href="{{ url('/profile') }}">
            <img class="user__avatar-image" src="/images/user.svg"/>
        </a>

        <a class="nav__logout" href="{{ url('/logout') }}"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <svg class="icon icon-power"><use xlink:href="#icon-power"></use></svg>
        </a>

        <form id="logout-form" action="{{ url('/logout') }}" method="POST"
              style="display: none;">
            {{ csrf_field() }}
        </form>
    </nav>
</div>