<script src="../js/usuario.js?rev=<?php echo time(); ?>"></script>


<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Encargados</h4>
        <p class="card-description">
          Usuarios encargados
        </p>
        <button type="button" class="btn btn-primary btn-icon-text" onclick="AbrirModalRegistroUsuarioEncar()">
          <i class="ti-user btn-icon-prepend"></i>
          Nuevo
        </button>

        <div class="table-responsive">
          <table class="table" id="usuario_encar">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Foto</th>
                <th scope="col">Usuario</th>
                <th scope="col">Cargo</th>
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

<div class="modal fade" id="modal_registro_usuario" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registrar usuario encargado</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="text" id="txtIdEncar" hidden>

        <div class="form-group">
          <label>Nombre</label>
          <input type="text" name="img[]" class="file-upload-default">
          <div class="input-group col-xs-12">
            <input type="text" class="form-control file-upload-info" disabled placeholder="Nombre" id="txtNombreEncar">
            <span class="input-group-append">
              <button class="file-upload-browse btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="AbrirModalRegistroUsuarioEncar2()">Elegir</button>
            </span>
          </div>
        </div>

        <div class="form-group">
          <label for="txtUsuarioEncar">Usuario</label>
          <input type="text" class="form-control" id="txtUsuarioEncar" placeholder="Usuario">
        </div>
        <div class="form-group">
          <label for="txtPassEncar">Contraseña</label>
          <input type="password" class="form-control" id="txtPassEncar" placeholder="Contraseña">
        </div>
        <div class="form-group">
          <label for="txtPassEncarConfirm">Confirmar contraseña</label>
          <input type="password" class="form-control" id="txtPassEncarConfirm" placeholder="Confirmar contraseña">
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" onclick="Registrar_Usuario_Encar()">Guardar</button>
      </div>
    </div>
  </div>
</div>



<div class="modal fade" id="seleccionaEncargado" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body" style="background-color: rgb(222,222,222);">
        <div class="table-responsive">
          <table class="table" id="encargados_select">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Foto</th>
                <th scope="col">Nombre</th>
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


<!-- Modal editar usuarios -->

<div class="modal fade" id="modal_editar_usuario" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
            <line x1="18" y1="6" x2="6" y2="18"></line>
            <line x1="6" y1="6" x2="18" y2="18"></line>
          </svg>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-8 mb-4">
            <label for="txtUsuario">Nombre:</label>
            <input type="text" class="form-control" id="txtId_editar" hidden required>
            <input type="text" class="form-control" disabled id="select_persona_editar" placeholder="" required>
            <div class="valid-feedback">
              Muy bien
            </div>
            <div class="invalid-feedback">
              Llene el campo
            </div>
          </div>
          <div class="col-md-4 mb-4">
            <label for="txtUsuario">Usuario:</label>
            <input type="text" class="form-control" disabled id="txtUsuario_editar" placeholder="" required>
            <div class="valid-feedback">
              Muy bien
            </div>
            <div class="invalid-feedback">
              Llene el campo
            </div>
          </div>
          <div class="col-md-12 mb-4">
            <label for="select_nivel">Nivel de usuario:</label>
            <select class="form-control" style="width: 100%;" id="select_nivel_editar" value="" required>

            </select>
          </div>

        </div>
      </div>
      <div class="modal-footer">
        <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i>Cerrar</button>
        <button type="button" class="btn btn-primary" onclick="ModificarUsuario()">Actualizar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal editar foto usuarios -->

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
  /* $(".basic").select2({
          tags: true,

          dropdownParent: $("#modal_registro_usuario"),
          createTag: function(tag) {
            // Check if the option is already there
            var found = false;
            $("select_persona").each(function() {
              if ($.trim(tag.term).toUpperCase() === $.trim($(this).text()).toUpperCase()) {
                found = true;
              }
            });
          }
        }); */

  listarUsuariosEncar();
  listarEncarSelect();

  /*   document.getElementById("txtFotoEditar").addEventListener("change", () => {
      var fileName = document.getElementById("txtFotoEditar").value;
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
        document.getElementById("txtFotoEditar").value = "";
      }
    });

    document.getElementById("txtFoto").addEventListener("change", () => {
      var fileName = document.getElementById("txtFoto").value;
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
        document.getElementById("txtFoto").value = "";
      }
    }); */
</script>