<?php

class formEmitirComanda
{
    public function formEmitirComandaShow($listarComandas)
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
            <title>Emitir Comandass</title>
        </head>
        <body>
        <div class="div-header">
            <img src="../img/logo_header.png" height="100" width="230">
            <form action="../moduloSeguridad/getUsuario.php" method="POST">
                <input class="volver" type="submit" name="btnInicio" value="Atras">
            </form>
        </div>
        <h1 class="titulo">Lista de Comandas</h1>

        <form action="../moduloVentas/getComanda.php" method="post">
            <input class="agregar" type="submit" name="btnAgregarComanda" value="Agregar Comanda">
        </form>
        <?php
        if ($listarComandas == NULL) {
            echo 'no se encontro datos';
        } else {
            ?>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Numero de Mesa</th>
                    <th scope="col">estado</th>
                    <th scope="col">Modificar</th>
                    <th scope="col">Atender</th>

                </tr>
                </thead>
                <tbody>
                <?php
                $i = 0;

                foreach ($listarComandas as $comanda) {

                    $mesa[$i] = $comanda['numeroMesa'];
                    $i++;
                    echo "
                                            <tr>
                                                <td>" . $i . "</td>
                                                <td>" . $comanda['fecha'] . "</td>
                                                <td>" . $comanda['numeroMesa'] . "</td>";
                    if ($comanda['estado'] == "PorAtender") {
                        echo "<td>Por atender</td>";
                    }
                    echo "   <td>
                                                    <form action=getComanda.php method=post>
                                                    <input class='volver' type=submit name=btnModificarComanda value=Modificar>
                                                    <input type=number name=idComanda value=$comanda[idcomanda] readonly required hidden>
                                                    </form>
                                                </td>
                                                <td>
                                                    <form action=getComanda.php method=post>
                                                    <input class='volver' type=submit name=btnAtenderComanda value=Atender>
                                                    <input type=number name=idComanda value=$comanda[idcomanda] readonly required hidden>
                                                    </form>
                                                </td>
                                            </tr>";


                }

                $_SESSION['mesa'] = $mesa;
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
