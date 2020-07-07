

<div class="modal fade modal-slide-in-right" aria-hidden="true"
role="dialog" tabindex="-1" id="delete">
<form method="post" action="{{route('proveedor.destroy', $pro->id )}}">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" 
				aria-label="Close">
                     <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">Eliminar Proveedor</h4>
			</div>
			<div class="modal-body">
				<h2>¿Deseas eliminar el registro de {{ $pro->nombreEmpresa }}? </h2>
			</div>

			<div class="modal-footer">

				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				
	
	@method('DELETE') @csrf
	<button type="submit" class="redondo btn btn-danger">
		<i class="fas fa-trash-alt"></i> E2
	</button>
			</div>
		</div>
	</div>
	</form>
</div>

