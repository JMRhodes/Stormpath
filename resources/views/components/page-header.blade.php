<div class="page__header">
    <div class="container">
        <h1 class="page__title hdg hdg--1 hdg--semi-bold">
            <svg class="icon icon-bar-graph-2">
                <use xlink:href="#icon-bar-graph-2"></use>
            </svg>
            @yield('title')

            @if( isset($activities) )
                <span class="page__subtitle">
                    {{count($activities)}} Total Activities
                </span>
            @endif
        </h1>
    </div>
</div>