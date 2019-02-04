<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @yield('head_content')

    {{-- Bootstrap y CSS principal --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-primary" id="mainNavbar">
        <a class="navbar-brand" href="{{ route('welcome') }}">{{ config('app.name', 'Laravel') }}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav mr-auto">
                <li id="initial" class="nav-item active">
                    <a class="nav-link" href="{{ route('index') }}" title="Ver listado directo">
                        <i class="fas fa-comments"></i>
                        Lista directa
                    </a>
                </li>

                <li id="initial" class="nav-item active">
                    <a class="nav-link" href="{{ route('index_x_ctrl') }}" title="Ver listado X controlador">
                        <i class="far fa-comments"></i>
                        Lista X CTRL
                    </a>
                </li>
            </ul>

            <ul class="navbar-nav navbar-right ">
                <li class="nav-item active">
                    <a class="nav-link" href="#home" title="Ir a HOME">
                        <i class="fas fa-home"></i>
                        Home
                    </a>
                </li>
                <li class="nav-item dropdown active">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-user"></i>
                        YoSoY
                    </a>

                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#usuario/1" title="Ver tu perfil">Perfil</a>
                        <a class="dropdown-item" href="#logout"
                        onclick="event.preventDefault();
                        document.getElementById('_logout-form').submit();" title="Salir de la sesión">
                            Logout
                        </a>

                        <form id="logout-form" action="#logout" method="POST" style="display: none;">
                            <input type="hidden" name="_token" value="pJXsZOzYougUKGwEZk5arApqeodke3wEi4Bj5ZNN">
                        </form>
                    </div>
                </li>

                <li class="nav-item dropdown active">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-flag"></i>
                        Idioma
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">Euskara</a>
                        <a class="dropdown-item active" href="#">Castellano</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <main class="m-5 p-5">

        <div class="container">
            @yield('content')
        </div>

    </main>

    @yield('footer_scripts_content')
</body>
</html>
