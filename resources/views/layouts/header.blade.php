<?php
use App\Http\Controllers\ProfileController;

?>

<nav>
    <div class="nav-wrapper">
        <a href="{{ url('/') }}" class="brand-logo left">
            <img class="header__logo" src="{{ config('app.logo_url') }}"/>
            @yield('title')
        </a>

        <ul class="right">
            <li>
                <a class="nav__user user__avatar" href="{{ url('/profile') }}">
                    <img class="circle responsive-img user__avatar-image"
                         src="{{ProfileController::getUserAvatar(Auth::user()->id)}}"/>
                </a>
            </li>
            <li>
                <a class='dropdown-button' href='#' data-activates='dropdown1' data-constrainWidth="false"
                   data-beloworigin="true">
                    <i class="material-icons">more_vert</i>
                </a>
            </li>
        </ul>

        <!-- Dropdown Structure -->
        <ul id='dropdown1' class='dropdown-content'>
            <li>
                <a href="{{ url('/profile') }}">Edit Profile</a>
            </li>
            <li class="divider"></li>
            <li>
                <a href="{{ url('/logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                </a>

                <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                      style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
        </ul>
    </div>
</nav>