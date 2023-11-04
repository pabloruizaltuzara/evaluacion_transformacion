<?php
    require '../../model/modelo_usuario.php';
    $MU=new Modelo_Usuario();
    $id = htmlspecialchars($_POST['id'],ENT_QUOTES,'UTF-8');
    $nivel = htmlspecialchars($_POST['nivel'],ENT_QUOTES,'UTF-8');

    $consulta=$MU->Modificar_Usuario($id,$nivel);
    echo $consulta;

?>