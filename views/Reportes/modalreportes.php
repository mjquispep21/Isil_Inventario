<div id="modalreporte" class="modal fade bd-example-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">
					<i class="font-icon-close-2"></i>
				</button>
				<h4 class="modal-title" id="mdltitulo"></h4>
			</div>
			<form method="post" id="inventario_form">

				<input type="hidden" id="ID_ficha" name="ID_ficha">

				<div class="modal-body">
					<input type="hidden" id="ID_usuario" name="ID_usuario">
					<h5 class="m-t-lg with-border">Ubicación</h5>

					<div class="row">
						<div class="col-lg-4">
							<fieldset class="form-group">
								<label class="form-label" for="exampleInput">Sede</label>
								<select id="ID_sede" name="ID_sede" class="form-control" disabled></select>
							</fieldset>
						</div>
						<div class="col-lg-4">
							<fieldset class="form-group">
								<label class="form-label" for="exampleInput">Torre</label>
								<select id="ID_torre" name="ID_torre" class="form-control" disabled></select>
							</fieldset>
						</div>
						<div class="col-lg-4">
							<fieldset class="form-group">
								<label class="form-label" for="exampleInput">N° Salon</label>
								<input type="text" class="form-control" id="Salon" name="Salon" disabled>
							</fieldset>
						</div>
					</div><!--.row-->

					<h5 class="m-t-lg with-border">ISIL Equipo Informático/Fotografía</h5>
					<div class="row">
						<input type="hidden" id="ID_usuario" name="ID_usuario" value="<?php echo $_SESSION["ID_usuario"] ?>">
						<div class="col-lg-6">
							<fieldset class="form-group">
								<label class="form-label" for="exampleInput">Tipo de Almacen</label>
								<select id="ID_almacen" name="ID_almacen" class="form-control" disabled></select>
							</fieldset>
						</div>
						<div class="col-lg-12">
							<fieldset class="form-group">
								<label class="form-label" for="exampleInput">Tipo de equipo</label>
								<select id="ID_equipo" name="ID_equipo" class="form-control" disabled></select>
							</fieldset>
						</div>
						<div class="col-lg-6">
							<fieldset class="form-group">
								<label class="form-label" for="exampleInput">Descripcion</label>
								<input type="text" class="form-control" id="Descripcion" name="Descripcion" disabled>
							</fieldset>
						</div>
						<div class="col-lg-6">
							<fieldset class="form-group">
								<label class="form-label" for="exampleInput">Nombre de la Marca</label>
								<select id="ID_marca" name="ID_marca" class="form-control" disabled></select>
							</fieldset>
						</div>
						<div class="col-lg-12">
							<fieldset class="form-group">
								<label class="form-label" for="exampleInput">Nombre del Modelo</label>
								<select id="ID_modelo" name="ID_modelo" class="form-control" disabled></select>
							</fieldset>
						</div>
						<div class="col-lg-6">
							<fieldset class="form-group">
								<label class="form-label" for="exampleInput">Número de Serie</label>
								<input type="text" class="form-control" id="Numero_serie" name="Numero_serie" disabled>
							</fieldset>
						</div>
						<div class="col-lg-6">
							<fieldset class="form-group">
								<label class="form-label" for="exampleInput">Codigo de Isil</label>
								<input type="text" class="form-control" id="Codigo_isil" name="Codigo_isil" disabled>
							</fieldset>
						</div>
						<div class="col-lg-12 display">
							<fieldset class="form-group">
								<label class="form-label" for="exampleInput">-- Imagen --</label>
								<img id="Imagen" name="Imagen" class="img-thumbnail" width="50%" height="auto">
							</fieldset>
						</div>
						<input type="hidden" id="ID_usuario" name="ID_usuario" value="<?php echo $_SESSION["ID_usuario"] ?>">
					</div><!--.row-->
					<h5 class="m-t-lg with-border">Datos Generales</h5>
					<div class="row">
						<div class="col-lg-6">
							<fieldset class="form-group">
								<label class="form-label" for="exampleInput">Estado</label>
								<select id="ID_operatividad" name="ID_operatividad" class="form-control" disabled></select>
							</fieldset>
						</div>
						<div class="col-lg-6">
							<fieldset class="form-group">
								<label class="form-label" for="exampleInput">Observaciones</label>
								<input type="text" class="form-control" id="Observaciones" name="Observaciones" disabled>
							</fieldset>
						</div>
					</div>
			</form>
		</div>
	</div>
</div>