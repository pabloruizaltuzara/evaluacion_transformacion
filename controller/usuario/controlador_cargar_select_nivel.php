<?php
    require '../../model/modelo_usuario.php';
    $MU=new Modelo_Usuario();
    $consulta=$MU->listar_select_nivel();
    echo json_encode($consulta);
?>