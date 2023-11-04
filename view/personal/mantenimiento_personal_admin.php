<script src="../js/personal.js?rev=<?php echo time(); ?>"></script>


<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Administrativos</h4>
        <p class="card-description">
          Personal administrativo
        </p>
        <button type="button" class="btn btn-primary btn-icon-text" onclick="AbrirModalRegistroPersonal()">
          <i class="ti-user btn-icon-prepend"></i>
          Nuevo
        </button>

        <div class="table-responsive">
          <table class="table" id="personal_admin">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Foto</th>
                <th scope="col">Cargo</th>
                <th scope="col">Nivel</th>
                <th scope="col">Ingreso</th>
                <th scope="col">Retiro</th>
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

<div class="modal fade" id="modal_registro_personal_admin" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registrar administrador</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">

        <div class="form-group">
          <label for="txtCiPerAdmin">Cedula de Identidad</label>
          <input type="text" class="form-control" id="txtCiPerAdmin" placeholder="Cedula de Identidad">
        </div>
        <div class="form-group">
          <label for="txtNombrePerAdmin">Nombre</label>
          <input type="text" class="form-control" id="txtNombrePerAdmin" placeholder="Nombre">
        </div>
        <div class="form-group">
          <label for="txtPaternoPerAdmin">Paterno</label>
          <input type="text" class="form-control" id="txtPaternoPerAdmin" placeholder="Paterno">
        </div>
        <div class="form-group">
          <label for="txtMaternoPerAdmin">Materno</label>
          <input type="text" class="form-control" id="txtMaternoPerAdmin" placeholder="Materno">
        </div>
        <div class="form-group">
          <label for="txtCargoPerAdmin">Cargo</label>
          <select class="form-control form-control-sm" id="txtCargoPerAdmin">
            <option value="GERENTE DE PRODUCCION">GERENTE DE PRODUCCIÓN</option>
            <option value="JEFE DE RECURSOS HUMANOS">JEFE DE RECURSOS HUMANOS</option>   
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

        <div class="col-md-12 mb-4">
          <label for="txtFotoPerAdmin">Foto: </label>
          <input type="file" accept="image/*" capture="camera" id="txtFotoPerAdmin">
        </div>



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" onclick="Registrar_Personal_Admin('A')">Guardar</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal editar usuarios -->

<div class="modal fade" id="modal_editar_personal_admin" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar datos de administrador</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">

        <div class="form-group">
          <input type="text" id="txtCiPerAdminEditar" hidden>
          <label for="txtNombrePerAdmin">Nombre</label>
          <input type="text" class="form-control" id="txtNombrePerAdminEditar" placeholder="Nombre">
        </div>
        <div class="form-group">
          <label for="txtPaternoPerAdmin">Paterno</label>
          <input type="text" class="form-control" id="txtPaternoPerAdminEditar" placeholder="Paterno">
        </div>
        <div class="form-group">
          <label for="txtMaternoPerAdmin">Materno</label>
          <input type="text" class="form-control" id="txtMaternoPerAdminEditar" placeholder="Materno">
        </div>
        <div class="form-group">
          <label for="txtCargoPerAdmin">Cargo</label>
          <select class="form-control form-control-sm" id="txtCargoPerAdminEditar">
            <option value="GERENTE DE PRODUCCION">GERENTE DE PRODUCCIÓN</option>
            <option value="JEFE DE RECURSOS HUMANOS">JEFE DE RECURSOS HUMANOS</option>            
          </select>
        </div>

        <div class="form-group">
          <label for="txtIngresoEditarPersonal">Ingreso</label>
          <input type="date" class="form-control" id="txtIngresoEditarPersonal" placeholder="Fecha de ingreso">
        </div>
        <div class="form-group">
          <label for="txtSalidaEditarPersonal">Retiro</label>
          <input type="date" class="form-control" id="txtSalidaEditarPersonal" placeholder="Fecha de retiro">
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-success" onclick="ModificarPersonalAdmin('A')">Actualizar</button>
      </div>
    </div>
  </div>
</div>


  <!-- Modal editar foto usuarios -->

  <div class="modal fade" id="modal_editar_foto_admin" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Editar foto del administrativo <b id="lblUsuarioAdmin"></b></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <input type="text" id="idUsuarioAdmin" hidden>
          <input type="text" id="fotoactualAdmin" hidden>
          <label for="txtFotoPerAdminEditar">Foto:</label>
          <input type="file" accept="image/*" class="form-control-file" id="txtFotoPerAdminEditar">


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light" data-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-primary" onclick="Modificar_Foto_Personal('ADMINISTRATIVO')">Guardar</button>
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

    listarPersonalAdmin();

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
*/
    document.getElementById("txtFotoPerAdmin").addEventListener("change", () => {
      var fileName = document.getElementById("txtFotoPerAdmin").value;
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
        document.getElementById("txtFotoPerAdmin").value = "";
      }
    });
  </script>