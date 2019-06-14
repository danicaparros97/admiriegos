@extends('empleados.indexEmpleado')

@section('incidencia')
<div id="exampleModal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Nueva Incidencia</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/empleado/incidencia/store">
                    <div class="form-group">
                        <label for="trabajador">Nombre</label>
                        <input type="text" class="form-control" name="trabajador"
                            value="{{ $datos['empleado']->nombre . ' ' . $datos['empleado']->apellidos }}" readonly
                            required>
                    </div>

                    <div class="form-group">
                        <label for="dni">Descripcion</label>
                        <textarea class="form-control" name="descripcion" cols="30" rows="5"></textarea>
                    </div>
                    <button class="btn btn-primary" type="submit">Enviar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
