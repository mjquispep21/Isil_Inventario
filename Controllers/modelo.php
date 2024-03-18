<?php
    /* TODO:Cadena de Conexion */
    require_once("../Config/conexion.php");
    /* TODO:Modelo Subcategoria */
    require_once("../Models/Modelo.php");
    $modelo = new Modelo();

    /*TODO: opciones del controlador Subcategoria*/
    switch($_GET["op"]){
        /* TODO: Guardar y editar, guardar si el campo ID_modelo esta vacio */
        case "guardaryeditar":
            if(empty($_POST["ID_modelo"])){
                $modelo->insert_modelo($_POST["ID_marca"],$_POST["Nombre_modelo"]);     
            }else {
                $modelo->update_modelo($_POST["ID_modelo"],$_POST["ID_marca"],$_POST["Nombre_modelo"]);
            }
            break;
        /* TODO: Listado de prioridad segun formato json para el datatable */
        case "listar":
            $datos=$modelo->get_modelo_all();
            $data= Array();
            foreach($datos as $row){
                $sub_array = array();
                $sub_array[] = $row["Nombre_marca"];
                $sub_array[] = $row["Nombre_modelo"];
                $sub_array[] = '<button type="button" onClick="editar('.$row["ID_modelo"].');"  id="'.$row["ID_modelo"].'" class="btn btn-inline btn-warning btn-sm ladda-button"><i class="fa fa-edit"></i></button>';
                $sub_array[] = '<button type="button" onClick="eliminar('.$row["ID_modelo"].');"  id="'.$row["ID_modelo"].'" class="btn btn-inline btn-danger btn-sm ladda-button"><i class="fa fa-trash"></i></button>';
                $data[] = $sub_array;
            }

            $results = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);
            echo json_encode($results);
            break;
        /* TODO: Actualizar estado a 0 segun id de prioridad */
        case "eliminar":
            $modelo->delete_modelo($_POST["ID_modelo"]);
            break;
        /* TODO: Mostrar en formato JSON segun prio_id */
        case "mostrar";
            $datos=$modelo->get_modelo_x_id($_POST["ID_modelo"]);  
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $output["ID_modelo"] = $row["ID_modelo"];
                    $output["ID_marca"] = $row["ID_marca"];
                    $output["Nombre_modelo"] = $row["Nombre_modelo"];
                }
                echo json_encode($output);
            }
            break;
        
            case "combo_marca":
                $datos=$modelo-> get_modelo_marca();
                $html="";
                if(is_array($datos)==true and count($datos)>0){
                    foreach($datos as $row)
                    {
                        $html.="<option value='".$row['ID_marca']."'>".$row['Nombre_marca']."</option>";
                    }
                    echo $html;
                }
            break;

            




    }
?>