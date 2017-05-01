<div class="header">
    <div class="container-fluid">
        <!-- Branding Image -->
        <div class="header__brand">
            <a href="{{ url('/') }}">
                <img class="header__logo" src="{{ config('app.logo_url') }}"/>
            </a>
        </div>

        @include('layouts.navigation')
    </div>
</div>