<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Интрейд') }}</title>

        <!-- Styles -->
        <link href="{{ asset('css/main.css') }}" rel="stylesheet">
        <link href="{{ asset('css/normalize.css') }}" rel="stylesheet">
    </head>
    <body>
        <div id="app">
            <div class="wrapper">

                @yield('content')
                
            </div>           
            @include('layouts.footer')
        </div>
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="https://use.fontawesome.com/3b296b69fb.js"></script>
        <script>
            window.replainSettings = { id: '4bd3e352-8792-43c1-8774-3cc6b98145a6' };
            (function(u){var s=document.createElement('script');s.type='text/javascript';s.async=true;s.src=u;
            var x=document.getElementsByTagName('script')[0];x.parentNode.insertBefore(s,x);
            })('https://widget.replain.cc/dist/client.js');
        </script>
    </body>
</html>

