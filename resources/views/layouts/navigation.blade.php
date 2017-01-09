<nav class="primary">
    <ul class="nav">
        <li class="nav-item dropdown">
            <a href="#" class="user dropdown__toggle" data-toggle="dropdown" role="button"
               aria-expanded="false">
                <div class="user__avatar user__avatar--status-green">
                    <img class="user__avatar-image" src="/images/user.svg"/>
                </div>
                <span class="user__caret">
                    <svg class="icon icon-arrow_down"><use xlink:href="#icon-arrow_down"></use></svg>
                </span>
            </a>

            <div class="dropdown__menu">
                <ul class="user-tray" role="menu">
                    <li>
                        <span class="user-tray__username">{{ Auth::user()->name }}</span>
                    </li>
                    <li>
                        <a class="user-tray__logout" href="{{ url('/logout') }}"
                           onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                              style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                    <li>
                        <a class="user-tray__settings" href="{{ url('/profile') }}">
                            <svg class="icon icon-cog">
                                <use xlink:href="#icon-cog"></use>
                            </svg>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
    </ul>
</nav>