<?php
    require '../../model/modelo_usuario.php';
    $MU=new Modelo_Usuario();
    $consulta=$MU->listar_select_personas();
    echo json_encode($consulta);
?>