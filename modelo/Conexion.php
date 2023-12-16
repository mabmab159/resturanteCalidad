<?php
  class Conexion{
      private $conexion;
      function __construct(){
        $this->conexion = mysqli_connect("localhost","root","toor","el_saborcito_peruano");
      }

      public function getConexion(){
        return $this->conexion;
      }

      public function cerrarConexion(){
        mysqli_close($this->conexion);
      } 
  }
?>