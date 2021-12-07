<h1>{{ $modo }} Mascota</h1>
@if (count($errors)>0)
<div class="alert alert-danger">
<ul>
@foreach ($errors->all() as $error)
<li> {{ $error }} </li>
@endforeach				
</ul>
</div>
@endif

<div class="form-group">
<label for="Nombre">Nombre de la mascota : </label>
<input type="text" name="Nombre"  class="form-control" value="{{ isset($mascota->nombre)?$mascota->nombre:old('Nombre') }}" id="Nombre">
</div>
<div class="form-group">
<label for="Fecha_nacimiento">Fecha Nacimiento : </label>
<input type="date" name="Fecha_nacimiento"  class="form-control" value="{{ isset($mascota->fecha_nacimiento)?$mascota->fecha_nacimiento:old('Fecha_nacimiento') }}" id="Fecha_nacimiento">
</div>
<div class="form-group">
<label for="Cedula_propietario">Cedula del propietario : </label>
<input type="text" name="Cedula_propietario"  class="form-control" value="{{ isset($mascota->cedula_propietario)?$mascota->cedula_propietario:old('Cedula_propietario') }}" id="Cedula_propietario">
</div>

<input class="btn btn-success" type="submit" value="{{ $modo }} Informacion">

<a href="{{url('/mascota/') }}" class="btn btn-primary"> Atras</a>
<br>