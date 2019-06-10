<h1 class="h1">Ficha Técnica del trabajador Nº {{ $empleado->id }}</h1>
<p>Nombre</p>
<p>{{ $empleado->nombre }}</p>
<p>Apellidos</p>
<p>{{ $empleado->apellidos }}</p>
<p>Email</p>
<p>{{ $empleado->email }}</p>
<p>DNI</p>
<p>{{ $empleado->dni }}</p>
<p>Telefono</p>
<p>{{ $empleado->telefono }}</p>
<p>Email</p>
<p>{{ $empleado->email }}</p>
<p>Sector asignado</p>
<p>{{ $sector->nombre }}</p>
<p>Tarea asignada</p>
<p>Nombre: {{ $tarea->nombre}}</p>
<p>Descripción: {{ $tarea->descripcion}}</p>
<p>Fecha inicio: {{ $tarea->fecha_inicio}}</p>
<p>Fecha fin: {{ $tarea->fecha_fin}}</p>
<p>Estado: {{ $tarea->estado}}</p>
