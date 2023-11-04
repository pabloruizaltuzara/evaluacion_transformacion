<?php
  function getPlantilla($porAdmin,$total, $nombreLider, $ministerio)
  {
    $plantilla ='
  <body style="font-family: poppins;">
    <header class="clearfix">
      <div id="logo">
        <img src="img/logo.png" width="100px" >
      </div>
      <div id="company">
        <h2 class="name"><b>REPORTE DE DESEMPEÑO MENSUAL DE LOS LÍDERES</b></h2>
        <h2 class="name"><b>IGLESIA TRANSFORMACIÓN</b></h2>
      </div>
      </div>
    </header>
    <main>
    <div id="client" class="clearfix">
        <div class="to"><b>EVALUADO: </b>'. $nombreLider. '' .' </div>
        <div class="to"><b>MINISTERIO: </b>'. $ministerio .''.' </div>
    </div>
    <br>
      <table border="0" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th>#</th>
            <th >Evaluador</th>
            <th>Evaluado</th>
            <th>Fecha</th>
            <th>Total</th>
          </tr>
        </thead>
        <tbody>';

        $contador=0;
        foreach($porAdmin as $filas){
            $contador++;

        $plantilla.='<tr>
            <td style
            ="color: #000000;
            font-family: Arial;
            font-weight:bold;">'.$contador.'</td>
            <td style
            ="color: #000000;
            font-family: Arial;">'.$filas['nombreAdmin'].'</td>
            <td style
            ="color: #000000;
            font-family: Arial;">'.$filas['nombreObrero'].'</td>
            <td style
            ="color: #000000;
            font-family: Arial;">'.$filas['fechaEvaluacion'].'</td>
            <td style
            ="color: #000000;
            font-family: Arial;">'.$filas['total'].'</td>';
        }
          $plantilla.='
          </tr>
          <tr>
            <td  style
            ="color: #000000;
            font-family: Arial;
            font-weight:bold;" colspan="4">Porcentaje mensual</td>
            <td  style
            =" color: #000000;
            font-family: Arial;
            font-weight:bold;" colspan="1">'.$total.'%'.'</td>
          </tr>
        </tbody>
      </table>
      
    </main>
    <footer>
    " MINISTERIOS EBENEZER " IGLESIA TRANSFORMACIÓN
    </footer>
  </body>
</plantilla>';

return $plantilla;
}
