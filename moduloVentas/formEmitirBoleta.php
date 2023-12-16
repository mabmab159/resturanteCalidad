<?php

class formAgregarCliente
{
    public function formAgregarClienteShow($listarDetalleComanda, $listacomanda)
    {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <!-- <link rel="stylesheet" href="../estilos/gestionarUsuarios.css">
            <link rel="stylesheet" href="../estilos/estilos_generales.css"> -->
            <link rel="stylesheet" href="../estilos/estilos_boleta.css">
            <link rel="shorcut icon" type="image/x-icon" href="../img/ico   no.ico">
            <title>Emitir Comprobantes</title>
        </head>
        <style>
            @media print {
                .volver, .btn {
                    display: none;
                }

            }
        </style>
        <body>

        <form action="../moduloVentas/getComprobante.php" method="POST">
            <input class="volver" type="submit" name="btnEmitirComprobante" value="Atras">
        </form>


        <form action="getComprobante.php" method="POST">
            <div class="header">
                <div class="div-nombre_negocio">
                    <img src="../img/nombre_logo_2.png" height="80" width="190">
                    <p>Jr. Andahuaylas 1219-1227, Cercado de Lima 15001</p>
                    <p>Cel: 988 888 338</p>
                    <p>Email: elsaborcitoperuano@gmail.com</p>
                </div>
                <div class="datos_negocio">
                    <h1 class="title">Boleta de Venta</h1>
                    <label for="">Serie: </label>
                    <input class="serie" type="text" name="serie" value="001"><br>
                    <label for="">Numero: </label>
                    <input class="num" type="text" min="7" max="7" name="numero"
                           value="<?php echo substr("000000", 0, 7 - strlen($listacomanda[0]['idcomanda'])) . $listacomanda[0]['idcomanda']; ?>"><br>
                </div>
            </div>
            <!-- fecha -->
            <div class="datos_2">
                <label for="">Fecha: </label>
                <?php echo $listacomanda[0]['fecha'] ?><br>
                <input type="hidden" name="idComanda" value="<?php echo $listacomanda[0]['idcomanda'] ?>">
                <label for="">Tipo de Comprobante: </label>
                <input type="text" name="tcomp" value="Boleta"><br>

                <?php
                ?>

                <label for="">Moneda: </label>
                <input type="text" name="moneda" value="Soles"><br>
            </div>
            <?php
            if ($listarDetalleComanda == null) {
                echo 'no se encontro datos';
            } else {
                ?>
                <table class="tabla-datos">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>nombre</th>
                        <th>precio</th>
                        <th>cantidad</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php

                    $i = 0;
                    foreach ($listarDetalleComanda as $detalle) {
                        $i++;

                        echo " <tr>
                                            <td>" . $i . "</td>";
                        ?>


                        <?php

                        $d = $detalle['idproducto'];
                        $obj = new entidadProducto();
                        $det = $obj->buscarProductoPorId($d);
                        foreach ($det as $de) {

                            echo "  
                                                    <td>" . $de['nombre'] . "</td>
                                                    <td>" . $de['precio'] . "</td>";
                        }

                        echo "<td>" . $detalle['cantidad'] . "</td>
                                            </tr>";


                    } ?>
                    </tbody>
                </table>
                <?php
            } ?>
            <div class="datos_2">
                <label>Resumen </label> <br>
                <label for=""> Total: S/. </label>
                <input type="text" name="pago" value="<?php echo $listacomanda[0]['total'] ?>"><br>

            </div>

            <input class="volver" type="submit" value="Procesar" name="btnInsertar" onclick="print()">
        </form>

        </body>
        </html>
        <?php
    }

}

?>
