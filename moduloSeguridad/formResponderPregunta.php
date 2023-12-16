<?php

class formResponderPregunta
{
    public function responderPreguntaSecretaShow()
    {
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title>reponder pregunta</title>
            <link rel="stylesheet" href="../estilos/estilos_responderpreguntas.css">
            <link rel="shorcut icon" type="image/x-icon" href="../img/icono.ico">
        </head>
        <body>
        <div class="div-header">
            <img src="../img/logo_header.png" width="240" height="100">
        </div>
        <form class="form" method="post" action="getRespuesta.php">
            <div class="contenedor">
                <!--<label><?php //echo $campoDni;
                ?></label><br>-->
                <label>¿Cual es tu respuesta secreta?</label><br>
                <input class="input" type="text" name="campoRespuesta"><br>
                <button class="btnsiguiente" name="btnSiguiente" id="btnSiguiente">Siguiente</button>
            </div>
        </form>
        </body>
        </html>
        <?php
    }
}

?>