<?php
    require '../../model/modelo_evaluacion.php';
    $MU=new Modelo_Evaluacion();

    $meses = htmlspecialchars($_POST['mes'],ENT_QUOTES,'UTF-8');
    $estado = htmlspecialchars($_POST['estado'],ENT_QUOTES,'UTF-8');
    $anio = date('Y');

    $mes = $anio.'-'.$meses;
    session_start();
    $ultimousu = $_SESSION['S_IDUSUARIO'];


    $consulta=$MU->Configurar_Evaluacion($mes, $estado, $ultimousu);
    echo $consulta;

?>