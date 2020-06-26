@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-sm-4">
  <form action="/usuarios" method="POST">
    <!-- toke -->
    @csrf
  <div class="form-group">
    <label for="name">Nombre</label>
    <input type="text" class="form-control" name="name" placeholder="Ingrese su nombre">
  </div>
  <div class="form-group">
    <label for="email">Ingrese su correo electronico</label>
    <input type="email" class="form-control" name="email" placeholder="Ingrese su correo electronico">
  </div>
  <div class="form-group">
    <label for="password">Ingrese su contraseña</label>
    <input type="password" class="form-control" name="password" placeholder="Ingrese su contraseña">
  </div>
  <button type="submit" class="btn btn-primary">Registrar</button>
  <button type="reset" class="btn btn-danger">Cancelar</button>
  </form>
      </div>
    </div>
  </div>
@endsection
