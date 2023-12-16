<?php

include_once("controlComanda.php");

session_start();

if (isset($_POST['accion'])) {

} else {
    $_POST['accion'] = "";
}
// valida los boton para acceder al controlador
if (isset($_POST['btnEmitirComanda'])) {

    $nuevoControl = new controlComanda;
    $nuevoControl->listarComandas();

} elseif (isset($_POST['btnAgregarComanda'])) {

    $nuevoControl = new controlComanda;
    $nuevoControl->AgregarComanda();

} elseif (isset($_POST['btnAtenderComanda'])) {

    $nuevoControl = new controlComanda;
    $nuevoControl->AtenderComanda($_POST['idComanda']);

} elseif (isset($_POST['btnAgregarProductoComanda'])) {

    $nuevoControl = new controlComanda;
    $nuevoControl->AgregarProductoComanda($_POST['idProducto'], $_POST['CantidadProducto']);

} elseif (isset($_POST['btnAgregarProductoModificado'])) {

    $nuevoControl = new controlComanda;
    $nuevoControl->AgregarProductoModificado($_POST['btnidProductoActualizado'], $_POST['CantidadProducto'], $_POST['idComanda']);

} elseif (isset($_POST['btnCrearComanda'])) {

    $nuevoControl = new controlComanda;
    $nuevoControl->CrearComanda($_POST['NumeroMesa'], $_SESSION['listaProductos']);

} elseif (isset($_POST['btnEliminarProductoModificado'])) {

    $nuevoControl = new controlComanda;
    $nuevoControl->EliminarProductoModificado($_POST['idDetCom'], $_POST['idComa'], $_POST['idProd'], $_POST['Cantid']);

} elseif (isset($_POST['btnEliminarProductoComanda'])) {

    $filaProductos = intval($_POST['filaProductos']);

    $idProducto = $_SESSION['listaProductos'][$filaProductos]['idProducto'];
    $Cantidad = $_SESSION['listaProductos'][$filaProductos]['cantidad'];

    array_splice($_SESSION['listaProductos'], $filaProductos, 1);

    $nuevoControl = new controlComanda;

    $nuevoControl->EliminarProducto($idProducto, $Cantidad);

} elseif (isset($_POST['idProducto'])) {
    //$_SESSION['mesa'];
    $nuevoControl = new controlComanda;
    $nuevoControl->buscarStock($_POST['idProducto']);

} elseif (isset($_POST['btnidProductoActualizado'])) {

    $nuevoControl = new controlComanda;
    $nuevoControl->buscarStockActualizado($_POST['btnidProductoActualizado'], $_POST['idComanda']);

} elseif (isset($_POST['btnModificarComanda'])) {

    $nuevoControl = new controlComanda;
    $nuevoControl->detalleComanda($_POST['idComanda']);

} elseif (isset($_POST['btnEliminarComanda'])) {

    $idComanda = $_POST['idComanda'];
    $nuevoControl = new controlComanda;
    $nuevoControl->EliminarComanda($idComanda);

} else {
    include_once('../shared/formMensajeSistema.php');
    $nuevoMensaje = new formMensajeSistema;
    $nuevoMensaje->formMensajeSistemaShow("Se ha detectado un acceso no permitido", "<a href='../index.php'>Iniciar Sesion</a>");
}
