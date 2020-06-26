@extends ('layouts.app')
@section ('content')
	<div class="row">
        <div class="col-12">
          <label class="label">Nombre de la Empresa: </label>
{{$proveedor->nombreEmpresa}}<br>

                    <label class="label">Ruc:</label>
                    {{$proveedor->ruc}}"<br>

                    <label class="label">Direccion:</label>
{{$proveedor->direccion}}"<br>

                    <label class="label">Telefono:</label>
{{$proveedor->telefono}}"<br>
                    <label class="label">Email:</label>
{{$proveedor->email}}" 


    </div>
@endsection
