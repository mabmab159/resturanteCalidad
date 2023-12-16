<?php

session_start();
if (!empty($_SESSION)) {
    header('Location: moduloSeguridad/getUsuario.php');
    die();
} else {
    include_once("moduloSeguridad/formAutenticarUsuario.php");
    $objFormAutenticar = new formAutenticarUsuario;
    $objFormAutenticar->formAutenticarUsuarioShow();
}

?>