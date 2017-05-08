<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>

    <!-- Favicons -->
    <link rel="shortcut icon" href="/images/favicons/favicon.ico" type="image/x-icon"/>
    <link rel="apple-touch-icon" sizes="57x57" href="/images/favicons/apple-touch-icon-57x57.png?ver={{config('app.version', 'Laravel')}}">
    <link rel="apple-touch-icon" sizes="60x60" href="/images/favicons/apple-touch-icon-60x60.png?ver={{config('app.version', 'Laravel')}}">
    <link rel="apple-touch-icon" sizes="72x72" href="/images/favicons/apple-touch-icon-72x72.png?ver={{config('app.version', 'Laravel')}}">
    <link rel="apple-touch-icon" sizes="76x76" href="/images/favicons/apple-touch-icon-76x76.png?ver={{config('app.version', 'Laravel')}}">
    <link rel="apple-touch-icon" sizes="114x114" href="/images/favicons/apple-touch-icon-114x114.png?ver={{config('app.version', 'Laravel')}}">
    <link rel="apple-touch-icon" sizes="120x120" href="/images/favicons/apple-touch-icon-120x120.png?ver={{config('app.version', 'Laravel')}}">
    <link rel="apple-touch-icon" sizes="144x144" href="/images/favicons/apple-touch-icon-144x144.png?ver={{config('app.version', 'Laravel')}}">
    <link rel="apple-touch-icon" sizes="152x152" href="/images/favicons/apple-touch-icon-152x152.png?ver={{config('app.version', 'Laravel')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="/images/favicons/apple-touch-icon-180x180.png?ver={{config('app.version', 'Laravel')}}">
    <link rel="icon" type="image/png" href="/images/favicons/favicon-16x16.png?ver={{config('app.version', 'Laravel')}}" sizes="16x16">
    <link rel="icon" type="image/png" href="/images/favicons/favicon-32x32.png?ver={{config('app.version', 'Laravel')}}" sizes="32x32">
    <link rel="icon" type="image/png" href="/images/favicons/favicon-96x96.png?ver={{config('app.version', 'Laravel')}}" sizes="96x96">
    <link rel="icon" type="image/png" href="/images/favicons/android-chrome-192x192.png?ver={{config('app.version', 'Laravel')}}" sizes="192x192">
    <meta name="msapplication-square70x70logo" content="/images/favicons/smalltile.png?ver={{config('app.version', 'Laravel')}}"/>
    <meta name="msapplication-square150x150logo" content="/images/favicons/mediumtile.png?ver={{config('app.version', 'Laravel')}}"/>
    <meta name="msapplication-wide310x150logo" content="/images/favicons/widetile.png?ver={{config('app.version', 'Laravel')}}"/>
    <meta name="msapplication-square310x310logo" content="/images/favicons/largetile.png?ver={{config('app.version', 'Laravel')}}"/>

    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link href="/css/app.min.css?ver={{config('app.version', 'Laravel')}}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode( [
            'csrfToken' => csrf_token(),
        ] ); ?>
    </script>
</head>
<body class="template-{{ collect(\Request::segments())->implode('-') }}">
<?php include( 'images/icons/icons.svg' ); ?>

<div id="app">
    @if (Auth::user())
        @include('layouts.header')
    @endif

    @yield('content')
</div>

<!-- Scripts -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="/js/vendor.min.js?ver={{config('app.version', 'Laravel')}}"></script>
<script src="/js/app.min.js?ver={{config('app.version', 'Laravel')}}"></script>
</body>
</html>
