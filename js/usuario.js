function Iniciar_sesion() {
  recuerdame();
  let usu = document.getElementById("txtUsuario").value;
  let pass = document.getElementById("txtPassword").value;

  if (usu.length == 0) {
    return Swal.fire("Mensaje de advertencia", "Ingrese su usuario", "warning");
  }

  if (pass.length == 0) {
    return Swal.fire(
      "Mensaje de advertencia",
      "Ingrese su contraseña",
      "warning"
    );
  }

  $.ajax({
    url: "controller/usuario/iniciar_sesion.php",
    type: "POST",
    data: {
      u: usu,
      p: pass,
    },
  }).done(function (resp) {
    console.log(resp);
    let data = JSON.parse(resp);
    if (data.length > 0) {
      if (data[0][3] == "INACTIVO") {
        return Swal.fire(
          "Mensaje de advertencia",
          "Usuario " +
            `<b>${usu.toUpperCase()}</b>` +
            " esta inactivo, contactese con el administrador",
          "warning"
        );
      }
      $.ajax({
        url: "controller/usuario/crear_sesion.php",
        type: "POST",
        data: {
          idusuario: data[0][0],
          usuario: data[0][1],
          nivel: data[0][4],
          foto: data[0][5],
          nombre: data[0][6],
          area:data[0][7]
        },
      }).done(function (r) {
        let timerInterval;
        Swal.fire({
          title: "Bienvenido al sistema",
          html: "Sera redireccionado en <b></b> milisegundos.",
          timer: 2000,
          heightAuto: false,
          timerProgressBar: true,
          allowOutsideClick: false,
          didOpen: () => {
            Swal.showLoading();
            const b = Swal.getHtmlContainer().querySelector("b");
            timerInterval = setInterval(() => {
              b.textContent = Swal.getTimerLeft();
            }, 100);
          },
          willClose: () => {
            clearInterval(timerInterval);
          },
        }).then((result) => {
          /* Read more about handling dismissals below */
          if (result.dismiss === Swal.DismissReason.timer) {
            location.reload();
          }
        });
      });
    } else {
      Swal.fire(
        "Mensaje de error",
        "Usuario o contrasena incorrectos",
        "error"
      );
    }
  });
}

function recuerdame() {
  if (
    rmcheck.checked &&
    usuarioinput.value !== "" &&
    passwordinput.value !== ""
  ) {
    localStorage.usuario = usuarioinput.value;
    localStorage.password = passwordinput.value;
    localStorage.checkbox = rmcheck.value;
  } else {
    localStorage.usuario = "";
    localStorage.password = "";
    localStorage.checkbox = "";
  }
}

var tbl_usuario_encar;
function listarUsuariosAdmin() {
  tbl_usuario_admin = $("#usuario_admin").DataTable({
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
      url: "../controller/usuario/controlador_usuario_admin_listar.php",
      type: "POST",
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
      { data: "usuario" },
      { data: "cargo_area" },
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
                        <a class="dropdown-item contra" href="#">Cambiar contraseña</a>
                        <a class="dropdown-item desactivar" href="#">Desactivar usuario</a>
                      </div>
          </div>`;
          } else {
            return `<div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuSizeButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        OPCIONES
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuSizeButton2">
                        <h6 class="dropdown-header">Opciones</h6>
                        <a class="dropdown-item contra" href="#">Cambiar contraseña</a>
                        <a class="dropdown-item activar" href="#">Activar usuario</a>
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

  tbl_usuario_admin.on("draw.td", function () {
    var PageInfo = $("#usuario_admin").DataTable().page.info();
    tbl_usuario_admin
      .column(0, { page: "current" })
      .nodes()
      .each(function (cell, i) {
        cell.innerHTML = i + 1 + PageInfo.start;
      });
  });
}

var tbl_usuario_encar;
function listarUsuariosEncar() {
  tbl_usuario_encar = $("#usuario_encar").DataTable({
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
      url: "../controller/usuario/controlador_usuario_encar_listar.php",
      type: "POST",
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
      { data: "usuario" },
      { data: "cargo_area" },
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
                        <a class="dropdown-item contra" href="#">Cambiar contraseña</a>
                        <a class="dropdown-item desactivar" href="#">Desactivar usuario</a>
                      </div>
          </div>`;
          } else {
            return `<div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuSizeButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        OPCIONES
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuSizeButton2">
                        <h6 class="dropdown-header">Opciones</h6>
                        <a class="dropdown-item contra" href="#">Cambiar contraseña</a>
                        <a class="dropdown-item activar" href="#">Activar usuario</a>
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

  tbl_usuario_encar.on("draw.td", function () {
    var PageInfo = $("#usuario_encar").DataTable().page.info();
    tbl_usuario_encar
      .column(0, { page: "current" })
      .nodes()
      .each(function (cell, i) {
        cell.innerHTML = i + 1 + PageInfo.start;
      });
  });
}

var tbl_select_administrativo;
function listarAdminSelect() {
  tbl_select_administrativo = $("#administrativos_select").DataTable({
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
      url: "../controller/usuario/controlador_admin_listar.php",
      type: "POST",
    },
    columns: [
      { defaultContent: "id" },
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
      { data: "nombre" },
      {
        data: "estado",
        render: function (data, type, row) {
          if (data == "ACTIVO") {
            return `<button type="button" class="btn btn-dark btn-rounded btn-icon selectAdmin" data-dismiss="modal">
                        <i class="ti-check"></i>
                    </button>`;
          } else
            return '<div class="dropdown dropup  custom-dropdown-icon"><a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink-3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg></a><div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink-3"><a class="dropdown-item editar" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg> Editar</a><a class="dropdown-item activar" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-check"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><polyline points="17 11 19 13 23 9"></polyline></svg> Activar usuario</a><a class="dropdown-item foto" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-image"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><circle cx="8.5" cy="8.5" r="1.5"></circle><polyline points="21 15 16 10 5 21"></polyline></svg> Cambiar foto</a><a class="dropdown-item contra" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-key"><path d="M21 2l-2 2m-7.61 7.61a5.5 5.5 0 1 1-7.778 7.778 5.5 5.5 0 0 1 7.777-7.777zm0 0L15.5 7.5m0 0l3 3L22 7l-3-3m-3.5 3.5L19 4"></path></svg> Cambiar contrasena</a></div></div>';
        },
        /* render: function(data,type,row){
                    if(data=='ACTIVO'){
                        return '<div class="dropdown dropup  custom-dropdown-icon"><a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink-3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg></a><div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink-3"><a class="dropdown-item editar" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg> Editar</a><a class="dropdown-item desactivar" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-x"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="18" y1="8" x2="23" y2="13"></line><line x1="23" y1="8" x2="18" y2="13"></line></svg> Desactivar usuario</a><a class="dropdown-item foto" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-image"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><circle cx="8.5" cy="8.5" r="1.5"></circle><polyline points="21 15 16 10 5 21"></polyline></svg> Cambiar foto</a><a class="dropdown-item contra" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-key"><path d="M21 2l-2 2m-7.61 7.61a5.5 5.5 0 1 1-7.778 7.778 5.5 5.5 0 0 1 7.777-7.777zm0 0L15.5 7.5m0 0l3 3L22 7l-3-3m-3.5 3.5L19 4"></path></svg> Cambiar contrasena</a></div></div>';
                    }else
                        return '<div class="dropdown dropup  custom-dropdown-icon"><a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink-3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg></a><div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink-3"><a class="dropdown-item editar" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg> Editar</a><a class="dropdown-item activar" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-check"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><polyline points="17 11 19 13 23 9"></polyline></svg> Activar usuario</a><a class="dropdown-item foto" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-image"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><circle cx="8.5" cy="8.5" r="1.5"></circle><polyline points="21 15 16 10 5 21"></polyline></svg> Cambiar foto</a><a class="dropdown-item contra" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-key"><path d="M21 2l-2 2m-7.61 7.61a5.5 5.5 0 1 1-7.778 7.778 5.5 5.5 0 0 1 7.777-7.777zm0 0L15.5 7.5m0 0l3 3L22 7l-3-3m-3.5 3.5L19 4"></path></svg> Cambiar contrasena</a></div></div>';
                } */
      },
    ],
    responsive: true,
    paging: false,
    ordering: true,
    info: false,
    searching: true,
    language: idioma_espanol,
    select: true,
  });

  tbl_select_administrativo.on("draw.td", function () {
    var PageInfo = $("#administrativos_select").DataTable().page.info();
    tbl_select_administrativo
      .column(0, { page: "current" })
      .nodes()
      .each(function (cell, i) {
        cell.innerHTML = i + 1 + PageInfo.start;
      });
  });
}

$("#administrativos_select").on("click", ".selectAdmin", function () {
  var data = tbl_select_administrativo.row($(this).parents("tr")).data();

  if (tbl_select_administrativo.row(this).child.isShown()) {
    var data = tbl_select_administrativo.row(this).data();
  }

  document.getElementById("txtIdAdmin").value = data["id"];
  document.getElementById("txtNombreAdmin").value = data["nombre"];
});


var tbl_select_encargado;
function listarEncarSelect() {
  tbl_select_encargado = $("#encargados_select").DataTable({
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
      url: "../controller/usuario/controlador_encar_listar.php",
      type: "POST",
    },
    columns: [
      { defaultContent: "id" },
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
      { data: "nombre" },
      {
        data: "estado",
        render: function (data, type, row) {
          if (data == "ACTIVO") {
            return `<button type="button" class="btn btn-dark btn-rounded btn-icon selectEncar" data-dismiss="modal">
                        <i class="ti-check"></i>
                    </button>`;
          } else
            return '<div class="dropdown dropup  custom-dropdown-icon"><a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink-3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg></a><div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink-3"><a class="dropdown-item editar" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg> Editar</a><a class="dropdown-item activar" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-check"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><polyline points="17 11 19 13 23 9"></polyline></svg> Activar usuario</a><a class="dropdown-item foto" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-image"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><circle cx="8.5" cy="8.5" r="1.5"></circle><polyline points="21 15 16 10 5 21"></polyline></svg> Cambiar foto</a><a class="dropdown-item contra" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-key"><path d="M21 2l-2 2m-7.61 7.61a5.5 5.5 0 1 1-7.778 7.778 5.5 5.5 0 0 1 7.777-7.777zm0 0L15.5 7.5m0 0l3 3L22 7l-3-3m-3.5 3.5L19 4"></path></svg> Cambiar contrasena</a></div></div>';
        },
      },
    ],
    responsive: true,
    paging: false,
    ordering: true,
    info: false,
    searching: true,
    language: idioma_espanol,
    select: true,
  });

  tbl_select_encargado.on("draw.td", function () {
    var PageInfo = $("#encargados_select").DataTable().page.info();
    tbl_select_encargado
      .column(0, { page: "current" })
      .nodes()
      .each(function (cell, i) {
        cell.innerHTML = i + 1 + PageInfo.start;
      });
  });
}

$("#encargados_select").on("click", ".selectEncar", function () {
  var data = tbl_select_encargado.row($(this).parents("tr")).data();

  if (tbl_select_encargado.row(this).child.isShown()) {
    var data = tbl_select_encargado.row(this).data();
  }

  document.getElementById("txtIdEncar").value = data["id"];
  document.getElementById("txtNombreEncar").value = data["nombre"];
});



var tbl_usuario;
function listarUsuarioServerSide() {
  tbl_usuario = $("#usuario_simple").DataTable({
    pageLength: 10,
    destroy: true,
    bProcessing: true,
    bDeferRender: true,
    bServerSide: true,
    sAjaxSource: "../controller/usuario/serverside/serversideUsuario.php",
    columns: [
      { defaultContent: "" },
      { data: 0 },
      { data: 8 },
      { data: 2 },
      { data: 6 },
      {
        data: 7,
        render: function (data, type, row) {
          return (
            '<img class="img-responsive" style="width:60px; height:60px; border-radius:50%;" src="../' +
            data +
            '">'
          );
        },
      },
      {
        data: 4,
        render: function (data, type, row) {
          if (data == "ACTIVO") {
            return '<span class="badge badge-success"> ACTIVO </span>';
          } else {
            return '<span class="badge badge-danger"> INACTIVO </span>';
          }
        },
      },
      {
        data: 4,
        render: function (data, type, row) {
          if (data == "ACTIVO") {
            return '<div class="dropdown dropup  custom-dropdown-icon"><a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink-3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg></a><div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink-3"><a class="dropdown-item editar" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg> Editar</a><a class="dropdown-item desactivar" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-x"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="18" y1="8" x2="23" y2="13"></line><line x1="23" y1="8" x2="18" y2="13"></line></svg> Desactivar usuario</a><a class="dropdown-item foto" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-image"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><circle cx="8.5" cy="8.5" r="1.5"></circle><polyline points="21 15 16 10 5 21"></polyline></svg> Cambiar foto</a><a class="dropdown-item contra" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-key"><path d="M21 2l-2 2m-7.61 7.61a5.5 5.5 0 1 1-7.778 7.778 5.5 5.5 0 0 1 7.777-7.777zm0 0L15.5 7.5m0 0l3 3L22 7l-3-3m-3.5 3.5L19 4"></path></svg> Cambiar contrasena</a></div></div>';
          } else
            return '<div class="dropdown dropup  custom-dropdown-icon"><a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink-3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg></a><div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink-3"><a class="dropdown-item editar" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg> Editar</a><a class="dropdown-item activar" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-check"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><polyline points="17 11 19 13 23 9"></polyline></svg> Activar usuario</a><a class="dropdown-item foto" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-image"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><circle cx="8.5" cy="8.5" r="1.5"></circle><polyline points="21 15 16 10 5 21"></polyline></svg> Cambiar foto</a><a class="dropdown-item contra" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-key"><path d="M21 2l-2 2m-7.61 7.61a5.5 5.5 0 1 1-7.778 7.778 5.5 5.5 0 0 1 7.777-7.777zm0 0L15.5 7.5m0 0l3 3L22 7l-3-3m-3.5 3.5L19 4"></path></svg> Cambiar contrasena</a></div></div>';
        },
      },
    ],
    responsive: true,

    dom: "Bfrtip",
    buttons: [
      {
        extend: "excelHtml5",
        text: "Excel",
        titleAttr: "Exportar a excel",
        className: "excelButton",
      },
      {
        extend: "pdfHtml5",
        text: "PDF",
        titleAttr: "Exportar a PDF",
        className: "pdfButton",
      },
    ],
    language: idioma_espanol,
    select: true,
  });

  tbl_usuario.on("draw.td", function () {
    var PageInfo = $("#usuario_simple").DataTable().page.info();
    tbl_usuario
      .column(0, { page: "current" })
      .nodes()
      .each(function (cell, i) {
        cell.innerHTML = i + 1 + PageInfo.start;
      });
  });
}

$("#usuario_simple").on("click", ".editar", function () {
  var data = tbl_usuario.row($(this).parents("tr")).data();

  if (tbl_usuario.row(this).child.isShown()) {
    var data = tbl_usuario.row(this).data();
  }

  $("#modal_editar_usuario").modal("show");
  document.getElementById("txtId_editar").value = data[0];
  document.getElementById("select_persona_editar").value = data[8];
  document.getElementById("txtUsuario_editar").value = data[2];
  //$("#select_nivel_editar").select2().val(data[5]).trigger('change.select2');
  document.getElementById("select_nivel_editar").value = data[5];
});

$("#usuario_admin").on("click", ".activar", function () {
  var data = tbl_usuario_admin.row($(this).parents("tr")).data();

  if (tbl_usuario_admin.row(this).child.isShown()) {
    var data = tbl_usuario_admin.row(this).data();
  }

  Swal.fire({
    title: "Estas seguro de cambiar el estado a ACTIVO del usuario?",
    text: "Una vez realizado esto el usuario tendra acceso al sistema",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, confirmar",
  }).then((result) => {
    if (result.isConfirmed) {
      ModificarEstatus(data["id"], "ACTIVO","A");
    }
  });
});

$("#usuario_admin").on("click", ".desactivar", function () {
  var data = tbl_usuario_admin.row($(this).parents("tr")).data();

  if (tbl_usuario_admin.row(this).child.isShown()) {
    var data = tbl_usuario_admin.row(this).data();
  }

  Swal.fire({
    title: "Estas seguro de cambiar el estado a INACTIVO del usuario?",
    text: "Una vez realizado esto el usuario no tendra acceso al sistema",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, confirmar",
  }).then((result) => {
    if (result.isConfirmed) {
      ModificarEstatus(data["id"], "INACTIVO","A");
    }
  });
});

$("#usuario_encar").on("click", ".activar", function () {
  var data = tbl_usuario_encar.row($(this).parents("tr")).data();

  if (tbl_usuario_encar.row(this).child.isShown()) {
    var data = tbl_usuario_encar.row(this).data();
  }

  Swal.fire({
    title: "Estas seguro de cambiar el estado a ACTIVO del usuario?",
    text: "Una vez realizado esto el usuario tendra acceso al sistema",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, confirmar",
  }).then((result) => {
    if (result.isConfirmed) {
      ModificarEstatus(data["id"], "ACTIVO", "E");
    }
  });
});

$("#usuario_encar").on("click", ".desactivar", function () {
  var data = tbl_usuario_encar.row($(this).parents("tr")).data();

  if (tbl_usuario_encar.row(this).child.isShown()) {
    var data = tbl_usuario_encar.row(this).data();
  }

  Swal.fire({
    title: "Estas seguro de cambiar el estado a INACTIVO del usuario?",
    text: "Una vez realizado esto el usuario no tendra acceso al sistema",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, confirmar",
  }).then((result) => {
    if (result.isConfirmed) {
      ModificarEstatus(data["id"], "INACTIVO", "E");
    }
  });
});


$("#usuario_simple").on("click", ".foto", function () {
  var data = tbl_usuario.row($(this).parents("tr")).data();

  if (tbl_usuario.row(this).child.isShown()) {
    var data = tbl_usuario.row(this).data();
  }

  $("#modal_editar_foto").modal("show");
  document.getElementById("idusuariofoto").value = data[0];
  document.getElementById("lblUsuario").innerHTML = data[8];
  document.getElementById("fotoactual").value = data[7];
});

$("#usuario_admin").on("click", ".contra", function () {
  var data = tbl_usuario_admin.row($(this).parents("tr")).data();

  if (tbl_usuario_admin.row(this).child.isShown()) {
    var data = tbl_usuario_admin.row(this).data();
  }

  $("#modal_editar_contra").modal("show");
  document.getElementById("IdUsuarioContra").value = data["id"];
  document.getElementById("lblUsuarioContra").innerHTML = data["usuario"].toUpperCase();
});

$("#usuario_encar").on("click", ".contra", function () {
  var data = tbl_usuario_encar.row($(this).parents("tr")).data();

  if (tbl_usuario_encar.row(this).child.isShown()) {
    var data = tbl_usuario_encar.row(this).data();
  }

  $("#modal_editar_contra").modal("show");
  document.getElementById("IdUsuarioContra").value = data["id"];
  document.getElementById("lblUsuarioContra").innerHTML = data["usuario"].toUpperCase();
});


function AbrirModalRegistroUsuario() {
  $("#modal_registro_usuario").modal({ backdrop: "static", keyboard: false });
  $("#modal_registro_usuario").modal("show");
}

function AbrirModalRegistroUsuario2() {
  //$("#seleccionaAdministrativo").modal({ backdrop: "static", keyboard: false });
  $("#seleccionaAdministrativo").modal("show");
}

function AbrirModalRegistroUsuarioEncar() {
  $("#modal_registro_usuario").modal({ backdrop: "static", keyboard: false });
  $("#modal_registro_usuario").modal("show");
}

function AbrirModalRegistroUsuarioEncar2() {
  //$("#seleccionaEncargado").modal({ backdrop: "static", keyboard: false });
  $("#seleccionaEncargado").modal("show");
}


function Registrar_Usuario_Admin() {
  let id = document.getElementById("txtIdAdmin").value;
  let usuario = document.getElementById("txtUsuarioAdmin").value;
  let password = document.getElementById("txtPassAdmin").value;
  

  let passwordConfirm = document.getElementById("txtPassAdminConfirm").value;

  if (id.length == 0) {
    return Swal.fire(
      "Mensaje de advertencia",
      "Seleccione una persona por favor",
      "warning"
    );
  }

  if (usuario.length == 0) {
    return Swal.fire("Mensaje de advertencia", "Ingrese un usuario", "warning");
  } else if (usuario.length < 7) {
    return Swal.fire(
      "Mensaje de advertencia",
      "El usuario debe tener 7 o más caracteres",
      "warning"
    );
  }

  if (password.length == 0) {
    return Swal.fire(
      "Mensaje de advertencia",
      "Debe asignar una contraseña",
      "warning"
    );
  } else if (password.length < 7) {
    return Swal.fire(
      "Mensaje de advertencia",
      "La contraseña debe tener 7 o más caracteres",
      "warning"
    );
  }

  if(password!=passwordConfirm){
    return Swal.fire(
      "Mensaje de advertencia",
      "Las contraseñas no coinciden, revise por favor",
      "warning"
    );
  }

  let nivel = "ADMINISTRATIVO";

  let formData = new FormData();

  formData.append("id", id);
  formData.append("u", usuario);
  formData.append("p", password);
  formData.append("n", nivel);

  $.ajax({
    url: "../controller/usuario/controlador_usuario_registro.php",
    type: "POST",
    data: formData,
    contentType: false,
    processData: false,
    success: function (resp) {
      if (resp > 0) {
        if (resp == 1) {
          limpiarregistroadmin();
          Swal.fire(
            "Mensaje de confirmacion",
            "Nuevo usuario registrado",
            "success"
          ).then((value) => {

            $("#modal_registro_usuario").modal("hide");
            tbl_usuario_admin.ajax.reload();
          });
        } else {
          Swal.fire(
            "Mensaje de advertencia",
            "El usuario ya existe, asigne otro",
            "warning"
          );
        }
      } else {
        Swal.fire(
          "Mensaje de error",
          "Esta persona ya tiene una cuenta asignada",
          "error"
        );
      }
    },
  });
  return false;
}

function Registrar_Usuario_Encar() {
  let id = document.getElementById("txtIdEncar").value;
  let usuario = document.getElementById("txtUsuarioEncar").value;
  let password = document.getElementById("txtPassEncar").value;

  let passwordConfirm = document.getElementById("txtPassEncarConfirm").value;

  if (id.length == 0) {
    return Swal.fire(
      "Mensaje de advertencia",
      "Seleccione una persona por favor",
      "warning"
    );
  }

  if (usuario.length == 0) {
    return Swal.fire("Mensaje de advertencia", "Ingrese un usuario", "warning");
  } else if (usuario.length < 7) {
    return Swal.fire(
      "Mensaje de advertencia",
      "El usuario debe tener 7 o más caracteres",
      "warning"
    );
  }

  if (password.length == 0) {
    return Swal.fire(
      "Mensaje de advertencia",
      "Debe asignar una contraseña",
      "warning"
    );
  } else if (password.length < 7) {
    return Swal.fire(
      "Mensaje de advertencia",
      "La contraseña debe tener 7 o más caracteres",
      "warning"
    );
  }

  if(password!=passwordConfirm){
    return Swal.fire(
      "Mensaje de advertencia",
      "Las contraseñas no coinciden, revise por favor",
      "warning"
    );
  }



  let nivel = "ENCARGADO";

  let formData = new FormData();

  formData.append("id", id);
  formData.append("u", usuario);
  formData.append("p", password);
  formData.append("n", nivel);

  $.ajax({
    url: "../controller/usuario/controlador_usuario_registro.php",
    type: "POST",
    data: formData,
    contentType: false,
    processData: false,
    success: function (resp) {
      if (resp > 0) {
        if (resp == 1) {
          limpiarregistroencar();
          Swal.fire(
            "Mensaje de confirmacion",
            "Nuevo usuario registrado",
            "success"
          ).then((value) => {
            $("#modal_registro_usuario").modal("hide");
            tbl_usuario_encar.ajax.reload();
          });
        } else {
          Swal.fire(
            "Mensaje de advertencia",
            "El usuario ya existe, asigne otro",
            "warning"
          );
        }
      } else {
        Swal.fire(
          "Mensaje de error",
          "Esta persona ya tiene una cuenta asignada",
          "error"
        );
      }
    },
  });
  return false;
}

function ValidarInput(usuario, password) {
  Boolean(document.getElementById(usuario).value.length > 0)
    ? $("#" + usuario)
        .removeClass("is-invalid")
        .addClass("is-valid")
    : $("#" + usuario).addClass("is-invalid");

  Boolean(document.getElementById(password).value.length > 0)
    ? $("#" + password)
        .removeClass("is-invalid")
        .addClass("is-valid")
    : $("#" + password).addClass("is-invalid");
}

function LimpiarModalUsuario() {
  document.getElementById("select_persona").value = "";
  document.getElementById("txtUsuario").value = "";
  document.getElementById("txtPassword").value = "";
  document.getElementById("select_nivel").value = "";
  document.getElementById("txtFoto").value = "";
}

function ModificarUsuario() {
  let id = document.getElementById("txtId_editar").value;
  let nivel = document.getElementById("select_nivel_editar").value;
  if (nivel.length == 0 || id.length == 0) {
    //ValidarInput("txtUsuario","txtPassword");
    return Swal.fire(
      "Mensaje de advertencia",
      "Tiene algunos campos vacios",
      "warning"
    );
  }
  $.ajax({
    url: "../controller/usuario/controlador_modificar_usuario.php",
    type: "POST",
    data: {
      id: id,
      nivel: nivel,
    },
  }).done(function (resp) {
    if (resp > 0) {
      Swal.fire(
        "Mensaje de confirmacion",
        "Datos actualizados",
        "success"
      ).then((value) => {
        $("#modal_editar_usuario").modal("hide");
        tbl_usuario.ajax.reload();
      });
    } else {
      Swal.fire("Mensaje de error", "No se pudo actualizar los datos", "error");
    }
  });
}

function ModificarEstatus(id, estatus, tipoUsu) {
  if(tipoUsu == "A"){
    $.ajax({
      url: "../controller/usuario/controlador_modificar_usuario_estatus.php",
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
          tbl_usuario_admin.ajax.reload();
        });
      } else {
        Swal.fire("Mensaje de error", "No se pudo cambiar el estado", "error");
      }
    });
  }else{
    $.ajax({
      url: "../controller/usuario/controlador_modificar_usuario_estatus.php",
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
          tbl_usuario_encar.ajax.reload();
        });
      } else {
        Swal.fire("Mensaje de error", "No se pudo cambiar el estado", "error");
      }
    });
  }
  
}

function Modificar_Foto_Usuario() {
  let id = document.getElementById("idusuariofoto").value;
  let foto = document.getElementById("txtFotoEditar").value;
  let rutaactual = document.getElementById("fotoactual").value;

  //return alert(document.getElementById('txtUsuario').value.length);

  if (id.length == 0 || foto.length == 0) {
    //ValidarInput("txtUsuario","txtPassword");
    return Swal.fire(
      "Mensaje de advertencia",
      "Tiene algunos campos vacios",
      "warning"
    );
  }

  let extension = foto.split(".").pop();
  let nombreFoto = "";
  let f = new Date();
  if (foto.length > 0) {
    nombreFoto =
      "IMG" +
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
  let fotoobject = $("#txtFotoEditar")[0].files[0];

  formData.append("id", id);
  formData.append("rutaactual", rutaactual);
  formData.append("nombreFoto", nombreFoto);
  formData.append("foto", fotoobject);

  $.ajax({
    url: "../controller/usuario/controlador_usuario_modificar_foto.php",
    type: "POST",
    data: formData,
    contentType: false,
    processData: false,
    success: function (resp) {
      if (resp > 0) {
        LimpiarModalUsuario();
        Swal.fire(
          "Mensaje de confirmacion",
          "Foto actualizada",
          "success"
        ).then((value) => {
          document.getElementById("txtFotoEditar").value = "";
          $("#modal_editar_foto").modal("hide");
          tbl_usuario.ajax.reload();
        });
      } else {
        Swal.fire("Mensaje de error", "No se pudo actualizar la foto", "error");
      }
    },
  });
  return false;
}

function Modificar_Contra_Usuario() {
  let id = document.getElementById("IdUsuarioContra").value;
  let contranueva = document.getElementById("txtPassAdminEditar").value;
  let contrarepetir = document.getElementById("txtPassAdminConfirmEditar").value;

  if (contranueva.length == 0) {
    return Swal.fire(
      "Mensaje de advertencia",
      "Debe asignar una contraseña",
      "warning"
    );
  } else if (contranueva.length < 7) {
    return Swal.fire(
      "Mensaje de advertencia",
      "La contraseña debe tener 7 o más caracteres",
      "warning"
    );
  }
  if (contranueva != contrarepetir) {
    return Swal.fire(
      "Mensaje de advertencia",
      "Las contraseñas no coinciden",
      "warning"
    );
  }

  $.ajax({
    url: "../controller/usuario/controlador_modificar_usuario_contra.php",
    type: "POST",
    data: {
      id: id,
      contranueva: contranueva,
    },
  }).done(function (resp) {
    if (resp > 0) {
      Swal.fire(
        "Mensaje de confirmacion",
        "Contraseña actualizada",
        "success"
      ).then((value) => {
        document.getElementById("IdUsuarioContra").value = "";
        document.getElementById("txtPassAdminEditar").value = "";
        document.getElementById("txtPassAdminConfirmEditar").value = "";
        $("#modal_editar_contra").modal("hide");
        tbl_usuario_admin.ajax.reload();
      });
    } else {
      Swal.fire(
        "Mensaje de error",
        "No se pudo cambiar la contraseña",
        "error"
      );
    }
  });
}

function mostrarNotificaciones() {
  $.ajax({
    url: "../controller/usuario/controlador_traer_notificacion.php",
    type: "POST",
  }).done(function (resp) {
    let data = JSON.parse(resp);
    let llenardata = "";
    let alertnoti = "";
    if (data.length > 0) {
      //alertnoti=`<span class="badge badge-success"></span>`;
      alertnoti = `<span class="badge badge-danger spinner-grow spinner-grow-sm"></span>`;
      //alertnoti=`<span class="spinner-grow" role="status"></span>`;

      document.getElementById("existnoti").innerHTML = alertnoti;
      for (let i = 0; i < data.length; i++) {
        llenardata += `<div class="dropdown-item" ><div class="media server-log"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-server"><rect x="2" y="2" width="20" height="8" rx="2" ry="2"></rect><rect x="2" y="14" width="20" height="8" rx="2" ry="2"></rect><line x1="6" y1="6" x2="6" y2="6"></line><line x1="6" y1="18" x2="6" y2="18"></line></svg><div class="media-body"><div class="data-info"><p class="" style="font-size: 0.8rem;"><b style="font-weight: bold; color: black;">Congregante:</b> ${data[i][1]}</p><p class="" style="font-size: 0.8rem;"><b style="font-weight: bold; color: black;">Visitante:</b> ${data[i][2]}</p><p class="" style="font-size: 0.8rem;"><b style="font-weight: bold; color: black;">Fecha:</b> ${data[i][3]}</p></div><div class="icon-status"></div></div></div></div>`;
      }
      document.getElementById("notifi").innerHTML = llenardata;
    } else {
      llenardata += `<div class="dropdown-item">
            <div class="media ">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart">
                    <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                </svg>
                <div class="media-body">
                    <div class="data-info">
                        <h6 class="" style="font-weight: bold; color:black;">No hay visitas pendientes</h6>
                    </div>
                </div>
            </div>
          </div>`;
      document.getElementById("notifi").innerHTML = llenardata;
    }
  });
}

function cambiarContraPersonal(){
  $("#modal_editar_contra").modal("show");
}

function Modificar_Contra_UsuarioActual() {
  let contranueva = document.getElementById("txtPassAdminEditarActual").value;
  let contrarepetir = document.getElementById("txtPassAdminConfirmEditarActual").value;


  if (contranueva.length == 0) {
    return Swal.fire(
      "Mensaje de advertencia",
      "Debe asignar una contraseña",
      "warning"
    );
  } else if (contranueva.length < 7) {
    return Swal.fire(
      "Mensaje de advertencia",
      "La contraseña debe tener 7 o más caracteres",
      "warning"
    );
  }

  if (contranueva != contrarepetir) {
    return Swal.fire(
      "Mensaje de advertencia",
      "Las contraseñas no coinciden",
      "warning"
    );
  }

  $.ajax({
    url: "../controller/usuario/controlador_modificar_usuario_contra_actual.php",
    type: "POST",
    data: {
      contranueva: contranueva
    },
  }).done(function (resp) {
    if (resp > 0) {
      Swal.fire(
        "Mensaje de confirmacion",
        "Contraseña actualizada",
        "success"
      ).then((value) => {
        document.getElementById("txtPassAdminEditarActual").value = "";
        document.getElementById("txtPassAdminConfirmEditarActual").value = "";
        $("#modal_editar_contra_usuactual").modal("hide");
      });
    } else {
      Swal.fire(
        "Mensaje de error",
        "No se pudo cambiar la contraseña",
        "error"
      );
    }
  });
}


function listarHabilitacion() {
  $.ajax({
    url: "../controller/evaluacion/controlador_listar_config.php",
    type: "POST",
  }).done(function (resp) {
    let data = JSON.parse(resp);
    if (data.length > 0) {
      if (data[0][1] == "HABILITADO") {
        document.getElementById("btnEvaluacion").innerHTML=`<li class="nav-item"> <a class="nav-link" href="#" onclick="cargar_contenido('main','evaluacion/mantenimiento_evaluacion.php')">Obreros</a></li>`;
      }else{
        document.getElementById("btnEvaluacion").innerHTML=`<li class="nav-item"> <a class="nav-link" href="#" onclick="mostrarMensaje()">Obreros</a></li>`;
      }
    } else {
      Swal.fire("Mensaje de error", "Error, contactese con sistemas", "error");
    }
  });
}

function datosdash() {
  $.ajax({
    url: "../controller/evaluacion/listar_dash.php",
    type: "POST",
  }).done(function (resp) {
    let data = JSON.parse(resp);



    document.getElementById("totalUsuarios").innerHTML=data[0][0];
    document.getElementById("totalAdministrativos").innerHTML=data[0][1];
    document.getElementById("totalEncargados").innerHTML=data[0][2];
    document.getElementById("totalObreros").innerHTML=data[0][3];
    


  });
}

function mostrarMensaje(){
  return Swal.fire(
    "Mensaje de Información",
    "Las evaluaciones están deshabilitadas por el momento",
    "warning"
  );
}

function limpiarregistroadmin(){
  document.getElementById("txtIdAdmin").value="";
  document.getElementById("txtUsuarioAdmin").value="";
  document.getElementById("txtPassAdmin").value=""; 
  document.getElementById("txtPassAdminConfirm").value="";
}

function limpiarregistroencar(){
  document.getElementById("txtIdEncar").value="";
  document.getElementById("txtUsuarioEncar").value="";
  document.getElementById("txtPassEncar").value=""; 
  document.getElementById("txtPassEncarConfirm").value="";
}




