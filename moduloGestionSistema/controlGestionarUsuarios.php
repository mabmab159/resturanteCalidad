<?php
include_once("../modelo/entidadUsuario.php");

class controlGestionarUsuarios{
    public function listarUsuarios($estado = 1){
        include_once("formGestionarUsuarios.php");
        $usuarios = new entidadUsuario;
        $gestionarUsuario = new formGestionarUsuarios;
        $listaUsuarios = $usuarios -> obtenerUsuarios($estado);
        $gestionarUsuario -> formGestionarUsuariosShow($listaUsuarios);
    }

    public function modificarUsuarios($id){
        include_once("formModificarUsuario.php");
        $usuariosModificar = new entidadUsuario;
        $modificarUsuario = new formModificarUsuario;
        $user = $usuariosModificar->obteniendoUsuariosPorId($id);   
        $modificarUsuario->modificarUsuariosShow($user,$id);       
    }

    public function actualizanUsuariosPrivilegios($id,$nombre,$usuario,$dni,$email,$foto,$rol){
        include_once('../modelo/entidadUsuarioPrivilegio.php');
        include_once('formGestionarUsuarios.php');
        $modUsuario = new entidadUsuario;
        $modPrivi = new entidadUsuarioPrivilegio;
        $actualizando = $modUsuario -> actualizandoUsuariosPrivilegios($id,$nombre,$usuario,$dni,$email,$foto,$rol);
        if($actualizando==TRUE){
            $this->listarUsuarios();
        }else{
            include_once('../shared/formMensajeSistema.php');
            $nuevoMensaje = new formMensajeSistema;
            $nuevoMensaje -> formMensajeSistemaShow("Error al actualizar","<a href='../shared/formBienvenida.php'>Bienvenida</a>");
        }
    }
    public function habilitarInhabilitarUsuario($idusuario,$estado){
        $modHabilitar = new entidadUsuario;
        $modHabilitar -> cambiarEstado($idusuario,$estado);

        $this->listarUsuarios();
    }
    public function mostrarFormAddUsuario(){
        include_once('formRegistrarUsuario.php');
        $formAdd = new registrarUsuario;
        $formAdd->addUsuarioShow();
    }
    public function registrandoUsuario($nombre,$usuario,$dni,$foto=[],$rol,$pass,$email,$secreto){
        include_once('formGestionarUsuarios.php');

        // $ruta = "../img/".$foto['imgPerfil']['name'];
        // move_uploaded_file($foto['imgPerfil']['tmp_name'],$ruta);
        $addUsuario = new entidadUsuario;
        $addUsuario-> agregandoUsuario($nombre,$usuario,$dni,$foto,$rol,$pass,$email,$secreto);

        if($addUsuario==TRUE){
            $this->listarUsuarios();
        }else{
            include_once('../shared/formMensajeSistema.php');
            $nuevoMensaje = new formMensajeSistema;
            $nuevoMensaje -> formMensajeSistemaShow("Error al actualizar","<a href='../shared/formBienvenida.php'>Bienvenida</a>");
        }
    }

    public function validarDNI($dni) {
        $usuario = new entidadUsuario;
        $resultado =$usuario->validarDni($dni);
        echo $resultado;
    }
}
