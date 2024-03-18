<?php
class Categoria extends Conectar
{
    public function get_categoria_sede()
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM sede";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function get_categoria_torre()
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM torre";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function get_categoria_almacen()
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM almacen";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function get_categoria_equipo($ID_Almacen)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM equipo WHERE ID_Almacen = ?";
        $sql = $conectar->prepare($sql);
        $sql->execute(array($ID_Almacen));
        return $resultado=$sql->fetchAll();
    }

    public function get_categoria_marca()
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM marca";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function get_categoria_modelo()
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM modelo";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function get_categoria_operatividad()
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM operatividad";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }
}
