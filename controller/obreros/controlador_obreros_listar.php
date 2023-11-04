<?php
    require '../../model/modelo_obreros.php';
    $MU=new Modelo_Obreros();

    $tipo_personal=htmlspecialchars($_POST['area'],ENT_QUOTES,'UTF-8');
    

    if($tipo_personal=="GERENTE DE PRODUCCION" || $tipo_personal=="JEFE DE RECURSOS HUMANOS" || $tipo_personal=="SISTEMAS"){
        $consulta=$MU->listar_obreros_general();
    }else{
        $consulta=$MU->listar_obreros($tipo_personal);
    }


   
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