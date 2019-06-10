<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'AdmiRiegos') }}</title>

    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/font-awesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/jquery.mCustomScrollbar.min.css') }}">

    <link href="{{URL::asset('fullcalendar/packages/core/main.css')}}" rel="stylesheet">
    <link href="{{URL::asset('fullcalendar/packages/daygrid/main.css')}}" rel="stylesheet">
    <link href="{{URL::asset('fullcalendar/timegrid/main.css')}}" rel="stylesheet">
    <link href="{{URL::asset('fullcalendar/packages/list/main.css')}}" rel="stylesheet">


    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css"
        integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
        crossorigin="" />

    <link rel="stylesheet" href="{{URL::asset('css/styles.css')}}">

</head>

<body>
    <div class="container-fluid content">
        <div class="row">
            <nav class="navbar navbar-expand navbar-light bg-light col-sm-12 col-12">
                @if (Auth::user()->rol == 'administrador')
                <a class="navbar-brand h1" href="/administracion">Admiriegos</a>
                @else
                <a class="navbar-brand h1" href="/empleado">Admiriegos</a>
                @endif
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">

                        </li>

                    </ul>
                    <div class="form-inline my-2 my-lg-0">
                        <div class="dropdown dropleft">
                            <button class="btn btn-secondary mr-2" type="button" id="dropdownMenuButton"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-user-circle"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                
                                @if (Auth::user()->rol == 'administrador')
                                <a class="dropdown-item" href="/administracion/empleados/empleado/show/{{ Auth::user()->id}} ">Mi Usuario</a>
                                @else
                                <a class="dropdown-item" href="/empleado/show/{{ Auth::user()->id}} ">Mi Usuario</a>
                                @endif
                                
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    {{ __('Cerrar Sesión') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>

                        </div>
                    </div>
                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                    </button>
                </div>
        </div>
        </nav>
        <div class="wrapper col-12 m-0">
            <!-- Sidebar  -->
            <nav id="sidebar">
                @include('principal.sidebar')
            </nav>

            <!-- Page Content  -->
            <div class="container-fluid">
                @yield('contenido')
            </div>
        </div>
        <footer class="position-absolute">
            @yield('paginador')
        </footer>
    </div>
    <div class="overlay"></div>
    </div>
    <script src="{{ URL::asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ URL::asset('js/popper.min.js') }}"></script>
    <script src="{{ URL::asset('js/bootstrap.bundle.js') }}"></script>
    <script src="{{ URL::asset('js/font-awesome-all.min.js') }}"></script>
    <script type="text/javascript" src="{{URL::asset('js/scripts.js')}}"></script>
    <script src="{{URL::asset('js/jquery.mCustomScrollbar.concat.min.js')}}"></script>

</body>

</html>
