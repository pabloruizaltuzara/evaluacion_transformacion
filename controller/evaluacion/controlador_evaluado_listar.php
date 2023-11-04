<?php
    require '../../model/modelo_evaluacion.php';
    $MU=new Modelo_Evaluacion();
    $area_puesto=htmlspecialchars($_POST['area'],ENT_QUOTES,'UTF-8');

    $consulta=$MU->listar_obrero($area_puesto);
    if($consulta){
        echo json_encode($consulta);
    }
    else{
        echo '{
            "sEcho": 1,
            "iTotalRecords":"0",
            "iTotalDisplayRecords":"0",
            "aaData":[]
        }';
    }
?>