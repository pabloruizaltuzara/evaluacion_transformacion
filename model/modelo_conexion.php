<?php
    class conexionBD{

        public $pdo;

        public function conexionPDO(){
            $host='localhost';
            $usuario='root';
            $contrasena='';
            $dbName='dbevaluacion';


            try{
                $pdo=new PDO("mysql:host=$host;dbname=$dbName",$usuario, $contrasena);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $pdo->exec("set names utf8");
                return $pdo;
            }catch(Exception $e){
                echo "la conexion ha fallado";
            }
        }

        function cerrar_conexion(){
            $this->pdo=null;
        }

    }


?>