<?php


include_once("entidadComanda.php");

class entidadBoleta extends Conexion
{

    public function insertarComprobante($idcomanda, $tcomp, $serie, $numero, $moneda, $pago)
    {
        $conexion = new Conexion;
        $idComanda = intval($idcomanda);
        $Pago = intval($pago);
        $queryComandas = "INSERT into boleta (tipocomprobante,serie,numero,idcomanda,pago,moneda,fecha) values('$tcomp','$serie','$numero',$idComanda,$Pago,'$moneda',SYSDATE())";
        $resultado = mysqli_query($conexion->getConexion(), $queryComandas);
        $this->cerrarConexion();
    }

    public function listarBoletas()
    {
        $queryComandas = "SELECT * from boleta where DATE(fecha) = curdate()  ";
        $resultado = mysqli_query($this->getConexion(), $queryComandas);
        $this->cerrarConexion();
        $resultados = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
        return $resultados;
    }

    public function listarBoletasPorFecha($fecha)
    {
        $queryComandas = "SELECT * from boleta where DATE(fecha) = '$fecha' ";
        $resultado = mysqli_query($this->getConexion(), $queryComandas);
        $this->cerrarConexion();
        $resultados = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
        return $resultados;
    }

}