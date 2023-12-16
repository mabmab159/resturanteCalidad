<?php
include_once("../modelo/conexion.php");

class entidadComanda extends Conexion
{
    public function listarComandas()
    {
        $queryComandas = "SELECT* from comanda WHERE fecha = CURDATE() and estado = 'PorAtender'";
        $resultado = mysqli_query($this->getConexion(), $queryComandas);
        $this->cerrarConexion();
        $resultados = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
        return $resultados;
    }

    public function insertarComanda($numMesa, $total)
    {
        $query = "INSERT INTO comanda (`fecha`,`NumeroMesa`, `total`, `estado`) VALUES (CURDATE(),
            $numMesa,$total,'PorAtender')";
        $resultado = mysqli_query($this->getConexion(), $query);
        $this->cerrarConexion();

    }

    public function obtenerIdMaxProforma()
    {
        $Conexion = new Conexion;
        $queryProforma = "SELECT MAX(idcomanda) AS idcomanda FROM comanda";
        $resultado = mysqli_query($Conexion->getConexion(), $queryProforma);
        $Conexion->cerrarConexion();
        $resultado = mysqli_fetch_all($resultado, MYSQLI_ASSOC);

        return $resultado;
    }

    public function buscarComandaPorid($idComanda)
    {

        $queryComandas = "SELECT * from comanda where idcomanda = $idComanda";
        $resultado = mysqli_query($this->getConexion(), $queryComandas);
        $this->cerrarConexion();
        $resultado = mysqli_fetch_all($resultado, MYSQLI_ASSOC);

        return $resultado;
    }

    public function actualizarComanda($idcom, $total)
    {
        $queryComandas = "UPDATE comanda set estado = 'Atendido', total =$total where idcomanda=$idcom";
        $resultado = mysqli_query($this->getConexion(), $queryComandas);
        $this->cerrarConexion();
    }

    public function modificarEstadoComanda($idComanda, $estado)
    {
        $queryComandas = "UPDATE comanda set estado = '$estado' where idcomanda=$idComanda";
        $resultado = mysqli_query($this->getConexion(), $queryComandas);
        $this->cerrarConexion();
    }

    public function actualizarComandaestado($idcom)
    {
        $queryComandas = "UPDATE comanda set estado = 'eliminada' where idcomanda=$idcom";
        $resultado = mysqli_query($this->getConexion(), $queryComandas);
        $this->cerrarConexion();

    }

    public function calcularTotal($idcom)
    {
        $queryComandas = "SELECT SUM(p.precio*d.cantidad) as total from producto p,detallecomanda d 
                                where d.idcomanda = $idcom and p.idproducto = d.idproducto";
        $resultado = mysqli_query($this->getConexion(), $queryComandas);
        $this->cerrarConexion();
        $resultados = mysqli_fetch_all($resultado, MYSQLI_ASSOC);

        return $resultados;
    }

    public function actualizarComandaestadoAtendido($idcom)
    {
        $Total = $this->calcularTotal($idcom);
        $Total = intval($Total[0]['total']);
        $Conexion = new Conexion;
        $queryComandas = "UPDATE comanda set estado = 'Atendido' ,total = $Total where idcomanda=$idcom";
        $resultado = mysqli_query($Conexion->getConexion(), $queryComandas);

        $Conexion->cerrarConexion();

    }

    public function listarComandaPorEstado()
    {
        $queryComandas = "SELECT* from comanda WHERE fecha = CURDATE() and estado = 'Atendido'";
        $resultado = mysqli_query($this->getConexion(), $queryComandas);
        $this->cerrarConexion();
        $resultados = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
        return $resultados;

    }

    public function actualizarComandaPagado($idcomanda)
    {
        $idComanda = intval($idcomanda);
        $queryComandas = "UPDATE comanda set estado = 'Pagado' where idcomanda=$idComanda";
        $resultado = mysqli_query($this->getConexion(), $queryComandas);
        $this->cerrarConexion();
    }


}

?>