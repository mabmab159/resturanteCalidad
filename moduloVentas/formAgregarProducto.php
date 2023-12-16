<?php

class formAgregarProducto
{
    public function formAgregarProductoShow($listaProductos)
    {
        ?>
        <!DOCTYPE html>
        <html lang="es">
    <head>

        <link rel="shorcut icon" type="image/x-icon" href="../img/icono.ico">
        <link rel="stylesheet" href="../estilos/gestionarUsuarios.css">
        <link rel="stylesheet" href="../estilos/estilos_generales.css">
    </head>
    <body>
    <div class="div-header">
        <img src="../img/logo_header.png" height="100" width="230">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8">

                <h1 class="titulo">Lista de Productos</h1>

                <form action="../moduloVentas/getComanda.php" method="post">
                    <input class='agregar' type="submit" name="btnAgregarComanda" value="Atras">
                </form>
                <?php
                if (!isset($listaProductos)) {
                    echo 'no se encontro datos';
                } else {
                    ?>
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Descripcion</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Precio Unitario</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php

                        foreach ($listaProductos as $productos) {

                            echo "<tr>
                                                    <form action=../moduloVentas/getComanda.php?idProducto=$productos[idProducto] method=post>
                                                    <input type=text value=$productos[idProducto] readonly hidden name=idProducto>
                                                    <input type=text value=$productos[precio] readonly hidden name=precio>
                                                    <td>" . $productos['idProducto'] . "</td>
                                                    <td>" . $productos['nombre'] . "</td> 
                                                    <td><input name=cantidadProducto type=number value=1 min=1 pattern=^[0-9]+/></td>
                                                    <td>" . $productos['precio'] . "</td>
                                                    <td ><input class='agregar' type=submit name=btnAgregarProducto value=Agregar></td>
                                                    </form>
                                                </tr>";
                        }
                        ?>
                        </tbody>
                    </table>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
    </body>

        <?php
    }
}

?>