<?php
    require_once 'modelo_conexion.php';

    class Modelo_Usuario extends conexionBD{

        public function VerificarUsuario($usuario, $password){
            $c=conexionBD::conexionPDO();
            $sql="CALL SP_VERIFICAR_USUARIO(?)";
            $arreglo = array();
            $query=$c->prepare($sql);
            $query->bindParam(1,$usuario);
            $query->execute();
            $resultado=$query->fetchAll();
            foreach ($resultado as $resp){
                if(password_verify($password, $resp['contrasena'])){
                    $arreglo[]=$resp;
                }
            }
            return $arreglo;

            conexionBD::cerrar_conexion();
        }

        public function listar_usuario(){
            $c=conexionBD::conexionPDO();
            $sql="CALL SP_LISTAR_USUARIO_ADMIN()";
            $arreglo = array();
            $query=$c->prepare($sql);
            $query->execute();
            $resultado=$query->fetchAll(PDO::FETCH_ASSOC);
            foreach ($resultado as $resp){
                $arreglo["data"][]=$resp;
                
            }
            return $arreglo;

            conexionBD::cerrar_conexion();
        }

        public function listar_usuario_encar(){
            $c=conexionBD::conexionPDO();
            $sql="CALL SP_LISTAR_USUARIO_ENCAR()";
            $arreglo = array();
            $query=$c->prepare($sql);
            $query->execute();
            $resultado=$query->fetchAll(PDO::FETCH_ASSOC);
            foreach ($resultado as $resp){
                $arreglo["data"][]=$resp;
                
            }
            return $arreglo;

            conexionBD::cerrar_conexion();
        }

        public function listar_administrativos_select(){
            $c=conexionBD::conexionPDO();
            $sql="CALL SP_LISTAR_ADMINISTRATIVOS()";
            $arreglo = array();
            $query=$c->prepare($sql);
            $query->execute();
            $resultado=$query->fetchAll(PDO::FETCH_ASSOC);
            foreach ($resultado as $resp){
                $arreglo["data"][]=$resp;
                
            }
            return $arreglo;

            conexionBD::cerrar_conexion();
        }

        public function listar_encargados_select(){
            $c=conexionBD::conexionPDO();
            $sql="CALL SP_LISTAR_ENCARGADOS()";
            $arreglo = array();
            $query=$c->prepare($sql);
            $query->execute();
            $resultado=$query->fetchAll(PDO::FETCH_ASSOC);
            foreach ($resultado as $resp){
                $arreglo["data"][]=$resp;
                
            }
            return $arreglo;

            conexionBD::cerrar_conexion();
        }



        public function listar_select_personas(){
            $c=conexionBD::conexionPDO();
            $sql="CALL SP_LISTAR_SELECT_PMIEMBRO()";
            $arreglo = array();
            $query=$c->prepare($sql);
            $query->execute();
            $resultado=$query->fetchAll();
            foreach ($resultado as $resp){
                $arreglo[]=$resp;
            }
            return $arreglo;

            conexionBD::cerrar_conexion();
        }


        public function listar_select_nivel(){
            $c=conexionBD::conexionPDO();
            $sql="CALL SP_LISTAR_SELECT_NIVEL()";
            $arreglo = array();
            $query=$c->prepare($sql);
            $query->execute();
            $resultado=$query->fetchAll();
            foreach ($resultado as $resp){
                $arreglo[]=$resp;
            }
            return $arreglo;

            conexionBD::cerrar_conexion();
        }

        public function Registrar_Usuario($id,$usuario, $password, $nivel, $ultimoUsuario){
            $c=conexionBD::conexionPDO();
            $sql="CALL SP_REGISTRAR_USUARIO(?,?,?,?,?)";
            $query=$c->prepare($sql);

            $query->bindParam(1,$id);
            $query->bindParam(2,$usuario);
            $query->bindParam(3,$password);
            $query->bindParam(4,$nivel);
            $query->bindParam(5,$ultimoUsuario);
 

            $query->execute();
            
            if($row=$query->fetchColumn()){
                return $row;
            }
            conexionBD::cerrar_conexion();
        }

        public function Modificar_Usuario($id,$nivel){
            $c=conexionBD::conexionPDO();
            $sql="CALL SP_MODIFICAR_USUARIO(?,?)";
            $query=$c->prepare($sql);
            $query->bindParam(1,$id);
            $query->bindParam(2,$nivel);

            $resultado=$query->execute();
            if($resultado){
                return 1;
            }
            else{
                return 0;
            }
            conexionBD::cerrar_conexion();
        }

        public function Modificar_Usuario_Estatus($id,$estatus){
            $c=conexionBD::conexionPDO();
            $sql="CALL SP_MODIFICAR_USUARIO_ESTADO(?,?)";
            $query=$c->prepare($sql);
            $query->bindParam(1,$id);   
            $query->bindParam(2,$estatus);

            $resultado=$query->execute();
            if($resultado){
                return 1;
            }
            else{
                return 0;
            }
            conexionBD::cerrar_conexion();
        }

        
        public function Modificar_Foto_Usuario($id,$ruta){
            $c=conexionBD::conexionPDO();
            $sql="CALL SP_MODIFICAR_USUARIO_FOTO(?,?)";
            $query=$c->prepare($sql);
            $query->bindParam(1,$id);   
            $query->bindParam(2,$ruta);

            $resultado=$query->execute();
            if($resultado){
                return 1;
            }
            else{
                return 0;
            }
            conexionBD::cerrar_conexion();
        }
        

        public function Modificar_Usuario_Contra($id,$contra){
            $c=conexionBD::conexionPDO();
            $sql="CALL SP_MODIFICAR_USUARIO_CONTRA(?,?)";
            $query=$c->prepare($sql);
            
            $query->bindParam(1,$id);   
            $query->bindParam(2,$contra);

            $resultado=$query->execute();
            if($resultado){
                return 1;
            }
            else{
                return 0;
            }
            conexionBD::cerrar_conexion();
        }

        
        public function listar_notificaciones(){
            $c=conexionBD::conexionPDO();
            $sql="CALL SP_LISTAR_NOTI()";
            $arreglo = array();
            $query=$c->prepare($sql);
            $query->execute();
            $resultado=$query->fetchAll();
            foreach ($resultado as $resp){
                $arreglo[]=$resp; 
            }
            return $arreglo;

            conexionBD::cerrar_conexion();
        }

    }
?>