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
                            <h3>Mantenimiento Inventario</h3>
                            <ol class="breadcrumb breadcrumb-simple">
                                <li><a href="#">Home</a></li>
                                <li class="active">Mantenimiento Inventario</li>
                            </ol>
                        </div>
                    </div>
                </div>

            </header>
            <!-- Seccion de cabecera -->

            <!-- Llamar a la tabla del template-->
            <div class="box-typical box-typical-padding">
                <button type="button" id="btnnuevo" class="btn btn-inline btn-primary">Nuevo Registro</button>
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

                            <th class="text-center" style="width: 5%;">Editar</th>
                            <th class="text-center" style="width: 5%;">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>


                    </tbody>
                </table>

            </div>
        </div><!--.container-fluid-->
    </div><!--.page-content-->

    <?php require_once("modalinventario.php");?>
    <?php require_once("../layout/page_js.php") ?>
    <script type="text/javascript" src="inventario.js"></script>
    <?php require_once("../layout/page_footer.php") ?>

<?php
} else {
    header("Location:" . Conectar::ruta() . "index.php");
}
?>


    