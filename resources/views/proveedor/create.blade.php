@extends ('layouts.app')
@section ('content')
	<div class="row">
        <div class="col-12">
            <h1>Agregar proveedor</h1>
            <form method="POST" action="{{route("proveedor.store")}}">
                @csrf
                <div class="form-group">
                    <label class="label">Nombre de la Empresa</label>
                    <input required autocomplete="off" name="nombreEmpresa" class="form-control"
                           type="text" placeholder="Nombre">
                </div>
                <div class="form-group">
                    <label class="label">Ruc</label>
                    <input required autocomplete="off" name="ruc" class="form-control"
                           type="text" placeholder="ruc">
                </div>
                <div class="form-group">
                    <label class="label">Direccion</label>
                    <input required autocomplete="off" name="direccion" class="form-control"
                           type="text" placeholder="direccion">
                </div>
                <div class="form-group">
                    <label class="label">Telefono</label>
                    <input required autocomplete="off" name="telefono" class="form-control"
                           type="text" placeholder="telefono">
                </div>
                <div class="form-group">
                    <label class="label">Email</label>
                    <input required autocomplete="off" name="email" class="form-control"
                           type="text" placeholder="email">
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
