@include('proveedor.modal-delete')
<a href="{{ route('proveedor.show', $id) }}">
      <button type="button" class="btn btn-secondary btn-sm">
        <i class="far fa-eye"></i>
      </button>
</a>
<a href="{{ route('proveedor.edit', $id) }}">
      <button type="button" class="btn btn-primary btn-sm">
        <i class="far fa-edit"></i>
      </button>
</a>

<button type="button" class="btn btn-danger btn-sm" data-target="#delete-{{$id}}" data-toggle="modal">
  <i class="far fa-trash-alt"></i>
</button>
