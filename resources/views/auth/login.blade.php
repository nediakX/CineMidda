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
</head>

<body class="bg-animate">
    <div class="d-flex justify-content-center">
        <div id="formulario" class="p-3">
            <div class="text-center">
                <img src="{{ secure_asset('images/cine en el midda admin.png') }}" alt="">
            </div>
            <br>
            <form method="POST" action="{{ secure_url('login') }}">
                @csrf
                <div class="row">
                    <div class="col">
                        <p>Correo</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <input type="email" name="email" id="email" required
                            placeholder="Ingrese su correo electrónico" autofocus>
                    </div>
                </div>
                <p></p>
                <div class="row">
                    <div class="col">
                        <p>Contraseña</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <input type="password" name="password" id="password" required
                            placeholder="Ingrese su contraseña">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col">
                        <button type="submit" name="enviar" style="color: white;background: #0C6D7E;
                            box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
                            border-radius: 16px; width: 100%;
                            height: 63px;">Iniciar Sesión</button>
                    </div>
                </div>
            </form>
            <p></p>
            <div class="forget">
                ¿Ha olvidado su contraseña? <a href="{{ secure_url('password.request') }}">¡Haga clic aquí!</a>
            </div>
            <div class="register">
                <a href="{{ secure_url('register') }}">Regístrate</a> | <a href="{{ secure_url('/') }}">Volver</a>
            </div>
            <x-validation-errors class="mt-5" />
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

</body>

</html>
