<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cine MidDA</title>
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Jura:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <style>
        /* Estilos personalizados del carrusel */
        .swiper-container {
            width: 100%;
            height: 100vh;
        }

        .swiper-slide {
            text-align: center;
            font-size: 18px;
            background: #f5f5f5;
        }

        .swiper-slide img {
            max-width: 100%;
            max-height: 100%;
            display: block;
            margin: 0 auto;
        }

        /* Estilos para el enlace */
        .slide-link {
            display: block;
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
        }
        img {
            height: 7400px;
        }
    </style>
</head>

<body class="antialiased">
    <!-- Carrusel de películas -->
    <div class="swiper-container">
        <div class="swiper-wrapper">
            @foreach ($funciones as $funcion)
                <div class="swiper-slide" style="background-color: black">
                    <a class="slide-link" href="{{ route('funciones.reservar', $funcion->id) }}"></a>
                    <img src="{{ asset('storage/imagen/' . $funcion->imagen) }}" alt="{{ $funcion->titulo }}">
                    <div class="carousel-caption">
                        <h3>{{ $funcion->titulo }}</h3>
                        <p>{{ $funcion->descripcion }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Controles del carrusel -->
        <div class="swiper-pagination"></div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>

    <!-- Scripts al final del body -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var mySwiper = new Swiper(".swiper-container", {
                speed: 600,
                loop: true,
                autoplay: {
                    delay: 2000,
                },
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
            });
        });
    </script>
</body>
</html>
