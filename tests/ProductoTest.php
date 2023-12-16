<?php

use PHPUnit\Framework\TestCase;

include_once('../modelo/entidadProducto.php');

class productosTest extends TestCase
{
    public function testBuscarProductoPorNombre()
    {
        $objProducto = new entidadProducto();
        $respuesta = $objProducto->buscarProductosPorNombre("Tequeños");
        $this->assertEquals(
            ['idProducto' => '1',
                'nombre' => 'Tequeños',
                'tipo' => 'entrada',
                'precio' => '6',
                'estado' => '1',
                'stock' => '1'
            ], $respuesta[0]);
    }

    public function testListarProductosPorNombre()
    {
        $objProducto = new entidadProducto();
        $respuesta = $objProducto->listarProductosPorNombre("Tequeños");
        $this->assertEquals(
            ['idProducto' => '1',
                'nombre' => 'Tequeños',
                'tipo' => 'entrada',
                'precio' => '6',
                'estado' => '1',
                'stock' => '1'
            ], $respuesta[0]);
    }

    public function testBuscarProductoPorId()
    {
        $objProducto = new entidadProducto();
        $respuesta = $objProducto->buscarProductoPorId("1");
        $this->assertEquals(
            ['idProducto' => '1',
                'nombre' => 'Tequeños',
                'tipo' => 'entrada',
                'precio' => '6',
                'estado' => '1',
                'stock' => '1'
            ], $respuesta[0]);
    }

    public function testListarProductosActivos()
    {
        $objProducto = new entidadProducto();
        $respuesta = $objProducto->listarProductosActivos();
        $this->assertEquals(
            ['idProducto' => '1',
                'nombre' => 'Tequeños',
                'tipo' => 'entrada',
                'precio' => '6',
                'estado' => '1',
                'stock' => '1'
            ], $respuesta[0]);
    }

    public function testListarProductosPorTipo()
    {
        $objProducto = new entidadProducto();
        $respuesta = $objProducto->listarProductosPorTipo("entrada");
        $this->assertEquals(
            ['idProducto' => '1',
                'nombre' => 'Tequeños',
                'tipo' => 'entrada',
                'precio' => '6',
                'estado' => '1',
                'stock' => '1'
            ], $respuesta[0]);
    }

    public function testListarProductos()
    {
        $objProducto = new entidadProducto();
        $respuesta = $objProducto->listarProductos();
        $this->assertEquals(
            ['idProducto' => '1',
                'nombre' => 'Tequeños',
                'tipo' => 'entrada',
                'precio' => '6',
                'estado' => '1',
                'stock' => '1'
            ], $respuesta[0]);
    }
}

?>