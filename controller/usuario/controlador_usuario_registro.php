<?php
    require '../../model/modelo_usuario.php';
    $MU=new Modelo_Usuario();
    $id = htmlspecialchars($_POST['id'],ENT_QUOTES,'UTF-8');
    $usuario = htmlspecialchars($_POST['u'],ENT_QUOTES,'UTF-8');
    $password= password_hash($_POST['p'],PASSWORD_DEFAULT,['cost'=>12]);
    $nivel = htmlspecialchars($_POST['n'],ENT_QUOTES,'UTF-8');

    session_start();

    $ultimoUsuario = $_SESSION['S_IDUSUARIO'];


    $consulta=$MU->Registrar_Usuario($id,$usuario, $password, $nivel,$ultimoUsuario);
    echo $consulta;

?>