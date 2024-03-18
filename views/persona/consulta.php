<?php
require_once("../../Config/conexion.php");
if (isset($_SESSION["ID_usuario"])) {
?>

    <?php require_once("../layout/page_head.php") ?>

    <div class="page-content">
        <div class="container-fluid">
            <header class="section-header">
                <div class="tbl">
                    <div class="tbl-row">
                        <div class="tbl-cell">
                            <h3>Gestión de Usuarios</h3>
                            <ol class="breadcrumb breadcrumb-simple">
                                <li><a href="#">Home</a></li>
                                <li class="active">Gestión de Usuarios</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </header>
            <div class="box-typical box-typical-padding">
                <button type="button" id="btnnuevo" class="btn btn-inline btn-primary">Nuevo Registro</button>
                <table id="usuario_data" class="table table-bordered table-striped table-vcenter js-dataTable-full text-center">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 5%;">ID Usuario</th>
                            <th class="text-center">Rol </th>
                            <th class="text-center">Nombre</th>
                            <th class="text-center">Apellidos</th>
                            <th class="text-center">Correo</th>
                            <th class="text-center">Numero</th>
                            <th class="text-center">Usuario</th>
                            <th class="text-center">Editar</th>
                            <th class="text-center">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div><!--.container-fluid-->
    </div>

    <!--.page-content-->



    <?php require_once("registro.php"); ?>
    <?php require_once("../layout/page_js.php") ?>

    <script type="text/javascript" src="mntusuario.js"></script>

    <?php require_once("../layout/page_footer.php") ?>

<?php
} else {
    header("Location:" . Conectar::ruta() . "index.php");
}
?>