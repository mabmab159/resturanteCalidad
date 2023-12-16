<?php
    class formMensajeSistema{
        public function formMensajeSistemaShow($mensaje,$link){
            ?>
                <!DOCTYPE html>
                <html lang="es">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                     <link rel="stylesheet" href="../estilos/gestionarUsuarios.css">
                    <link rel="stylesheet" href="../estilos/estilos_generales.css">
                    <link rel="stylesheet" href="../estilos/estilos_mensaje.css">

                    <title>Mensaje del Sistema</title>
                </head>
                <body>
                     <div class="div-header">
                         <img src="../img/logo_header.png" height="100" width="230">
                    </div>

                    <div class="div-mensaje">
                        <h2><?php echo strtoupper($mensaje); ?></h2>
                        <p><?php echo $link; ?></p>
                    </div>
                </body>
                </html>
            <?php
        }
    }
?>