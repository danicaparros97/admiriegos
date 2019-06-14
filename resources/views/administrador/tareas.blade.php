@extends('principal.index')

@section('contenido')
<div class="container col-lg-6 col-sm-12 mt-4">

    <table class="table table-responsive">
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
            @foreach ($datos['tareas'] as $tarea)
            <tr>
                <td>{{ $tarea->nombre }}</td>
                <td>{{ $tarea->descripcion }}</td>
                <td>{{ $tarea->fecha_inicio }}</td>
                <td>{{ $tarea->fecha_fin }}</td>
                <td>{{ $tarea->estado }}</td>
                <td class="text-center"><a href="/administracion/tareas/tarea/finalizar/{{ $tarea->id }}"
                        class="btn btn-transparent border-0"><i class="fas fa-check icono"></i></a></td>
                <td class="btn btn-transparent border-0" data-toggle="modal" data-target="#tarea{{$tarea->id}}"><i
                        class="fas fa-angle-double-down"></i></td>

                <div class="modal fade" id="tarea{{$tarea->id}}" tabindex="-1" role="dialog"
                    aria-labelledby="tarea{{$tarea->id}}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="tarea{{$tarea->id}}">Empleados asignados a <strong>{{ $tarea->nombre}}</strong></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                @if (count($tarea->users) > 0)
                                @foreach ($tarea->users as $empleado)
                                <h6>{{ $empleado->nombre }}</h6>
                                @endforeach
                                @else
                                <h6>No hay empleados asignados a esta tarea</h6>
                                @endif
                                
                            </div>
                        </div>
                    </div>
                </div>
            </tr>

            @endforeach
        </tbody>
    </table>
</div>

@endsection
@section('paginador')
<div class="container paginador">
    <div class="row justify-content-center">
        {{ $datos['tareas']->links() }}
    </div>
</div>
@endsection
