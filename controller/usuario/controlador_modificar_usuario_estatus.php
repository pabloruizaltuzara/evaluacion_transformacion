<?php
    require '../../model/modelo_usuario.php';
    $MU=new Modelo_Usuario();
    $id = htmlspecialchars($_POST['id'],ENT_QUOTES,'UTF-8');
    $estatus = htmlspecialchars($_POST['estatus'],ENT_QUOTES,'UTF-8');

    $consulta=$MU->Modificar_Usuario_Estatus($id,$estatus);
    echo $consulta;

?>