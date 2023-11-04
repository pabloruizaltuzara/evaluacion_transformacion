<?php
    require_once 'modelo_conexion.php';

    class Modelo_Personal extends conexionBD{



        public function listar_personal($tipo_personal){
            $c=conexionBD::conexionPDO();
            $sql="CALL SP_LISTAR_PERSONAL(?)";
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

    



        public function Registrar_Personal($ci,$nombre,$paterno, $materno, $cargo, $nivel, $ingreso, $salida,$ruta, $ultimoUsuario){
            $c=conexionBD::conexionPDO();
            $sql="CALL SP_REGISTRAR_PERSONAL(?,?,?,?,?,?,?,?,?,?)";
            $query=$c->prepare($sql);

            $query->bindParam(1,$ci);
            $query->bindParam(2,$nombre);
            $query->bindParam(3,$paterno);
            $query->bindParam(4,$materno);
            $query->bindParam(5,$cargo);
            $query->bindParam(6,$nivel);
            $query->bindParam(7,$ingreso);
            $query->bindParam(8,$salida);
            $query->bindParam(9,$ruta);
            $query->bindParam(10,$ultimoUsuario);

            $query->execute();
            
            if($row=$query->fetchColumn()){
                return $row;
            }
            conexionBD::cerrar_conexion();
        }

        public function Modificar_Personal($ci, $nombre, $paterno, $materno, $cargo,$ingreso, $salida, $ultimoUsuario){
            $c=conexionBD::conexionPDO();
            $sql="CALL SP_MODIFICAR_PERSONAL(?,?,?,?,?,?,?,?)";
            $query=$c->prepare($sql);
            $query->bindParam(1,$ci);
            $query->bindParam(2,$nombre);
            $query->bindParam(3,$paterno);
            $query->bindParam(4,$materno);
            $query->bindParam(5,$cargo);
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

        public function Modificar_Personal_Estatus($id,$estatus){
            $c=conexionBD::conexionPDO();
            $sql="CALL SP_MODIFICAR_PERSONAL_ESTADO(?,?)";
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

        
        public function Modificar_Foto_Personal($id,$ruta){
            $c=conexionBD::conexionPDO();
            $sql="CALL SP_MODIFICAR_PERSONAL_FOTO(?,?)";
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