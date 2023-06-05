<?php

    include_once 'Conexion.php';
    class Usuario {
        var $objetos;
        public function __construct(){
            $db = new Conexion();
            $this->acceso = $db->pdo;
        }

        function loguearse($user,$pass){
            echo 'Hola';
        }
    }

?>