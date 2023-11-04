var tbl_personal_obreros;
function listarPersonalObreros(area) {
  tbl_personal_obreros = $("#personal_obreros").DataTable({
    ordering: false,
    bLengthChange: true,
    searching: { regex: false },
    lengthMenu: [
      [10, 25, 50, 100, -1],
      [10, 25, 50, 100, "All"],
    ],
    pageLength: 10,
    destroy: true,
    destroy: true,
    async: false,
    processing: true,
    ajax: {
      url: "../controller/obreros/controlador_obreros_listar.php",
      type: "POST",
      data: {
        area: area,
      },
    },

    columns: [
      { defaultContent: "id" },
      { data: "nombre" },
      {
        data: "foto",
        render: function (data, type, row) {
          return (
            '<img class="img-responsive" style="width:60px; height:60px; border-radius:50%;" src="../' +
            data +
            '">'
          );
        },
      },
      { data: "puesto" },
      {data:"ministerio"},    

      {
        data: "estado",
        render: function (data, type, row) {
          if (data == "ACTIVO") {
            return '<span class="badge badge-success"> ACTIVO </span>';
          } else {
            return '<span class="badge badge-danger"> INACTIVO </span>';
          }
        },
      },
      {
        data: "estado",
        render: function (data, type, row) {
          if (data == "ACTIVO") {
            return `<div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuSizeButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        OPCIONES
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuSizeButton2">
                        <h6 class="dropdown-header">Opciones</h6>
                        <a class="dropdown-item editar" href="#">Editar datos</a>
                        <a class="dropdown-item foto" href="#">Cambiar foto</a>
                        <a class="dropdown-item desactivar" href="#">Desactivar administrativo</a>
                      </div>
          </div>`;
          } else {
            return `<div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuSizeButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        OPCIONES
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuSizeButton2">
                        <h6 class="dropdown-header">Opciones</h6>
                        <a class="dropdown-item editar" href="#">Editar datos</a>
                        <a class="dropdown-item foto" href="#">Cambiar foto</a>
                        <a class="dropdown-item activar" href="#">Activar administrativo</a>
                      </div>
          </div>`;
          }
        },
      },
    ],
    responsive: true,
    paging: false,
    ordering: false,
    info: false,
    language: idioma_espanol,
    select: true,
  });

  tbl_personal_obreros.on("draw.td", function () {
    var PageInfo = $("#personal_obreros").DataTable().page.info();
    tbl_personal_obreros
      .column(0, { page: "current" })
      .nodes()
      .each(function (cell, i) {
        cell.innerHTML = i + 1 + PageInfo.start;
      });
  });
}

$("#personal_obreros").on("click", ".activar", function () {
  var data = tbl_personal_obreros.row($(this).parents("tr")).data();

  if (tbl_personal_obreros.row(this).child.isShown()) {
    var data = tbl_personal_obreros.row(this).data();
  }

  Swal.fire({
    title: "Estas seguro de cambiar el estado a ACTIVO del personal?",
    text: "Una vez realizado esto el obrero estara activo",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, confirmar",
  }).then((result) => {
    if (result.isConfirmed) {
      ModificarEstatus(data["id"], "ACTIVO", "A");
    }
  });
});

$("#personal_obreros").on("click", ".desactivar", function () {
  var data = tbl_personal_obreros.row($(this).parents("tr")).data();

  if (tbl_personal_obreros.row(this).child.isShown()) {
    var data = tbl_personal_obreros.row(this).data();
  }

  Swal.fire({
    title: "Estas seguro de cambiar el estado a INACTIVO del obrero?",
    text: "Una vez realizado esto el obrero estara inactivo",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, confirmar",
  }).then((result) => {
    if (result.isConfirmed) {
      ModificarEstatus(data["id"], "INACTIVO");
    }
  });
});

$("#personal_obreros").on("click", ".foto", function () {
  var data = tbl_personal_obreros.row($(this).parents("tr")).data();

  if (tbl_personal_obreros.row(this).child.isShown()) {
    var data = tbl_personal_obreros.row(this).data();
  }

  $("#modal_editar_foto_obrero").modal("show");
  document.getElementById("idObrero").value = data["id"];
  document.getElementById("lblObrero").innerHTML = data["nombre"];
  document.getElementById("fotoactualObrero").value = data["foto"];
});

$("#personal_obreros").on("click", ".editar", function () {
  var data = tbl_personal_obreros.row($(this).parents("tr")).data();

  if (tbl_personal_obreros.row(this).child.isShown()) {
    var data = tbl_personal_obreros.row(this).data();
  }

  $("#modal_editar_personal_obreros").modal("show");
  document.getElementById("txtCiObreroEditar").value = data["id"];

  const Nombre = data["nombre"];
  const arrayNombre = Nombre.split(" ");

  document.getElementById("txtNombreObreroEditar").value = arrayNombre[0];
  document.getElementById("txtPaternoObreroEditar").value = arrayNombre[1];
  document.getElementById("txtMaternoObreroEditar").value = arrayNombre[2];
  document.getElementById("txtPuestoObreroEditar").value = data["puesto"];
  document.getElementById("txtIngresoObreroEditar").value = data["ingreso"];
  document.getElementById("txtSalidaObreroEditar").value = data["retiro"];
});

function AbrirModalRegistroObreros() {
  $("#modal_registro_personal_obreros").modal({
    backdrop: "static",
    keyboard: false,
  });
  $("#modal_registro_personal_obreros").modal("show");
}

function Registrar_Personal_Obreros() {
  let ci = document.getElementById("txtCiObrero").value;
  let nombre = document.getElementById("txtNombreObrero").value;
  let paterno = document.getElementById("txtPaternoObrero").value;
  let materno = document.getElementById("txtMaternoObrero").value;
  let ministerio = document.getElementById("txtMinisterio").value;
  let puesto = document.getElementById("txtPuestoObrero").value;
  let foto = document.getElementById("txtFotoObrero").value;

  if (ci.length == 0) {
    return Swal.fire(
      "Mensaje de advertencia",
      "Ingreso su CI (Solo numeros)",
      "warning"
    );
  }

  if (nombre.length == 0) {
    return Swal.fire(
      "Mensaje de advertencia",
      "Ingrese el nombre, por favor",
      "warning"
    );
  }
  if (paterno.length == 0) {
    return Swal.fire(
      "Mensaje de advertencia",
      "Ingrese el apellido paterno, por favor",
      "warning"
    );
  }

  if (puesto.length == 0) {
    return Swal.fire(
      "Mensaje de advertencia",
      "Asigne un puesto",
      "warning"
    );
  }

  if (ministerio.length == 0) {
    return Swal.fire(
      "Mensaje de advertencia",
      "Asigne un ministerio",
      "warning"
    );
  }

  let extension = foto.split(".").pop();
  let nombreFoto = "";
  let f = new Date();
  if (foto.length > 0) {
    nombreFoto =
      "IMG_" +
      puesto +
      nivel +
      f.getDate() +
      "" +
      (f.getMonth() + 1) +
      "" +
      f.getFullYear() +
      "" +
      f.getHours() +
      "" +
      f.getMilliseconds() +
      "." +
      extension;
  }
  let formData = new FormData();
  let fotoobject = $("#txtFotoObrero")[0].files[0];

  formData.append("ci", ci.toUpperCase());
  formData.append("nombre", nombre.toUpperCase());
  formData.append("paterno", paterno.toUpperCase());
  formData.append("materno", materno.toUpperCase());
  formData.append("ministerio", ministerio.toUpperCase());
  formData.append("puesto", puesto.toUpperCase());
  formData.append("nombreFoto", nombreFoto);
  formData.append("foto", fotoobject);

  $.ajax({
    url: "../controller/obreros/controlador_obrero_registro.php",
    type: "POST",
    data: formData,
    contentType: false,
    processData: false,
    success: function (resp) {
      if (resp > 0) {

        if (resp == 1) {
          limpiarobreroregistro();
          Swal.fire(
            "Mensaje de confirmacion",
            "Nuevo obrero registrado",
            "success"
          ).then((value) => {
            $("#modal_registro_personal_obreros").modal("hide");

            tbl_personal_obreros.ajax.reload();
          });
        } else {
          Swal.fire(
            "Mensaje de advertencia",
            "Esta persona ya esta registrada en SISEVAL",
            "warning"
          );
        }
      } else {
        Swal.fire(
          "Mensaje de error",
          "No se pudo registrar a la persona",
          "error"
        );
      }
    },
  });
  return false;
}

function ModificarEstatus(id, estatus) {
  $.ajax({
    url: "../controller/obreros/controlador_modificar_obreros_estatus.php",
    type: "POST",
    data: {
      id: id,
      estatus: estatus,
    },
  }).done(function (resp) {
    if (resp > 0) {
      Swal.fire(
        "Mensaje de confirmacion",
        "Estado actualizado",
        "success"
      ).then((value) => {
        tbl_personal_obreros.ajax.reload();
      });
    } else {
      Swal.fire("Mensaje de error", "No se pudo cambiar el estado", "error");
    }
  });
}

function Modificar_Foto_Personal(tipo) {
  let id = document.getElementById("idObrero").value;
  let foto = document.getElementById("txtFotoObreroEditar").value;
  let rutaactual = document.getElementById("fotoactualObrero").value;

  //return alert(document.getElementById('txtUsuario').value.length);

  if (id.length == 0 || foto.length == 0) {
    //ValidarInput("txtUsuario","txtPassword");
    return Swal.fire(
      "Mensaje de advertencia",
      "Seleccione una foto por favor",
      "warning"
    );
  }

  let extension = foto.split(".").pop();
  let nombreFoto = "";
  let f = new Date();
  if (foto.length > 0) {
    nombreFoto =
      "IMG_OBRERO" +
      tipo +
      f.getDate() +
      "" +
      (f.getMonth() + 1) +
      "" +
      f.getFullYear() +
      "" +
      f.getHours() +
      "" +
      f.getMilliseconds() +
      "." +
      extension;
  }
  let formData = new FormData();
  let fotoobject = $("#txtFotoObreroEditar")[0].files[0];

  formData.append("id", id);
  formData.append("rutaactual", rutaactual);
  formData.append("nombreFoto", nombreFoto);
  formData.append("foto", fotoobject);

  $.ajax({
    url: "../controller/obreros/controlador_obreros_modificar_foto.php",
    type: "POST",
    data: formData,
    contentType: false,
    processData: false,
    success: function (resp) {
      if (resp > 0) {
        //LimpiarModalUsuario();
        Swal.fire(
          "Mensaje de confirmacion",
          "Foto actualizada",
          "success"
        ).then((value) => {
          document.getElementById("txtFotoObreroEditar").value = "";
          $("#modal_editar_foto_obrero").modal("hide");
          tbl_personal_obreros.ajax.reload();
        });
      } else {
        Swal.fire("Mensaje de error", "No se pudo actualizar la foto", "error");
        document.getElementById("txtFotoPerAdminEditar").value = "";
      }
    },
  });
  return false;
}

function ModificarPersonalObreros() {
  let ci = document.getElementById("txtCiObreroEditar").value;
  let nombre = document.getElementById("txtNombreObreroEditar").value;
  let paterno = document.getElementById("txtPaternoObreroEditar").value;
  let materno = document.getElementById("txtMaternoObreroEditar").value;
  let puesto = document.getElementById("txtPuestoObreroEditar").value;
  let ingreso = document.getElementById("txtIngresoObreroEditar").value;
  let salida = document.getElementById("txtSalidaObreroEditar").value;

  if (salida.length != 0) {
    var f1 = new Date(ingreso);
    var f2 = new Date(salida);
    if (f2 < f1){
      return Swal.fire(
        "Mensaje de advertencia",
        "La fecha de retiro no puede ser anterior a la fecha de ingreso",
        "warning"
      );
    }
  }

  $.ajax({
    url: "../controller/obreros/controlador_modificar_obreros.php",
    type: "POST",
    data: {
      ci: ci.toUpperCase(),
      nombre: nombre.toUpperCase(),
      paterno: paterno.toUpperCase(),
      materno: materno.toUpperCase(),
      puesto: puesto.toUpperCase(),
      ingreso: ingreso,
      salida:salida
    },
  }).done(function (resp) {
    if (resp > 0) {
      Swal.fire(
        "Mensaje de confirmacion",
        "Datos actualizados",
        "success"
      ).then((value) => {
        $("#modal_editar_personal_obreros").modal("hide");
        tbl_personal_obreros.ajax.reload();
      });
    } else {
      Swal.fire("Mensaje de error", "No se pudo actualizar los datos", "error");
    }
  });
}

function limpiarobreroregistro() {
  document.getElementById("txtCiObrero").value = "";
  document.getElementById("txtNombreObrero").value = "";
  document.getElementById("txtPaternoObrero").value = "";
  document.getElementById("txtMaternoObrero").value = "";
  document.getElementById("txtMinisterio").value = "";
  document.getElementById("txtPuestoObrero").value = "";
  document.getElementById("txtFotoObrero").value = "";
}
