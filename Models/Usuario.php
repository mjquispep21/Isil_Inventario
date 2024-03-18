<?php
class Usuario extends Conectar
{
    public function login()
    {
        //TODO: Establecemos una conexión a la base de datos
        $conectar = parent::conexion();
        //TODO: configuramos la codificación de caracteres para evitar problemas de codificación.
        parent::set_names();
        //si el formlulario de inicio de sesion se ha enviado 
        if (isset($_POST["enviar"])) {
            //TODO: obtenemos el Usuario y la contraseña ingresados por el usuario.
            $Usuario = $_POST["Usuario"];
            $Password = $_POST["contrasena"];
            // $rol = $_POST["ID_roles"];
            //TODO: Si ambos campos no están vacíos
            if (empty($Usuario) and empty($Password)) {
                //TODO: Redirigimos al usuario de vuelta a la página de inicio de sesión con un mensaje de error
                header("Location:" . conectar::ruta() . "views/login/index.php?m=2");
                exit();
            } else {
                //TODO: Preparamos una consulta SQL para obtener los datos del usuario que intenta iniciar sesión.
                $sql = "SELECT * FROM usuario WHERE Usuario=? AND contrasena=? ";
                $sql = $conectar->prepare($sql);
                $sql->bindValue(1, $Usuario);
                $sql->bindValue(2, $Password);
                // $sql->bindValue(3, $rol);
                $sql->execute();
                //TODO: Obtenemos los resultados de la consulta
                $resultado = $sql->fetch();
                //TODO: Si se encontró un usuario con las credenciales proporcionadas
                if (is_array($resultado) and count($resultado) > 0) {
                    $_SESSION["ID_usuario"] = $resultado["ID_usuario"];
                    $_SESSION["Nombre"] = $resultado["Nombre"];
                    $_SESSION["Apellidos"] = $resultado["Apellidos"];
                    $_SESSION["Correo"] = $resultado["Correo"];
                    $_SESSION["Numero"] = $resultado["Numero"];
                    $_SESSION["ID_roles"] = $resultado["ID_roles"];
                    //TODO: Redirigimos al usuario a la página de inicio
                    header("Location:" . Conectar::ruta() . "views/Tablero/");
                    exit();
                } else {
                    //TODO: Si las credenciales no son válidas, redirigimos al usuario de vuelta a la página de inicio de sesión con un mensaje de error
                    header("Location:" . conectar::ruta() . "views/login/index.php?m=1");
                    exit();
                }
            }
        }
    }

    public function insert_usuario($ID_roles, $Nombre, $Apellidos, $Correo, $Numero, $Usuario, $contrasena)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "INSERT INTO usuario (ID_usuario, ID_roles, Nombre, Apellidos, Correo, Numero, Usuario, contrasena) VALUES (NULL,?, ?, ?, ?, ?, ?,? );";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $ID_roles);
        $sql->bindValue(2, $Nombre);
        $sql->bindValue(3, $Apellidos);
        $sql->bindValue(4, $Correo);
        $sql->bindValue(5, $Numero);
        $sql->bindValue(6, $Usuario);
        $sql->bindValue(7, $contrasena);
        $sql->execute();
        return $resultado = $sql->fetch();
    }

    public function update_usuario($ID_usuario, $ID_roles, $Nombre, $Apellidos, $Correo, $Numero, $Usuario, $contrasena)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "UPDATE usuario SET ID_roles=?, Nombre=?, Apellidos=?, Correo=?, Numero=?, Usuario=?, contrasena=? WHERE ID_usuario=?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $ID_roles);
        $sql->bindValue(2, $Nombre);
        $sql->bindValue(3, $Apellidos);
        $sql->bindValue(4, $Correo);
        $sql->bindValue(5, $Numero);
        $sql->bindValue(6, $Usuario);
        $sql->bindValue(7, $contrasena);
        $sql->bindValue(8, $ID_usuario);
        $sql->execute();
        return $resultado = $sql->fetch();
    }



    public function delete_usuario($ID_usuario)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "DELETE FROM usuario WHERE ID_usuario=?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $ID_usuario);
        $sql->execute();
        return $resultado = $sql->fetch();
    }

    public function get_usuario()
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM usuario ";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function get_usuario_por_id($ID_usuario)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM usuario WHERE ID_usuario=?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $ID_usuario);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function update_pass($ID_usuario,$contrasena)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "UPDATE usuario SET contrasena=? WHERE ID_usuario=?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $contrasena);
        $sql->bindValue(2, $ID_usuario);
        $sql->execute();
        return $resultado = $sql->fetch();
    }


}
