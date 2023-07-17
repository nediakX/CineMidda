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
    .function-card {
        position: relative;
        overflow: hidden;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease-in-out;
    }

    .function-card:hover {
        transform: translateY(-5px);
    }

    .function-card img {
        width: 100%;
        height: auto;
    }

    .function-card .title {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        padding: 10px;
        background-color: rgba(0, 0, 0, 0.5);
        color: #fff;
        font-size: 18px;
        font-weight: bold;
        text-align: center;
        transition: opacity 0.3s ease-in-out;
        opacity: 0;
    }

    .function-card .details {
        position: absolute;
        top: 10px;
        right: 10px;
        background-color: rgba(0, 0, 0, 0.7);
        color: #fff;
        padding: 5px 10px;
        font-size: 14px;
        border-radius: 5px;
    }

    .function-card:hover .title {
        opacity: 1;
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
                                    href="{{ Auth::user()->role === 'user' ? route('profile.show') : url('/dashboard') }}">PANEL DE CONTROL</a>
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


    <div class="container main-container">
        <div class="container text-left">
            <div class="row">
                <h1>¡Bienvenido al portal de cine para la comuna!</h1>
            </div>
            <div class="entries">
                <div class="row">
                    <h4>Aquí encontrarás toda la información acerca del cine en el museo interactivo digital - midDA en
                        Diego de Almagro.</h4>
                </div>
            </div>
            <hr>
        </div>
        <br>

        <div class="container text-center">
            <div class="row">
                @foreach ($funciones as $funcion)
                    <div class="col-md-4 mb-4">
                        <div class="function-card"
                            style="box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);">
                            <a href="{{ route('funciones.show', $funcion->id) }}">
                                <img src="{{ '/storage/imagen/' . $funcion->imagen }}" alt="Imagen de la función">
                                <div class="title">{{ $funcion->titulo }}</div>
                            </a>
                            <div class="details">
                                <strong>Detalles de la función</strong>
                                <p>Asientos: {{ $funcion->asientosDisponibles }} / {{ $funcion->numero_reservas }}</p>
                                <p>Fecha: {{ $funcion->fecha }}</p>
                                <p>Hora: {{ $funcion->hora }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</body>

<footer>
    <div class="bottom">
        <div class="col">
            <br>
            Fono: +56 9 5321 9670
            <a href="https://web.facebook.com/MidDA2022"><img src="/icons/facebook.png" alt="Facebook midDa"
                    style="float: right;"></a><a
                href="https://wa.me/+56981427835?text=Hola,%20tengo%20una%20consulta!"><img src="/icons/whatsapp.png"
                    alt="Whatsapp midDa" style="float: right; margin-right: 10px"></a>
            <br>
            Correo: correomidda@midda.cl
            <br>
        </div>
        <br>
        <p style="font-style: italic; color: rgba(196, 223, 230, 0.38); text-align: center;"> ® Proyecto de Museo
            Interactivo Digital Diego de Almagro, Area Cine y Eventos - 2023</p>
        <br>
    </div>
</footer>
</body>

</html>
