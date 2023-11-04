<?php
    require '../../model/modelo_evaluacion.php';
    $MU=new Modelo_Evaluacion();

    $consulta=$MU->listar_dash();
    if(count($consulta)>0){
        echo json_encode($consulta);
    }else{
        echo 0;
    }
?>