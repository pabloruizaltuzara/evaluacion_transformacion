<?php
    require '../../model/modelo_obreros.php';
    $MU=new Modelo_Obreros();
    $ci = htmlspecialchars($_POST['ci'],ENT_QUOTES,'UTF-8');
    $nombre = htmlspecialchars($_POST['nombre'],ENT_QUOTES,'UTF-8');
    $paterno = htmlspecialchars($_POST['paterno'],ENT_QUOTES,'UTF-8');
    $materno= htmlspecialchars($_POST['materno'],ENT_QUOTES,'UTF-8');
    $ministerio= htmlspecialchars($_POST['ministerio'],ENT_QUOTES,'UTF-8');
    $puesto = htmlspecialchars($_POST['puesto'],ENT_QUOTES,'UTF-8');

    session_start();

    $ultimoUsuario = $_SESSION['S_IDUSUARIO'];

    $nombreFoto= htmlspecialchars($_POST['nombreFoto'],ENT_QUOTES,'UTF-8');

    if(empty($nombreFoto)){
        $ruta='controller/obreros/foto/default.jpg';
    }else{
        $ruta='controller/obreros/foto/'.$nombreFoto;
    }



    $consulta=$MU->Registrar_Obreros($ci,$nombre,$paterno, $materno, $ministerio, $puesto, $ruta, $ultimoUsuario);
    echo $consulta;
    if($consulta==1){
        if(!empty($nombreFoto)){
            if(move_uploaded_file($_FILES['foto']['tmp_name'],"foto/".$nombreFoto));
        }
    }
?>