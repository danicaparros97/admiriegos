<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'AdmiRiegos') }}</title>

    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/ol.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/ol3-layerswitcher.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/font-awesome-all.min.css') }}">

    <link href="{{URL::asset('fullcalendar/packages/core/main.css')}}" rel="stylesheet">
    <link href="{{URL::asset('fullcalendar/packages/daygrid/main.css')}}" rel="stylesheet">
    <link href="{{URL::asset('fullcalendar/timegrid/main.css')}}" rel="stylesheet">
    <link href="{{URL::asset('fullcalendar/packages/list/main.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="{{URL::asset('css/styles.css')}}">

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">
            <img src="{{URL::asset('img/logo.png')}}" class="img-fluid" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav" aria-controls="nav"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="nav">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="empleados" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Empleados
                    </a>
                    <div class="dropdown-menu" aria-labelledby="empleados">
                        <a href="#" class="dropdown-item">Ver empleados</a>
                        <a href="#" class="dropdown-item">Añadir nuevo empleado</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" id="calendario" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Calendario de tareas
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" id="empleados" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Fincas
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="usuario" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->nombre }} <span class="caret"></span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="usuario">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            {{ __('Cerrar Sesión') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container-fluid contenido">
        <div class="row justify-content-around">
            <div class="col-12 bg-danger">
                @yield('contenido')
            </div>
        </div>

    </div>
    <script src="{{ URL::asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ URL::asset('js/popper.min.js') }}"></script>
    <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('js/ol.js') }}"></script>
    <script src="{{ URL::asset('js/ol3-layerswitcher.js') }}"></script>
    <script src="{{ URL::asset('js/font-awesome-all.min.js') }}"></script>

    <script src="{{ URL::asset('fullcalendar/packages/core/main.js') }}"></script>
    <script src="{{ URL::asset('fullcalendar/packages/interaction/main.js') }}"></script>
    <script src="{{ URL::asset('fullcalendar/packages/daygrid/main.js') }}"></script>
    <script src="{{ URL::asset('fullcalendar/packages/timegrid/main.js') }}"></script>
    <script src="{{ URL::asset('fullcalendar/packages/list/main.js') }}"></script>
</body>

</html>
