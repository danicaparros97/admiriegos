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

</head>

<body>
    <div class="container-fluid">

        <div class="row justify-content-around p-0">
            <div class="col-2">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        @if (Auth::guest())
                        <a class="" href="{{ url('/') }}">
                            {{ config('app.name', 'AdmiRiegos') }}
                        </a>
                        @else
                        @if (Auth::user()->rol == 'Encargado')
                        <a class="" href="{{ url('/encargado') }}">
                            <img src="{{ URL::asset('img/logo.png') }}" class="img-fluid">
                        </a>
                        @endif
                        @if (Auth::user()->rol == 'Regador')
                        <a class="" href="{{ url('/regador') }}">
                            <img src="{{ URL::asset('img/logo.png') }}" class="img-fluid">
                        </a>
                        @endif
                        @if (Auth::user()->rol == 'Peon')
                        <a class="" href="{{ url('/peon') }}">
                            <img src="{{ URL::asset('img/logo.png') }}" class="img-fluid">
                        </a>
                        @endif
                        @endif
                    </li>
                    <li class="list-group-item dropright">
                        <a id="navbarDropdown" class="dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->nombre }} <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                {{ __('Cerrar Sesión') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                    <li class="list-group-item dropright">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">Empleados</a>
                        <div class="dropdown-menu">
                            <ul class="list-group">
                                <li class="list-group-item"><a href="/alta-empleado">Ver empleados</a></li>
                                <li class="list-group-item"><a href="/alta-empleado">Añadir nuevo empleado</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="list-group-item dropright">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">Fincas</a>
                        <div class="dropdown-menu">
                            <ul class="list-group">
                                <li class="list-group-item"><a href="/alta-empleado">Ver fincas</a></li>
                                <li class="list-group-item"><a href="/alta-empleado">Añadir nueva finca</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="list-group-item dropright">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">Tareas</a>
                        <div class="dropdown-menu">
                            <ul class="list-group">
                                <li class="list-group-item"><a href="/alta-empleado">Tareas activas</a></li>
                                <li class="list-group-item"><a href="/alta-empleado">Tareas finalizadas</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>

            <div class="col-10">
                @yield('content')
            </div>
        </div>

    </div>
    <script src="{{ URL::asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ URL::asset('js/popper.min.js') }}"></script>
    <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('js/ol.js') }}"></script>
    <script src="{{ URL::asset('js/ol3-layerswitcher.js') }}"></script>

    <script>
        var map = new ol.Map({
            layers: [
                new ol.layer.Tile({
                    source: new ol.source.OSM()
                })
            ],
            target: 'map',
            view: new ol.View({
                center: [37.45, -1.74],
                zoom: 2
            })
        });

    </script>
</body>

</html>
