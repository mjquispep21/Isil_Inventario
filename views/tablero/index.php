<?php
require_once("../../Config/conexion.php");
if (isset($_SESSION["ID_usuario"])) {
?>

	<?php require_once("../layout/page_head.php") ?>

	<div class="page-content">
		<div class="container-fluid">
			<h1>true</h1>
		</div><!--.container-fluid-->
	</div><!--.page-content-->

	<?php require_once("../layout/page_js.php") ?>
	<?php require_once("../layout/page_footer.php") ?>

<?php
} else {
	header("Location:" . Conectar::ruta() . "index.php");
}
?>