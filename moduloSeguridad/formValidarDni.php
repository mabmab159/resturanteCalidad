<?php

class formValidarDni
{
    public function formValidarDniShow()
    {
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <link rel="stylesheet" href="../estilos/estilos_restablecerpw.css">
            <title>Reestablecer Contrasena</title>
        </head>
        <body>
        <div class="div-header">
            <img src="../img/logo_header.png" width="240" height="100">
        </div>
        <form class="form" method="post" action="getDni.php">
            <div class="contenedor">
                <label>Ingrese su dni</label>
                <input class="input" type="text" name="campoDni" id="campoDni" pattern="[0-9]+" maxlength="8">
                <button class="btnsiguiente" name="btnSiguiente" id="btnSiguiente">Siguiente</button>
            </div>
        </form>
        </body>
        </html>
        <?php
    }
}

?>

