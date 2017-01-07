<div class="header">
    <div class="container">
        <!-- Branding Image -->
        <a class="header__brand" href="{{ url('/') }}">
            <img class="header__logo" src="{{ config('app.logo_url') }}"/>
            <h1 class="hdg hdg--1 hdg--brand">{{ config('app.name') }}</h1>
        </a>

        @include('layouts.navigation')
    </div>
</div>