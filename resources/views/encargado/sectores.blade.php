@extends('principal.index')
@section('contenido')
    @foreach ($sectores as $sector)
        {{ $sector->nombre }}
    @endforeach
@endsection