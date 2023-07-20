<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contacto Cine MidDA</title>
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jura:wght@500&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@500&display=swap" rel="stylesheet">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link rel="stylesheet" href="/css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body style="background: #C4DFE6">
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
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="red">
                                            <path fill-rule="evenodd" d="M10 1a9 9 0 1 0 0 18 9 9 0 0 0 0-18zM5.707 6.707a1 1 0 0 1 1.414-1.414L10 8.586l2.879-2.879a1 1 0 1 1 1.414 1.414L11.414 10l2.879 2.879a1 1 0 0 1-1.414 1.414L10 11.414l-2.879 2.879a1 1 0 0 1-1.414-1.414L8.586 10 5.707 7.121A1 1 0 0 1 5.707 6.707z" clip-rule="evenodd" />
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
    <hr>
    <br>
    <div class="formSuggestions">
        <div class="formInside">
            <h2> ¿Tienes alguna consulta o sugerencia?</h2>
            <h2>¡Escribenos!</h2>
        </div>
        <br>
        <form action="https://formsubmit.co/vicentebarraza17@outlook.com" method="POST">
        <div id="form">
                <div class="row">
                    <div class="col"> Nombre</div>
                    <div class="col"> Apellido</div>
                </div>
                <div class="row">
                    <div class="col"> <input name="Nombre" type="text" id="name"
                            placeholder="Escriba su nombre" required autofocus></div>
                    <div class="col"> <input name="Apellidos" type="text" id="lastname"
                            placeholder="Escriba su apellido" required></div>
                </div>
                <div class="row">
                    <div class="col"> Correo Electronico</div>
                    <div class="col"> Celular</div>
                </div>
                <div class="row">
                    <div class="col"> <input name="Correo Electronico" type="email" id="email"
                            placeholder="Escriba su e-mail" required></div>
                    <div class="col"> <input name="Telefono" type="number" id="telephone"
                            placeholder="Escriba su telefono" required></div>
                </div>
                <div class="row">
                    <div class="col"> Comentarios</div>
                </div>
                <div class="row">
                    <textarea name="Comentarios" id="mitextarea" cols="40" rows="5" style="resize: none; width: 720px;"
                        placeholder="Ingrese algun comentario o sugerencia..."></textarea>
                </div>
                <div class="Submit" style="margin-left: 5cm;">
                    <input class="mt-5" id="enviar" type="submit" value="Enviar"
                        style="width: 137px;
                    height: 48px; margin-left: 2.5cm; border-radius: 9px;"></div>

                <br>
            </div>
        </form>
    </div>
    <br>
    <br>
    <br>
    <footer>
        <div class="bottom">
            <div class="col">
                <br>
                Fono: +56 9 5321 9670
                <a href="https://web.facebook.com/MidDA2022">
                    <img src="/icons/facebook.png" alt="" style="float: right;"> </a>
                <a href="https://wa.me/+56981427835?text=Hola,%20tengo%20una%20consulta!">
                    <img src="/icons/whatsapp.png" alt="Whatsapp midDa" style="float: right; margin-right: 10px"></a>
                </a>
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
<script src="program.js"></script>

</html>
