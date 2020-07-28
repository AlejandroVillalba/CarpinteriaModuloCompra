@extends ('layouts.app')
@section ('content')
<div class="container">
    <h2>Lista de proveedores registrados
      <a href="{{ route('reportePDF')}}" target="_blank" type="button" class="btn btn-primary">Reporte Proveedor</a>
      <a href="proveedor/create"><button type="button" class="btn btn-success float-right">Agregar Proveedor</button></a>
    </h2>
  <table class="table table-bordered data-table">
    <thead>
      <tr>
        <th scope="col">Nombre Empresa</th>
        <th scope="col">Ruc</th>
        <th scope="col">Direccion</th>
        <th scope="col">Telefono</th>
        <th scope="col">Email</th>
        <th scope="col">Opciones</th>
      </tr>
    </thead>
    <tbody>

    </tbody>
  </table>
</div>

@push('scripts')
  <script>
    $(function(){
      var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('proveedor.index') }}",
        columns: [
          { data: 'nombreEmpresa', name: 'nombreEmpresa'},
          { data: 'ruc', name: 'ruc'},
          { data: 'direccion', name: 'direccion'},
          { data: 'telefono', name: 'telefono'},
          { data: 'email', name: 'email'},
          { data: 'action', name: 'action', orderable: false, searchable: false},
        ]
      });
    });
  </script>
@endpush

@endsection
