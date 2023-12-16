<?php
include_once('../modelo/entidadProducto.php');

class actualizarCarta
{
    public function listarCarta()
    {
        include_once('formListarCarta.php');
        $objProducto = new entidadProducto;
        $objFormCarta = new formlistarCarta;
        $productos = $objProducto->listarProductosActivos();
        $objFormCarta->formListarCartaShow($productos);
    }

    public function listarProductos()
    {
        include_once('formActualizandoCarta.php');
        $objProducto = new entidadProducto;
        $formActualizando = new formActualizarCarta;
        $productos = $objProducto->listarProductos();
        $formActualizando->formActualizandoCartaShow($productos);
    }

    public function actualizarProducto($id, $nombre, $tipo, $precio, $stock, $estado)
    {
        $entiActualizando = new entidadProducto;
        $entiActualizando->modificarProducto($id, $nombre, $tipo, $precio, $stock, $estado);
        $this->listarProductos();
    }

    public function listarProductosPorTipo($tipo)
    {
        include_once('formActualizandoCarta.php');
        $objProducto = new entidadProducto;
        $formActualizando = new formActualizarCarta;
        $productos = $objProducto->listarProductosPorTipo($tipo);
        $formActualizando->formActualizandoCartaShow($productos);
    }

    public function insertarProducto($nombre, $tipo, $precio, $stock)
    {
        $objProducto = new entidadProducto;
        $objProducto->insertarProducto($nombre, $tipo, $precio, $stock);
        $this->listarProductos();
    }

    public function buscarProducto($nombre)
    {
        include_once('formActualizandoCarta.php');
        $objProducto = new entidadProducto;
        $formActualizando = new formActualizarCarta;
        $productos = $objProducto->buscarProductosPorNombre($nombre);
        $formActualizando->formActualizandoCartaShow($productos);
    }

    public function reiniciarCarta()
    {
        $objProducto = new entidadProducto;
        $objProducto->deshabilitarProductos();
        $this->listarProductos();
    }

    public function validarProducto($nombre)
    {
        $objProducto = new entidadProducto;
        $resultado = $objProducto->validarProducto($nombre);
        echo $resultado;
    }
}

?>