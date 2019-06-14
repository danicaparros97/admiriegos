@extends('principal.index')

@section('contenido')
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Apellidos</th>
                <th scope="col">DNI</th>
                <th scope="col">Teléfono</th>
                <th scope="col">Puesto</th>
                <th scope="col">Sector al que pertenece</th>
                <th scope="col">E-Mail</th>
                <th scope="col">Actualizar datos</th>
                <th scope="col">Dar de baja</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datos['empleados'] as $empleado)
                <tr>
                    <td>{{ $empleado->nombre }}</td>
                    <td>{{ $empleado->apellidos }}</td>
                    <td>{{ $empleado->dni }}</td>
                    <td>{{ $empleado->telefono }}</td>
                    <td>{{ $empleado->rol }}</td>
                    <td>{{ $empleado->sector->nombre  }}</td>
                    <td>{{ $empleado->email }}</td>
                    <td><a class="btn boton" href="/administracion/empleados/empleado/edit/{{ $empleado->id }}" role="button">Editar información</i></a></td>
                    <td><a class="btn boton" href="/administracion/empleados/empleado/destroy/{{ $empleado->id }}" role="button">Dar de baja</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
@section('paginador')
<div class="paginador">
    {{ $datos['empleados']->links() }}
</div>
@endsection