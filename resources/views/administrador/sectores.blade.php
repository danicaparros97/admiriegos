@extends('principal.index')
@section('contenido')
    <table class="table table-responsive">
        <thead>
            <tr>
                <th>Nombre sector</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datos['sectores'] as $sector)
                <tr>
                    <td>{{ $sector->nombre }}</td>
                    @foreach ($datos['finca'] as $finca)
                        <td>{{ $finca->nombre }}</td>
                    @endforeach
                </tr>
            @endforeach        
        </tbody>
    </table>
@endsection