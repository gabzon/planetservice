<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<body>
    @include('layouts.navbar')
    <main>
        <div class="jumbotron">
            <div class="container text-center">
                <h1 class="display-4">Haz tus pedidos ya</h1>
                <p class="lead">Planet Services & Supplies es la manera facil, rapida y barata de hacer
                    pedidos online</p>
                @auth
                <a class="btn btn-primary btn-lg" href="#" role="button">Pedir cotizacion</a>
                @else
                <a class="btn btn-primary btn-lg" href="#" role="button">Inscribete</a>
                @endauth
            </div>
        </div>
    </main>
</body>

</html>