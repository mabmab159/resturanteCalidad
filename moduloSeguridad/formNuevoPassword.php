<?php

class formNuevoPassword
{
    public function nuevoPasswordShow($password)
    {
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title>Cambiar contraseña</title>
            <link rel="shorcut icon" type="image/x-icon" href="../img/icono.ico">

            <link rel="stylesheet" href="../estilos/estilos_newpass.css">

        </head>
        <body>
        <div class="div-header">
            <img src="../img/logo_header.png" width="240" height="100">
        </div>
        <form class="form" method="post" action="getNuevoPassword.php">
            <div class="contenedor">
                <!--<label ><?php //echo $password[3];
                ?></label><br>-->
                <label>Nueva Contraseña</label>
                <input class="input" type="password" name="nuevoPassword"><br>
                <label>Repetir Nueva Contraseña</label>
                <input class="input" type="password" name="repetirNuevoPassword">
                <button class="btnsiguiente" name="btnAceptar" id="btnAceptar">Aceptar</button>
                <input type="hidden" name="repetirDni" value="<?php echo $password[3]; ?>">
            </div>
        </form>
        </body>
        </html>
        <?php
    }
}

?>