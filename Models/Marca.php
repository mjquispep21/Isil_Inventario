<?php
class Marca extends Conectar
{
    public function get_marca()
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM marca";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }
    /* TODO:Insert Registro*/
    public function insert_marca($Nombre_marca)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "INSERT INTO marca (ID_marca, Nombre_marca) VALUES (NULL,?);";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $Nombre_marca);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    /* TODO:Update Registro*/
    public function update_marca($ID_marca, $Nombre_marca)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "UPDATE marca set
            Nombre_marca = ?
            WHERE
            ID_marca = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $Nombre_marca);
        $sql->bindValue(2, $ID_marca);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    /* TODO:Delete Registro*/
    public function delete_marca($ID_marca)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "DELETE FROM marca WHERE ID_marca=?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $ID_marca);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    /* TODO:Registro x id */
    public function get_marca_x_id($ID_marca)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM marca WHERE ID_marca = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $ID_marca);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }
}
