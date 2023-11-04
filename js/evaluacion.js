function validarArea(area_enviado) {
  if (area_enviado === "MAESTRANZA") {
    listarObrerosSelect(area_enviado);
  }
  if (area_enviado === "ESTIBADO") {
    listarObrerosSelect(area_enviado);
  }
}

function mySumador() {
  let pts = 0;

  let radios1 = document.getElementsByName("preg1");
  for (let radio of radios1) {
    if (radio.checked) {
      pts += Math.floor(radio.value);
    }
  }

  let radios2 = document.getElementsByName("preg2");
  for (let radio of radios2) {
    if (radio.checked) {
      pts += Math.floor(radio.value);
    }
  }

  let radios3 = document.getElementsByName("preg3");
  for (let radio of radios3) {
    if (radio.checked) {
      pts += Math.floor(radio.value);
    }
  }

  let radios4 = document.getElementsByName("preg4");
  for (let radio of radios4) {
    if (radio.checked) {
      pts += Math.floor(radio.value);
    }
  }

  let radios5 = document.getElementsByName("preg5");
  for (let radio of radios5) {
    if (radio.checked) {
      pts += Math.floor(radio.value);
    }
  }
  let radios6 = document.getElementsByName("preg6");
  for (let radio of radios6) {
    if (radio.checked) {
      pts += Math.floor(radio.value);
    }
  }
  let radios7 = document.getElementsByName("preg7");
  for (let radio of radios7) {
    if (radio.checked) {
      pts += Math.floor(radio.value);
    }
  }
  let radios8 = document.getElementsByName("preg8");
  for (let radio of radios8) {
    if (radio.checked) {
      pts += Math.floor(radio.value);
    }
  }
  let radios9 = document.getElementsByName("preg9");
  for (let radio of radios9) {
    if (radio.checked) {
      pts += Math.floor(radio.value);
    }
  }

  document.getElementById("totalpts").innerHTML = Math.round((pts / 45) * 100) + '%';
}

var tbl_evaluados;
function listarObrerosSelect(area) {
  tbl_evaluados = $("#obreros_select").DataTable({
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
      url: "../controller/evaluacion/controlador_evaluado_listar.php",
      type: "POST",
      data: {
        area: area,
      },
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
            return `<button type="button" class="btn btn-dark btn-rounded btn-icon selectObrero" data-dismiss="modal">
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
    ordering: false,
    info: false,
    language: idioma_espanol,
    select: true,
  });

  tbl_evaluados.on("draw.td", function () {
    var PageInfo = $("#obreros_select").DataTable().page.info();
    tbl_evaluados
      .column(0, { page: "current" })
      .nodes()
      .each(function (cell, i) {
        cell.innerHTML = i + 1 + PageInfo.start;
      });
  });
}

$("#obreros_select").on("click", ".selectObrero", function () {
  var data = tbl_evaluados.row($(this).parents("tr")).data();

  if (tbl_evaluados.row(this).child.isShown()) {
    var data = tbl_evaluados.row(this).data();
  }

  document.getElementById("txtIdEvaluado").value = data["id"];
  let nombreEvaluado = data["nombre"];
  document.getElementById(
    "txtNombreEvaluado"
  ).innerHTML = `<b>Evaluado: </b> ${nombreEvaluado}`;
});

function AbrirModalRegistroEvaluacion() {
  /* $("#seleccionaObrero").modal({ backdrop: "static", keyboard: false }); */
  $("#seleccionaObrero").modal("show");
}

function Registrar_Evaluacion() {
  var pregUno = 0;
  var pregDos = 0;
  var pregTres = 0;
  var pregCuatro = 0;
  var pregCinco = 0;
  var pregSeis = 0;
  var pregSiete = 0;
  var pregOcho = 0;
  var pregNueve = 0;

  let radios1 = document.getElementsByName("preg1");
  for (let radio of radios1) {
    if (radio.checked) {
      pregUno = Math.floor(radio.value);
    }
  }
  if (pregUno == 0 || pregUno == "") {
    return Swal.fire(
      "Mensaje de advertencia",
      "Asigne puntaje a la pregunta 1",
      "warning"
    );
  }

  let radios2 = document.getElementsByName("preg2");
  for (let radio of radios2) {
    if (radio.checked) {
      pregDos = Math.floor(radio.value);
    }
  }
  if (pregDos == 0 || pregDos == "") {
    return Swal.fire(
      "Mensaje de advertencia",
      "Asigne puntaje a la pregunta 2",
      "warning"
    );
  }

  let radios3 = document.getElementsByName("preg3");
  for (let radio of radios3) {
    if (radio.checked) {
      pregTres = Math.floor(radio.value);
    }
  }

  if (pregTres == 0 || pregTres == "") {
    return Swal.fire(
      "Mensaje de advertencia",
      "Asigne puntaje a la pregunta 3",
      "warning"
    );
  }

  let radios4 = document.getElementsByName("preg4");
  for (let radio of radios4) {
    if (radio.checked) {
      pregCuatro = Math.floor(radio.value);
    }
  }
  if (pregCuatro == 0 || pregCuatro == "") {
    return Swal.fire(
      "Mensaje de advertencia",
      "Asigne puntaje a la pregunta 4",
      "warning"
    );
  }

  let radios5 = document.getElementsByName("preg5");
  for (let radio of radios5) {
    if (radio.checked) {
      pregCinco = Math.floor(radio.value);
    }
  }
  if (pregCinco == 0 || pregCinco == "") {
    return Swal.fire(
      "Mensaje de advertencia",
      "Asigne puntaje a la pregunta 5",
      "warning"
    );
  }
  let radios6 = document.getElementsByName("preg6");
  for (let radio of radios6) {
    if (radio.checked) {
      pregSeis = Math.floor(radio.value);
    }
  }
  if (pregSeis == 0 || pregSeis == "") {
    return Swal.fire(
      "Mensaje de advertencia",
      "Asigne puntaje a la pregunta 6",
      "warning"
    );
  }
  let radios7 = document.getElementsByName("preg7");
  for (let radio of radios7) {
    if (radio.checked) {
      pregSiete = Math.floor(radio.value);
    }
  }
  if (pregSiete == 0 || pregSiete == "") {
    return Swal.fire(
      "Mensaje de advertencia",
      "Asigne puntaje a la pregunta 7",
      "warning"
    );
  }
  let radios8 = document.getElementsByName("preg8");
  for (let radio of radios8) {
    if (radio.checked) {
      pregOcho = Math.floor(radio.value);
    }
  }
  if (pregOcho == 0 || pregOcho == "") {
    return Swal.fire(
      "Mensaje de advertencia",
      "Asigne puntaje a la pregunta 8",
      "warning"
    );
  }
  let radios9 = document.getElementsByName("preg9");
  for (let radio of radios9) {
    if (radio.checked) {
      pregNueve = Math.floor(radio.value);
    }
  }
  if (pregNueve == 0 || pregNueve == "") {
    return Swal.fire(
      "Mensaje de advertencia",
      "Asigne puntaje a la pregunta 9",
      "warning"
    );
  }


  var total =
    pregUno +
    pregDos +
    pregTres +
    pregCuatro +
    pregCinco +
    pregSeis +
    pregSiete +
    pregOcho +
    pregNueve;

  let evaluado = document.getElementById("txtIdEvaluado").value;
  let semestre = document.getElementById("txtSemestre").value;
  if (evaluado == "") {
    return Swal.fire(
      "Mensaje de advertencia",
      "Debe seleccinar una persona a evaluar",
      "warning"
    );
  }

  if (semestre == "") {
    return Swal.fire(
      "Mensaje de advertencia",
      "Las evaluaciones están deshabilitadas",
      "warning"
    );
  }

  let formData = new FormData();

  formData.append("evaluado", evaluado);
  formData.append("semestre", semestre);
  formData.append("p1", pregUno);
  formData.append("p2", pregDos);
  formData.append("p3", pregTres);
  formData.append("p4", pregCuatro);
  formData.append("p5", pregCinco);
  formData.append("p6", pregSeis);
  formData.append("p7", pregSiete);
  formData.append("p8", pregOcho);
  formData.append("p9", pregNueve);

  formData.append("total", total);

  $.ajax({
    url: "../controller/evaluacion/controlador_evaluacion_registro.php",
    type: "POST",
    data: formData,
    contentType: false,
    processData: false,
    success: function (resp) {
      if (resp > 0) {
        
        if (resp == 1) {

          limpiarEvaluacion();
          Swal.fire(
            "Mensaje de confirmacion",
            "Nuevo evaluación registrada",
            "success"
          ).then((value) => {});
        } else {
          Swal.fire(
            "Mensaje de error",
            "Ya se realizo todas las evaluaciones correspondientes a este mes.",
            "error"
          );
        }
      } else {
        Swal.fire(
          "Mensaje de error",
          "No se pudo registrar la evaluación",
          "error"
        );
      }
    },
  });
  return false;
}

function answer(state) {
  Swal.fire({
    title: "Estas segur@ de deshabilitar las envaluaciones?",
    text: "Una vez realizado esto, las evaluaciones ya no podrán realizarse",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, confirmar",
  }).then((result) => {
    if (result.isConfirmed) {
      ConfiguracionEvaluacion(state);
    }
  });
}

function ConfiguracionEvaluacion(estados) {
  let mes = document.getElementById("txtAnio").value;
  var estado = estados;

  $.ajax({
    url: "../controller/evaluacion/controlador_evaluacion_config.php",
    type: "POST",
    data: {
      mes: mes,
      estado: estado,
    },
  }).done(function (resp) {
    if (resp > 0) {
      Swal.fire(
        "Mensaje de confirmacion",
        "Datos actualizados",
        "success"
      ).then((value) => {
        listarConfiguracion();
      });
    } else {
      Swal.fire("Mensaje de error", "No se pudo actualizar los datos", "error");
    }
  });
}

function listarConfiguracion() {
  $.ajax({
    url: "../controller/evaluacion/controlador_listar_config.php",
    type: "POST",
  }).done(function (resp) {
    let data = JSON.parse(resp);
    if (data.length > 0) {
      
      if (data[0][1] == "HABILITADO") {
        document.getElementById("configEval").style.display = "none";
        document.getElementById("btn_config_eval").innerHTML = `
        <button type="button" class="btn btn-danger btn-lg btn-block" onclick="answer('DESHABILITADO')">
        <i class="ti-user"> </i>
        Deshabilitar evaluaciones
      </button>
        `;
      } else {
        document.getElementById("configEval").style.display = "flex";
        document.getElementById(
          "btn_config_eval"
        ).innerHTML = `<button type="button" class="btn btn-success btn-lg btn-block" onclick="ConfiguracionEvaluacion('HABILITADO')">
        <i class="ti-user"> </i>
        Habilitar evaluaciones
      </button>
        `;
      }
    } else {
      Swal.fire("Mensaje de error", "Error, contactese con sistemas", "error");
    }
  });
}

function listarSemestre() {
  $.ajax({
    url: "../controller/evaluacion/controlador_listar_config.php",
    type: "POST",
  }).done(function (resp) {
    let data = JSON.parse(resp);
    if (data.length > 0) {
      if (data[0][1] == "HABILITADO") {
        document.getElementById(
          "txtSemestre"
        ).innerHTML = `<option value="${data[0][2]}">${data[0][2]}</option>`;
      }
    } else {
      Swal.fire("Mensaje de error", "Error, contactese con sistemas", "error");
    }
  });
}

function limpiarEvaluacion() {
  document.getElementById("totalpts").innerHTML = "0";
  document.getElementById(
    "txtNombreEvaluado"
  ).innerHTML = `<b>Evaluado: </b>`;
  document.getElementById("txtIdEvaluado").value = "";
  $("input[type=radio][name=preg1]").prop("checked", false);
  $("input[type=radio][name=preg2]").prop("checked", false);
  $("input[type=radio][name=preg3]").prop("checked", false);
  $("input[type=radio][name=preg4]").prop("checked", false);
  $("input[type=radio][name=preg5]").prop("checked", false);
  $("input[type=radio][name=preg6]").prop("checked", false);
  $("input[type=radio][name=preg7]").prop("checked", false);
  $("input[type=radio][name=preg8]").prop("checked", false);
  $("input[type=radio][name=preg9]").prop("checked", false);
}


