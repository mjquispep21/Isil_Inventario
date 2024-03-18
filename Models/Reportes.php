<?php
class Ficha extends Conectar {


    public function listar_stock(){
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

    public function listar_ficha(){
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



    public function get_ficha_x_id($ID_ficha){
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