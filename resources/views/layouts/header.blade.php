<div class="header">
    <div class="container-fluid">
    @include('layouts.navigation')

    <!-- Branding Image -->
        <div class="header__brand">
            <a href="{{ url('/') }}">
                <img class="header__logo" src="{{ config('app.logo_url') }}"/>
            </a>
            <h1 class="hdg hdg--2 hdg--bold hdg--brand">Dashboard</h1>
        </div>
    </div>
</div>