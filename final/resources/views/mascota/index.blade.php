@extends('layouts.app')
@section('content')

<div class="container">
	@if (Session::has('mensaje'))
		{{ Session::get('mensaje')}}
	@endif

	<a href="{{url('/mascota/create') }}" class="btn btn-success"> Registrar Mascota</a>
	<table class="table table-ligth">
		<thead class="thead-ligth">
			<tr>
				<th>#</th>
				<th>Nombre  de la mascota</th>
				<th>Fecha Nacimiento</th>
				<th>Cedula del propietario</th>
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($mascotas as $mascota)
			<tr>
				<th>{{ $mascota->id }}</th>
				<th>{{ $mascota->nombre }}</th>
				<th>{{ $mascota->fecha_nacimiento }}</th>
				<th>{{ $mascota->cedula_propietario }}</th>
				<th>
					<a href="{{url('/mascota/'.$mascota->id.'/edit') }}" class="btn btn-success">
						Modificar 	
					</a>

					<form action="{{url('/mascota/'.$mascota->id)}}"  class="d-inline"  method="post">
						@csrf 
						{{ method_field('DELETE') }}
						<input type="submit" class="btn btn-warning" onclick="return confirm('Desea eliminar el registro')" value="Eliminar" >
					</form>
				</th>
			</tr>	
			@endforeach	
		</tbody>
	</table>
</div>	
@endsection