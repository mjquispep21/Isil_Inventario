<?php
require_once("../../Config/conexion.php");
if (isset($_SESSION["ID_usuario"])) {
?>

	<?php require_once("../layout/page_head.php") ?>

	<div class="page-content">
		<div class="container-fluid">
			<section class="widget widget-user">
				<div class="widget-user-bg" style="background-image: url('../../assets/img/acerca-de-isil.jpg')"></div>
				<div class="widget-user-photo">
					<img src="../../assets/img/avatar-2-256.png" alt="">
				</div>
				<div class="widget-user-name">
					<?php echo $_SESSION["Nombre"] ?>
					<?php echo $_SESSION["Apellidos"] ?>
					<i class="fa fa-desktop"></i>
				</div>
				<div>Recursos Tecnologicos</div>

				<div class="widget-user-stat">
					<ul class="profile-links-list">


						<li class="nowrap">
							<i class="glyphicon glyphicon-user"></i>
							<span><?php
									if ($_SESSION["ID_roles"] == 1) {
										echo "Administrador";
									} else {
										echo "Editor";
									}
									?></span>
						</li>

						<li class="nowrap">
							<i class="font-icon font-icon-mail"></i>
							<span><?php echo array_key_exists("Correo", $_SESSION) ? $_SESSION["Correo"] : ""; ?></span>
						</li>
						<li class="nowrap">
							<i class="font-icon font-icon-phone"></i>
							<span><?php echo array_key_exists("Numero", $_SESSION) ? $_SESSION["Numero"] : ""; ?></span>
						</li>



						<br>
						<li>
							<button type="button" class="btn btn-rounded" data-toggle="modal" data-target=".bd-example-modal-sm">Cambiar Contraseña</button>

							<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-sm">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">
												<i class="font-icon-close-2"></i>
											</button>
											<h4 class="modal-title" id="myModalLabel">Cambio de Contraseña</h4>
										</div>
										<div class="modal-body">

											<form class="container-fluid">
												<div class="sign-box reset-password-box">
													
													<div class="form-group">
														<input type="password" class="form-control" id="txtpass" name="txtpass"  autocomplete="new-password" placeholder="Nueva Contraseña" />
													</div>
													<div class="form-group">
														<input type="password" class="form-control" id="txtpassnew" name="txtpassnew" placeholder="Confirmar Contraseña" />
													</div>
													
												</div>
											</form>
									
										</div>
										<div class="modal-footer ">
											<button type="button" class="btn btn-rounded btn-default" data-dismiss="modal">Cancelar</button>
											<button type="button" id="btnactualizar" class="btn btn-rounded btn-primary">Actualizar</button>
										</div>
									</div>
								</div>
							</div>

						</li>
					</ul>

				</div>
			</section>

			<!--.widget-user-->

			<!-- <div class="box-typical box-typical-padding">

				<div class="row">
					<div class="col-lg-6">
						<fieldset class="form-group">
							<label class="form-label semibold" for="exampleInput">Nueva Contraseña</label>
							<input type="password" class="form-control" id="txtpass" name="txtpass">
						</fieldset>
					</div>

					<div class="col-lg-6">
						<fieldset class="form-group">
							<label class="form-label semibold" for="exampleInput">Confirmar Contraseña</label>
							<input type="password" class="form-control" id="txtpassnew" name="txtpassnew">
						</fieldset>
					</div>

					<div class="col-lg-12">
						<button type="button" id="btnactualizar" class="btn btn-rounded btn-inline btn-primary">Actualizar</button>
					</div>
				</div>

			</div> -->

		</div>




	</div><!--.container-fluid-->
	</div><!--.page-content-->


	<?php require_once("../layout/page_js.php") ?>
	<script type="text/javascript" src="mntperfil.js"></script>
	<?php require_once("../layout/page_footer.php") ?>

<?php
} else {
	header("Location:" . Conectar::ruta() . "index.php");
}
?>