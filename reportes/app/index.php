<?php
    require_once('../vendor/autoload.php');

    require_once('plantilla/reporte/index.php');

    $css = file_get_contents('plantilla/reporte/style.css');

    $ci = $_POST['txtCiObreroReporteN'];
    $anio= $_POST['txtAnioObreroReporteN'];
    $sem= $_POST['txtSemestreObreroReporteN'];

    $semestres=$sem."-".$anio;

 // require_once('evaluados.php');

   $evaluados = array();

    $mysqli=new mysqli("localhost","root","","dbevaluacion");
    $mysqli->set_charset('utf8');
    $statement=$mysqli->prepare("SELECT evaluacion.id, concat(obreros.nombre,' ',obreros.paterno,' ',obreros.materno) as evaluado, obreros.puesto, evaluacion.p1, 
    evaluacion.p2, evaluacion.p3, evaluacion.p4, 
    evaluacion.p5, evaluacion.p6,
    evaluacion.p7, evaluacion.p8, evaluacion.p9, 
    evaluacion.p10, evaluacion.p11,
    evaluacion.p12, evaluacion.p13, evaluacion.p14, 
    evaluacion.p15, evaluacion.p16,
    evaluacion.p17, evaluacion.p18,
    evaluacion.p19, evaluacion.p20,
     evaluacion.total, 
    evaluacion.semestre,
    concat(administrativos.nombre,' ',administrativos.paterno,' ',administrativos.materno) as evaluador
    FROM obreros INNER JOIN evaluacion on obreros.id = evaluacion.idEvaluado INNER JOIN administrativos on administrativos.id=evaluacion.idEvaluador
    WHERE  evaluacion.semestre='".$semestres."'
    and evaluacion.idEvaluado = '".$ci."'; ");
    $statement->execute();

    $resultado = $statement->get_result();

    while($row = $resultado->fetch_assoc()) $evaluados[] = $row;
    $mysqli->close();
 
  


    $mpdf = new \Mpdf\Mpdf([
        "format"=>"Letter"
    ]);
    $plantilla=getPlantilla($evaluados);

    $mpdf->writeHtml($css, \Mpdf\HTMLParserMode::HEADER_CSS);
    $mpdf->writeHtml($plantilla, \Mpdf\HTMLParserMode::HTML_BODY);

    /* $mpdf->AddPage('L','','','','','30','20','20','20'); */

    $mpdf->Output("reporte.pdf","I");
?>