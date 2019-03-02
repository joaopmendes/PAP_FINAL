<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="{{{ asset('img/logo_without_text.png') }}}">
    <script src="{{ asset('js/app.js') }}" defer></script>


</head>
<body>

        <header>
            @component('component.navbar', ['current'=>$current])
                
            @endcomponent
        </header>

        <main>
            @yield('content')
        </main>
        <footer>

            @yield('footer')
        </footer>
    </div>
</body>
</html>
