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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


</head>

<body class="antialiased" style="margin-top: -90px;">
    <div id="navbar" class="no-margin">
        @if (Route::has('login'))
            @auth
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit">Salir</button>
                    <a href="{{ Auth::user()->role === 'user' ? route('profile.show') : url('/dashboard') }}">PANEL DE
                        CONTROL</a>
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
    <div class="welcome-container">
        @foreach ($funciones as $funcion)
            <a href="{{ route('funciones.show', $funcion->id) }}">
                <div class="welcome-function">
                    <img class="image" src="{{ '/storage/imagen/' . $funcion->imagen }}"
                        alt="Imagen de la función" style="width: 700px; height: 800px">
                    <div class="title">{{ $funcion->titulo }}
                        <br>
                        Reserve Aqui - Disponibles
                        ({{ $funcion->asientosDisponibles }}/{{ $funcion->numero_reservas }})
                    </div>
                </div>
            </a>
        @endforeach
    </div>
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
                <div class="col">
                    <div class="mapa">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d4618.165547895766!2d-70.04785773824828!3d-26.39141745426784!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x96a319208223e9f7%3A0x6be93c15e57008c!2sEstaci%C3%B3n%20Cultural%20Pueblo%20Hundido!5e1!3m2!1ses-419!2scl!4v1683750689684!5m2!1ses-419!2scl"
                            width="600" height="450"
                            style="border-radius: 37px; box-shadow: 0px 4px 20px 3px rgba(0, 0, 0, 0.25);;"
                            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
                <div class="col">
                    <br><br>
                    <div class="row">

                        <h1>¿Donde Encontrarnos?</h1>
                        <p></p>
                        <h2>Estacion Cultural Pueblo Hundido</h2>
                        <h2>Calle Juan Martinez de Rosa #1103</h2>

                    </div>
                    <hr>
                    <div class="row">
                        <h1>Horarios</h1>
                        <h2>Jueves desde las 18:00 </h2>
                        <h2>Viernes desde las 17:30</h2>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <footer>
        <div class="bottom">
            <div class="col">
                <br>
                Fono: +56 9 5321 9670
                <a href="https://web.facebook.com/MidDA2022"><img src="/icons/facebook.png" alt="Facebook midDa"
                        style="float: right;"></a>
                <a href="https://wa.me/+56981427835?text=Hola,%20tengo%20una%20consulta!"><img
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
