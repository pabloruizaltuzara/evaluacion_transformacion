<?php
    require_once('../vendor/autoload.php');

    require_once('plantilla/reporte/evaluacionMensual.php');

    $css = file_get_contents('plantilla/reporte/style.css');

    $idEval=$_GET['idEval'];
    $mes=$_GET['mes'];


 // require_once('evaluados.php');

   $porAdmin= array();

    //$mysqli=new mysqli("localhost","root","","dbevaluacion");
    $mysqli=new mysqli("localhost","u962432011_transformacion","transformacionEBEN23","u962432011_dbevaluacion");
    $mysqli->set_charset('utf8');
    $statement=$mysqli->prepare("SELECT evaluacion.id, 
    CONCAT(obreros.nombre,' ',obreros.paterno,' ',obreros.materno) as nombreObrero, 
    CONCAT(administrativos.nombre,' ',administrativos.paterno,' ',administrativos.materno) as nombreAdmin, 
    evaluacion.fechaEvaluacion, evaluacion.mes, evaluacion.total 
    FROM evaluacion 
    INNER JOIN obreros on obreros.id = evaluacion.idEvaluado 
    INNER JOIN administrativos on administrativos.id = evaluacion.idEvaluador 
    WHERE evaluacion.mes = '".$mes."' and evaluacion.idEvaluado = '".$idEval."';");
    $statement->execute();

    $resultado = $statement->get_result();

    while($row = $resultado->fetch_assoc()) $porAdmin[] = $row;
 
    $statement_2=$mysqli->prepare("SELECT SUM(total) as total, COUNT(*) as numero 
    FROM evaluacion 
        INNER JOIN obreros on obreros.id = evaluacion.idEvaluado 
        INNER JOIN administrativos on administrativos.id = evaluacion.idEvaluador 
        WHERE evaluacion.mes = '".$mes."' and evaluacion.idEvaluado = '".$idEval."';");
    $statement_2->execute();
    $resultado_2 = $statement_2->get_result();
    $cantidad   = "";
    $total   = "";
    

    while($row2 = $resultado_2->fetch_assoc()){
    $cantidad  = $row2['numero'];
    $total = $row2['total'];
    }

    //mostrar ministerio
    $statement_3=$mysqli->prepare("SELECT ministerio, 
    CONCAT(obreros.nombre,' ',obreros.paterno,' ',obreros.materno) as nombreObrero
    FROM obreros 
    WHERE obreros.id = '".$idEval."';");
    $statement_3->execute();
    $resultado_3 = $statement_3->get_result();
    $nombreLider   = "";
    $ministerio   = "";
    

    while($row3 = $resultado_3->fetch_assoc()){
        $nombreLider  = $row3['nombreObrero'];
        $ministerio  = $row3['ministerio'];
    }






    $mysqli->close();
  


    $mpdf = new \Mpdf\Mpdf([
        "format"=>"Letter"
    ]);

    
    $puntajeMaximo = $cantidad * 45;

    //$totalFinal = round($numero, 2);
    $totalFinal = round(($total / $puntajeMaximo) * 100, 1);

    $plantilla=getPlantilla($porAdmin,$totalFinal, $nombreLider, $ministerio);

    $mpdf->writeHtml($css, \Mpdf\HTMLParserMode::HEADER_CSS);
    $mpdf->writeHtml($plantilla, \Mpdf\HTMLParserMode::HTML_BODY);

    /* $mpdf->AddPage('L','','','','','30','20','20','20'); */

    $mpdf->Output("reporte.pdf","I");
?>