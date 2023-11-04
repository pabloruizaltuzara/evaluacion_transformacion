<?php
    require '../../model/modelo_evaluacion.php';
    $MUA=new Modelo_Evaluacion();
    $consulta = $MUA->cargar_select_semestre();
    echo json_encode($consulta);
?>