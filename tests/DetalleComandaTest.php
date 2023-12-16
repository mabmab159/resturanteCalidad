<?php

use PHPUnit\Framework\TestCase;

include_once('../modelo/entidadDetalleComanda.php');

class DetalleComandaTest extends TestCase
{
    public function testListarDetalleComanda()
    {
        $objDetalleComanda = new entidadDetalleComanda();
        $respuesta = $objDetalleComanda->listarDetalleComanda("211");
        $this->assertEquals(['idDetalleComanda' => '30',
            'idcomanda' => '211',
            'idproducto' => '11',
            'cantidad' => '3'], $respuesta[0]);
    }
}