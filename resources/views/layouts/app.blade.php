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
    


</head>
<body>

        <header>
            @component('component.navbar', ['current'=>$current, 'nav_fixed'=>$nav_fixed])
                
            @endcomponent
        </header>

        <main >
            @yield('content')
        </main>
        

            @hasSection ('footer')
            <footer>
                @yield('section')
            </footer>
            @else
            @endif('footer')

    </div>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
            @yield('scripts')
    </script>
</body>
</html>
