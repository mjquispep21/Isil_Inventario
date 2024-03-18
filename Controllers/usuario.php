<?php
//TODO: Se incluyen los archivos necesarios
require_once("../Config/conexion.php");
require_once("../Models/Usuario.php");
//TODO: Se crea una instancia de la clase Usuario
$usuario = new Usuario();


switch ($_GET["op"]) {
    case "guardaryeditar":
        if (empty($_POST["ID_usuario"])) {
            $usuario->insert_usuario($_POST["ID_roles"], $_POST["Nombre"], $_POST["Apellidos"], $_POST["Correo"], $_POST["Numero"], $_POST["Usuario"], $_POST["contrasena"]);
        } else {
            $usuario->update_usuario($_POST["ID_usuario"], $_POST["ID_roles"], $_POST["Nombre"], $_POST["Apellidos"], $_POST["Correo"], $_POST["Numero"], $_POST["Usuario"], $_POST["contrasena"]);
            break;
        }

    case "listar":
        $datos = $usuario->get_usuario();
        $data = array();
        foreach ($datos as $row) {
            $sub_array = array();

            $sub_array[] = $row["ID_usuario"];

            if ($row["ID_roles"] == "1") {
                $sub_array[] = '<span class="label label-pill label-warning">Administrador</span>';
            } else {
                $sub_array[] = '<span class="label label-pill label-success">Editor</span>';
            }
            $sub_array[] = $row["Nombre"];
            $sub_array[] = $row["Apellidos"];
            $sub_array[] = $row["Correo"];
            $sub_array[] = $row["Numero"];
            $sub_array[] = $row["Usuario"];
            
            $sub_array[] = '<button type="button" onClick="editar(' . $row["ID_usuario"] . ');"  id="' . $row["ID_usuario"] . '" class="btn btn-inline btn-primary btn-sm ladda-button"><i class="fa fa-edit"></i></button>';

            $sub_array[] = '<button type="button" onClick="eliminar(' . $row["ID_usuario"] . ');"  id="' . $row["ID_usuario"] . '" class="btn btn-inline btn-danger btn-sm ladda-button"><i class="fa fa-trash"></i></button>';


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

    case "eliminar":
        $usuario->delete_usuario($_POST["ID_usuario"]);
        break;

    case "mostrar":
        $datos = $usuario->get_usuario_por_id($_POST["ID_usuario"]);
        if (is_array($datos) == true and count($datos) > 0) {
            foreach ($datos as $row) {
                $output["ID_usuario"] = $row["ID_usuario"];
                $output["ID_roles"] = $row["ID_roles"];
                $output["Nombre"] = $row["Nombre"];
                $output["Apellidos"] = $row["Apellidos"];
                $output["Correo"] = $row["Correo"];
                $output["Numero"] = $row["Numero"];
                $output["Usuario"] = $row["Usuario"];
                $output["contrasena"] = $row["contrasena"];
            }
            echo json_encode($output);
        } else {
            echo "No se encontraron datos";
        }

        break;
    case "password":
        $usuario->update_pass($_POST["ID_usuario"],$_POST["contrasena"]);
            break;
        break;
}


    