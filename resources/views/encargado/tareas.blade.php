@extends('principal.index')

@section('contenido')
<ul class="list-group list-group-flush">
    @foreach ($tareas as $tarea)
    <li class="list-group-item">{{ $tarea->descripcion}}</li>
    @foreach ($tarea->empleados as $empleado)
        {{ $empleado->nombre }}
    @endforeach
    @endforeach
</ul>
@endsection
