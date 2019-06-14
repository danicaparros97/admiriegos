@extends('principal.index')
@section('contenido')
<div class="container formulario">
    <h1 class="h1 text-center mt-2">Nuevo sector</h1>
    <form action="/administracion/sectores/sector/store" method="post">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" name="nombre" required>
        </div>
        <div class="form-group">
            <label for="sector">Finca</label>
            <select name="finca_id" class="form-control" required>
                @foreach ($datos['fincas'] as $finca)
                <option value="{{ $finca->id }}">{{ $finca->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="row justify-content-between">
            <div class="col-3"></div>
            <button type="submit" class="btn boton col-3">Añadir</button>
            <div class="col-3"></div>
        </div>
    </form>
</div>
@endsection
