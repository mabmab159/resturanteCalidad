<?php

//$botonAceptar = $_POST['btnAceptar'];

if (isset($_POST['btnAceptar'])) {
    $nuevoPassword = $_POST['nuevoPassword'];
    $reNuevoPassword = $_POST['repetirNuevoPassword'];
    $dni = $_POST['repetirDni'];
    if ($nuevoPassword == $reNuevoPassword) {
        //$originalPassword = $nuevoPassword;
        if (strlen($nuevoPassword) < 4 && strlen($reNuevoPassword) < 4) {
            include_once("../shared/formMensajeSistema.php");
            $nuevoMensaje = new formMensajeSistema;
            $nuevoMensaje->formMensajeSistemaShow("Muy corto", "<a href = '../index.php'> ir al inicio</a>");
        } else {
            $originalPassword = $nuevoPassword;
            //echo $originalPassword;
            //echo $dni;
            include_once("controlAutenticarUsuario.php");
            $accesoPregunta = new controlAutenticarUsuario;
            $accesoPregunta->reestablecerPassword($originalPassword, $dni);
        }
    } else {
        include_once("../shared/formMensajeSistema.php");
        $nuevoMensaje = new formMensajeSistema;
        $nuevoMensaje->formMensajeSistemaShow("Contraseñas no iguales", "<a href = '../index.php'> ir al inicio</a>");
    }
} else {
    include_once("../shared/formMensajeSistema.php");
    $nuevoMensaje = new formMensajeSistema;
    $nuevoMensaje->formMensajeSistemaShow("Acceso denegado", "<a href = '../index.php'> ir al inicio</a>");
}
?>