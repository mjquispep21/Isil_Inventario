<div id="registro" class="modal fade bd-example-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
					<input type="hidden" id="ID_usuario" name="ID_usuario">

					<div class="form-group">
						<label class="form-label" for="ID_roles">Rol</label>
						<select class="select2" id="ID_roles" name="ID_roles">
							<option value="1">Administrador</option>
							<option value="2">Editor</option>
						</select>
					</div>


					<div class="form-group">
						<label class="form-label" for="Nombre">Nombre Completo</label>
						<input type="text" class="form-control" id="Nombre" name="Nombre" placeholder="Ingrese Nombre" required>
					</div>

					<div class="form-group">
						<label class="form-label" for="Apellidos">Apellido Completo</label>
						<input type="text" class="form-control" id="Apellidos" name="Apellidos" placeholder="Ingrese Apellido" required>
					</div>

					<div class="form-group">
						<label class="form-label" for="Correo">Correo Electronico</label>
						<input type="email" class="form-control" id="Correo" name="Correo" placeholder="test@gmail.com" required>
					</div>

					<div class="form-group">
						<label class="form-label" for="Numero">Celular</label>
						<input type="text" class="form-control" id="Numero" name="Numero" placeholder="Ingrese N° Celular" required>
					</div>

					<div class="form-group">
						<label class="form-label" for="Usuario">Usuario</label>
						<input type="text" class="form-control" id="Usuario" name="Usuario" placeholder="Ingrese Nombre" required>
					</div>

					<div class="form-group">
						<label class="form-label" for="contrasena">contrasena</label>
						<input type="text" class="form-control" id="contrasena" name="contrasena" placeholder="************" required>
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