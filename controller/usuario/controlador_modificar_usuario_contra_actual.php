<?php
    require '../../model/modelo_usuario.php';
    $MU=new Modelo_Usuario();
    session_start();

    $id =  $_SESSION['S_IDUSUARIO'];
    $contra = password_hash($_POST['contranueva'],PASSWORD_DEFAULT,['cost'=>12]);

    $consulta=$MU->Modificar_Usuario_Contra($id,$contra);
    echo $consulta;

?>