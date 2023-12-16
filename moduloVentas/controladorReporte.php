<?php
include_once('../modelo/entidadBoleta.php');
include_once('formEmitirReporte.php');
class controladorReporte {

    public function listarBoletas() {

        $entidadBoleta = new entidadBoleta;
        $listaBoletas = $entidadBoleta->listarBoletas();
        $formEmitirReporte = new formEmitirReporte;
        $formEmitirReporte->formEmitirReporteShow($listaBoletas);
    }
    public function BuscarReporte($fecha) {

        $entidadBoleta = new entidadBoleta;
        $listaBoletas = $entidadBoleta->listarBoletasPorFecha($fecha);
        $formEmitirReporte = new formEmitirReporte;
        $formEmitirReporte->formEmitirReporteShow($listaBoletas);
    }
}