<script src="../js/evaluacion.js?rev=<?php echo time(); ?>"></script>


<?php
  function numeroAMes($numero) {
    $meses = array(
        1 => "ENERO",
        2 => "FEBRERO",
        3 => "MARZO",
        4 => "ABRIL",
        5 => "MAYO",
        6 => "JUNIO",
        7 => "JULIO",
        8 => "AGOSTO",
        9 => "SEPTIEMBRE",
        10 => "OCTUBRE",
        11 => "NOVIEMBRE",
        12 => "DICIEMBRE"
    );

      return $meses[$numero];
  }


?>


<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title text-center">CONFIGURACIÓN</h4>
        <p class="card-description">
          Configuración para las evaluaciones
        </p>
        
        <div class="row" id="configEval">
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Mes:</label>
              <div class="col-sm-9">
                <input class="form-control" id="txtAnio" value="<?= numeroAMes(date("m")); ?>" disabled />
              </div>
            </div>
          </div>
        </div>

        <div id="btn_config_eval">
          <button type="button" class="btn btn-success btn-lg btn-block" onclick="ConfiguracionEvaluacion('HABILITADO')">
            <i class="ti-user"> </i>
            Habilitar evaluaciones
          </button>
        </div>

      </div>
    </div>
  </div>
</div>

<script>


listarConfiguracion();

  
</script>