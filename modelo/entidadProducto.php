<?php
include_once("conexion.php");

class entidadProducto extends Conexion
{

    public function insertarProducto($nombre, $tipo, $precio, $stock, $estado = '1')
    {
        $queryProducto = "INSERT INTO PRODUCTO (`nombre`,`tipo`,`precio`,`stock`, `estado`)
                                    VALUES ('$nombre','$tipo',$precio, $stock, $estado)";
        $conexion = new conexion;
        $resultado = mysqli_query($conexion->getConexion(), $queryProducto);
        $conexion->cerrarConexion();
    }

    public function modificarProducto($id, $nombre, $tipo, $precio, $stock, $estado)
    {
        if ($estado == '0') {
            $stock = 0;
        }
        $consulta = "UPDATE producto SET nombre='$nombre', tipo='$tipo', precio=$precio, stock=$stock, estado=$estado WHERE idProducto = $id";
        $resultado = mysqli_query($this->getConexion(), $consulta);
        $this->cerrarConexion();
    }

    public function buscarProductosPorNombre($nombre)
    {
        $queryProducto = "SELECT * from producto where nombre LIKE '$nombre%' order by idProducto";
        $conexion = new conexion;
        $resultado = mysqli_query($conexion->getConexion(), $queryProducto);
        $conexion->cerrarConexion();
        $producto = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
        $queryProducto;
        return $producto;
    }

    public function listarProductosPorNombre($nombreProducto)
    {
        $queryProducto = "SELECT * from producto where nombre ='$nombreProducto' AND estado= 1 order by idProducto";
        $conexion = new conexion;
        $resultado = mysqli_query($conexion->getConexion(), $queryProducto);
        $conexion->cerrarConexion();
        $producto = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
        return $producto;
    }

    public function buscarProductoPorId($idProducto)
    {
        $queryProducto = "SELECT * from producto where idProducto =$idProducto order by idProducto";
        $conexion = new conexion;
        $resultado = mysqli_query($conexion->getConexion(), $queryProducto);
        $conexion->cerrarConexion();
        $producto = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
        return $producto;
    }

    public function listarProductosActivos()
    {
        $consulta = "SELECT * FROM producto WHERE estado = 1 and stock <> 0 order by idProducto";
        $resultado = mysqli_query($this->getConexion(), $consulta);
        $productos = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
        return $productos;
    }

    /* ###### AND estado = 1*/
    public function listarProductosPorTipo($tipo)
    {
        $consulta = "SELECT * FROM producto WHERE tipo = '$tipo' order by idProducto";
        $resultado = mysqli_query($this->getConexion(), $consulta);
        $entradas = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
        return $entradas;
    }

    /* ###### */

    public function listarProductos()
    {
        $queryProducto = "SELECT * from producto order by idProducto";
        $conexion = new conexion;
        $resultado = mysqli_query($conexion->getConexion(), $queryProducto);
        $conexion->cerrarConexion();
        $producto = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
        return $producto;
    }

    public function deshabilitarProductos()
    {
        $consulta = "UPDATE producto SET estado=0, stock=0 where estado=1";
        $resultado = mysqli_query($this->getConexion(), $consulta);
        $this->cerrarConexion();
    }

    public function ActualizarStockProductos($idProducto, $cantidad)
    {
        $consulta = "UPDATE producto SET stock=$cantidad where idProducto=$idProducto";
        $resultado = mysqli_query($this->getConexion(), $consulta);
        $this->cerrarConexion();
    }

    public function validarProducto($nombre)
    {
        $consulta = "SELECT *
					 FROM producto
					 WHERE nombre = '$nombre'";
        $resultado = mysqli_query($this->getConexion(), $consulta);
        $this->cerrarConexion();
        $aciertos = mysqli_num_rows($resultado);
        return $aciertos;
    }
}

?>