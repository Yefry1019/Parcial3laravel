@extends('layouts.app')
@section('content')

<div class="container">

	<form action="{{url('/mascota/'.$mascota->id) }}" method="post">
		@csrf
		{{ method_field('PATCH') }}
		@include('mascota.form',['modo'=>'Modificar']);	
	</form>
</div>	
@endsection