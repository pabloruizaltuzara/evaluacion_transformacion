<?php
    $idusuario= htmlspecialchars($_POST['idusuario'],ENT_QUOTES, 'UTF-8');
    $usuario= htmlspecialchars($_POST['usuario'],ENT_QUOTES, 'UTF-8');
    $nivel= htmlspecialchars($_POST['nivel'],ENT_QUOTES, 'UTF-8');
    $foto= htmlspecialchars($_POST['foto'],ENT_QUOTES, 'UTF-8');
    $nombre= htmlspecialchars($_POST['nombre'],ENT_QUOTES, 'UTF-8');
    $area= htmlspecialchars($_POST['area'],ENT_QUOTES, 'UTF-8');


    session_start();

    $_SESSION['S_IDUSUARIO']=$idusuario;
    $_SESSION['S_USUARIO']=$usuario;
    $_SESSION['S_NIVEL']=$nivel;
    $_SESSION['S_FOTO']=$foto;
    $_SESSION['S_NOMBRE']=$nombre;
    $_SESSION['S_AREA']=$area;
?>