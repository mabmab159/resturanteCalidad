<?php
include_once("../modelo/entidadBoleta.php");//2
include_once("../modelo/entidadComanda.php");//2
include_once("../modelo/entidadDetalleComanda.php");
include_once("../modelo/entidadProducto.php");//3
include_once("../moduloVentas/formEmitirComprobante.php");//5
include_once("../moduloVentas/formEmitirBoleta.php");//6


class controlComprobante
{
    public function listarComandaPorEstado()
    {
        //2
        $entidadComprobante = new entidadComanda;
        $listaComandas = $entidadComprobante->listarComandaPorEstado();
        $formEmitirComprobant = new formEmitirComprobante;
        $formEmitirComprobant->formEmitirComprobanteShow($listaComandas);
    }

    public function detalleComanda($idcomanda)
    {
        $entidadComanda = new entidadComanda;
        $entidadDetalleComanda = new entidadDetalleComanda;
        $listarDetalleComanda = $entidadDetalleComanda->listarDetalleComanda($idcomanda);
        $listacomanda = $entidadComanda->buscarComandaPorid($idcomanda);
        $formEmitirComprobant = new formAgregarCliente;
        $formEmitirComprobant->formAgregarClienteShow($listarDetalleComanda, $listacomanda);
    }

    public function insertarComprobante($idcomanda, $tcomp, $serie, $numero, $moneda, $pago)
    {
        $entidadBoleta = new entidadBoleta;
        $entidadComanda = new entidadComanda;
        $datoModificado = $entidadComanda->actualizarComandaPagado($idcomanda);
        $entidadBoleta->insertarComprobante($idcomanda, $tcomp, $serie, $numero, $moneda, $pago);
        $this->listarComandaPorEstado();
    }
}