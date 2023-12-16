<?php
include_once("Conexion.php");

class entidadUsuario extends Conexion
{

    public function autenticarUsuario($nombre, $pass)
    {
        $pass = md5($pass);
        $consulta = "SELECT usuario, idusuario, idrol
					FROM usuario
					WHERE usuario = '$nombre' AND
						  pass = '$pass' AND
						 estado = 1";
        $this->getConexion();
        $resultado = mysqli_query($this->getConexion(), $consulta);
        $this->cerrarConexion();
        $aciertos = mysqli_num_rows($resultado);
        if ($aciertos == 1) {
            $userS = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
            $_SESSION['nombre_usuario'] = $userS[0]['usuario'];
            $_SESSION['id_usuario'] = $userS[0]['idusuario'];
            $_SESSION['rol'] = $userS[0]['idrol'];
            return (1);
        } else
            return (0);
    }


    public function obtenerRol($nombre)
    {
        $consulta = "SELECT idrol FROM usuario WHERE usuario = '$nombre'";
        $resultado = mysqli_query($this->getConexion(), $consulta);
        $this->cerrarConexion();
        $rol = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
        $idrol = $rol[0]['idrol'];
        return $idrol;
    }

    public function obtenerUsuarios($estado)
    {
        $consulta = "SELECT u.idusuario, u.foto, u.nombre, u.usuario, u.email, u.estado, r.cargo FROM usuario u, roles r WHERE u.idrol=r.idrol AND u.estado = $estado ORDER BY u.idusuario";
        $resultado = mysqli_query($this->getConexion(), $consulta);
        $this->cerrarConexion();
        $listaUsuarios = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
        return $listaUsuarios;
    }

    public function obteniendoUsuariosPorId($id)
    {
        $consulta2 = "SELECT u.nombre, u.usuario, u.dni, u.pass, u.email, u.foto, r.cargo FROM usuario u, roles r WHERE u.idrol=r.idrol AND u.idusuario = $id";
        $resultado = mysqli_query($this->getConexion(), $consulta2);
        $this->cerrarConexion();
        $usuario = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
        return $usuario;
    }

    public function actualizandoUsuariosPrivilegios($id, $nombre, $usuario, $dni, $email, $foto, $rol)
    {
        $consult = "UPDATE usuario SET nombre='$nombre', usuario='$usuario',dni='$dni',email='$email',foto='$foto',idrol=$rol WHERE idusuario=$id";
        $resultado = mysqli_query($this->getConexion(), $consult);
        $this->cerrarConexion();
        return $resultado;

    }

    public function cambiarEstado($idusuario, $estado)
    {
        $consulta3 = "UPDATE usuario SET estado=$estado WHERE idusuario=$idusuario";
        $resultado = mysqli_query($this->getConexion(), $consulta3);
        $this->cerrarConexion();
    }

    public function agregandoUsuario($nombre, $usuario, $dni, $foto, $rol, $pass, $email, $secreto)
    {
        $consulta4 = "INSERT INTO usuario(nombre, usuario, dni, pass, email, foto, idrol, estado, secreto) VALUES ('$nombre', '$usuario', '$dni', '$pass', '$email', '$foto', '$rol', 1, '$secreto')";
        $resultado = mysqli_query($this->getConexion(), $consulta4);
        $this->cerrarConexion();
    }

    public function verificarDni($campoDni)
    {
        $consulta = "SELECT *
					 FROM usuario
					 WHERE dni = '$campoDni'";
        $resultado = mysqli_query($this->getConexion(), $consulta);
        $this->cerrarConexion();
        $aciertos = mysqli_num_rows($resultado);
        if ($aciertos == 1)
            return (1);
        else
            return (0);
    }

    public function validarRespuesta($campoRespuesta)
    {
        $consulta = "SELECT *
					 FROM usuario
					 WHERE secreto = '$campoRespuesta'";
        $resultado = mysqli_query($this->getConexion(), $consulta);
        $this->cerrarConexion();
        $aciertos = mysqli_num_rows($resultado);
        if ($aciertos == 1)
            return (1);
        else
            return (0);
    }

    public function obtenerPassword($campoRespuesta)
    {
        $consulta = "SELECT *
					 FROM usuario
					 WHERE secreto = '$campoRespuesta'";
        $resultado = mysqli_query($this->getConexion(), $consulta);
        $this->cerrarConexion();
        /*$aciertos = mysqli_num_rows($resultado);
        if($aciertos == 1)
            return(1);
        else
            return(0);*/
        return $resultado->fetch_all()[0];
    }

    public function reestablecerPassword($originalPassword, $dni)
    {
        $consulta = "UPDATE 
					 usuario
					 SET pass = '$originalPassword'
					 WHERE dni = '$dni'";

        $resultado = mysqli_query($this->getConexion(), $consulta);
        $this->cerrarConexion();
        /*$aciertos = mysqli_num_rows($resultado);
        if($aciertos == 1)
            return(1);
        else
            return(0);*/
        //return $resultado -> fetch_all()[0];
    }

    public function validarDni($dni)
    {
        $consulta = "SELECT *
					 FROM usuario
					 WHERE dni = $dni";
        $resultado = mysqli_query($this->getConexion(), $consulta);
        $this->cerrarConexion();
        $aciertos = mysqli_num_rows($resultado);
        return $aciertos;
    }


}

?>

