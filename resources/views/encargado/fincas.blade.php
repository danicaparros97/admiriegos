@extends('principal.index')
@section('contenido')
    @foreach ($fincas as $finca)
        {{ $finca->nombre }}
    @endforeach
@endsection