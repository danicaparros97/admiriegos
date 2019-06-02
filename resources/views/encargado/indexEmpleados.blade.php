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
            </tr>
        </thead>
        <tbody>
            @foreach ($empleados as $empleado)
                <tr>
                    <td>{{ $empleado->nombre }}</td>
                    <td>{{ $empleado->apellidos }}</td>
                    <td>{{ $empleado->dni }}</td>
                    <td>{{ $empleado->telefono }}</td>
                    <td>{{ $empleado->rol }}</td>
                    <td>{{ $empleado->sector_id }}</td>
                    <td>{{ $empleado->email }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection