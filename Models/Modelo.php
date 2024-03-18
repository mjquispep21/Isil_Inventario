<?php
class Modelo extends Conectar
{
    public function get_modelo_marca()
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql="SELECT * FROM marca";
        $sql=$conectar-> prepare($sql);
        $sql->execute();
        return $resultado=$sql->fetchAll();
    }

    /* TODO: Obtener todos los registros sin filtro */
    public function get_modelo_all()
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT 
            modelo.ID_modelo,
            modelo.ID_marca,
            modelo.Nombre_modelo,
            marca.Nombre_marca
            FROM modelo INNER JOIN
            marca on modelo.ID_marca = marca.ID_marca
            ";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    /* TODO:Insert */
    public function insert_modelo($ID_marca, $Nombre_modelo)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "INSERT INTO modelo (ID_modelo,ID_marca,Nombre_modelo) VALUES (NULL,?,?);";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $ID_marca);
        $sql->bindValue(2, $Nombre_modelo);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    /* TODO:Update */
    public function update_modelo($ID_modelo, $ID_marca, $Nombre_modelo)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "UPDATE modelo set
                ID_marca = ?,
                Nombre_modelo = ?
                WHERE
                ID_modelo = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $ID_marca);
        $sql->bindValue(2, $Nombre_modelo);
        $sql->bindValue(3, $ID_modelo);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    /* TODO:Delete */
    public function delete_modelo($ID_modelo)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "DELETE FROM modelo WHERE ID_modelo=?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $ID_modelo);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    /* TODO:Registro x id */
    public function get_modelo_x_id($ID_modelo)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM modelo WHERE ID_modelo = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $ID_modelo);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    
}
