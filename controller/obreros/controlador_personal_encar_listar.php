<?php
    require '../../model/modelo_personal.php';
    $MU=new Modelo_Personal();
    $tipo_personal="ENCARGADO";
    $consulta=$MU->listar_personal($tipo_personal);
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