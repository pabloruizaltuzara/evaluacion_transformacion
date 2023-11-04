<?php
    require '../../model/modelo_obreros.php';
    $MU=new Modelo_Obreros();
    $ci = htmlspecialchars($_POST['ci'],ENT_QUOTES,'UTF-8');
    $nombre = htmlspecialchars($_POST['nombre'],ENT_QUOTES,'UTF-8');
    $paterno = htmlspecialchars($_POST['paterno'],ENT_QUOTES,'UTF-8');
    $materno = htmlspecialchars($_POST['materno'],ENT_QUOTES,'UTF-8');
    $puesto = htmlspecialchars($_POST['puesto'],ENT_QUOTES,'UTF-8');
    $ingreso = htmlspecialchars($_POST['ingreso'],ENT_QUOTES,'UTF-8');
    $salida = htmlspecialchars($_POST['salida'],ENT_QUOTES,'UTF-8');

    session_start();

    $ultimoUsuario = $_SESSION['S_IDUSUARIO'];


    $consulta=$MU->Modificar_Obreros($ci, $nombre, $paterno, $materno, $puesto, $ingreso,$salida, $ultimoUsuario);
    echo $consulta;

?>