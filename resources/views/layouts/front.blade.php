<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

   <title>@yield('title', 'Ekos eventos')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('assets/summernote/summernote.css') }}" rel="stylesheet">
    <script src="{{ asset('assets/summernote/summernote.js') }}" defer></script>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" defer></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/icofont.min.css') }}">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="https://www.ekosnegocios.com/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="https://www.ekosnegocios.com/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="https://www.ekosnegocios.com/favicon-16x16.png">
    @yield('analytics')

       <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-ZPZ2XJPRXP"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'G-ZPZ2XJPRXP');
</script>
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;700;900&display=swap" rel="stylesheet">

<link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"
        />

         {{-- @include('layouts.codigos') --}}

</head>
<body>
    <div id="app">
        @yield('content')
    </div>
    <footer class="bg-footer text-center">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-3 pt-4">
                    <img src="{{asset('img/logo.png')}}" alt="Ekos Eventos" class="logo-front">
                </div>
                <div class="col-12 col-md-6 pt-4">
                    <div class="text-center">
                        <a class="px-2" href="https://www.facebook.com/RevistaEkos/" target="_blank"><img src="{{asset('assets/img/rrss/fb.png')}}" alt="Facebook Ekos Eventos"></a>
                        <a class="px-2" href="https://twitter.com/revistaekos" target="_blank"><img src="{{asset('assets/img/rrss/tw.png')}}" alt="Twitter Ekos Eventos"></a>
                        <a class="px-2" href="https://www.instagram.com/revistaekos/" target="_blank"><img src="{{asset('assets/img/rrss/ig.png')}}" alt="Instagram Ekos Eventos"></a>
                        <a class="px-2" href="https://www.linkedin.com/company/revistaekos/" target="_blank"><img src="{{asset('assets/img/rrss/li.png')}}" alt="LinkedIn Ekos Eventos"></a>
                        <a class="px-2" href="https://www.youtube.com/c/ekosnegocios" target="_blank"><img src="{{asset('assets/img/rrss/yt.png')}}" alt="Youtube Ekos Eventos"></a>
                    </div>
                    <div class="text-center mt-4">
                        <a href="tel:+59322443377" class="text-dark px-3"><i class="icofont-phone"></i> (593-2) 244 33 77</a>
                        <a class="text-dark px-3" href="mailto:ekos@ekosnegocios.com?Subject=Mensaje enviado desde la web"><i class="icofont-email"></i> ekos@ekosnegocios.com</a>
                    </div>
                    <div class="text-center mt-3">
                        <h6>Copyright © {{date('Y')}} Grupo Ekos, Eventos. All Rights Reserved.</h6>
                        <a href="https://www.walkerbrand.com" class="text-dark sias" target="_blank">Desarrollado por Walkerbrand</a>

                    </div>
                </div>
                <div class="col-12 col-md-3 pt-4">
                    <a href="https://www.ekosnegocios.com" target="_blank">
                        <img src="{{asset('assets/img/logoEkosF.png')}}" alt="Ekos Eventos" class="logo-front py-2"><br>
                    </a>
                </div>
            </div>
        </div>
        
    </footer>
    {{-- llamado de wow  --}}
        <script src="{{ asset('js/wow.js') }}" ></script>
        
        <script >
            new WOW().init();
        </script>
        {{-- llamado de wow  --}}
</body>
</html>
