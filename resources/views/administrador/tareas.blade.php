@extends('principal.index')

@section('contenido')
<div class="container">

    <table class="table table-responsive text-left">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Inicio</th>
                <th>Fin</th>
                <th>Estado</th>
                <th>Finalizar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tareas as $tarea)
            <tr>
                <td>{{ $tarea->nombre }}</td>
                <td>{{ $tarea->descripcion }}</td>
                <td>{{ $tarea->fecha_inicio }}</td>
                <td>{{ $tarea->fecha_fin }}</td>
                <td>{{ $tarea->estado }}</td>
                <td class="text-center"><a href="/administracion/tareas/tarea/finalizar/{{ $tarea->id }}"
                        class="btn btn-primary"><i class="fas fa-times"></i></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
@section('paginador')
<div class="paginador">
    {{ $tareas->links() }}
</div>
@endsection