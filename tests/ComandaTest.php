<?php

use PHPUnit\Framework\TestCase;

include_once('../modelo/entidadComanda.php');

class ComandaTest extends TestCase
{
    public function testBuscarComandaPorId()
    {
        $objComanda = new entidadComanda();
        $respuesta = $objComanda->buscarComandaPorid("211");
        $this->assertEquals(
            ['idcomanda' => '211',
                'fecha' => '2022-07-25',
                'numeroMesa' => '3',
                'estado' => 'Pagado',
                'total' => '18',
            ], $respuesta[0]);
    }
    public function testCalcularTotal()
    {
        $objComanda = new entidadComanda();
        $respuesta = $objComanda->calcularTotal("211");
        $this->assertEquals("18", $respuesta[0]["total"]);

    }
    public function testListarComandaPorEstado()
    {
        $objComanda = new entidadComanda();
        $respuesta = $objComanda->listarComandaPorEstado();
        $this->assertCount(0, $respuesta);
    }
}

?>