<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="https://www.ekosnegocios.com/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="https://www.ekosnegocios.com/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="https://www.ekosnegocios.com/favicon-16x16.png">
</head>
<body>
    <div id="app">
       
        <div class="row mt-5">
            <div class="col-12 text-center mt-5">
                <img src="{{asset('img/logo.png')}}" width="100px" alt="Administrador de Eventos Ekos">

            </div>
        </div>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
