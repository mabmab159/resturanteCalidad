<?php

use PHPUnit\Framework\TestCase;

include_once('../modelo/entidadUsuarioPrivilegio.php');

class UsuarioPrivilegiadoTest extends TestCase
{
    public function testObtenerPrivilegios()
    {
        $objUsuarioPrivilegio = new entidadUsuarioPrivilegio;
        $Privilegios = $objUsuarioPrivilegio->obtenerPrivilegios("1");
        $this->assertEquals(
            ['idpriv' => '4',
                'idrol' => '1',
                'nombre' => 'Emitir Cuenta',
                'privilegio' => 'btnEmitirCuenta',
                'url' => '../moduloVentas/getCuenta.php'], $Privilegios[0]);
    }
}

?>