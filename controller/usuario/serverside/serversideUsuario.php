<?php
    require 'serverside.php';
    $table_data->getObtnerListadoUsario('view_listar_usuarios','idPersona',array('idPersona','nombres','usuario','contrasena','status','idNivel','nombre','foto', 'ncompleto'));
?>
