<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registro</title>
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
            background-color: #f0f2f5;
            font-family: 'Inter', sans-serif;
        }

        #formularioRegistro {
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            margin: 20px;
            padding: 20px;
        }

        #formularioRegistro img {
            max-width: 100%;
            height: auto;
        }

        #formularioRegistro input[type="text"],
        #formularioRegistro input[type="email"],
        #formularioRegistro input[type="password"] {
            width: 90%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 15px;
            margin-bottom: 10px;
            box-sizing: border-box;
            font-size: 20px;
        }

        #formularioRegistro button {
            background-color: #1877f2;
            color: #fff;
            border: none;
            padding: 12px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
            width: 100%;
            margin-bottom: 10px;
        }

    </style>
</head>
<body class="bg-animate">
    <div class="d-flex justify-content-center">
        <div id="formularioRegistro">
            <br>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="row">
                    <div class="col">
                        <img src="/images/cine en el midda admin.png" alt="">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col">
                        <x-label for="name" value="{{ __('Nombre') }}" />
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <x-input id="name" class="block mt-1 w-full" type="text" name="name"
                            :value="old('name')" required autofocus autocomplete="name" placeholder="Ingrese su Nombre de usuario" />
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <x-label for="email" value="{{ __('Correo Electronico') }}" />
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <x-input id="email" class="block mt-1 w-full" type="email" name="email"
                            :value="old('email')" placeholder="Ingrese su Correo electronico" required autocomplete="username" />
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <x-label for="password" value="{{ __('Contraseña') }}" />
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                            autocomplete="new-password" placeholder="Ingrese su contraseña"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <x-label for="password_confirmation" value="{{ __('Confirmar Contraseña') }}" />
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                            name="password_confirmation" required autocomplete="new-password" placeholder="Ingrese su contraseña nuevamente"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <button class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" type="submit" name="enviar"
                            style="color: white;background: #0C6D7E;
                    box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
                    border-radius: 16px; width: 264px;
                    height: 63px;">Registrarse</button>
                </div>
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                    {{ __('Ya estoy registrado') }}
                </a>
            </form>
            <br>
            </label>
            <br>
            <x-validation-errors/>

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
