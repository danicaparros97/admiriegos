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

    <link rel="stylesheet" href="{{URL::asset('css/styles.css')}}">

</head>

<body>
    <div class="container-fluid content">
        <div class="row">
            <nav class="navbar navbar-expand navbar-dark navegador col-sm-12 col-12">
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
                            <button class="btn btn-transparent border-0 mr-2" type="button" id="miusuario"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-user-circle"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="miusuario">

                                @if (Auth::user()->rol == 'administrador')
                                <a class="dropdown-item"
                                    href="/administracion/empleados/empleado/show/{{ Auth::user()->id}} ">Mi Usuario</a>
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
                        @if (Auth::user()->rol == 'administrador')
                        <div class="dropdown dropleft">
                            <button class="btn btn-transparent border-0 mr-2" type="button" id="incidencias"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell"></i>{{ count($datos['incidencias'])}}
                            </button>
                            <div class="dropdown-menu mr-2" aria-labelledby="incidencias">
                                <ul class="list-group text-center ">
                                    <li class="list-group-item border-0">
                                        <h5 class="h5">Incidencias sin resolver: {{ count($datos['incidencias']) }}</h5>
                                    </li>
                                    @foreach ($datos['incidencias'] as $incidencia)
                                    <li class="list-group-item border-0">{{ $incidencia->trabajador}}</li>
                                    <li class="list-group-item border-0 border-bottom"><button class="btn btn-info"
                                            data-toggle="modal" data-target="#modal{{ $incidencia->id }}">Saber
                                            más</button></li>
                                    <hr>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        @foreach ($datos['incidencias'] as $incidencia)
                        <div class="modal fade" id="modal{{ $incidencia->id}}" tabindex="-1" role="dialog"
                            aria-labelledby="modal{{ $incidencia->id}}" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modal{{ $incidencia->id}}">Datos Incidencia</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Nombre empleado: {{ $incidencia->trabajador }}</p>
                                        <p>Descripcion: {{ $incidencia->descripcion }}</p>

                                    </div>
                                    <div class="modal-footer">
                                        <a type="button" class="btn btn-secondary"
                                            onclick="event.preventDefault();document.getElementById('form-incidencias').submit();">
                                            Cerrar incidencia</a>
                                        <form id="form-incidencias"
                                            action="/administracion/incidencias/incidencia/update/{{$incidencia->id}}"
                                            method="POST" style="display: none;">
                                            @csrf
                                            <input type="hidden" name="estado" value="{{$incidencia->id}}">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                        @endif
                    </div>
                    @if (Auth::user()->rol == 'administrador')
                    <button type="button" id="sidebarCollapse" class="btn btn-transparent border-0">
                        <i class="fas fa-align-left"></i>
                    </button>
                    @endif
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
        <footer class="fixed-bottom">
            @yield('paginador')
        </footer>
    </div>
    <div class="overlay"></div>
    </div>
    <script src="{{ URL::asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ URL::asset('js/popper.min.js') }}"></script>
    <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('js/font-awesome-all.min.js') }}"></script>
    <script src="{{ URL::asset('js/sweetalert2.all.min.js') }}"></script>
    <script src="{{URL::asset('js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('js/scripts.js')}}"></script>
    <script>
        $(document).ready(function () {
            //Al pulsar en el boton de añadir del formulario, se comprobara que la fecha inicio no es mayor que la fecha de fin, si lo es, aparecera una alerta indicando que la fecha de inicio introducida es incorrecta.
            $('#add').on('click', function () {
                if ($('#fecha_inicio').val() > $('#fecha_fin').val()) {
                    Swal.fire({
                        type: 'error',
                        title: 'Fecha incorrecta',
                        text: 'La fecha de fin no puede ser menor a la fecha de inicio',
                    })
                }
                //Se comprueba mediante una expresion regular que el dni introducido no es incorrecto, si lo es, aparecera una alerta indicando que el dni introducido no es correcto.
                var patron = /^\d{8}[a-zA-Z]{1}$/g;
                var result = patron.test($('#dni').val());
                if (result == false) {
                    Swal.fire({
                        type: 'error',
                        title: 'DNI Incorrecto',
                        text: 'El dni introducido no es correcto',
                    })
                }
                //Se comprueba mediante una expresion regular que el telefono introducido no es incorrecto, si lo es, aparecera una alerta indicando qeu el dni introducido no es correcto.
                var patron = /^[\d]{3}[-]*([\d]{2}[-]*){2}[\d]{2}$/g;
                var result = patron.test($("#telefono").val());
                if (result == false) {
                    Swal.fire({
                        type: 'error',
                        title: 'Teléfono Incorrecto',
                        text: 'El teléfono introducido no es correcto',
                    })
                }
            });
        });

    </script>
</body>

</html>
