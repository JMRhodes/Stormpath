<nav class="primary">
    <ul class="nav">
        <li class="nav__item">
            <a href="{{ url('/') }}">
                <svg class="icon icon-dashboard">
                    <use xlink:href="#icon-dashboard"></use>
                </svg>
            </a>
        </li>
        <li class="nav__item">
            <a class="user-tray__logout" href="{{ url('/logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <svg class="icon icon-exit">
                    <use xlink:href="#icon-exit"></use>
                </svg>
            </a>

            <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                  style="display: none;">
                {{ csrf_field() }}
            </form>
        </li>
        <li class="nav__item">
            <a class="user__avatar" href="{{ url('/profile') }}">
                <img class="user__avatar-image" src="/images/user.svg"/>
            </a>
        </li>
    </ul>
</nav>