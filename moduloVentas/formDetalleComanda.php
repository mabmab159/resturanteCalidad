<?php

class formDetalleComanda
{
    public function formDetalleComandaShow($listarDetalleComanda, $listaComandas, $lista)
    {
        ?>
        <!DOCTYPE html>
        <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shorcut icon" type="image/x-icon" href="../img/icono.ico">
        <link rel="stylesheet" href="../estilos/gestionarUsuarios.css">
        <link rel="stylesheet" href="../estilos/estilos_generales.css">
        <link rel="stylesheet" href="../estilos/estilos_agregarComanda.css">
        <title>Proforma</title>
    </head>

    <body>
    <div class="div-header">
        <img src="../img/logo_header.png" height="100" width="230">
        <form action="../moduloVentas/getComanda.php" method="post">
            <input class="volver" type="submit" name="btnEmitirComanda" value="Atras">
        </form>

    </div>

    <h1 class="titulo">Modificar Comanda</h1>


    <div class="actualizaCarta">
        <center>
            <div>
                <form action='getComanda.php' method='POST'>
                    <input type='hidden' name='idComanda' value="<?php echo $listaComandas[0]['idcomanda'] ?>">
                    <input class='modificar' type='submit' value='Eliminar' name='btnEliminarComanda'>
                </form>
                <h2 class="text">

                    <label for="">Fecha: </label>
                    <?php echo $listaComandas[0]['fecha'] ?><br>
                    <label for="">Numero de Mesa: </label>
                    <?php echo $listaComandas[0]['numeroMesa'] ?><br>

                </h2>
            </div>
        </center>
        <form action="../moduloVentas/getComanda.php" method="post">
            <input type="hidden" name="idComanda" value="<?php echo $listaComandas[0]['idcomanda'] ?>">
            <select class="input" name="btnidProductoActualizado" onchange="this.form.submit()">

                <option requered><?php echo $_SESSION['nombreProducto'] ?></option>
                <?php
                foreach ($lista as $values) { ?>
                    <option value="<?php echo $values['idProducto'] ?>"><?php echo $values['nombre'] ?></option>
                <?php } ?>
            </select>
            <select class="input" name="CantidadProducto">
                <?php $i = 1;
                for ($i; $i <= $_SESSION['stock']; $i++) { ?>
                    <option value="<?php echo $i ?>"><?php echo $i ?></option>
                <?php } ?>
            </select>

            <input class="agregar" type="submit" name="btnAgregarProductoModificado" value="Agregar">

        </form>
        <table class="carta">
            <thead>
            <tr class="encabezado">
                <th>N°</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Accion</th>


            </tr>
            </thead>

            <br><br>

            <?php
            $idcomanda = $listaComandas[0]['idcomanda'];
            $i = 0;
            foreach ($listarDetalleComanda

            as $detalle) {
            $i++;

            ?>
            <tr>
                <?php

                $d = $detalle['idproducto'];
                $obj = new entidadProducto();
                $det = $obj->buscarProductoPorId($d);
                foreach ($det as $de) {

                    echo "  <td>" . $i . "</td>
                                    <td>" . $de['nombre'] . "</td>
                                    <td>" . $de['tipo'] . "</td>
                                    <td>" . $de['precio'] . "</td>";
                }
                echo "<td>" . $detalle['cantidad'] . "</td>
                                <td>
                                <form action='../moduloVentas/getComanda.php' method=post>
                                <input type='hidden' name='idDetCom' value=$detalle[idDetalleComanda]>
                                <input type='hidden' name='idComa' value=$idcomanda>
                                <input type='hidden' name='idProd' value=$d>
                                <input type='hidden' name='Cantid' value=$detalle[cantidad]>
                                <input class='buscar' type=submit name=btnEliminarProductoModificado value=Eliminar>
                                </form>
                                </td>
                    	</tr>";
                }

                ?>

    </body>
        <?php

    }
}

?>