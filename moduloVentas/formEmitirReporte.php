<?php

class formEmitirReporte
{
    public function formEmitirReporteShow($listaBoletas)
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
            <title>Emitir Reporte</title>
        </head>
        <style>
            @media print {
                .volver, .x, .buscar, .input, .div-header {
                    display: none;
                }

            }
        </style>
        <body>
        <div class="div-header">
            <img src="../img/logo_header.png" height="100" width="230">
            <form action="../moduloSeguridad/getUsuario.php" method="POST">
                <input class="volver" type="submit" name="btnInicio" value="Atras">
            </form>
        </div>
        <h1 class="titulo">Lista de Boletas</h1>
        <form action="getReporte.php" method="POST">
            <input class="input" type="date" name="fechaReporte">
            <input class="buscar" type="submit" name="btnBuscarReporte" value="Buscar">
        </form>
        <?php
        if ($listaBoletas == null) {
            echo 'no se encontro datos';
        } else {

            ?>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Fecha - Hora</th>
                    <th scope="col">Serie - Numero</th>
                    <th scope="col">Total</th>
                    <th scope="col">Moneda</th>

                </tr>
                </thead>
                <tbody>
                <?php
                $i = 0;
                $Total = 0;
                foreach ($listaBoletas as $Boletas) {
                    $i++;
                    echo "
                                            <tr>
                                                <td>" . $i . "</td>
                                                <td>" . $Boletas['fecha'] . "</td>
                                                <td>" . $Boletas['serie'] . " - " . $Boletas['numero'] . "</td>
                                                <td>" . $Boletas['pago'] . "</td>
                                                <td>" . $Boletas['moneda'] . "</td>
                                            </tr>";
                    $Total = $Boletas['pago'] + $Total;
                }
                ?>
                </tbody>
                <center>
                    <br>

                    Total : S/. <?php echo $Total; ?>
                </center>

                <input class="volver" type="submit" value="Reporte" name="btnEmitirReporte" onclick="print()">
                <br>

            </table>


            <?php
        }
        ?>
        </body>
        </html>
        <?php
    }


}

?>
