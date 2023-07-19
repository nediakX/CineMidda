<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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
</style>

<body class="antialiased">
    <nav id="navbar" class="navbar navbar-expand-lg fixed-top">
        <a class="navbar-brand" href="/">
            <img src="/images/cine en el midda.png" alt="CineMiddaLogo" style="width: 360px;">
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
                                        <svg xmlns="https://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
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
    <div class="container main-container" style="margin-top: 40px;">
        <div class="row">
            <div class="col-sm-12 col-md-4 mx-auto mb-5">
                <div class="asientos-seleccionados">
                    <h3 style="text-align: center">Asientos seleccionados:</h3>
                    <div id="asientosSeleccionadosContainer">{{ $asientos }}</div>
                    <div class="botonCancelar">
                        <h5><a href="reservar" class="volver-atras">Elegir nuevamente</a></h5>
                    </div>


                </div>
            </div>
            <div class="col-sm-12 col-md-8 mx-auto">
                <div class="form-container">
                    <h2>Ingrese sus datos</h2>
                    <form action="{{ secure_url(route('funciones.reservar', ['id' => $funcionid])) }}" method="POST">
                        @csrf
                        <input type="hidden" name="asientos_seleccionados" id="funcionid" value="{{ $asientos }}">
                        <input type="hidden" name="funcionid" id="funcionid" value="{{ $funcionid }}">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre:</label>
                            <input type="text" name="nombre" id="nombre" class="form-control form-control-sm" placeholder="Ingrese su nombre" required>
                        </div>
                        <div class="mb-3">
                            <label for="rut" class="form-label">RUT:</label>
                            <input type="text" name="rut" id="rut" class="form-control form-control-sm" placeholder="12345678-9" required>
                        </div>
                        <div class="mb-3">
                            <label for="telefono" class="form-label">Teléfono:</label>
                            <input type="text" name="telefono" id="telefono" class="form-control form-control-sm" placeholder="Ingrese su teléfono" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" name="email" id="email" class="form-control form-control-sm" placeholder="Ingrese su correo electrónico" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Enviar Solicitud</button>
                    </form>
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
                        src="/icons/whatsapp.png" alt="Whatsapp midDa" style="float: right;"></a>
                <br>
                Correo: correomidda@midda.cl
                <br>
            </div>
            <br>
            <p style="font-style: italic; color: rgba(196, 223, 230, 0.38); text-align: center;"> ® Proyecto de
                Museo
                Interactivo Digital
                Diego de Almagro, Area Cine y Eventos - 2023</p>
            <br>
        </div>
    </footer>
</body>

</html>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var volverAtrasLink = document.querySelector('.volver-atras');

        volverAtrasLink.addEventListener('click', function(event) {
            event.preventDefault();
            history.back();
        });
    });
</script>
