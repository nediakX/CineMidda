    <!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Cine MidDA</title>

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
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2"></script>


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

        <div class="container main-container" style="margin-top: 40px;">
            <div class="row">
                <div class="col-3">
                    <div class="asientos-seleccionados">
                        <h3 style="text-align: center">Asientos seleccionados:</h3>
                        <div id="asientosSeleccionadosContainer">{{ $asientos }}</div>
                        <div class="botonCancelar">
                            <h5><a href="reservar">Elegir nuevamente</a></h5>
                        </div>
                    </div>
                </div>
                <div class="col-5">
                    <div class="form-container">
                        <h2>Ingrese sus datos</h2>
                        <form action="{{ secure_url(route('funciones.reservar', ['id' => $funcionid])) }}" method="POST">
                            @csrf
                            <input type="hidden" name="asientos_seleccionados" id="funcionid"
                                value="{{ $asientos }}">
                            <input type="hidden" name="funcionid" id="funcionid" value="{{ $funcionid }}">
                            <label for="nombre">Nombre:</label>
                            <input type="text" name="nombre" id="nombre" placeholder="Ingrese su nombre"
                                required>
                            <label for="rut">RUT:</label>
                            <input type="text" name="rut" id="rut" placeholder="12345678-9" required>
                            <label for="telefono">Teléfono:</label>
                            <input type="text" name="telefono" id="telefono" placeholder="Ingrese su telefono"
                                required>
                            <label for="email">Email:</label>
                            <input type="email" name="email" id="email"
                                placeholder="Ingrese su correo electronico" required>
                            <button type="submit">Enviar Solicitud</button>
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
