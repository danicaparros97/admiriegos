<div class="accordion" id="accordionExample">
    <div class="card">
        <div class="card-header" id="headingOne">
            <h2 class="mb-0">
                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#empleados"
                    aria-expanded="true" aria-controls="empleados">
                    Empleados
                </button>
            </h2>
        </div>

        <div id="empleados" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="card-body">
                <ul class="list-group">
                    <li class="list-item"><a href="/enc/empleados">Ver empleados</a></li>
                    <li class="list-item"><a href="/enc/empleados/empleado/create">Añadir nuevo empleado</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header" id="headingTwo">
            <h2 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#tareas"
                    aria-expanded="false" aria-controls="tareas">
                    Tareas
                </button>
            </h2>
        </div>
        <div id="tareas" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
            <div class="card-body">
                    <li class="list-item"><a href="/enc/tareas/tarea/create">Añadir nueva tarea</a></li>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header" id="headingThree">
            <h2 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#fincas"
                    aria-expanded="false" aria-controls="fincas">
                    Fincas
                </button>
            </h2>
        </div>
        <div id="fincas" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
            <div class="card-body">
                <li class="list-item"><a href="/enc/fincas">Ver fincas</a></li>
                <li class="list-item"><a href="/enc/fincas/finca/create">Añadir nueva finca</a></li>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header" id="headingThree">
            <h2 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#sectores"
                    aria-expanded="false" aria-controls="sectores">
                    Sectores
                </button>
            </h2>
        </div>
        <div id="sectores" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
            <div class="card-body">
                <li class="list-item"><a href="/enc/sectores">Ver sectores</a></li>
                <li class="list-item"><a href="/enc/sectores/sector/create">Añadir nuevo sector</a></li>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header" id="headingThree">
            <h2 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#incidencias"
                    aria-expanded="false" aria-controls="incidencias">
                    Incidencias
                </button>
            </h2>
        </div>
        <div id="incidencias" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
            <div class="card-body">
                <li class="list-item"><a href="/enc/incidencias">Ver incidencias</a></li>
            </div>
        </div>
    </div>
</div>
