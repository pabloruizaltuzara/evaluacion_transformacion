<script src="../js/obreros_repor.js?rev=<?php echo time(); ?>"></script>

<?php
session_start();
?>


<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">

        <?php
        if ($_SESSION['S_NIVEL'] == "ADMINISTRATIVO") { ?>
          <h4 class="card-title">TODOS LOS OBREROS</h4>
        <?php
        } else { ?>
          <h4 class="card-title">ÁREA <?= $_SESSION['S_AREA']; ?></h4>
        <?php }
        ?>
        <p class="card-description">

          <?php
          if ($_SESSION['S_NIVEL'] == "ADMINISTRATIVO") { ?>
            Personal de obreros
          <?php
          } else { ?>
            Personal de <?= strtolower($_SESSION['S_AREA']); ?>
          <?php }
          ?>


        </p>

        <div class="table-responsive">
          <table class="table" id="personal_obreros">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Foto</th>
                <th scope="col">Puesto</th>
                <th scope="col">Ministerio</th>
                <th scope="col">Reportes</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

</div>


<!-- Modal editar usuarios -->

<div class="modal fade" id="modal_editar_personal_obreros" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form action="../reportes/app/index.php" method="POST" target="_blank">

    <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Evaluaciones del obrero <b id="lblObrero"></b></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">

          <div class="form-group">
            <input type="text" id="txtCiObreroReporte" name="txtCiObreroReporteN" hidden>

            <label for="txtSemestreObreroReporte">Año-Mes</label>
            <div class="col-12 form-group float-left"> 
                <select class="form-control form-control-sm" id="select_mes" style="width:100%">
                </select> 
            </div> 

          </div>

      </div>

      <button class="btn btn-inverse-danger btn-icon-text" onclick="verReporteListaPorAdmin()">
            <i class="ti-file btn-icon-prepend"></i>
            Generar PDF
          </button>

    </form>
  </div>
</div>


<script>
  var area = "<?= $_SESSION['S_AREA']; ?>";
  listarPersonalObreros(area);

  $(document).ready(function(){
    $('.form-control-sm');
      cargar_select_semestre();
    });
</script>