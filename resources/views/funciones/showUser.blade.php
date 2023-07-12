<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $funcion->titulo }} - Cine MidDA</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Jura:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

</head>

<body class="antialiased">
    <div id="navbar">
        @if (Route::has('login'))
            @auth
                <form method="POST" action="/logout">
                    @csrf
                    <button type="submit">Salir</button>
                    <a href="{{ Auth::user()->role === 'user' ? route('profile.show') : url('/dashboard') }}">PANEL DE CONTROL</a>
                </form>
            @else
                <a href="{{ route('login') }}">INICIAR SESION</a>
                <a href="{{ route('register') }}">REGISTRO</a>
            @endauth
        @endif
        <a href="{{ route('contacto') }}">CONTACTO</a>
        <a href="{{ route('cartelera') }}">CARTELERA</a>
        <a href="/">INICIO</a>
        <img src="/images/cine en el midda.png" alt="CineMiddaLogo" style="width: 500px;">
    </div>
    <div class="container main-container" style="margin-top: 70px;">
        <div id="ficha">
            <div class="row">
                <div class="mt-5 col-md-4">
                    <div id="imagenFicha">
                        @if ($funcion->imagen)
                            <img src="{{ asset('storage/imagen/' . $funcion->imagen) }}" alt="Imagen de la función"
                                width="275" height="396">
                        @else
                            <p>No se ha cargado una imagen para esta película.</p>
                        @endif
                    </div>
                </div>
                <div class="col-md-8">
                    <div id="datosFicha">
                        <h1>{{ $funcion->titulo }}</h1>
                        <p>{{ $funcion->descripcion }}</p>
                        <p><strong>Fecha de la función:</strong> {{ $funcion->fecha }}</p>
                        <p><strong>Horario:</strong> {{ $funcion->hora }}</p>
                        <div id="reservaButton">
                            <a href="{{ route('funciones.reservar', $funcion->id) }}"
                                class="btn btn-primary">RESERVAR</a>
                        </div>

                    </div>
                </div>
            </div>
            <div class="cantidadTotal">
                <div class="totalReservas">{{ $asientosDisponibles }}</div>
                <div class="mt-4" style="color: white">
                    Asientos Disponibles
                </div>
            </div>

        </div>
    </div>
    <br>

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
