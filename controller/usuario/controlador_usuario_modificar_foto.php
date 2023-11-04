<?php
    require '../../model/modelo_usuario.php';
    $MU=new Modelo_Usuario();
    $id = htmlspecialchars($_POST['id'],ENT_QUOTES,'UTF-8');
    $rutaactual = htmlspecialchars($_POST['rutaactual'],ENT_QUOTES,'UTF-8');

    $nombreFoto= htmlspecialchars($_POST['nombreFoto'],ENT_QUOTES,'UTF-8');

        $ruta='controller/usuario/foto/'.$nombreFoto;
    



    $consulta=$MU->Modificar_Foto_Usuario($id ,$ruta);
    echo $consulta;
    if($consulta==1){
        if(!empty($nombreFoto)){
            if(move_uploaded_file($_FILES['foto']['tmp_name'],"foto/".$nombreFoto));
            //hacemos validacion para no eliminar la foto default
            if($rutaactual!= "controller/usuario/foto/default.png"){
                unlink('../../'.$rutaactual);
            }
        }
    }
?>