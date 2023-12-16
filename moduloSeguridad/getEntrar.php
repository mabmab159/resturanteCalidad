<?php

if (isset($_POST['btnEntrar'])) {
    //$respuesta = "1";
    include_once("controlAutenticarUsuario.php");
    $entrar = new controlAutenticarUsuario;
    $entrar->entrar();
    //echo "ok";
} else {
    include_once("../shared/formMensajeSistema.php");
    $nuevoMensaje = new formMensajeSistema;
    $nuevoMensaje->formMensajeSistemaShow("Acceso denegado", "<a href = '../index.php'> ir al inicio</a>");
}
?>