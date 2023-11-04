<?php
    require '../../model/modelo_personal.php';
    $MU=new Modelo_Personal();
    $ci = htmlspecialchars($_POST['ci'],ENT_QUOTES,'UTF-8');
    $nombre = htmlspecialchars($_POST['nombre'],ENT_QUOTES,'UTF-8');
    $paterno = htmlspecialchars($_POST['paterno'],ENT_QUOTES,'UTF-8');
    $materno= htmlspecialchars($_POST['materno'],ENT_QUOTES,'UTF-8');
    $cargo = htmlspecialchars($_POST['cargo'],ENT_QUOTES,'UTF-8');
    $nivel = htmlspecialchars($_POST['nivel'],ENT_QUOTES,'UTF-8');
    $ingreso = htmlspecialchars($_POST['ingreso'],ENT_QUOTES,'UTF-8');
    $salida = htmlspecialchars($_POST['salida'],ENT_QUOTES,'UTF-8');

    session_start();

    $ultimoUsuario = $_SESSION['S_IDUSUARIO'];

    $nombreFoto= htmlspecialchars($_POST['nombreFoto'],ENT_QUOTES,'UTF-8');

    if(empty($nombreFoto)){
        $ruta='controller/personal/foto/default.jpg';
    }else{
        $ruta='controller/personal/foto/'.$nombreFoto;
    }



    $consulta=$MU->Registrar_Personal($ci,$nombre,$paterno, $materno, $cargo, $nivel, $ingreso, $salida, $ruta, $ultimoUsuario);
    echo $consulta;
    if($consulta==1){
        if(!empty($nombreFoto)){
            if(move_uploaded_file($_FILES['foto']['tmp_name'],"foto/".$nombreFoto));
        }
    }
?>