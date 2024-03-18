<?php
class Ficha extends Conectar
{
    public function insert_ficha($ID_sede, $ID_torre, $Salon, $ID_almacen, $ID_equipo, $Descripcion, $ID_marca, $ID_modelo, $Numero_serie, $Codigo_isil, $Imagen, $ID_usuario, $ID_operatividad, $Observaciones)
    {
        $conectar = parent::conexion();
        parent::set_names();

        $imagen_contenido = null;

        // Verificar si se proporcionó una imagen
        if (!empty($Imagen["tmp_name"])) {
            $allowed_formats = array('jpg', 'jpeg', 'png');
            $max_file_size = 5 * 1024 * 1024;

            $file_info = pathinfo($Imagen["name"]);
            $file_extension = strtolower($file_info['extension']);

            if (in_array($file_extension, $allowed_formats) && $Imagen["size"] <= $max_file_size) {
                $imagen_contenido = file_get_contents($Imagen["tmp_name"]);
            } else {
                echo "Error: Formato de archivo no permitido o tamaño excedido.";
                return;
            }
        }

        $sql = "INSERT INTO ficha (ID_ficha, ID_sede, ID_torre, Salon, ID_almacen, ID_equipo, Descripcion, ID_marca, ID_modelo, Numero_serie, Codigo_isil, Imagen, ID_usuario, ID_operatividad, Observaciones, Fecha_registro, ID_usuario_modificador, Fecha_modificacion) VALUES (NULL,?,?,?,?,?,?,?,?,?,?,?,?,?,?, now(), NULL, NULL);";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $ID_sede);
        $sql->bindValue(2, $ID_torre);
        $sql->bindValue(3, $Salon);
        $sql->bindValue(4, $ID_almacen);
        $sql->bindValue(5, $ID_equipo);
        $sql->bindValue(6, $Descripcion);
        $sql->bindValue(7, $ID_marca);
        $sql->bindValue(8, $ID_modelo);
        $sql->bindValue(9, $Numero_serie);
        $sql->bindValue(10, $Codigo_isil);
        if ($imagen_contenido !== null) {
            $sql->bindValue(11, $imagen_contenido, PDO::PARAM_LOB);
        } else {
            $sql->bindValue(11, null, PDO::PARAM_NULL);
        }
        $sql->bindValue(12, $ID_usuario);
        $sql->bindValue(13, $ID_operatividad);
        $sql->bindValue(14, $Observaciones);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function update_ficha($ID_ficha, $ID_sede, $ID_torre, $Salon, $ID_almacen, $ID_equipo, $Descripcion, $ID_marca, $ID_modelo, $Numero_serie, $Codigo_isil, $Imagen, $ID_usuario, $ID_operatividad, $Observaciones)
    {
        $conectar = parent::conexion();
        parent::set_names();

        $imagen_contenido = null;
        // Verificar si se proporcionó una imagen
        if (isset($Imagen) && !empty($Imagen["tmp_name"])) {
            $allowed_formats = array('jpg', 'jpeg', 'png');
            $max_file_size = 5 * 1024 * 1024;

            $file_info = pathinfo($Imagen["name"]);
            $file_extension = strtolower($file_info['extension']);

            if (in_array($file_extension, $allowed_formats) && $Imagen["size"] <= $max_file_size) {
                $imagen_contenido = file_get_contents($Imagen["tmp_name"]);
            } else {
                echo "Error: Formato de archivo no permitido o tamaño excedido.";
                return;
            }
        }

        $sql_usuario_modificador = "SELECT Nombre, Apellidos FROM usuario WHERE ID_usuario = ?";
        $stmt_usuario_modificador = $conectar->prepare($sql_usuario_modificador);
        $stmt_usuario_modificador->bindValue(1, $ID_usuario);
        $stmt_usuario_modificador->execute();
        $usuario_modificador = $stmt_usuario_modificador->fetch(PDO::FETCH_ASSOC);
        $nombre_apellidos_usuario_modificador = $usuario_modificador["Nombre"] . ' ' . $usuario_modificador["Apellidos"];

        if ($imagen_contenido !== null) {
            $sql = "UPDATE ficha set
                ID_sede = ?, 
                ID_torre = ?, 
                Salon = ?, 
                ID_almacen = ?, 
                ID_equipo = ?, 
                Descripcion = ?, 
                ID_marca = ?, 
                ID_modelo = ?, 
                Numero_serie = ?, 
                Codigo_isil = ?,
                Imagen = ?,
                ID_operatividad = ?,
                Observaciones = ?,
                ID_usuario_modificador = ?,
                Fecha_modificacion = now()
                WHERE 
                ID_ficha = ?";
        } else {
            $sql = "UPDATE ficha set
                ID_sede = ?, 
                ID_torre = ?, 
                Salon = ?, 
                ID_almacen = ?, 
                ID_equipo = ?, 
                Descripcion = ?, 
                ID_marca = ?, 
                ID_modelo = ?, 
                Numero_serie = ?, 
                Codigo_isil = ?, 
                ID_operatividad = ?,
                Observaciones = ?,
                ID_usuario_modificador = ?,
                Fecha_modificacion = now()
                WHERE 
                ID_ficha = ?";
        }

        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $ID_sede);
        $sql->bindValue(2, $ID_torre);
        $sql->bindValue(3, $Salon);
        $sql->bindValue(4, $ID_almacen);
        $sql->bindValue(5, $ID_equipo);
        $sql->bindValue(6, $Descripcion);
        $sql->bindValue(7, $ID_marca);
        $sql->bindValue(8, $ID_modelo);
        $sql->bindValue(9, $Numero_serie);
        $sql->bindValue(10, $Codigo_isil);
        if ($imagen_contenido !== null) {
            $sql->bindValue(11, $imagen_contenido, PDO::PARAM_LOB);
            $sql->bindValue(12, $ID_operatividad);
            $sql->bindValue(13, $Observaciones);
            $sql->bindValue(14, $nombre_apellidos_usuario_modificador);
            $sql->bindValue(15, $ID_ficha);
        } else {
            $sql->bindValue(11, $ID_operatividad);
            $sql->bindValue(12, $Observaciones);
            $sql->bindValue(13, $nombre_apellidos_usuario_modificador);
            $sql->bindValue(14, $ID_ficha);
        }
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function delete_ficha($ID_ficha)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "DELETE FROM ficha WHERE ID_ficha=?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $ID_ficha);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }


    public function listar_ficha()
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT 
                ficha.ID_ficha,
                ficha.ID_sede,
                sede.Nombre_sede,
                ficha.ID_torre,
                torre.Nombre_torre,
                ficha.Salon,
                ficha.ID_almacen,
                almacen.Tipo_almacen,
                ficha.ID_equipo,
                equipo.Nombre_equipo,
                ficha.Descripcion,
                ficha.ID_marca,
                marca.Nombre_marca,
                ficha.ID_modelo,
                modelo.Nombre_modelo,
                ficha.Numero_serie,
                ficha.Codigo_isil,
                ficha.Imagen,
                ficha.ID_usuario,
                usuario.Nombre,
                usuario.Apellidos,
                ficha.ID_operatividad,
                operatividad.Tipo_operatividad,
                ficha.Observaciones, 
                ficha.Fecha_registro,
                ficha.ID_usuario_modificador, 
                ficha.Fecha_modificacion
                FROM
                ficha
                INNER JOIN sede on sede.ID_sede = ficha.ID_sede
                INNER JOIN torre on torre.ID_torre = ficha.ID_torre
                INNER JOIN almacen on almacen.ID_almacen = ficha.ID_almacen
                INNER JOIN equipo on equipo.ID_equipo = ficha.ID_equipo
                INNER JOIN marca on marca.ID_marca = ficha.ID_marca
                INNER JOIN modelo on modelo.ID_modelo = ficha.ID_modelo
                INNER JOIN usuario on usuario.ID_usuario = ficha.ID_usuario 
                INNER JOIN operatividad on operatividad.ID_operatividad = ficha.ID_operatividad";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }



    public function get_ficha_x_id($ID_ficha)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT 
                ficha.ID_ficha,
                ficha.ID_sede,
                sede.Nombre_sede,
                ficha.ID_torre,
                torre.Nombre_torre,
                ficha.Salon,
                ficha.ID_almacen,
                almacen.Tipo_almacen,
                ficha.ID_equipo,
                equipo.Nombre_equipo,
                ficha.Descripcion,
                ficha.ID_marca,
                marca.Nombre_marca,
                ficha.ID_modelo,
                modelo.Nombre_modelo,
                ficha.Numero_serie,
                ficha.Codigo_isil,
                ficha.Imagen,
                ficha.ID_usuario,
                usuario.Nombre,
                usuario.Apellidos,
                ficha.ID_operatividad,
                operatividad.Tipo_operatividad,
                ficha.Observaciones, 
                ficha.Fecha_registro,
                ficha.ID_usuario_modificador, 
                ficha.Fecha_modificacion
                FROM
                ficha
                INNER JOIN sede on sede.ID_sede = ficha.ID_sede
                INNER JOIN torre on torre.ID_torre = ficha.ID_torre
                INNER JOIN almacen on almacen.ID_almacen = ficha.ID_almacen
                INNER JOIN equipo on equipo.ID_equipo = ficha.ID_equipo
                INNER JOIN marca on marca.ID_marca = ficha.ID_marca
                INNER JOIN modelo on modelo.ID_modelo = ficha.ID_modelo
                INNER JOIN usuario on usuario.ID_usuario = ficha.ID_usuario
                INNER JOIN operatividad on operatividad.ID_operatividad = ficha.ID_operatividad
                WHERE 
                ID_ficha=?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $ID_ficha);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }
}
