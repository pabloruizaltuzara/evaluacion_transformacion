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
      { data: "puesto",
       render: function (data, type, row) {
        return (
          data == "MAESTRANZA" ? "LIDER" : "" 
        );
      }},  
      { data: "ministerio" },
      
      {
        data: "estado",
        render: function (data, type, row) {
          if (data == "ACTIVO") {
            return `<div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuSizeButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        OPCIONES
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuSizeButton2">
                        <h6 class="dropdown-header"><b>Opciones</b></h6>
                        <a class="dropdown-item reporte" href="#">Seleccionar reporte</a>
                      </div>
          </div>`;
          } else {
            return `<div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuSizeButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        OPCIONES
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuSizeButton2">
                        <h6 class="dropdown-header"><b>Opciones</b></h6>
                        <a class="dropdown-item reporte" href="#">Seleccionar reporte</a>
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


$("#personal_obreros").on("click", ".reporte", function () {
  var data = tbl_personal_obreros.row($(this).parents("tr")).data();

  if (tbl_personal_obreros.row(this).child.isShown()) {
    var data = tbl_personal_obreros.row(this).data();
  }

  $("#modal_editar_personal_obreros").modal("show");
  document.getElementById('txtCiObreroReporte').value = data["id"];
  document.getElementById("lblObrero").innerHTML = data["nombre"].toUpperCase();


});


function AbrirModalRegistroObreros() {
    $("#modal_registro_personal_obreros").modal({ backdrop: "static", keyboard: false });
    $("#modal_registro_personal_obreros").modal("show");
}

function cargar_select_semestre(){
  $.ajax({
      "url":"../controller/evaluacion/controlador_cargar_select_semestre.php",
      type:'POST'
  }).done(function(resp){
      let data = JSON.parse(resp);
      if(data.length>0){
          let cadena = "";
          for (let i = 0; i < data.length; i++) {
              cadena+="<option value='"+data[i][0]+"'>"+data[i][0]+"</option>";
          }
          document.getElementById('select_mes').innerHTML=cadena;
      }else{
          cadena+="<option value=''>No hay empleados disponibles</option>";
          document.getElementById('select_mes').innerHTML=cadena;
      }
  })
}

function verReporteListaPorAdmin()
{
    let idEval= document.getElementById('txtCiObreroReporte').value;
    let mes= document.getElementById('select_mes').value;
    window.open("../reportes/app/evaluacionMensual.php?idEval="+idEval+"&mes="+mes+"#zoom=100");
}



/* function descargarPdf() {

  let ci = document.getElementById('txtCiObreroReporte').value;
  let semestre = document.getElementById('txtSemestreObreroReporte').value;
  let anio = document.getElementById('txtAnioObreroReporte').value;

  var semestres=semestre+"-"+anio;

  console.log(semestres);



  $.ajax({
    url: "../reportes/app/evaluados.php",
    type: "POST",
    data: {
      ci:ci.toUpperCase(),
      semestre:semestres.toUpperCase(),
    },
  }).done(function (resp) {
    if (resp > 0) {
      Swal.fire(
        "Mensaje de confirmacion",
        "Solicitud procesada",
        "success"
      ).then((value) => {
        
        var win = window.open('../reportes/app/index.php', '_blank');
        // Cambiar el foco al nuevo tab (punto opcional)
        win.focus();
      });
    } else {
      Swal.fire("Mensaje de error", "No se pudo actualizar los datos", "error");
    }
  });
}
 */