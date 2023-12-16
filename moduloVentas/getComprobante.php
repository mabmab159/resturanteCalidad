<?php
session_start();
if (isset($_POST['accion'])) {

} else {
    $_POST['accion'] = "";
}
if (isset($_POST['btnEmitirComprobante'])) {
    include_once("controlComprobante.php");
    $nuevoControl = new controlComprobante;
    $nuevoControl->listarComandaPorEstado();
} elseif (isset($_POST['btnEmitir'])) {
    include_once("controlComprobante.php");
    $nuevoControl = new controlComprobante;
    $nuevoControl->detalleComanda($_POST['idComanda']);
} elseif (isset($_POST['btnInsertar'])) {
    include_once("controlComprobante.php");
    $nuevoControl = new controlComprobante;
    $nuevoControl->insertarComprobante($_POST['idComanda'], $_POST['tcomp'], $_POST['serie'], $_POST['numero'], $_POST['moneda'], $_POST['pago']);
} else {
    include_once('../shared/formMensajeSistema.php');
    $nuevoMensaje = new formMensajeSistema;
    $nuevoMensaje->formMensajeSistemaShow("Se ha detectado un acceso no permitido", "<a href='../index.php'>Iniciar Sesion</a>");
}