<?php
    require_once("../../Config/conexion.php");
    session_destroy();
    header("Location:".Conectar::ruta()."index.php");
    exit();
?>