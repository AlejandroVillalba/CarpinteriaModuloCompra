@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-sm-4">
        <h3>Crear Nuevo Usuario</h3>
            @if(count($errors) > 0)
              <div class="errors">
                <ul>
                    @foreach($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                </ul>
              </div>
            @endif
  <form action="/usuarios" method="POST">
    <!-- toke -->
    @csrf
  <div class="form-group">
    <label for="name">Nombre</label>
    <input type="text" class="form-control @error('alpha') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="nombre" placeholder="Ingrese su nombre">
      @error('alpha')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
  </div>
  <div class="form-group">
    <label for="email">Ingrese su correo electronico</label>
    <input type="email" required autocomplete="email" value="{{ old('email') }}" class="form-control @error('unique') is-invalid @enderror" name="email" placeholder="Ingrese su correo electronico">
    @error('unique')
             <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
             </span>
    @enderror
  </div>
  <div class="form-group">
    <label for="email">Rol</label>
    <select name="rol" class="form-control">
      <option selected disabled> Elige un rol para este usuario</option>
      @foreach($roles as $role)
      <option value="{{ $role->id }}">{{ $role->name}}</option>
      @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="password">Ingrese su contraseña</label>
    <input type="password" class="form-control @error('alpha') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="password" placeholder="Ingrese su contraseña">
  </div>
  <button type="submit" class="btn btn-primary">Registrar</button>
  <button type="reset" class="btn btn-danger">Cancelar</button>
  </form>

    </div>
  </div>
@endsection
