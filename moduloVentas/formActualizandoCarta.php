<?php

class formActualizarCarta
{
    public function formActualizandoCartaShow($productos)
    {
        ?>
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Actualizando Carta</title>
            <link rel="shorcut icon" type="image/x-icon" href="../img/icono.ico">
            <link rel="stylesheet" href="../estilos/gestionarUsuarios.css">
            <link rel="stylesheet" href="../estilos/estilos_generales.css">
            <link rel="stylesheet" href="../estilos/actualizando_carta.css">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
                  integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1"
                  crossorigin="anonymous">
        </head>
        <body>
        <div class="div-header">
            <img src="../img/logo_header.png" height="100" width="230">
            <form action="getCarta.php" method="POST">
                <input type="submit" name="bntActualizar" value="Atras" class="volver">
            </form>
        </div>
        <h1 class="titulo">Actualizando Carta del dia</h1>
        <div class="div_buscar">
            <form action="getCarta.php">
                Buscar por tipo de producto:
                <select class="selectproducto" name="tipoProducto" onchange="this.form.submit()">
                    <option value="entrada" selected>Todo</option>
                    <option value="entrada">Entrada</option>
                    <option value="segundo">Segundo</option>
                    <option value="sopa">Sopa</option>
                    <option value="bebida">Bebida</option>
                    <option value="gaseosa">Gaseosa</option>
                </select>
            </form>
            <form class="b2" action="getCarta.php" method="POST">
                <input class="input" type="text" name="nombre" placeholder="Ingrese nombre del producto">
                <input class="buscar" type="submit" name="btnBuscarProducto" value="Buscar">
            </form>
        </div>
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Registrar producto
        </button>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Registrar nuevo producto</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="getCarta.php" id="formAgregarProducto" method="post" class="needs-validation">
                        <div class="modal-body">
                            <input hidden type="text" name="btnRegistrarProducto" value="Registrar nuevo producto">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre: </label>
                                <input type="text" name="nombre" class="form-control" id="nombre" required>
                            </div>
                            <div class="mb-3">
                                <label for="tipo" class="form-label">Tipo: </label>
                                <select name="tipo" id="tipo" class="form-select" required>
                                    <option selected>Selecione una opción</option>
                                    <option value="entrada">entrada</option>
                                    <option value="bebida">bebida</option>
                                    <option value="gaseosa">gaseosa</option>
                                    <option value="segundo">segundo</option>
                                    <option value="sopa">sopa</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="precio" class="form-label">Precio: </label>
                                <input type="number" name="precio" class="form-control" id="precio" step="0.01"
                                       required>
                            </div>
                            <div class="mb-3">
                                <label for="stock" class="form-label">Stock: </label>
                                <input type="number" name="stock" class="form-control" id="stock" required>
                            </div>
                            <p id="mensajeFormulario" style="color:red"></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <input class="btn btn-primary" type="submit" name="btnRegistrarProducto"
                                   value="Registrar nuevo producto">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <form action="getCarta.php" method="POST">
            <input type="submit" name="bntReiniciarCarta" value="Reiniciar carta" class="volver">
        </form>
        <?php
        if (empty($productos) || !isset($productos)) {
            ?>
            <h2>No se encontro ningun producto</h2>
            <?php
        } else {
            ?>
            <table>
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Tipo</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Estado</th>
                    <th>Detalle</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($productos as $producto) {
                    echo "<form action='getCarta.php' method='POST'>
                                <tr>";
                    echo "<input name='idProducto' value='$producto[idProducto]' hidden>";
                    echo "<td> $producto[idProducto]</td>";
                    echo "<td><input name='nombre' value='$producto[nombre]'></td>";
                    ?>
                    <td>
                        <select type='text' name='tipo' required>
                            <option>Selecione una opción</option>
                            <option value='entrada' <?php if ($producto['tipo'] == "entrada") {
                                echo "selected";
                            } ?>>entrada
                            </option>
                            <option value='bebida' <?php if ($producto['tipo'] == "bebida") {
                                echo "selected";
                            } ?>>bebida
                            </option>
                            <option value='gaseosa' <?php if ($producto['tipo'] == "gaseosa") {
                                echo "selected";
                            } ?>>gaseosa
                            </option>
                            <option value='segundo' <?php if ($producto['tipo'] == "segundo") {
                                echo "selected";
                            } ?>>segundo
                            </option>
                            <option value='sopa' <?php if ($producto['tipo'] == "sopa") {
                                echo "selected";
                            } ?>>sopa
                            </option>
                        </select>
                    </td>
                    <?php
                    echo "<td><input type=number min=1 name='precio' value='$producto[precio]'></td>";
                    echo "<td><input type=number name='stock' value='$producto[stock]' min=0></td>";
                    echo "<td><select name='estado'>";
                    if ($producto['estado'] == '1') {
                        echo "<option value='1' selected>Habilitado</option>
                                        <option value='0'>Deshabilitado</option>";
                    } else {
                        echo "<option value='1'>Habilitado</option>
                                        <option value='0' selected>Deshabilitado</option>";
                    }
                    echo "</select></td>";
                    echo "<td><input class='modificar' type='submit' name='btnModificarProducto' value='Modificar'></td>";
                    echo "</tr></form>";
                }
                ?>
                </tbody>
            </table>
            <?php
        }
        ?>
        <script>
            const formAgregarProducto = document.querySelector('#formAgregarProducto');
            const mensajeFormulario = document.querySelector('#mensajeFormulario');
            console.log(formAgregarProducto);
            formAgregarProducto.addEventListener("submit", (form) => {
                form.preventDefault();
                var datos = new FormData(formAgregarProducto);
                fetch("getCarta.php?validarProducto=" + datos.get('nombre'))
                    .then(response => response.text())
                    .then(data => {
                        if (data == 0) {
                            mensajeFormulario.innerHTML = "";
                            formAgregarProducto.submit();
                        } else {
                            mensajeFormulario.innerHTML = "El producto ya está registrado";
                        }
                    });
            });
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
                crossorigin="anonymous"></script>
        </body>
        </html>
        <?php
    }
}

?>