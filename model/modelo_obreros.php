<?php
    require_once 'modelo_conexion.php';

    class Modelo_Obreros extends conexionBD{



        public function listar_obreros($tipo_personal){
            $c=conexionBD::conexionPDO();
            $sql="CALL SP_LISTAR_OBREROS(?)";
            $arreglo = array();
            $query=$c->prepare($sql);
            $query->bindParam(1,$tipo_personal);
            $query->execute();
            $resultado=$query->fetchAll(PDO::FETCH_ASSOC);
            foreach ($resultado as $resp){
                $arreglo["data"][]=$resp;
                
            }
            return $arreglo;

            conexionBD::cerrar_conexion();
        }

        public function listar_obreros_general(){
            $c=conexionBD::conexionPDO();
            $sql="CALL SP_LISTAR_OBREROS_GENERAL()";
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

    



        public function Registrar_Obreros($ci,$nombre,$paterno, $materno, $ministerio, $puesto, $ruta, $ultimoUsuario){
            $c=conexionBD::conexionPDO();
            $sql="CALL SP_REGISTRAR_OBREROS(?,?,?,?,?,?,?,?)";
            $query=$c->prepare($sql);

            $query->bindParam(1,$ci);
            $query->bindParam(2,$nombre);
            $query->bindParam(3,$paterno);
            $query->bindParam(4,$materno);
            $query->bindParam(5,$ministerio);
            $query->bindParam(6,$puesto);
            $query->bindParam(7,$ruta);
            $query->bindParam(8,$ultimoUsuario);

            $query->execute();
            
            if($row=$query->fetchColumn()){
                return $row;
            }
            conexionBD::cerrar_conexion();
        }

        public function Modificar_Obreros($ci, $nombre, $paterno, $materno, $puesto, $ingreso,$salida, $ultimoUsuario){
            $c=conexionBD::conexionPDO();
            $sql="CALL SP_MODIFICAR_OBRERO(?,?,?,?,?,?,?,?)";
            $query=$c->prepare($sql);
            $query->bindParam(1,$ci);
            $query->bindParam(2,$nombre);
            $query->bindParam(3,$paterno);
            $query->bindParam(4,$materno);
            $query->bindParam(5,$puesto);
            $query->bindParam(6,$ingreso);
            $query->bindParam(7,$salida);
            $query->bindParam(8,$ultimoUsuario);


            $resultado=$query->execute();
            if($resultado){
                return 1;
            }
            else{
                return 0;
            }
            conexionBD::cerrar_conexion();
        }

        public function Modificar_Obreros_Estatus($id,$estatus){
            $c=conexionBD::conexionPDO();
            $sql="CALL SP_MODIFICAR_OBREROS_ESTADO(?,?)";
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

        
        public function Modificar_Foto_Obreros($id,$ruta){
            $c=conexionBD::conexionPDO();
            $sql="CALL SP_MODIFICAR_OBREROS_FOTO(?,?)";
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
        
    }
?>