<?php
    /* TODO:Cadena de Conexion */
    require_once("../Config/conexion.php");
    /* TODO:Modelo Categoria */
    require_once("../Models/Marca.php");
    $marca = new Marca();

    /*TODO: opciones del controlador Categoria*/
    switch($_GET["op"]){
        /* TODO: Guardar y editar, guardar si el campo ID_marca esta vacio */
        case "guardaryeditar":
            /* TODO:Actualizar si el campo ID_marca tiene informacion */
            if(empty($_POST["ID_marca"])){       
                $marca->insert_marca($_POST["Nombre_marca"]);     
            }
            else {
                $marca->update_marca($_POST["ID_marca"],$_POST["Nombre_marca"]);
            }
            break;

        /* TODO: Listado de marca segun formato json para el datatable */
        case "listar":
            $datos=$marca->get_marca();
            $data= Array();
            foreach($datos as $row){
                $sub_array = array();
                $sub_array[] = $row["Nombre_marca"];
                $sub_array[] = '<button type="button" onClick="editar('.$row["ID_marca"].');"  id="'.$row["ID_marca"].'" class="btn btn-inline btn-warning btn-sm ladda-button"><i class="fa fa-edit"></i></button>';
                $sub_array[] = '<button type="button" onClick="eliminar('.$row["ID_marca"].');"  id="'.$row["ID_marca"].'" class="btn btn-inline btn-danger btn-sm ladda-button"><i class="fa fa-trash"></i></button>';
                $data[] = $sub_array;
            }

            $results = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);
            echo json_encode($results);
            break;

        /* TODO: Actualizar estado a 0 segun id de marca */
        case "eliminar":
            $marca->delete_marca($_POST["ID_marca"]);
            break;

        /* TODO: Mostrar en formato JSON segun ID_marca */
        case "mostrar";
            $datos=$marca->get_marca_x_id($_POST["ID_marca"]);  
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $output["ID_marca"] = $row["ID_marca"];
                    $output["Nombre_marca"] = $row["Nombre_marca"];
                }
                echo json_encode($output);
            }
            break;

        /* TODO: Formato para llenar combo en formato HTML */
        case "combo":
            $datos = $marca->get_marca();
            $html="";
            $html.="<option label='Seleccionar'></option>";
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $html.= "<option value='".$row['ID_marca']."'>".$row['Nombre_marca']."</option>";
                }
                echo $html;
            }
            break;
    }
?>