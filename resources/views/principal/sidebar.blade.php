<div class="accordion" id="accordionExample">
    <div class="card">
        <div class="card-header" id="headingOne">
            <h2 class="mb-0">
                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#empleados"
                    aria-expanded="true" aria-controls="empleados">
                    <i class="fas fa-angle-down mr-2"></i>Empleados
                </button>
            </h2>
        </div>

        <div id="empleados" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="card-body">
                <ul class="list-group">
                    <li class="list-item"><a href="/administracion/empleados">Ver empleados</a></li>
                    <li class="list-item"><a href="/administracion/empleados/empleado/create">Dar de alta un nuevo
                            empleado</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header" id="headingTwo">
            <h2 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#tareas"
                    aria-expanded="false" aria-controls="tareas">
                    <i class="fas fa-angle-down mr-2"></i>Tareas
                </button>
            </h2>
        </div>
        <div id="tareas" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
            <div class="card-body">
                <li class="list-item"><a href="/administracion/tareas/tarea/create">Añadir nueva tarea</a></li>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header" id="headingThree">
            <h2 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#fincas"
                    aria-expanded="false" aria-controls="fincas">
                    <i class="fas fa-angle-down mr-2"></i>Fincas
                </button>
            </h2>
        </div>
        <div id="fincas" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
            <div class="card-body">
                <li class="list-item"><a href="/administracion/fincas">Ver fincas</a></li>
                <li class="list-item"><a href="/administracion/fincas/finca/create">Añadir nueva finca</a></li>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header" id="headingThree">
            <h2 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#sectores"
                    aria-expanded="false" aria-controls="sectores">
                    <i class="fas fa-angle-down mr-2"></i>Sectores
                </button>
            </h2>
        </div>
        <div id="sectores" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
            <div class="card-body">
                <li class="list-item"><a href="/administracion/sectores/sector/create">Añadir nuevo sector</a></li>
            </div>
        </div>
    </div>
</div>
