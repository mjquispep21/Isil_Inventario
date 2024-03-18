<div id="modalinventario" class="modal fade bd-example-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">
					<i class="font-icon-close-2"></i>
				</button>
				<h4 class="modal-title" id="mdltitulo"></h4>
			</div>
			<form enctype="multipart/form-data" method="POST" id="inventario_form" name="inventario_form">

				<input type="hidden" id="ID_ficha" name="ID_ficha">

				<div class="modal-body">
					<input type="hidden" id="ID_usuario" name="ID_usuario">
					<h5 class="m-t-lg with-border">Ubicación</h5>

					<div class="row">
						<div class="col-lg-4">
							<fieldset class="form-group">
								<label class="form-label" for="exampleInput">Sede <span class="color-red">*</span></label>
								<select id="ID_sede" name="ID_sede" class="form-control" required></select>
							</fieldset>
						</div>
						<div class="col-lg-4">
							<fieldset class="form-group">
								<label class="form-label" for="exampleInput">Torre <span class="color-red">*</span></label>
								<select id="ID_torre" name="ID_torre" class="form-control" required></select>
							</fieldset>
						</div>
						<div class="col-lg-4">
							<fieldset class="form-group">
								<label class="form-label" for="exampleInput">N° Salon / Almacén</label>
								<input type="text" class="form-control" id="Salon" name="Salon">
							</fieldset>
						</div>
					</div><!--.row-->
					
					<h5 class="m-t-lg with-border">ISIL Equipo Informático/Fotografía</h5>
					<div class="row">
						<div class="col-lg-6">
							<fieldset class="form-group">
								<label class="form-label" for="exampleInput">Tipo de Almacen <span class="color-red">*</span></label>
								<select id="ID_almacen" name="ID_almacen" class="form-control" required></select>
							</fieldset>
						</div>
						<div class="col-lg-6">
							<fieldset class="form-group">
								<label class="form-label" for="exampleInput">Tipo de equipo <span class="color-red">*</span></label>
								<select id="ID_equipo" name="ID_equipo" class="form-control" required></select>
							</fieldset>
						</div>
						<div class="col-lg-6">
							<fieldset class="form-group">
								<label class="form-label" for="exampleInput">Descripción</label>
								<input type="text" class="form-control" id="Descripcion" name="Descripcion">
							</fieldset>
						</div>
						<div class="col-lg-6">
							<fieldset class="form-group">
								<label class="form-label" for="exampleInput">Nombre de la Marca <span class="color-red">*</span></label>
								<select id="ID_marca" name="ID_marca" class="form-control" required></select>
							</fieldset>
						</div>
						<div class="col-lg-6">
							<fieldset class="form-group">
								<label class="form-label" for="exampleInput">Nombre del Modelo <span class="color-red">*</span></label>
								<select id="ID_modelo" name="ID_modelo" class="form-control" required></select>
							</fieldset>
						</div>
						
						<div class="col-lg-6">
							<fieldset class="form-group">
								<label class="form-label" for="exampleInput">Número de Serie <span class="color-red">*</span></label>
								<input type="text" class="form-control" id="Numero_serie" name="Numero_serie" required>
							</fieldset>
						</div>
						<div class="col-lg-6">
							<fieldset class="form-group">
								<label class="form-label" for="exampleInput">Codigo de Isil</label>
								<input type="text" class="form-control" id="Codigo_isil" name="Codigo_isil">
							</fieldset>
						</div>
						<div class="col-lg-6">
							<fieldset class="form-group">
								<label class="form-label" for="exampleInput">Imagen</label>
								<input type="file" class="form-control" id="Imagen" name="Imagen" accept="image/*">
							</fieldset>
						</div>
						<input type="hidden" id="ID_usuario" name="ID_usuario" value="<?php echo $_SESSION["ID_usuario"] ?>">
					</div><!--.row-->
					<h5 class="m-t-lg with-border">Datos Generales</h5>
					<div class="row">
						<div class="col-lg-6">
							<fieldset class="form-group">
								<label class="form-label" for="exampleInput">Estado <span class="color-red">*</span></label>
								<select class="form-control" id="ID_operatividad" name="ID_operatividad" required></select>
							</fieldset>
						</div>
						<div class="col-lg-6">
							<fieldset class="form-group">
								<label class="form-label" for="exampleInput">Observaciones</label>
								<input type="text" class="form-control" id="Observaciones" name="Observaciones">
							</fieldset>
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