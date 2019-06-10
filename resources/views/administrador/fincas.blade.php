@extends('principal.index')
@section('contenido')
<div class="container">
    <table class="table table-responsive">
        <thead>
            <tr>
                <th>Finca</th>
                <th>Localización</th>
                <th>Editar</th>
                <th>Sectores</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($fincas as $finca)
            <tr>
                <td>{{ $finca->nombre }}</td> 
                <td>{{ $finca->localizacion }}</td> 
                <td><a href="/administracion/fincas/finca/edit/{{ $finca->id }}" class="btn btn-primary">Editar</a></td>
                @foreach ($finca->sectores as $sector)
                <td>{{ $sector->nombre }}</td>
                @endforeach
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
