@extends('index')

@section('content')
<ul class="list-group list-group-flush">
    @foreach ($tareas as $tarea)
    <li class="list-group-item">{{ $tarea->descripcion}}</li>
    @endforeach
</ul>
@endsection
