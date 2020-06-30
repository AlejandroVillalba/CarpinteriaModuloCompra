@extends ('layouts.app')
@section ('content')

        <div class="col-12">
            <h1>Agregar proveedor</h1>
            @if(count($errors) > 0)
		<div class="errors">
			<ul>
			@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
			</ul>
		</div>
	@endif
            <form method="POST" action="{{route("proveedor.store")}}">

                @csrf
                <div class="form-group">
                    <label class="label">Nombre de la Empresa</label>
                    
                           <input id="nameEmpresa" type="text" class="form-control @error('alpha') is-invalid @enderror" name="nombreEmpresa" value="{{ old('nombreEmpresa') }}" required autocomplete="nombre" placeholder="Ingrese el nombre de la empresa" autofocus>

                                @error('alpha')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>
                <div class="form-group">
                    <label class="label">Ruc</label>
                    <input id="ruc" required autocomplete="ruc" value="{{ old('ruc') }}" name="ruc" class="form-control @error('unique') is-invalid @enderror"
                           type="numeric" placeholder="Ingrese su ruc">
                           @error('unique')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>
                <div class="form-group">
                    <label class="label">Direccion</label>
                    <input required autocomplete="direccion" value="{{ old('direccion') }}" name="direccion" class="form-control"
                           type="text" placeholder="Ingrese su direccion">
                </div>
                <div class="form-group">
                    <label class="label">Telefono</label>
                    <input required autocomplete="numero de telefono" value="{{ old('telefono') }}" name="telefono" class="form-control"
                           type="text" placeholder="Ingrese su numero de telefono">
                </div>
                <div class="form-group">
                	<label class="label">Email</label>
                	<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Ingrese su e-mail">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>

                <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Aceptar') }}
                                </button>
                                <button type="reset" class="btn btn-primary">
                                    {{ __('Cancelar') }}
                                </button>
                            </div>
                        </div>
            </form>
        </div>
    </div>
@endsection
