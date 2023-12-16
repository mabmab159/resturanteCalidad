<?php
include_once('controlActualizarCarta.php');
$objActualizar = new actualizarCarta;

if (isset($_POST['bntActualizar']) or isset($_POST['btnRegresarEstado'])) {
    session_start();
    $objActualizar->listarCarta();
} elseif (isset($_POST['btnAActualizar'])) {
    $objActualizar->listarProductos();
} elseif (isset($_POST['btnModificarProducto'])) {
    $objActualizar->actualizarProducto($_POST['idProducto'], $_POST['nombre'], $_POST['tipo'], $_POST['precio'], $_POST['stock'], $_POST['estado']);
} elseif (isset($_GET['tipoProducto'])) {
    $objActualizar->listarProductosPorTipo($_GET['tipoProducto']);
} elseif (isset($_POST['btnRegistrarProducto'])) {
    $objActualizar->insertarProducto($_POST['nombre'], $_POST['tipo'], $_POST['precio'], $_POST['stock']);
} elseif (isset($_POST['btnBuscarProducto'])) {
    $objActualizar->buscarProducto($_POST['nombre']);
} elseif (isset($_POST['bntReiniciarCarta'])) {
    $objActualizar->reiniciarCarta();
} elseif (isset($_GET['validarProducto'])) {
    $objActualizar->validarProducto($_GET['validarProducto']);
} else {
    include_once('../shared/formMensajeSistema.php');
    $nuevoMensaje = new formMensajeSistema;
    $nuevoMensaje->formMensajeSistemaShow("Acceso no Permitido", "<a href='../index.php'>Iniciar Sesion</a>");
}
?>