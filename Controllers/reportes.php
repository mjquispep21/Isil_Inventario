<?php
require_once("../Config/conexion.php");
require_once("../Models/Reportes.php");
$ficha = new Ficha();

switch ($_GET["op"]) {

    case "listar":

        $datos = $ficha->listar_ficha();
        $data = array();
        foreach ($datos as $row) {
            $sub_array = array();
            $sub_array[] = $row["ID_ficha"];
            $sub_array[] = $row["Nombre_sede"];
            $sub_array[] = $row["Nombre_torre"];
            $sub_array[] = $row["Salon"];
            $sub_array[] = $row["Tipo_almacen"];
            $sub_array[] = $row["Nombre_equipo"];
            $sub_array[] = $row["Descripcion"];
            $sub_array[] = $row["Nombre_marca"];
            $sub_array[] = $row["Nombre_modelo"];
            $sub_array[] = $row["Numero_serie"];
            $sub_array[] = $row["Codigo_isil"];
            if ($row["Imagen"]) {
                $sub_array[] = '<img src="data:image/jpeg;base64,' . base64_encode($row["Imagen"]) . '" alt="Imagen" class="img-thumbnail" width="100" height="100">';
            } else {
                $sub_array[] = '<img src="../../assets/img/pendiente.jpg" alt="Imagen" class="img-thumbnail" width="100" height="100">';
            }
            $sub_array[] = $row["Nombre"].' '.$row["Apellidos"];
            if ($row["ID_operatividad"] == "1") {
                $sub_array[] = '<span class="label label-pill label-success">Operativo</span>';
            } else if ($row["ID_operatividad"] == "2") {
                $sub_array[] = '<span class="label label-pill label-danger">Inoperativo</span>';
            } else {
                $sub_array[] = '<span class="label label-pill label-warning">En revisión</span>';
            }
            $sub_array[] = $row["Observaciones"];
            $sub_array[] = $row["Fecha_registro"];
            $sub_array[] = $row["ID_usuario_modificador"];
            $sub_array[] = $row["Fecha_modificacion"];
            $data[] = $sub_array;
        }
        $results = array(
            "sEcho" => 1,
            "iTotalRecords" => count($data),
            "iTotalDisplayRecords" => count($data),
            "aaData" => $data
        );
        echo json_encode($results);
    break;

    case "listar_stock":

        $datos = $ficha->listar_stock();
        $data = array();
        foreach ($datos as $row) {
            $sub_array = array();
            $sub_array[] = $row["ID_ficha"];
            $sub_array[] = $row["Nombre_sede"];
            $sub_array[] = $row["Nombre_equipo"];
            $sub_array[] = $row["Descripcion"];
            $sub_array[] = $row["Nombre_marca"];
            $sub_array[] = $row["Nombre_modelo"];
            $sub_array[] = $row["Numero_serie"];
            $sub_array[] = $row["Codigo_isil"];
            if ($row["ID_operatividad"] == "1") {
                $sub_array[] = '<span class="label label-pill label-success">Operativo</span>';
            } else if ($row["ID_operatividad"] == "2") {
                $sub_array[] = '<span class="label label-pill label-danger">Inoperativo</span>';
            } else {
                $sub_array[] = '<span class="label label-pill label-warning">En revisión</span>';
            }


            $sub_array[] = '<button type="button" onClick="ver(' . $row["ID_ficha"] . ');"  id="' . $row["ID_ficha"] . '" class="btn btn-inline btn-primary btn-sm ladda-button"><i class="fa fa-eye"></i></button>';
            $data[] = $sub_array;
        }
        $results = array(
            "sEcho" => 1,
            "iTotalRecords" => count($data),
            "iTotalDisplayRecords" => count($data),
            "aaData" => $data
        );
        echo json_encode($results);
    break;

    case "ver";
        $datos = $ficha->get_ficha_x_id($_POST["ID_ficha"]);
        if (is_array($datos) == true and count($datos) > 0) {
            foreach ($datos as $row) {
                $output["ID_ficha"] = $row["ID_ficha"];
                $output["ID_sede"] = $row["ID_sede"];
                $output["ID_torre"] = $row["ID_torre"];
                $output["Salon"] = $row["Salon"];
                $output["ID_almacen"] = $row["ID_almacen"];
                $output["ID_equipo"] = $row["ID_equipo"];
                $output["Descripcion"] = $row["Descripcion"];
                $output["ID_marca"] = $row["ID_marca"];
                $output["ID_modelo"] = $row["ID_modelo"];
                $output["Numero_serie"] = $row["Numero_serie"];
                $output["Codigo_isil"] = $row["Codigo_isil"];
                $output["Imagen"] = base64_encode($row["Imagen"]);
                $output["ID_usuario"] = $row["ID_usuario"];
                $output["ID_operatividad"] = $row["ID_operatividad"];
                $output["Observaciones"] = $row["Observaciones"];
                $output["Fecha_registro"] = $row["Fecha_registro"];
                $output["ID_usuario_modificador"] = $row["ID_usuario_modificador"];
                $output["Fecha_modificacion"] = $row["Fecha_modificacion"];
            }
            echo json_encode($output);
        }else {
            echo "No se encontraron datos";
        }

    break;

}
