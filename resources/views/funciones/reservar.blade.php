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
        display: flex
    }

    @media (max-width: 767px) {
        .image {
            max-width: 100%;
            height: auto;
        }

        #fichaAsientos {
            margin-top: 20px;
            width: 100%
        }

        .asientos-table {
            width: 100%;
        }
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

    <div class="col">
        <div class="container main-container" style="margin-top: 70px;">
            <div class="row">
                @if ($errors->has('asientos_seleccionados'))
                    <div class="alert alert-danger">
                        {{ $errors->first('asientos_seleccionados') }}
                    </div>
                @endif
                <div class="col-md-5 mb-4">
                    <div class="image-container text-center">
                        <div id="imagenFicha">
                            @if ($funcion->imagen)
                            <img class="image img-fluid" src="{{ '/storage/imagen/' . $funcion->imagen }}"
                                alt="Imagen de la función">
                            @else
                            <p>No se ha cargado una imagen para esta película.</p>
                            @endif
                        </div>
                        <h4 class="mt-4">Película: {{ $funcion->titulo }}</h4>
                    </div>
                </div>

                <div class="col-md-4 mb-5">
                    <div id="fichaAsientos" class="text-center">
                        <form action="{{ route('funciones.ingresardatos', ['id' => $funcion->id]) }}" method="GET">
                            @csrf
                            <input type="hidden" name="asientos_seleccionados" id="asientosSeleccionadosInput" value="">
                            <input type="hidden" name="funcionid" id="funcionid" value="{{ $funcion->id }}">
                            <h1>Escoja un asiento por favor</h1>
                            <div class="table-responsive">
                                <table class="asientos-table mx-auto">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            @php
                                            $numFilas = ceil($asientosDisponibles / 6);
                                            $numColumnas = ceil($asientosDisponibles / $numFilas);
                                            @endphp
                                            @for ($columna = 1; $columna <= $numColumnas; $columna++) <th>{{ $columna }}
                                                </th>
                                                @endfor
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $numAsiento = 1;
                                        $letrasFila = range('A', 'Z');
                                        @endphp
                                        @for ($fila = 0; $fila < $numFilas; $fila++) <tr>
                                            <th>{{ $letrasFila[$fila] }}</th>
                                            @for ($columna = 1; $columna <= $numColumnas; $columna++) @php
                                                $numAsientoActual=$fila * $numColumnas + $columna;
                                                $asientoOcupado=in_array($numAsientoActual, $asientosOcupados); @endphp <td>
                                                @if ($numAsiento <= $asientosDisponibles) <div class="asiento
                                                                {{ $asientoOcupado ? 'ocupado' : 'disponible' }}
                                                                {{ $asientoOcupado ? 'no-seleccionable' : '' }}"
                                                    onclick="seleccionarAsiento(this)" {{ $asientoOcupado ? 'disabled' : ''
                                                    }}>
                                                    <span>{{ $numAsiento }}</span>
                            </div>
                            @php
                            $numAsiento++;
                            @endphp
                            @endif
                            </td>
                            @endfor
                            </tr>
                            @endfor
                            </tbody>
                            </table>
                            <button class="mt-5" type="submit">Aceptar</button>
                        </form>
                        <div id="asientosSeleccionadosContainer" class="mt-3 funciones-seleccionadas"></div>
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
                        style="float: right;"></a><a
                    href="https://wa.me/+56981427835?text=Hola,%20tengo%20una%20consulta!"><img
                        src="/icons/whatsapp.png" alt="Whatsapp midDa" style="float: right;"></a>
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
<script>
    function seleccionarAsiento(asiento) {
        if (asiento.classList.contains('ocupado')) {
            return;
        }
        asiento.classList.toggle('seleccionado');
        var numAsiento = parseInt(asiento.querySelector('span').innerHTML);
        var asientosSeleccionados = document.querySelectorAll('.asiento.seleccionado');
        var asientosSeleccionadosContainer = document.getElementById('asientosSeleccionadosContainer');
        asientosSeleccionadosContainer.innerHTML = '';

        var asientosSeleccionadosArray = [];

        for (var i = 0; i < asientosSeleccionados.length; i++) {
            var numAsientoSeleccionado = parseInt(asientosSeleccionados[i].querySelector('span').innerHTML);
            var asientoSeleccionado = document.createElement('div');
            asientoSeleccionado.innerHTML = 'Asiento escogido: ' + numAsientoSeleccionado + ' ';
            asientosSeleccionadosContainer.appendChild(asientoSeleccionado);

            asientosSeleccionadosArray.push(numAsientoSeleccionado);
        }

        var asientosSeleccionadosInput = document.getElementById('asientosSeleccionadosInput');
        asientosSeleccionadosInput.value = asientosSeleccionadosArray.join(',');
    }
</script>
