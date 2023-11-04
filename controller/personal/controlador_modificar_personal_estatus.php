<?php
    require '../../model/modelo_personal.php';
    $MU=new Modelo_Personal();
    $id = htmlspecialchars($_POST['id'],ENT_QUOTES,'UTF-8');
    $estatus = htmlspecialchars($_POST['estatus'],ENT_QUOTES,'UTF-8');

    $consulta=$MU->Modificar_Personal_Estatus($id,$estatus);
    echo $consulta;

?>