<?php

class controlAutenticarUsuario
{
    public function verificarUsuario($nombre, $pass)
    {
        include_once("../modelo/entidadUsuario.php");
        $objUsuario = new entidadUsuario;
        $respuesta = $objUsuario->autenticarUsuario($nombre, $pass);
        if ($respuesta == 0) {
            include_once("../shared/formMensajeSistema.php");
            $objMensaje = new formMensajeSistema;
            $objMensaje->formMensajeSistemaShow("El usuario no se encontro <br> o esta deshabilitado", "<a href = '../index.php'>ir al inicio</a>");
        } else {
            include_once("../modelo/entidadUsuarioPrivilegio.php");
            include_once("../moduloSeguridad/formBienvenida.php");
            include_once("../modelo/entidadUsuario.php");
            $objUsuario2 = new entidadUsuario;
            $objUsuarioPrivilegio = new entidadUsuarioPrivilegio;
            $objformBienvenida = new formBienvenida;
            $rol = $objUsuario2->obtenerRol($nombre);
            $Privilegios = $objUsuarioPrivilegio->obtenerPrivilegios($rol);
            $objformBienvenida->formBienvenidaShow($Privilegios, $rol);
        }
    }

    public function obtenerPrivilegios($idrolprivi)
    {
        include_once('../modelo/entidadUsuarioPrivilegio.php');
        include_once("../moduloSeguridad/formBienvenida.php");
        $objUsuarioPrivilegio = new entidadUsuarioPrivilegio;
        $objformBienvenida = new formBienvenida;
        $Privilegios = $objUsuarioPrivilegio->obtenerPrivilegios($idrolprivi);
        $objformBienvenida->formBienvenidaShow($Privilegios, $idrolprivi);
    }

    public function ingresandoUsuarioLogeado($nombre)
    {
        include_once("../modelo/entidadUsuarioPrivilegio.php");
        include_once("../moduloSeguridad/formBienvenida.php");
        include_once("../modelo/entidadUsuario.php");
        $objUsuario2 = new entidadUsuario;
        $objUsuarioPrivilegio = new entidadUsuarioPrivilegio;
        $objformBienvenida = new formBienvenida;
        $rol = $objUsuario2->obtenerRol($nombre);
        $Privilegios = $objUsuarioPrivilegio->obtenerPrivilegios($rol);
        $objformBienvenida->formBienvenidaShow($Privilegios, $rol);
    }

    public function entrar()
    {
        include_once("../moduloSeguridad/formValidarDni.php");
        $objEntrar = new formValidarDni;
        $objEntrar->formValidarDniShow();
    }

    public function verificarDni($campoDni)
    {
        include_once("../modelo/entidadUsuario.php");
        $objUsuario = new entidadUsuario;
        $respuesta = $objUsuario->verificarDni($campoDni);
        if ($respuesta == 0) {
            include_once("../shared/formMensajeSistema.php");
            $nuevoMensaje = new formMensajeSistema;
            $nuevoMensaje->formMensajeSistemaShow("Dni no encontrado", "<a href = '../index.php'> ir al inicio</a>");
        } else {
            include_once("formResponderPregunta.php");
            //echo "nice";
            /*include_once("../modelo/entidadUsuario.php");
            include_once("formResponderPregunta.php");
            $objPregunta = new entidadUsuario;
            $pregunta = $objPregunta -> obtenerPreguntaSecreta($campoDni);
            //print_r($pregunta);*/
            $variable = new formResponderPregunta();
            $variable->responderPreguntaSecretaShow();

        }
    }

    public function validarRespuesta($campoRespuesta)
    {
        include_once("../modelo/entidadUsuario.php");
        $objUsuario = new entidadUsuario;
        $respuesta = $objUsuario->validarRespuesta($campoRespuesta);
        if ($respuesta == 0) {
            include_once("../shared/formMensajeSistema.php");
            $nuevoMensaje = new formMensajeSistema;
            $nuevoMensaje->formMensajeSistemaShow("La respuesta no coincide", "<a href = '../index.php'> Las respuestas no coinciden</a>");
        } else {
            //echo "yea";
            include_once("../modelo/entidadUsuario.php");
            include_once("formNuevoPassword.php");
            $objPassword = new entidadUsuario;
            $password = $objPassword->obtenerPassword($campoRespuesta);
            //print_r($pregunta);
            $variable = new formNuevoPassword();
            $variable->nuevoPasswordShow($password);
        }
    }

    public function reestablecerPassword($originalPassword, $dni)
    {
        $originalPassword = md5($originalPassword);
        include_once("../modelo/entidadUsuario.php");
        $objUsuario = new entidadUsuario;
        $password = $objUsuario->reestablecerPassword($originalPassword, $dni);

        include_once("../shared/formMensajeSistema.php");
        $nuevoMensaje = new formMensajeSistema;
        $nuevoMensaje->formMensajeSistemaShow("Se cambio exitosamente.", "<a href = '../index.php'> ir al inicio</a>");

    }
}

?>