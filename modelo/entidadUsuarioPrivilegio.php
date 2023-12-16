<?php
include_once("Conexion.php");

class entidadUsuarioPrivilegio extends Conexion
{
    public function obtenerPrivilegios($rol)
    {
        $consulta = "SELECT * From privilegios where idrol = '$rol'";
        $resultado = mysqli_query($this->getConexion(), $consulta);
        $privilegios = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
        return $privilegios;
    }
}

?>