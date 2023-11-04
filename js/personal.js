var tbl_personal_admin;
function listarPersonalAdmin() {

  tbl_personal_admin = $("#personal_admin").DataTable({
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
      url: "../controller/personal/controlador_personal_admin_listar.php",
      type: "POST"
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
      { data: "cargo_area" },
      { data: "nivel" },
      {data:"ingreso"},
      {
        data: "retiro",
        render: function (data, type, row) {
          if(data == "" || data == null || data=="0000-00-00"){
            return ("SIN FECHA");
          } else{
            return (data);
          }
        },
      },
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

  tbl_personal_admin.on("draw.td", function () {
    var PageInfo = $("#personal_admin").DataTable().page.info();
    tbl_personal_admin
      .column(0, { page: "current" })
      .nodes()
      .each(function (cell, i) {
        cell.innerHTML = i + 1 + PageInfo.start;
      });
  });
}

var tbl_personal_encar;
function listarPersonalEncar() {

  tbl_personal_encar = $("#personal_encar").DataTable({
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
      url: "../controller/personal/controlador_personal_encar_listar.php",
      type: "POST"
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
      { data: "cargo_area" },
      { data: "nivel" },
      {data:"ingreso"},
      {
        data: "retiro",
        render: function (data, type, row) {
          if(data == "" || data == null || data=="0000-00-00"){
            return ("SIN FECHA");
          } else{
            return (data);
          }
        },
      },
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

  tbl_personal_encar.on("draw.td", function () {
    var PageInfo = $("#personal_encar").DataTable().page.info();
    tbl_personal_encar
      .column(0, { page: "current" })
      .nodes()
      .each(function (cell, i) {
        cell.innerHTML = i + 1 + PageInfo.start;
      });
  });
}



$("#personal_admin").on("click", ".activar", function () {
    var data = tbl_personal_admin.row($(this).parents("tr")).data();
  
    if (tbl_personal_admin.row(this).child.isShown()) {
      var data = tbl_personal_admin.row(this).data();
    }
  
    Swal.fire({
      title: "Estas seguro de cambiar el estado a ACTIVO del personal?",
      text: "Una vez realizado esto el personal estara activo",
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
  
$("#personal_admin").on("click", ".desactivar", function () {
    var data = tbl_personal_admin.row($(this).parents("tr")).data();
  
    if (tbl_personal_admin.row(this).child.isShown()) {
      var data = tbl_personal_admin.row(this).data();
    }
  
    Swal.fire({
      title: "Estas seguro de cambiar el estado a INACTIVO del personal?",
      text: "Una vez realizado esto el personal estara inactivo",
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

$("#personal_encar").on("click", ".activar", function () {
  var data = tbl_personal_encar.row($(this).parents("tr")).data();

  if (tbl_personal_encar.row(this).child.isShown()) {
    var data = tbl_personal_encar.row(this).data();
  }

  Swal.fire({
    title: "Estas seguro de cambiar el estado a ACTIVO del personal?",
    text: "Una vez realizado esto el personal estara activo",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, confirmar",
  }).then((result) => {
    if (result.isConfirmed) {
      
      ModificarEstatus(data["id"], "ACTIVO","E");
    }
  });
});

$("#personal_encar").on("click", ".desactivar", function () {
  var data = tbl_personal_encar.row($(this).parents("tr")).data();

  if (tbl_personal_encar.row(this).child.isShown()) {
    var data = tbl_personal_encar.row(this).data();
  }

  Swal.fire({
    title: "Estas seguro de cambiar el estado a INACTIVO del personal?",
    text: "Una vez realizado esto el personal estara inactivo",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, confirmar",
  }).then((result) => {
    if (result.isConfirmed) {
      ModificarEstatus(data["id"], "INACTIVO","E");
    }
  });
});

$("#personal_admin").on("click", ".foto", function () {
    var data = tbl_personal_admin.row($(this).parents("tr")).data();
  
    if (tbl_personal_admin.row(this).child.isShown()) {
      var data = tbl_personal_admin.row(this).data();
    }
  
    $("#modal_editar_foto_admin").modal("show");
    document.getElementById("idUsuarioAdmin").value = data["id"];
    document.getElementById("lblUsuarioAdmin").innerHTML = data["nombre"];
    document.getElementById("fotoactualAdmin").value = data["foto"];
});

$("#personal_encar").on("click", ".foto", function () {
  var data = tbl_personal_encar.row($(this).parents("tr")).data();

  if (tbl_personal_encar.row(this).child.isShown()) {
    var data = tbl_personal_encar.row(this).data();
  }

  $("#modal_editar_foto_admin").modal("show");
  document.getElementById("idUsuarioAdmin").value = data["id"];
  document.getElementById("lblUsuarioAdmin").innerHTML = data["nombre"];
  document.getElementById("fotoactualAdmin").value = data["foto"];
});

$("#personal_admin").on("click", ".editar", function () {
  var data = tbl_personal_admin.row($(this).parents("tr")).data();

  if (tbl_personal_admin.row(this).child.isShown()) {
    var data = tbl_personal_admin.row(this).data();
  }

  $("#modal_editar_personal_admin").modal("show");
  document.getElementById('txtCiPerAdminEditar').value = data["id"];

  const Nombre = data["nombre"];
  const arrayNombre=Nombre.split(' ');


  document.getElementById('txtNombrePerAdminEditar').value=arrayNombre[0];
  document.getElementById('txtPaternoPerAdminEditar').value=arrayNombre[1];
  document.getElementById('txtMaternoPerAdminEditar').value=arrayNombre[2];
  document.getElementById('txtCargoPerAdminEditar').value=data["cargo_area"];
  document.getElementById('txtIngresoEditarPersonal').value=data["ingreso"];
  document.getElementById('txtSalidaEditarPersonal').value=data["salida"];

});

$("#personal_encar").on("click", ".editar", function () {
  var data = tbl_personal_encar.row($(this).parents("tr")).data();

  if (tbl_personal_encar.row(this).child.isShown()) {
    var data = tbl_personal_encar.row(this).data();
  }

  $("#modal_editar_personal_admin").modal("show");
  document.getElementById('txtCiPerAdminEditar').value = data["id"];

  const Nombre = data["nombre"];
  const arrayNombre=Nombre.split(' ');


  document.getElementById('txtNombrePerAdminEditar').value=arrayNombre[0];
  document.getElementById('txtPaternoPerAdminEditar').value=arrayNombre[1];
  document.getElementById('txtMaternoPerAdminEditar').value=arrayNombre[2];
  document.getElementById('txtCargoPerAdminEditar').value=data["cargo_area"];
  document.getElementById('txtIngresoEditarPersonal').value=data["ingreso"];
  document.getElementById('txtSalidaEditarPersonal').value=data["salida"];

});


function AbrirModalRegistroPersonal() {
    $("#modal_registro_personal_admin").modal({ backdrop: "static", keyboard: false });
    $("#modal_registro_personal_admin").modal("show");
}

function Registrar_Personal_Admin(tipo){
    let ci = document.getElementById('txtCiPerAdmin').value;
    let nombre = document.getElementById('txtNombrePerAdmin').value;
    let paterno = document.getElementById('txtPaternoPerAdmin').value;
    let materno = document.getElementById('txtMaternoPerAdmin').value;
    let cargo = document.getElementById('txtCargoPerAdmin').value;
    let foto = document.getElementById('txtFotoPerAdmin').value;
    let ingreso = document.getElementById('txtIngresoObrero').value;
    let salida = document.getElementById('txtSalidaObrero').value;


    if(ci.length==0){
        return Swal.fire("Mensaje de advertencia","Ingreso su CI (Solo numeros)","warning");
    }

    if(nombre.length==0){
        return Swal.fire("Mensaje de advertencia","Ingrese el nombre, por favor","warning");
    }
    if(paterno.length==0){
        return Swal.fire("Mensaje de advertencia","Ingrese el apellido paterno, por favor","warning");
    }

    if(cargo.length==0){
        return Swal.fire("Mensaje de advertencia","Asigne un cargo de administrativo","warning");
    }

    if (ingreso.length == 0) {
      return Swal.fire(
        "Mensaje de advertencia",
        "Ingrese la fecha de ingreso al trabajo, por favor",
        "warning"
      );
    }
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

    if(tipo=='A')
      var nivel="ADMINISTRATIVO";
    else
      var nivel="ENCARGADO";

    let extension = foto.split('.').pop();
    let nombreFoto="";
    let f = new Date();
    if(foto.length>0){
        nombreFoto="IMG_"+nivel+f.getDate()+""+(f.getMonth()+1)+""+f.getFullYear()+""+f.getHours()+""+f.getMilliseconds()+"."+extension;
    }
    let formData = new FormData();
    let fotoobject= $("#txtFotoPerAdmin")[0].files[0];

    formData.append('ci',ci.toUpperCase());
    formData.append('nombre',nombre.toUpperCase());
    formData.append('paterno',paterno.toUpperCase());
    formData.append('materno',materno.toUpperCase());
    formData.append('cargo',cargo.toUpperCase());
    formData.append('nivel',nivel.toUpperCase());
    formData.append('ingreso',ingreso);
    formData.append('salida',salida);
    formData.append('nombreFoto',nombreFoto);
    formData.append('foto',fotoobject)
    
    $.ajax({
        url: '../controller/personal/controlador_personal_registro.php',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function(resp){
            if(resp>0){
                if(resp==1){
                    limpiarregistro();
                    Swal.fire("Mensaje de confirmacion","Nuevo personal registrado","success").
                    then((value)=>{

                        $("#modal_registro_personal_admin").modal('hide');
                        if(tipo=='A'){
                          tbl_personal_admin.ajax.reload();
                        }else{
                          tbl_personal_encar.ajax.reload();
                        }
                    });
                }
                else{
                    Swal.fire("Mensaje de advertencia","Esta persona ya esta registrada en SISEVAL","warning");
                }
            }
            else{
                Swal.fire("Mensaje de error","No se pudo registrar a la persona","error");
            }
        }
    });
    return false;

}

function ModificarEstatus(id, estatus, tipoUsu) {
    if(tipoUsu == "A"){
      $.ajax({
        url: "../controller/personal/controlador_modificar_personal_estatus.php",
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
            tbl_personal_admin.ajax.reload();
          });
        } else {
          Swal.fire("Mensaje de error", "No se pudo cambiar el estado", "error");
        }
      });
    }else{
      $.ajax({
        url: "../controller/personal/controlador_modificar_personal_estatus.php",
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
            tbl_personal_encar.ajax.reload();
          });
        } else {
          Swal.fire("Mensaje de error", "No se pudo cambiar el estado", "error");
        }
      });
    }
    
}

function Modificar_Foto_Personal(tipo) {
    let id = document.getElementById("idUsuarioAdmin").value;
    let foto = document.getElementById("txtFotoPerAdminEditar").value;
    let rutaactual = document.getElementById("fotoactualAdmin").value;
  
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
        "IMG"+tipo+
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
    let fotoobject = $("#txtFotoPerAdminEditar")[0].files[0];
  
    formData.append("id", id);
    formData.append("rutaactual", rutaactual);
    formData.append("nombreFoto", nombreFoto);
    formData.append("foto", fotoobject);
  
    $.ajax({
      url: "../controller/personal/controlador_personal_modificar_foto.php",
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
            document.getElementById("txtFotoPerAdminEditar").value = "";
            $("#modal_editar_foto_admin").modal("hide");
            tipo=='ADMINISTRATIVO' ?
            tbl_personal_admin.ajax.reload():
            tbl_personal_encar.ajax.reload();
          });
        } else {
          Swal.fire("Mensaje de error", "No se pudo actualizar la foto", "error");
          document.getElementById("txtFotoPerAdminEditar").value = "";
        }
      },
    });
    return false;
}

function ModificarPersonalAdmin(tipo) {

  let ci = document.getElementById('txtCiPerAdminEditar').value;
  let nombre = document.getElementById('txtNombrePerAdminEditar').value;
  let paterno = document.getElementById('txtPaternoPerAdminEditar').value;
  let materno = document.getElementById('txtMaternoPerAdminEditar').value;
  let cargo = document.getElementById('txtCargoPerAdminEditar').value;
  let ingreso = document.getElementById('txtIngresoEditarPersonal').value;
  let salida = document.getElementById('txtSalidaEditarPersonal').value;


  if (ingreso.length == 0) {
    return Swal.fire(
      "Mensaje de advertencia",
      "Ingrese la fecha de ingreso al trabajo, por favor",
      "warning"
    );
  }
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
    url: "../controller/personal/controlador_modificar_personal.php",
    type: "POST",
    data: {
      ci:ci.toUpperCase(),
      nombre:nombre.toUpperCase(),
      paterno:paterno.toUpperCase(),
      materno:materno.toUpperCase(),
      cargo:cargo.toUpperCase(),
      ingreso:ingreso,
      salida:salida
    },
  }).done(function (resp) {
    if (resp > 0) {
      Swal.fire(
        "Mensaje de confirmacion",
        "Datos actualizados",
        "success"
      ).then((value) => {
        $("#modal_editar_personal_admin").modal("hide");
        tipo=='A' ?
        tbl_personal_admin.ajax.reload():
        tbl_personal_encar.ajax.reload();
      });
    } else {
      Swal.fire("Mensaje de error", "No se pudo actualizar los datos", "error");
    }
  });
}

function limpiarregistro(){
  document.getElementById('txtCiPerAdmin').value="";
  document.getElementById('txtNombrePerAdmin').value="";
  document.getElementById('txtPaternoPerAdmin').value="";
  document.getElementById('txtMaternoPerAdmin').value="";
  document.getElementById('txtCargoPerAdmin').value="";
  document.getElementById('txtFotoPerAdmin').value="";
}

