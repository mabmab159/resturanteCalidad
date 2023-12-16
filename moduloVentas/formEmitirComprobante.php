<?php

class formEmitirComprobante
{
    public function formEmitirComprobanteShow($listaComandas)
    {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="../estilos/gestionarUsuarios.css">
            <link rel="stylesheet" href="../estilos/estilos_generales.css">
            <link rel="shorcut icon" type="image/x-icon" href="../img/ico   no.ico">
            <title>Emitir Comprobantes</title>
        </head>
        <body>
        <div class="div-header">
            <img src="../img/logo_header.png" height="100" width="230">
            <form action="../moduloSeguridad/getUsuario.php" method="POST">
                <input class="volver" type="submit" name="btnInicio" value="Atras">
            </form>
        </div>
        <h1 class="titulo">Lista de Comprobantes activos</h1>
        <?php
        if ($listaComandas == null) {
            echo 'no se encontro datos';
        } else {
            ?>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Numero de Mesa</th>
                    <th scope="col">Total</th>
                    <th scope="col">Estado</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $i = 0;
                foreach ($listaComandas as $comanda) {
                    $i++;
                    echo "
                                            <tr>
                                                <td>" . $i . "</td>
                                                <td>" . $comanda['fecha'] . "</td>
                                                <td>" . $comanda['numeroMesa'] . "</td>
                                                <td>" . $comanda['total'] . "</td>
                                                <td>" . $comanda['estado'] . "</td>";

                    echo "<td>
                                                    <form action=getComprobante.php method=post>
                                                    <input class='volver' type=submit name=btnEmitir value=Emitir>
                                                    <input type=number name=idComanda value=$comanda[idcomanda] readonly required hidden>
                                                    </form>
                                                </td>
                                            </tr>";
                }
                ?>
                </tbody>
            </table>

            <?php
        } ?>
        </body>
        </html>
        <?php
    }


}

?>
