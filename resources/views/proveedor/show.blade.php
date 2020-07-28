@extends('layouts.app')

@section('content')
<div class="jumbotron jumbotron-fluid">
<div class="container">
  <h1 class="display-4">{{$proveedor->nombreEmpresa}}</h1>
  <p class="lead">Ruc: {{$proveedor->ruc}}</p>
	<p class="lead">Direccion: {{$proveedor->direccion}}</p>
	<p class="lead">Telefono: {{$proveedor->telefono}}</p>
	<p class="lead">Correo Electronico: {{$proveedor->email}}</p>
</div>
</div>

@endsection
