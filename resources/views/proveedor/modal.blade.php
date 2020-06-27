
<div class="modal fade modal-slide-in-right" aria-hidden="true"
role="dialog" tabindex="-1" id="modal-ver-{{$pro->id}}">

	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				
                <h4 class="modal-title">Informacion del Proveedor<br></h4>
                <button type="button" class="close" data-dismiss="modal" 
				aria-label="Close">
                     <span aria-hidden="true">×</span>
                </button>
			</div>
			<div class="modal-body">
		<div class="row">
        <div class="col-12">


          <label class="label">Nombre de la Empresa: </label>
{{$pro->nombreEmpresa}}<br>

                    <label class="label">Ruc:</label>
                    {{$pro->ruc}}"<br>

                    <label class="label">Direccion:</label>
{{$pro->direccion}}"<br>

                    <label class="label">Telefono:</label>
{{$pro->telefono}}"<br>
                    <label class="label">Email:</label>
{{$pro->email}}" 

</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>

			</div>
		</div>
	</div>
	</form>

</div>
</div>
</div>