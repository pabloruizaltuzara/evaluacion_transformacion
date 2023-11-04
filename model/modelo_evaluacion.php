<?php
    require_once 'modelo_conexion.php';

    class Modelo_Evaluacion extends conexionBD{



        public function listar_obrero($puesto){
            $c=conexionBD::conexionPDO();
            $sql="CALL SP_LISTAR_OBREROS(?)";
            $arreglo = array();
            $query=$c->prepare($sql);
            $query->bindParam(1,$puesto);
            $query->execute();
            $resultado=$query->fetchAll(PDO::FETCH_ASSOC);
            foreach ($resultado as $resp){
                $arreglo["data"][]=$resp;
                
            }
            return $arreglo;

            conexionBD::cerrar_conexion();
        }

        public function Registrar_Evaluacion($evaluado,$p1,$p2, $p3,$p4,$p5, $p6,$p7,$p8, $p9,$total, $evaluador, $semestre){
            $c=conexionBD::conexionPDO();
            $sql="CALL SP_REGISTRAR_EVALUACION(?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $query=$c->prepare($sql);

            $query->bindParam(1,$evaluado);
            $query->bindParam(2,$p1);
            $query->bindParam(3,$p2);
            $query->bindParam(4,$p3);
            $query->bindParam(5,$p4);
            $query->bindParam(6,$p5);
            $query->bindParam(7,$p6);
            $query->bindParam(8,$p7);
            $query->bindParam(9,$p8);
            $query->bindParam(10,$p9); 
            $query->bindParam(11,$total);
            $query->bindParam(12,$evaluador);
            $query->bindParam(13,$semestre);

            $query->execute();
            
            if($row=$query->fetchColumn()){
                return $row;
            }
            conexionBD::cerrar_conexion();
        }

        public function Configurar_Evaluacion($mes, $estado, $ultimousu){
            $c=conexionBD::conexionPDO();
            $sql="CALL SP_CONFIGURAR_EVALUACION(?,?,?)";
            $query=$c->prepare($sql);

            $query->bindParam(1,$mes);
            $query->bindParam(2,$estado);
            $query->bindParam(3,$ultimousu);

            $resultado=$query->execute();
            if($resultado){
                return 1;
            }
            else{
                return 0;
            }
            conexionBD::cerrar_conexion();
        }

        public function listar_configuracion(){
            $c=conexionBD::conexionPDO();
            $sql="CALL SP_LISTAR_CONFIGURACION()";
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

        public function listar_dash(){
            $c=conexionBD::conexionPDO();
            $sql="CALL sp_obtenerDatosDashboard()";
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

        public function cargar_select_semestre()
        {
            $c=conexionBD::conexionPDO();
            $sql="CALL SP_CARGAR_SELECT_GESTION()";
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