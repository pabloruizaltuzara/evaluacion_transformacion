<?php
session_start();
if (!isset($_SESSION['S_IDUSUARIO'])) {
  header('Location: ../index.php');
}



?>


<!DOCTYPE html>
<html lang="es">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>EVALUACIÓN</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../template/vendors/feather/feather.css">
  <link rel="stylesheet" href="../template/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../template/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- <link rel="stylesheet" href="../template/vendors/datatables.net-bs4/dataTables.bootstrap4.css"> -->
  <link rel="stylesheet" href="../template/vendors/ti-icons/css/themify-icons.css">


  <link rel="stylesheet" href="../utils/estilos/styles.css">
  <link rel="stylesheet" href="../utils/estilos/estilos_radio.css">
  <!-- <link rel="stylesheet" type="text/css" href="../template/js/select.dataTables.min.css"> -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" type="text/css" href="../utils/DataTables/datatables.min.css" />
  <link rel="stylesheet" href="../template/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../utils/img/logo.png" />
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="index.php"><img src="../utils/img/logo.png" class="mr-2" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item nav-search d-none d-lg-block">

          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item dropdown">
            <!-- <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
              <i class="icon-bell mx-0"></i>
              <span class="count"></span>
            </a> -->
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
              <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-success">
                    <i class="ti-info-alt mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-normal">Application Error</h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                    Just now
                  </p>
                </div>
              </a>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-warning">
                    <i class="ti-settings mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-normal">Settings</h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                    Private message
                  </p>
                </div>
              </a>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-info">
                    <i class="ti-user mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-normal">New user registration</h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                    2 days ago
                  </p>
                </div>
              </a>
            </div>
          </li>
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="<?= "../" . $_SESSION['S_FOTO']; ?>" alt="profile" />
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">


              <div class="card-body">
                <p class="fs-30 mb-2"><?= $_SESSION['S_USUARIO']; ?></p>
                <p> <b>Cargo:</b> <?= $_SESSION['S_NIVEL']; ?></p>

              </div>
              <a class="dropdown-item" href="#" onclick="cambiarContraPersonal()">
                <i class="ti-key text-primary"></i>
                Cambiar mi contraseña
              </a>
              <a class="dropdown-item" href="../controller/usuario/destruir_sesion.php">
                <i class="ti-power-off text-primary"></i>
                Cerrar sesión
              </a>



            </div>
          </li>

        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->

      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="index.php">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Inicio</span>
            </a>
          </li>


          <?php
          if ($_SESSION['S_NIVEL'] == "ADMINISTRATIVO" || $_SESSION['S_NIVEL'] == "SIS") { ?>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#usuarios" aria-expanded="false" aria-controls="ui-basic">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Usuarios</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="usuarios">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="#" onclick="cargar_contenido('main','usuario/mantenimiento_usuario_admin.php')">Administrativos</a></li>
                  <li class="nav-item"> <a class="nav-link" href="#" onclick="cargar_contenido('main','usuario/mantenimiento_usuario_encar.php')">Encargados</a></li>
                </ul>
              </div>
            </li>

            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#personal" aria-expanded="false" aria-controls="ui-basic">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">Personal</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="personal">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="#" onclick="cargar_contenido('main','personal/mantenimiento_personal_admin.php')">Administrativos</a></li>
                  <li class="nav-item"> <a class="nav-link" href="#" onclick="cargar_contenido('main','personal/mantenimiento_personal_encar.php')">Encargados</a></li>
                </ul>
              </div>
            </li>

            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#obreros" aria-expanded="false" aria-controls="ui-basic">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">Líderes</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="obreros">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="#" onclick="cargar_contenido('main','obreros/mantenimiento_obreros_maestranza.php')">Ver lista</a></li>
                </ul>
              </div>
            </li>
          <?php
          }
          ?>



          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#evaluacion" aria-expanded="false" aria-controls="ui-basic">
              <i class="icon-layout menu-icon"></i>
              <span class="menu-title">Evaluación</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="evaluacion">
              <ul class="nav flex-column sub-menu" id="btnEvaluacion">
                
              </ul>
            </div>

            <?php
            if ($_SESSION['S_NIVEL'] == "ADMINISTRATIVO") { ?>
              <div class="collapse" id="evaluacion">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="#" onclick="cargar_contenido('main','evaluacion/mantenimiento_evaluacion_config.php')">Configuración</a></li>
                </ul>
              </div>
            <?php
            }
            ?>


          </li>


          <?php
          if ($_SESSION['S_NIVEL'] == "ADMINISTRATIVO") { ?>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#reporte" aria-expanded="false" aria-controls="ui-basic">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">Reportes</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="reporte">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="#" onclick="cargar_contenido('main','obreros/mantenimiento_obreros_report.php')">Ver obreros</a></li>
                </ul>
              </div>

            </li>
          <?php
          }
          ?>




        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper" id="main">

          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold"><?php
                                                // Obteniendo la fecha actual del sistema con PHP
                                                $fechaActual = date('d-m-Y');

                                                echo $fechaActual;
                                                ?></h3>
                  <h6 class="font-weight-normal mb-0">Fecha de hoy</h6>
                </div>

              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 grid-margin transparent">
              <div class="row">
                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-tale">
                    <div class="card-body">
                      <p class="mb-4">Usuarios</p>
                      <p class="fs-30 mb-2" id="totalUsuarios"></p>
                      <p>Total de usuarios</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-dark-blue">
                    <div class="card-body">
                      <p class="mb-4">Administrativos</p>
                      <p class="fs-30 mb-2" id="totalAdministrativos"></p>
                      <p>Total de administrativos</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                  <div class="card card-light-blue">
                    <div class="card-body">
                      <p class="mb-4">Evaluadores</p>
                      <p class="fs-30 mb-2" id="totalEncargados"></p>
                      <p>Total de evaluadores</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 stretch-card transparent">
                  <div class="card card-light-danger">
                    <div class="card-body">
                      <p class="mb-4">Líderes</p>
                      <p class="fs-30 mb-2" id="totalObreros"></p>
                      <p>Total de líderes</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>


        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Sistema de evaluación<a href="http://www.comunidadentransformacion.com" target="_blank"> TRANSFORMACIÓN </span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Ministerios Ebenezer<i class="ti-heart text-danger ml-1"></i></span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>


  <div class="modal fade" id="modal_editar_contra_usuactual" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Editar contraseña <b id="lblUsuarioContra"></b></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">

          <div class="form-group">
            <label for="txtPassAdmin">Contraseña</label>
            <input type="password" class="form-control" id="txtPassAdminEditarActual" placeholder="Contraseña">
          </div>
          <div class="form-group">
            <label for="txtPassAdminConfirm">Confirmar contraseña</label>
            <input type="password" class="form-control" id="txtPassAdminConfirmEditarActual" placeholder="Confirmar contraseña">
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light" data-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-primary" onclick="Modificar_Contra_UsuarioActual()">Guardar</button>
        </div>
      </div>
    </div>
  </div>

  <!-- container-scroller -->


  <!-- plugins:js -->
  <script src="../template/vendors/js/vendor.bundle.base.js"></script>

  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="../template/vendors/chart.js/Chart.min.js"></script>
  <!--   <script src="../template/vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="../template/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="../template/js/dataTables.select.min.js"></script> -->
  <script src="../template/js/file-upload.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->

  <script src="http://momentjs.com/downloads/moment.min.js"></script>
  <script src="../template/js/off-canvas.js"></script>
  <script src="../template/js/hoverable-collapse.js"></script>
  <script src="../template/js/template.js"></script>
  <script src="../template/js/settings.js"></script>
  <script src="../template/js/todolist.js"></script>


  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../template/js/dashboard.js"></script>
  <script src="../template/js/Chart.roundedBarCharts.js"></script>

  <!-- End custom js for this page-->







  <!-- mio -->
  <script type="text/javascript" src="../utils/DataTables/datatables.min.js"></script>


  <script src="../utils/DataTables/Buttons-2.2.3/js/dataTables.buttons.min.js"></script>
  <script src="../utils/DataTables/JSZip-2.5.0//jszip.min.js"></script>
  <script src="../utils/DataTables/pdfmake-0.1.36/pdfmake.min.js"></script>
  <script src="../utils/DataTables/pdfmake-0.1.36/vfs_fonts.js"></script>
  <script src="../utils/DataTables/Buttons-2.2.3/js/buttons.html5.min.js"></script>

  <script src="../js/usuario.js?rev=<?php echo time(); ?>"></script>


  <script src="../utils/sweealert.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>






  <script>

    datosdash();
    listarHabilitacion();


    function cargar_contenido(id, vista) {
      $("#" + id).load(vista);
    }

    var idioma_espanol = {
      select: {
        rows: "%d  fila seleccionada"
      },
      "sProcessing": "Procesando...",
      "sLengthMenu": "Mostrar _MENU_ registros",
      "sZeroRecords": "No se encontraron resultados",
      "sEmptyTable": "Ning&uacute;n data disponible en esta tabla",
      "sInfo": "Registros del (_START_ al _END_) total de _TOTAL_ registros",
      "sInfoEmpty": "Registros del (0 al 0) total de 0 registros",
      "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
      "sInfoPostFix": "",
      "sSearch": "Buscar",
      "sUrl": "",
      "sInfoThiusands": ", ",
      "sLoadingRecords": "<b>No se encontraron datos</b>",
      "onPaginate": {
        "sFirst": "Primero",
        "sLast": "Ultimo",
        "sNext": "Siguiente",
        "sPrevious": "Anterior"
      },
      "onAria": {
        "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
      }
    }


    function cambiarContraPersonal() {
      $("#modal_editar_contra_usuactual").modal("show");
    }
  </script>

</body>

</html>