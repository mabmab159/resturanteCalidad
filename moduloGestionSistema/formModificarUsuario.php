<?php
    class formModificarUsuario{
        public function modificarUsuariosShow($usarioo, $id){
            ?>
                <!DOCTYPE html>
                <html lang="es">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Modificar Usuario</title>
                    <link rel="shorcut icon" type="image/x-icon" href="../img/icono.ico">
                    <link rel="stylesheet" href="../estilos/gestionarUsuarios.css">
                    <link rel="stylesheet" href="../estilos/estilos_generales.css">
                    <link rel="stylesheet" href="../estilos/modificar_usuario.css">
                </head>
                <body>
                     <div class="div-header">
                         <img src="../img/logo_header.png" height="100" width="230">
                    </div>
                    <h1 class="titulo">Moficar Usuario</h1>
                    <form class="form-inputs" action="getUsuarios.php" method="POST">
                        <input type="hidden" name="id" value='<?php echo $id;?>'>
                        <label for="nombre">Nombres y Apellidos</label>
                        <input class="input" type="text" name="nombre" value='<?php echo $usarioo[0]['nombre'];?>' required>
                        <label for="usuario">Usuarios</label>
                        <input  class="input" type="text" name="usuario" value='<?php echo $usarioo[0]['usuario'];?>' required>
                        <label for="dni">DNI</label>
                        <input value='<?php echo $usarioo[0]['dni'];?>' class="input" type="text" minlength="8" maxlength="8" name="dni" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" required>
                        <label for="email">Email</label>
                        <input  class="input" type="email" name="email" value='<?php echo $usarioo[0]['email'];?>' required>
                        <label for="rol">Rol</label>
                        <div class="select">
                            <select name="rol">';
                                <option <?php if($usarioo[0]['cargo']=='Cajero') {echo "selected";} ?> value="1">Cajero</option>';
                                <option <?php if($usarioo[0]['cargo']=='Recepcionista') {echo "selected";} ?> value="2">Recepcionista</option>';
                                <option <?php if($usarioo[0]['cargo']=='Administrador') {echo "selected";} ?> value="3">Administrador</option>';
                            </select>
                        </div>
                        <button  class="agregar" type="submit" name="btnActualizando">Actualizar</button>
                    </form>
                    <form action="getUsuarios.php" method="POST">
                    <input class="volver" type="submit" value="Regresar" name="btnRegresarModificar">
                </form>
                </body>
                </html>
            <?php
        }
    }
?>