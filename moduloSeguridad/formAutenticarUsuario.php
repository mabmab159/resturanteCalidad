<?php

class formAutenticarUsuario
{
    public function formAutenticarUsuarioShow()
    {
        ?>
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF -8">
            <title>Iniciar Sesion</title>
            <link rel="shorcut icon" type="image/x-icon" href="img/icono.ico">
            <link rel="stylesheet" href="estilos/estilos_generales.css">
            <link rel="stylesheet" href="estilos/estilos_login.css">
        </head>
        <body>
        <div class="form-contenedor">
            <form class="form1" id="form1" name="form1" method="post" action="../moduloSeguridad/getUsuario.php">
                <div class="logo">
                    <img src="img/nombre_logo_2.png">
                </div>
                <table class="table-login">
                    <tr>
                        <td class="td">Usuario</td>
                        <td>
                            <label>
                                <input class="input" name="usuario" type="text" id="usuario"/>
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td class="td">Password</td>
                        <td>
                            <input class="input" name="pass" type="password" id="pass">
                        </td>
                    </tr>
                </table>
                <input class="aceptar" name="btnAceptar" type="submit" id="btnAceptar" value="Ingresar"/>
            </form>
            <form class="form2" method="post" action="moduloSeguridad/getEntrar.php">
                <button name="btnEntrar" value="btnEntrar">¿Olvidaste tu contraseña?</button>
            </form>
        </div>
        </body>
        </html>
        <?php
    }
}

?>