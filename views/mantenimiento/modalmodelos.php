<div id="modalmantenimiento" class="modal fade bd-example-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">
                    <i class="font-icon-close-2"></i>
                </button>
                <h4 class="modal-title" id="mdltitulo"></h4>
            </div>
            <form method="post" id="usuario_form">
                <div class="modal-body">
                    <input type="hidden" id="ID_modelo" name="ID_modelo">

                    <div class="form-group">
							<fieldset class="form-group">
								<label class="form-label" for="ID_marca">Sede</label>
								<select id="ID_marca" name="ID_marca" class="form-control"></select>
							</fieldset>
						</div>
                    

                    <div class="form-group">
                        <label class="form-label" for="Nombre_modelo">Nombre</label>
                        <input type="text" class="form-control" id="Nombre_modelo" name="Nombre_modelo" placeholder="Ingrese Nombre" required>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-rounded btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" name="action" id="#" value="add" class="btn btn-rounded btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>