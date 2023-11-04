<?php
    $evaluados = array();

    $mysqli=new mysqli("localhost","root","","dbevaluacion");
    $mysqli->set_charset('utf8');
    $statement=$mysqli->prepare("SELECT evaluacion.id, obreros.nombre as evaluado, administrativos.nombre as evaluador, obreros.puesto, obreros.ingreso, administrativos.cargo_area, evaluacion.p1, evaluacion.p2, evaluacion.p3,evaluacion.p4, evaluacion.p5, evaluacion.p6,evaluacion.total
    FROM evaluacion INNER JOIN administrativos ON evaluacion.idEvaluador= administrativos.id INNER JOIN obreros ON evaluacion.idEvaluado= obreros.id 
    WHERE evaluacion.semestre='I-2023' AND evaluacion.idEvaluado = '55555552';");
    $statement->execute();

    $resultado = $statement->get_result();

    while($row = $resultado->fetch_assoc()) $evaluados[] = $row;
    $mysqli->close();