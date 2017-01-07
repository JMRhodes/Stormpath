<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link href="/css/app.min.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode( [
                'csrfToken' => csrf_token(),
        ] ); ?>
    </script>
</head>
<body class="template-{{ collect(\Request::segments())->implode('-') }}">
<?php include('images/icons/icons.svg'); ?>

<div id="app">
    @if (Auth::user())
        @include('layouts.header')
    @endif

    @yield('content')
</div>

<!-- Scripts -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="/js/app.min.js"></script>
</body>
</html>
