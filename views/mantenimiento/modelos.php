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
							<h3>Mantenimiento Modelos</h3>
							<ol class="breadcrumb breadcrumb-simple">
								<li><a href="#">Home</a></li>
								<li class="active">Mantenimiento Modelos</li>
							</ol>
						</div>
					</div>
				</div>
			</header>

			<div class="box-typical box-typical-padding">
				<button type="button" id="btnnuevo" class="btn btn-inline btn-primary">Nuevo Registro</button>
				<table id="usuario_data" class="table table-bordered table-striped table-vcenter ">
					<thead>
						<tr>
							<th style="width: 10%;">Marca</th>
							<th style="width: 10%;">Modelo</th>
							<th class="text-center" style="width: 5%;"></th>
							<th class="text-center" style="width: 5%;"></th>
						</tr>
					</thead>
					<tbody>

					</tbody>
				</table>
			</div>

		</div>
	</div>
	<!-- Contenido -->

	<?php require_once("modalmodelos.php"); ?>
	<?php require_once("../layout/page_js.php") ?>
	<script type="text/javascript" src="mntmodelos.js"></script>

	<script>
		$(function() {
			$('#example').DataTable();
		});
	</script>

	<?php require_once("../layout/page_footer.php") ?>

<?php
} else {
	header("Location:" . Conectar::ruta() . "index.php");
}
?>