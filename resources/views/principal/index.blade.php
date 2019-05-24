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
    <link rel="stylesheet" href="{{ URL::asset('css/jquery.mCustomScrollbar.min.css') }}">

    <link href="{{URL::asset('fullcalendar/packages/core/main.css')}}" rel="stylesheet">
    <link href="{{URL::asset('fullcalendar/packages/daygrid/main.css')}}" rel="stylesheet">
    <link href="{{URL::asset('fullcalendar/timegrid/main.css')}}" rel="stylesheet">
    <link href="{{URL::asset('fullcalendar/packages/list/main.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="{{URL::asset('css/styles.css')}}">

</head>

<body>
    <div class="container-fluid contenido">
        <div class="row justify-content-around">
            <nav id="sidebar" class="bg-light">
                <div class="card-header">
                    <h3><img src="{{ URL::asset('img/logo.png') }}" class="img-fluid"></h3>
                    <button type="button" id="dismiss" class="btn btn-light btn-ocultar">
                        <i class="fas fa-arrow-left"></i>
                    </button>
                </div>
                <ul class="list-group">
                    <div class="accordion">
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h2 class="mb-0">
                                    <button class="btn btn-link" type="button" data-toggle="collapse"
                                        data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Empleados
                                    </button>
                                </h2>
                            </div>

                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                                    richardson ad
                                    squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck
                                    quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird
                                    on it
                                    squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh
                                    helvetica,
                                    craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan
                                    excepteur
                                    butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic
                                    synth
                                    nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                </div>
                            </div>
                        </div>
                    </div>
                </ul>
            </nav>
            <button type="button" id="sidebarCollapse" class="btn btn-info">
                <i class="fas fa-align-left"></i>
                <span>Toggle Sidebar</span>
            </button>
            <div class="col-12 bg-danger">
                @yield('contenido')
            </div>
        </div>

    </div>
    <a class="nav-link dropdown-toggle" href="#" id="usuario" role="button" data-toggle="dropdown" aria-haspopup="true"
        aria-expanded="false">
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

    <script src="{{URL::asset('js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#sidebar").mCustomScrollbar({
                theme: "minimal"
            });

            $('#dismiss, .overlay').on('click', function () {
                $('#sidebar').removeClass('active');
                $('.overlay').removeClass('active');
            });

            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').addClass('active');
                $('.overlay').addClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });
        });

    </script>
</body>

</html>
