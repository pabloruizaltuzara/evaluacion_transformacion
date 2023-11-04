<script src="../js/obreros.js?rev=<?php echo time(); ?>"></script>

<?php
session_start();
?>


<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">

      <h4 class="card-title">JORNALEROS</h4>
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
        <button type="button" class="btn btn-primary btn-icon-text" onclick="AbrirModalRegistroObreros()">
          <i class="ti-user btn-icon-prepend"></i>
          Nuevo
        </button>

        <div class="table-responsive">
          <table class="table" id="personal_obreros">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Foto</th>
                <th scope="col">Puesto</th>
                <th scope="col">Ingreso</th>
                <th scope="col">Retiro</th>
                <th scope="col">Dias de trabajo</th>
                <th scope="col">Estado</th>
                <th scope="col">Acciones</th>
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







<!-- Modal registro usuarios -->

<div class="modal fade" id="modal_registro_personal_obreros" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registrar obrero</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">

        <div class="form-group">
          <label for="txtCiObrero">Cedula de Identidad</label>
          <input type="text" class="form-control" id="txtCiObrero" placeholder="Cedula de Identidad">
        </div>
        <div class="form-group">
          <label for="txtNombreObrero">Nombre</label>
          <input type="text" class="form-control" id="txtNombreObrero" placeholder="Nombre">
        </div>
        <div class="form-group">
          <label for="txtPaternoObrero">Paterno</label>
          <input type="text" class="form-control" id="txtPaternoObrero" placeholder="Paterno">
        </div>
        <div class="form-group">
          <label for="txtMaternoObrero">Materno</label>
          <input type="text" class="form-control" id="txtMaternoObrero" placeholder="Materno">
        </div>
        <div class="form-group">
          <label for="txtPuestoObrero">Puesto</label>
          <select class="form-control form-control-sm" id="txtPuestoObrero">
            <option value="">--Seleccionar--</option>
            <option value="JORNALEROS">JORNALEROS</option>
          </select>
        </div>
        <div class="form-group">
          <label for="txtIngresoObrero">Ingreso</label>
          <input type="date" class="form-control" id="txtIngresoObrero" placeholder="Fecha de ingreso">
        </div>
        <div class="form-group">
          <label for="txtSalidaObrero">Retiro</label>
          <input type="date" class="form-control" id="txtSalidaObrero" placeholder="Fecha de retiro">
        </div>

        <div class="form-group">
          <label>Foto:</label>

          <div class="input-group col-xs-12">
            <input type="file" id="txtFotoObrero" class="form-control file-upload-info" placeholder="Upload Image">
          </div>
        </div>



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" onclick="Registrar_Personal_Obreros()">Guardar</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal editar usuarios -->

<div class="modal fade" id="modal_editar_personal_obreros" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar datos de obrero</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">

        <div class="form-group">
          <input type="text" id="txtCiObreroEditar" hidden>
          <label for="txtNombreObreroEditar">Nombre</label>
          <input type="text" class="form-control" id="txtNombreObreroEditar" placeholder="Nombre">
        </div>
        <div class="form-group">
          <label for="txtPaternoObreroEditar">Paterno</label>
          <input type="text" class="form-control" id="txtPaternoObreroEditar" placeholder="Paterno">
        </div>
        <div class="form-group">
          <label for="txtMaternoObreroEditar">Materno</label>
          <input type="text" class="form-control" id="txtMaternoObreroEditar" placeholder="Materno">
        </div>
        <div class="form-group">
          <label for="txtPuestoObreroEditar">Puesto</label>
          <select class="form-control form-control-sm" id="txtPuestoObreroEditar">

            <?php
            if ($_SESSION['S_NIVEL'] == "ADMINISTRATIVO") { ?>
              <option value="">--Seleccionar--</option>
              <option value="JORNALEROS">JORNALEROS</option>
            <?php
            } else { ?>
              <option value="">--Seleccionar--</option>
              <option value="JORNALEROS">JORNALEROS</option>
            <?php }
            ?>
          </select>
        </div>
        <div class="form-group">
          <label for="txtIngresoObreroEditar">Ingreso</label>
          <input type="date" class="form-control" id="txtIngresoObreroEditar" placeholder="Fecha de ingreso">
        </div>
        <div class="form-group">
          <label for="txtSalidaObreroEditar">Retiro</label>
          <input type="date" class="form-control" id="txtSalidaObreroEditar" placeholder="Fecha de retiro">
        </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-success" onclick="ModificarPersonalObreros()">Actualizar</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal editar foto usuarios -->

<div class="modal fade" id="modal_editar_foto_obrero" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar foto del obrero <b id="lblObrero"></b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="text" id="idObrero" hidden>
        <input type="text" id="fotoactualObrero" hidden>
        <div class="form-group">
          <label>Foto:</label>

          <div class="input-group col-xs-12">
            <input type="file" accept="image/*" id="txtFotoObreroEditar" class="form-control file-upload-info" placeholder="Upload Image">
          </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" onclick="Modificar_Foto_Personal()">Guardar</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="modal_editar_foto" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar foto del usuario <b id="lblUsuario"></b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
            <line x1="18" y1="6" x2="6" y2="18"></line>
            <line x1="6" y1="6" x2="18" y2="18"></line>
          </svg>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12 mb-4">
            <input type="text" id="idusuariofoto" hidden>
            <input type="text" id="fotoactual" hidden>
            <label for="txtFoto">Foto:</label>
            <input type="file" class="form-control-file" id="txtFotoEditar">

          </div>

        </div>
      </div>
      <div class="modal-footer">
        <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i>Cerrar</button>
        <button type="button" class="btn btn-primary" onclick="Modificar_Foto_Usuario()">Modificar</button>
      </div>
    </div>
  </div>
</div>



<!-- Modal editar contrasena usuarios -->


<div class="modal fade" id="modal_editar_contra" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar contraseña del usuario <b id="lblUsuarioContra"></b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="text" id="IdUsuarioContra" hidden>

        <div class="form-group">
          <label for="txtPassAdmin">Contraseña</label>
          <input type="password" class="form-control" id="txtPassAdminEditar" placeholder="Contraseña">
        </div>
        <div class="form-group">
          <label for="txtPassAdminConfirm">Confirmar contraseña</label>
          <input type="password" class="form-control" id="txtPassAdminConfirmEditar" placeholder="Confirmar contraseña">
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" onclick="Modificar_Contra_Usuario()">Guardar</button>
      </div>
    </div>
  </div>
</div>



<script>
  var area = "JORNALEROS";
  listarPersonalObreros(area);


  document.getElementById("txtFotoObrero").addEventListener("change", () => {
    var fileName = document.getElementById("txtFotoObrero").value;
    var idxDot = fileName.lastIndexOf(".") + 1;
    var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
    if (extFile == "jpg" || extFile == "jpeg" || extFile == "png") {
      //TODO
    } else {
      Swal.fire(
        'Mensaje de advertencia',
        'Solo se aceptan imagenes - usted subio un archivo con extension .' + extFile,
        'warning'
      );
      document.getElementById("txtFotoObrero").value = "";
    }
  });

  document.getElementById("txtFotoObreroEditar").addEventListener("change", () => {
    var fileName = document.getElementById("txtFotoObreroEditar").value;
    var idxDot = fileName.lastIndexOf(".") + 1;
    var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
    if (extFile == "jpg" || extFile == "jpeg" || extFile == "png") {
      //TODO
    } else {
      Swal.fire(
        'Mensaje de advertencia',
        'Solo se aceptan imagenes - usted subio un archivo con extension .' + extFile,
        'warning'
      );
      document.getElementById("txtFotoObreroEditar").value = "";
    }
  });
</script>