<?php
session_start();
if (isset($_POST['btnAceptar'])) {
    $usuario = $_POST['usuario'];
    $pass = $_POST['pass'];
    if (strlen($usuario) < 4 or strlen($pass) < 4) {
        include_once("../shared/formMensajeSistema.php");
        $nuevoMensaje = new formMensajeSistema;
        $nuevoMensaje->formMensajeSistemaShow("Los datos ingresados no son validos", "<a href = '../index.php'>ir al inicio</a");
    } else {
        include_once("../moduloSeguridad/controlAutenticarUsuario.php");
        $nuevoAcceso = new controlAutenticarUsuario;
        $nuevoAcceso->verificarUsuario($usuario, $pass);
    }
} elseif (isset($_POST['btnCerrarSesion'])) {
    session_start();
    $_SESSION = array();
    unset($_SESSION);
    session_destroy();
    header('Location: ../index.php');
    die();
} elseif (isset($_POST['btnInicio'])) {
    if (isset($_SESSION['rol']) and isset($_SESSION['id_usuario']) and isset($_SESSION['nombre_usuario'])) {
        $rol = $_SESSION['rol'];
        $nombre_usuario = $_SESSION['nombre_usuario'];
        $id_usuario = $_SESSION['id_usuario'];
        include_once('../moduloSeguridad/controlAutenticarUsuario.php');
        $nuevoInicio = new controlAutenticarUsuario;
        $nuevoInicio->obtenerPrivilegios($rol);
    }
} elseif (isset($_SESSION['nombre_usuario'])) {
    include_once("../moduloSeguridad/controlAutenticarUsuario.php");
    $nuevoAcceso = new controlAutenticarUsuario;
    $nuevoAcceso->ingresandoUsuarioLogeado($_SESSION['nombre_usuario']);
} else {
    include_once("../shared/formMensajeSistema.php");
    $nuevoMensaje = new formMensajeSistema;
    $nuevoMensaje->formMensajeSistemaShow("Acceso no permitido", "<a href = '../index.php'>ir al inicio</a");
}
?>