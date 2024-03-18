<?php
require_once("../../Config/conexion.php");
if (isset($_SESSION["ID_usuario"])) {
?>

	<?php require_once("../layout/page_head.php") ?>

	<!-- Contenido -->
	<div class="page-content">
		<div class="container-fluid">
			<header class="section-header">
				<div class="tbl">
					<div class="tbl-row">
						<div class="tbl-cell">
							<h3>Mantenimiento Marcas</h3>
							<ol class="breadcrumb breadcrumb-simple">
								<li><a href="#">Home</a></li>
								<li class="active">Mantenimiento Marcas</li>
							</ol>
						</div>
					</div>
				</div>
			</header>

			<div class="box-typical box-typical-padding">
				<button type="button" id="btnnuevo" class="btn btn-inline btn-primary">Nuevo Registro</button>
				<table id="usuario_data" class="table table-bordered table-striped table-vcenter js-dataTable-full">
					<thead>
						<tr>
							<th class="text-center" style="width: 10%;">Nombre</th>
							<th class="text-center" style="width: 5%;">Editar</th>
							<th class="text-center" style="width: 5%;">Eliminar</th>
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
			</div>

			


		</div>
	</div>
	<!-- Contenido -->
	<?php require_once("modalmarca.php"); ?>
	<?php require_once("../layout/page_js.php") ?>
	<script type="text/javascript" src="mntmarcas.js"></script>
	<?php require_once("../layout/page_footer.php") ?>

<?php
} else {
	header("Location:" . Conectar::ruta() . "index.php");
}
?>