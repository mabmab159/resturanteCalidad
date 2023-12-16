<?php

//$botonSiguiente = $_POST['btnSiguiente'];

if (isset($_POST['btnSiguiente'])) {

    $campoDni = $_POST['campoDni'];

    if (strlen($campoDni) < 4) {
        include_once("../shared/formMensajeSistema.php");
        $nuevoMensaje = new formMensajeSistema;
        $nuevoMensaje->formMensajeSistemaShow("No valido", "<a href = '../index.php'> ir al inicio</a>");
    } else {
        include_once("controlAutenticarUsuario.php");
        $accesoPregunta = new controlAutenticarUsuario;
        $accesoPregunta->verificarDni($campoDni);
    }
} else {
    include_once("../shared/formMensajeSistema.php");
    $nuevoMensaje = new formMensajeSistema;
    $nuevoMensaje->formMensajeSistemaShow("Acceso denegado", "<a href = '../index.php'> ir al inicio</a>");
}
?>