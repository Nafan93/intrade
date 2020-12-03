<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Интрейд @yield('title')</title>
        <meta name="description" content="@yield('description')">
        <meta name="keywords" content="@yield('keywords')">
        <!-- Styles -->
        <link href="{{ asset('css/main.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/normalize.css') }}" rel="stylesheet" type="text/css">
        
    </head>
    <body>
        @include('cookieConsent::index')
        <div id="app">
            <div class="wrapper">

                @yield('content')
                   
            </div>           
            @include('layouts.footer')
            
        </div>
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="https://use.fontawesome.com/3b296b69fb.js"></script>
        <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
        <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        <script>
            window.replainSettings = { id: '4bd3e352-8792-43c1-8774-3cc6b98145a6' };
            (function(u){var s=document.createElement('script');s.type='text/javascript';s.async=true;s.src=u;
            var x=document.getElementsByTagName('script')[0];x.parentNode.insertBefore(s,x);
            })('https://widget.replain.cc/dist/client.js');
        </script>
        <!-- Slick Slider -->
        <link href="{{ asset('slick/slick.css') }}" rel="stylesheet" type="text/css" >
        <link href="{{ asset('slick/slick-theme.css') }}" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="slick/slick.min.js"></script>
        <script>
        $(document).ready(function(){
            $('.advantages-list').slick({
                responsive: [
                    {
                    breakpoint: 5000,
                    settings: "unslick"
                    },
                    {
                    breakpoint: 779,
                    settings: {
                        arrows: true,
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        prevArrow: '<button class="arrow prev"></button>',
                        nextArrow: '<button class="arrow next"></button>'
                    }
                }
                ]
            });
        });   
        </script>
            <script>
                $(document).ready(function(){
                    $('.partners-list').slick({
                        responsive: [
                            {
                            breakpoint: 5000,
                            settings: "unslick"
                            },
                            {
                            breakpoint: 779,
                            settings: {
                                arrows: true,
                                slidesToShow: 2,
                                slidesToScroll: 1,
                                prevArrow: '<button class="arrow prev"></button>',
                                nextArrow: '<button class="arrow next"></button>'
                            }
                        }
                        ]
                    });
                });   
                </script>
       
    </body>
</html>

