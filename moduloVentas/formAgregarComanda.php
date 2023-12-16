<?php
class formAgregarComanda
{
    public function formAgregarComandaShow($listaProductos)
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
                <form action="getComanda.php" method="POST">
            <input  class="volver" type="submit" name="btnEmitirComanda" value="Atras">
        </form>
            </div>
                            
            </body>
            <h1 class="titulo">Numero de mesa</h1>
            <div class="form-div">
                
                <label for="">Producto : </label>
                <form action="../moduloVentas/getComanda.php" method="post">
                        <select class="input"  name="idProducto" onchange="this.form.submit()">
                            <?php
                            
                            if($listaProductos==NULL){
                                $_SESSION['nombreProducto']="";
                                $_SESSION['stock']=0;
                            }
                            ?>
                            <option selected><?php if(isset($_SESSION['nombreProducto'])){
                                echo $_SESSION['nombreProducto'];} ?></option>
                            <?php  
                            foreach ($listaProductos as $value) { ?>
                            <option  value="<?php echo $value['idProducto'] ?>"><?php echo $value['nombre'] ?></option> 
                            <?php } ?>
                        </select> 
                        <label for="">Cantidad del Producto : </label>
                        <select class="input"  name="CantidadProducto" >
                            <?php  $i=1;
                            for($i;$i<=$_SESSION['stock'];$i++) { ?>
                                <option  value="<?php echo $i?>"><?php echo $i ?></option> 
                            <?php } ?>
                        </select>

                    <input  class="agregar" type="submit" name="btnAgregarProductoComanda" value="Agregar">
                    
                </form>
                <br>
                <label for="">Mesa : </label>
                <form  action="../moduloVentas/getComanda.php" method="post">
                    <select  class="input"  name="NumeroMesa" >
                            <?php
                                $j=1;
                           for($j;$j<11;$j++) {

                                // if(!in_array($j,$_SESSION['mesa'])){
            
                            ?>  
                                <option  value="<?php echo $j ?>"><?php echo $j ?></option> 
                            <?php 
                                }
                            // }
                            
                            ?>
                            
                    </select>
                
            
        
        <?php
        if (!isset($_SESSION)||empty($_SESSION['listaProductos'])) {
            
        }
        else{
            
        ?>  
                    
                    <input class="agregar" type="submit" name="btnCrearComanda" value="Crear Comanda">
                </form>
                </div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">nombre</th>
                        <th scope="col">tipo</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Precio Unitario</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 0;
                    $j=0;
                    foreach ($_SESSION['listaProductos'] as $productos) {
                            $j++;
                        echo "<tr>
                                <form action=../moduloVentas/getComanda.php?idProducto=$productos[idProducto] method=post>
                                    <input type=text value=$productos[idProducto] readonly hidden name=idProducto>
                                    <td>" . $j . "</td>
                                    <td>" . $productos['nombre'] . "</td>
                                    <td>" . $productos['tipo'] . "</td>
                                    <td>" . $productos['cantidad'] . "</td>
                                    <td>" . $productos['precio'] . "</td>
                                    <td><input class='buscar' type=submit name=btnEliminarProductoComanda value=Eliminar></td>
                                    <input type=hidden name=filaProductos value=$i>
                                </form>
                            </tr>";
                        $i = $i + 1;
                    }
                    ?>
                </tbody>
            </table>    
            
            
<?php
        }
    }
}
?>