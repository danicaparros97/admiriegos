@extends('principal.index')

@section('incidencias')
@if (count($datos['incidenciass']) == 0)
    
@endif
    @foreach ($datos['incidencias'] as $incidencia)
        {{$incidencia->trabajador}}
    @endforeach
@endsection