<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="robots" content="noindex, nofollow">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Интрейд') }}</title>
        
        <link href="{{ asset('css/main.css') }}" rel="stylesheet">
        <link href="{{ asset('css/normalize.css') }}" rel="stylesheet">
        
    </head>
    <body>
        
        <div id="app">
            @include('admin.layouts.nav')
            @yield('admincontent')
        </div>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="https://use.fontawesome.com/3b296b69fb.js"></script>
        
        <script src="https://cdn.tiny.cloud/1/8uztefn09k20vcbfutwngh32cshc309ns9bbap62182tbluz/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        
        <script type="text/javascript">
            tinymce.init({
            selector: 'textarea.tinymce-editor',
            height: 300,
            menubar: 'false',
            toolbar: 'bold italic',
            width: 500
            });
        </script>



    </body>
</html>