<?php
    require '../../model/modelo_obreros.php';
    $MU=new Modelo_Obreros();
    $id = htmlspecialchars($_POST['id'],ENT_QUOTES,'UTF-8');
    $estatus = htmlspecialchars($_POST['estatus'],ENT_QUOTES,'UTF-8');

    $consulta=$MU->Modificar_Obreros_Estatus($id,$estatus);
    echo $consulta;

?>