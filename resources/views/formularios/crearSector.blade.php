@extends('principal.index')
@section('contenido')
<div class="container">
    <form action="/enc/sectores/sector/store" method="post">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" name="nombre">
        </div>
        <div class="form-group">
            <label for="sector">Finca</label>
            <select name="finca_id" class="form-control">
                @foreach ($fincas as $finca)
                <option value="{{ $finca->id }}">{{ $finca->nombre }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Añadir</button>
    </form>
</div>
@endsection