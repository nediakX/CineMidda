<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Iniciar Sesion</title>
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    <link rel="icon" type="image/x-icon" href="/icons/favicon/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@500&family=Jura:wght@500&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="/css/styleAdmin.css">
    <style>
        body {
            background: linear-gradient(180deg, #ECFBFF 0%, rgba(91, 209, 239, 0.7) 100%);
        }

        .bubbles {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            z-index: -1;
        }

        .bubble {
            border-radius: 50%;
            background: white;
            opacity: .2;
            position: absolute;
            bottom: 0;
            animation: bubbles 3s linear infinite;
        }

        .bubble:nth-child(1) {
            width: 250px;
            height: 250px;
            left: 1%;
            animation-duration: 5s;
        }

        .bubble:nth-child(2) {
            width: 80px;
            height: 80px;
            left: 12%;
            animation-duration: 6s;
        }

        .bubble:nth-child(3) {
            width: 50px;
            height: 50px;
            left: 20%;
            animation-duration: 8s;
        }

        .bubble:nth-child(4) {
            width: 120px;
            height: 120px;
            left: 18%;
            animation-duration: 3s;
        }

        .bubble:nth-child(5) {
            width: 50px;
            height: 50px;
            left: 80%;
            animation-duration: 6s;
        }

        .bubble:nth-child(6) {
            width: 120px;
            height: 120px;
            left: 72%;
            animation-duration: 2s;
        }

        .bubble:nth-child(7) {
            width: 40px;
            height: 40px;
            left: 74%;
            animation-duration: 8s;
        }

        .bubble:nth-child(8) {
            width: 100px;
            height: 100px;
            left: 13%;
            animation-duration: 2s;
        }

        .bubble:nth-child(9) {
            width: 110px;
            height: 110px;
            left: 77%;
            position: fixed;
            animation-duration: 4s;
        }

        .bubble:nth-child(10) {
            width: 300px;
            height: 300px;
            position: fixed;
            left: 86%;
            animation-duration: 8s;
        }

        @keyframes bubbles {
            0% {
                bottom: 0;
                opacity: 0;
            }

            50% {
                opacity: .4;
            }

            100% {
                bottom: 80vh;
                opacity: 0;
            }
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8 col-sm-10 col-12">
                <div id="formulario" class="p-3">
                    <div class="text-center">
                        <img src="{{ secure_asset('images/cine en el midda admin.png') }}" alt="">
                    </div>
                    <br>
                    <form method="POST" action="{{ secure_url('login') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Correo</label>
                            <input type="email" name="email" id="email" required
                                placeholder="Ingrese su correo electrónico" autofocus class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Contraseña</label>
                            <input type="password" name="password" id="password" required
                                placeholder="Ingrese su contraseña" class="form-control">
                        </div>
                        <div class="mb-3">
                            <button type="submit" name="enviar" class="btn btn-primary btn-block">Iniciar
                                Sesión</button>
                        </div>
                    </form>
                    <div class="forget">
                        ¿Ha olvidado su contraseña? <a href="{{ secure_url('password.request') }}">¡Haga clic aquí!</a>
                    </div>
                    <div class="register">
                        <a href="{{ secure_url('register') }}">Regístrate</a> | <a href="{{ secure_url('/') }}">Volver</a>
                    </div>
                    <x-validation-errors class="mt-5" />
                </div>
            </div>
        </div>
    </div>
    <div class="bubbles">
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-CE7OIX1Jl1DDPGtdZuKz4WwJFOTYZAqEK9Gyv5VEFwFlGfZDbmlUVeUbRN9sZ/Bu"
        crossorigin="anonymous"></script>
</body>

</html>
