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
    <div class="container">
        <div class="row justify-content-center">
            <div id="formulario" class="col-lg-6 col-md-8 col-sm-10">
                <br>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="text-center">
                        <img src="/images/cine en el midda admin.png" alt="">
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <p>Correo</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <input type="email" name="email" id="email" required placeholder="Ingrese su correo electrónico"
                                autofocus class="form-control">
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
                                placeholder="Ingrese su contraseña" class="form-control">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col text-center">
                            <button type="submit" name="enviar" class="btn btn-primary">Iniciar Sesión</button>
                        </div>
                    </div>
                </form>
                <p></p>
                <div class="forget text-center">
                    ¿Ha olvidado su contraseña? <a href="{{ route('password.request') }}">¡Haga clic aquí!</a>
                </div>
                <div class="register text-center">
                    <a href="/register">Regístrate</a> | <a href="/">Volver</a>
                </div>
                <x-validation-errors class="mt-5" />
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
</body>

</html>
