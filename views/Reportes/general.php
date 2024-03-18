<?php
require_once("../../Config/conexion.php");
if (isset($_SESSION["ID_usuario"])) {
?>

    <?php require_once("../layout/page_head.php") ?>

    <div class="page-content">
        <div class="container-fluid">
            <!-- Seccion de cabecera -->
            <header class="section-header">
                <div class="tbl">
                    <div class="tbl-row">
                        <div class="tbl-cell">
                            <h3>Reporte General</h3>
                            <ol class="breadcrumb breadcrumb-simple">
                                <li><a href="#">Home</a></li>
                                <li class="active">Reporte General</li>
                            </ol>
                        </div>
                    </div>
                </div>

            </header>
            <!-- Seccion de cabecera -->

            <!-- Llamar a la tabla del template-->
            <div class="box-typical box-typical-padding">
                <table id="ficha_data" class="table table-bordered table-striped table-vcenter js-dataTable-full">
                    <thead>
                        <tr>
                            <th style="width: 1%;">ID</th>
                            <th style="width: 1%;">Sede</th>
                            <th style="width: 1%;">Torre</th>
                            <th style="width: 1%;">Salon</th>
                            <th style="width: 1%;">Almacen</th>
                            <th style="width: 1%;">Nombre del equipo</th>
                            <th style="width: 1%;">Descripción</th>
                            <th style="width: 1%;">Marca</th>
                            <th style="width: 1%;">Modelo</th>
                            <th style="width: 1%;">Numero serie</th>
                            <th style="width: 1%;">Codigo isil</th>
                            <th style="width: 5%;">Imagen</th>
                            <th style="width: 1%;">Usuario</th>
                            <th style="width: 1%;">Estado</th>
                            <th style="width: 1%;">Observaciones</th>
                            <th style="width: 1%;">Fecha</th>
                            <th style="width: 1%;">Usuario modificador</th>
                            <th style="width: 1%;">Fecha modificación</th>
                        </tr>
                    </thead>
                    <tbody>


                    </tbody>
                </table>

            </div>
        </div><!--.container-fluid-->
    </div><!--.page-content-->

    <?php require_once("modalreportes.php"); ?>
    <?php require_once("../layout/page_js.php") ?>
    <script type="text/javascript" src="reportes.js"></script>
    <?php require_once("../layout/page_footer.php") ?>

<?php
} else {
    header("Location:" . Conectar::ruta() . "index.php");
}
?>