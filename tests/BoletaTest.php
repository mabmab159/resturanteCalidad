<?php

use PHPUnit\Framework\TestCase;

include_once('../modelo/entidadBoleta.php');

class BoletaTest extends TestCase
{
    public function testListarBoletas()
    {
        $objBoleta = new entidadBoleta();
        $respuesta = $objBoleta->listarBoletas();
        $this->assertCount(0, $respuesta);
    }

    public function testListarBoletasPorFecha()
    {
        $objBoleta = new entidadBoleta();
        $respuesta = $objBoleta->listarBoletasPorFecha("2022-07-25");
        $this->assertEquals(
            ['idboleta' => '28',
                'tipocomprobante' => 'Boleta',
                'serie' => '001',
                'numero' => '0000212',
                'idcomanda' => '212',
                'pago' => '12',
                'moneda' => 'Soles',
                'fecha' => '2022-07-25 11:03:55'
            ], $respuesta[0]);
    }
}