<?php

include_once("../modelo/Conexion.php");

class entidadDetalleComanda extends conexion
{

    public function insertarDetalleComanda($idComanda, $arrayProductos = [])
    {
        foreach ($arrayProductos as $producto) {
            $query = "INSERT INTO detallecomanda (`idComanda`, `idProducto`,`cantidad`) 
                    VALUES ($idComanda,$producto[idProducto],$producto[cantidad])";
            $resultado = mysqli_query($this->getConexion(), $query);
            $resultado;
        }
        $this->cerrarConexion();
    }

    public function insertarDetalleComandaA($idComanda, $idProducto, $cantidad)
    {
        $queryProducto = "INSERT INTO detallecomanda (`idComanda`, `idProducto`,`cantidad`) 
                    VALUES ($idComanda,$idProducto,$cantidad)";
        $conexion = new conexion;
        $resultado = mysqli_query($conexion->getConexion(), $queryProducto);
        $conexion->cerrarConexion();
    }

    public function listarDetalleComanda($idComanda)
    {
        $queryProducto = "SELECT * from detallecomanda where idcomanda=$idComanda";
        $conexion = new conexion;
        $resultado = mysqli_query($conexion->getConexion(), $queryProducto);
        $conexion->cerrarConexion();
        $detalle = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
        return $detalle;
    }

    public function EliminarDetalleComanda($idDetalleComanda)
    {
        $queryProforma = "DELETE from detallecomanda where idDetalleComanda=$idDetalleComanda";
        $resultado = mysqli_query($this->getConexion(), $queryProforma);
        $this->cerrarConexion();

    }
}