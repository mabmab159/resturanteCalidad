<?php

use PHPUnit\Framework\TestCase;

include_once('../modelo/entidadUsuario.php');

class UsuarioTest extends TestCase
{

    public function testAutenticarUsuario()
    {
        $objUsuario = new entidadUsuario();
        $respuesta = $objUsuario->autenticarUsuario("alex", "alex");
        $this->assertEquals(1, $respuesta);
    }

    public function testObtenerRol()
    {
        $objUsuario = new entidadUsuario();
        $respuesta = $objUsuario->obtenerRol("alex");
        $this->assertEquals(3, $respuesta);
    }

    public function testObtenerUsuarios()
    {
        $objUsuario = new entidadUsuario();
        $respuesta = $objUsuario->obtenerUsuarios("1");
        $this->assertEquals(['idusuario' => '1',
            'foto' => '../img/administrador.png',
            'nombre' => 'Alexander Antony',
            'usuario' => 'alex',
            'email' => 'alexander@gmail.com',
            'estado' => '1',
            'cargo' => 'Administrador'], $respuesta[0]);
    }

    public function testObteniendoUsuariosPorId()
    {
        $objUsuario = new entidadUsuario();
        $respuesta = $objUsuario->obteniendoUsuariosPorId("1");
        $this->assertEquals(['foto' => '../img/administrador.png',
            'nombre' => 'Alexander Antony',
            'usuario' => 'alex',
            'email' => 'alexander@gmail.com',
            'cargo' => 'Administrador',
            'dni' => '70000001',
            'pass' => '534b44a19bf18d20b71ecc4eb77c572f'
        ], $respuesta[0]);
    }

    public function testVerificarDni()
    {
        $objUsuario = new entidadUsuario();
        $respuesta = $objUsuario->verificarDni("70000001");
        $this->assertEquals(1, $respuesta);
    }

    public function testValidarRespuesta()
    {
        $objUsuario = new entidadUsuario;
        $respuesta = $objUsuario->validarRespuesta("Ale730her");
        $this->assertEquals(1, $respuesta);
    }

    public function testObtenerPassword()
    {
        $objUsuario = new entidadUsuario();
        $respuesta = $objUsuario->obtenerPassword("Ale730her");
        $this->assertEquals([0 => '1',
            1 => 'Alexander Antony',
            2 => 'alex',
            3 => '70000001',
            4 => '534b44a19bf18d20b71ecc4eb77c572f',
            5 => 'alexander@gmail.com',
            6 => '../img/administrador.png',
            7 => '3',
            8 => '1',
            9 => 'Ale730her',
        ], $respuesta);
    }

    public function testValidarDni()
    {
        $objUsuario = new entidadUsuario;
        $respuesta = $objUsuario->verificarDni("70000001");
        $this->assertEquals(1, $respuesta);
    }
}

?>