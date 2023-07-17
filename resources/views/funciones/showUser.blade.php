<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Cine MidDA</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Jura:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<style>
    .movie-ficha {
        display: flex color: white;
        box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
    }

    .reservation-button {
        display: inline-block;
        position: relative;
    }

    .btn {
        position: relative;
        z-index: 1;
        display: inline-block;
        padding: 12px 24px;
        font-size: 16px;
        font-weight: bold;
        color: #fff;
        text-decoration: none;
        border: none;
        background-color: transparent;
        overflow: hidden;
    }

    .btn-primary {
        background-color: #0d6975;
    }

    .btn-text {
        position: relative;
        z-index: 2;
    }

    .btn-background {
        position: absolute;
        z-index: 1;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        transform: scaleX(0);
        transform-origin: left;
        background-color: #025974;

        transition: transform 0.3s ease;
    }


    .btn-slide {
        position: absolute;
        z-index: 3;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background-color: rgba(255, 255, 255, 0.2);
        transition: left 0.3s ease;
    }

    .btn:hover .btn-background {
        transform: scaleX(1);
    }

    .btn:hover .btn-slide {
        left: 0;
    }
</style>

<body class="antialiased">
    <nav id="navbar" class="navbar navbar-expand-lg fixed-top">
        <a class="navbar-brand" href="/">
            <img src="/images/cine en el midda.png" alt="CineMiddaLogo" style="width: 500px;">
        </a>
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/">INICIO</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('cartelera') }}">CARTELERA</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contacto') }}">CONTACTO</a>
                    </li>
                    @if (Route::has('login'))
                        @auth
                            <li class="nav-item">
                                <a class="nav-link"
                                    href="{{ Auth::user()->role === 'user' ? route('profile.show') : url('/dashboard') }}">PANEL
                                    DE CONTROL</a>
                            </li>
                            <li class="nav-item">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="flex items-center space-x-2 text-gray-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                            fill="red">
                                            <path fill-rule="evenodd"
                                                d="M10 1a9 9 0 1 0 0 18 9 9 0 0 0 0-18zM5.707 6.707a1 1 0 0 1 1.414-1.414L10 8.586l2.879-2.879a1 1 0 1 1 1.414 1.414L11.414 10l2.879 2.879a1 1 0 0 1-1.414 1.414L10 11.414l-2.879 2.879a1 1 0 0 1-1.414-1.414L8.586 10 5.707 7.121A1 1 0 0 1 5.707 6.707z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <span>Salir</span>
                                    </button>
                                </form>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">REGISTRO</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">INICIAR SESION</a>
                            </li>
                        @endauth
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-5"
        style="background-color: rgba(0, 59, 70, 0.5); border-radius:15px; color:white; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);">
        <div class="row">
            <div class="col-md-4 m-2">
                @if ($funcion->imagen)
                    <img class="image" src="{{ '/storage/imagen/' . $funcion->imagen }}" alt="Imagen de la función"
                        width="350">
                @else
                    <p>No se ha cargado una imagen para esta película.</p>
                @endif
            </div>
            <div class="col-md-5 mt-5">
                <h1>{{ $funcion->titulo }}</h1>
                <p>Fecha de la función: {{ $funcion->fecha }}</p>
                <p>Horario: {{ $funcion->hora }}</p>
                <p>Descripción: {{ $funcion->descripcion }}</p>
                <div class="reservation-button">
                    <a href="{{ route('funciones.reservar', $funcion->id) }}" class="btn btn-primary">
                        <span class="btn-text">CREAR RESERVA</span>
                        <span class="btn-background"></span>
                        <span class="btn-slide"></span>
                    </a>
                </div>
                <br>
            </div>
        </div>
    </div>
    </div>

    <footer>
        <div class="bottom">
            <div class="col">
                <br>
                Fono: +56 9 5321 9670
                <a href="https://web.facebook.com/MidDA2022"><img src="/icons/facebook.png" alt="Facebook midDa"
                        style="float: right;"></a><a
                    href="https://wa.me/+56981427835?text=Hola,%20tengo%20una%20consulta!"><img
                        src="/icons/whatsapp.png" alt="Whatsapp midDa" style="float: right; margin-right: 10px"></a>
                <br>
                Correo: correomidda@midda.cl
                <br>
            </div>
            <br>
            <p style="font-style: italic; color: rgba(196, 223, 230, 0.38); text-align: center;"> ® Proyecto de Museo
                Interactivo Digital
                Diego de Almagro, Area Cine y Eventos - 2023</p>
            <br>
        </div>
    </footer>
</body>

</html>
