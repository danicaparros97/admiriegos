@extends('principal.index')

@section('contenido')
<div class="container">
    <div class="row mt-5">
        <div class="container col-4 mt-5">
            <div class="card mt-5">
                <div class="card-body">
                    <h5 class="card-title">Trabajadores en tu sector</h5>
                    <hr>
                    @if (count($datos['empleadosSector']) <= 1) <h5>Actualmente no hay ningún trabajador en este sector
                        </h5>

                        @else
                        <ul class="list-group-flush">
                            @foreach ($datos['empleadosSector'] as $empleado)
                            <li class="list-group-item">{{ $empleado->nombre }}</li>
                            @endforeach
                        </ul>
                        @endif

                </div>
            </div>
        </div>
        <div class="container col-4 mt-5">
            <div class="card mt-5">
                <div class="card-body">
                    <h5 class="card-title">Tarea asignada</h5>
                    <hr>
                    <ul class="list-group-flush">
                        <li class="list-group-item">{{ $datos['tarea']->nombre }}</li>
                        <li class="list-group-item">{{ $datos['tarea']->descripcion }}</li>
                        <li class="list-group-item">{{ $datos['tarea']->fecha_inicio }}</li>
                        <li class="list-group-item">{{ $datos['tarea']->fecha_fin }}</li>
                        <li class="list-group-item">{{ $datos['tarea']->estado }}</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container col-4 mt-5">
            <div class="card mt-5">
                <div class="card-body">
                    <h5 class="card-title">Incidencia</h5>
                    <hr>
                    <form method="POST" action="/empleado/incidencia/store">
                        @csrf
                        <div class="form-group">
                            <label for="trabajador">Nombre</label>
                            <input type="text" class="form-control" name="trabajador"
                                value="{{ $datos['empleado']->nombre . ' ' . $datos['empleado']->apellidos }}" readonly
                                required>
                        </div>

                        <div class="form-group">
                            <label for="dni">Descripcion</label>
                            <textarea class="form-control" name="descripcion" cols="30" rows="5"></textarea>
                        </div>
                        <input type="hidden" value="{{ date('Ymd') }}" name="fecha_incidencia">
                        <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
                        <input type="hidden" value="0" name="estado">
                        <button class="btn btn-primary" href="/empleado/store">Enviar</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
    @endsection
