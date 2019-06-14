@extends('principal.index')
@section('contenido')
<div class="container">
    <table class="table table-responsive">
        <thead>
            <tr>
                <th>Finca</th>
                <th>Localización</th>
                <th>Sectores</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datos['fincas'] as $finca)
            <tr>
                <td>{{ $finca->nombre }}</td> 
                <td>{{ $finca->localizacion }}</td> 
                @foreach ($finca->sectores as $sector)
                <td>{{ $sector->nombre }}</td>
                @endforeach
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
