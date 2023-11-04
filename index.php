<?php
session_start();
if (isset($_SESSION['S_IDUSUARIO'])) {
    header('Location: view/index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>EVALUACIÓN</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="template/vendors/feather/feather.css">
  <link rel="stylesheet" href="template/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="template/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="template/css/vertical-layout-light/style.css">



  <!-- endinject -->
  <link rel="shortcut icon" href="utils/img/logo.png"/>
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <!-- <h2>Evaluación</h4> -->
                <img src="utils/img/logo.png">
              </div>
              <h4>Bienvenido al sistema de evaluación</h4>
              <h6 class="font-weight-light">Inicia sesión para continuar</h6>
              
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" id="txtUsuario" placeholder="Usuario">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="txtPassword" placeholder="Contraseña">
                </div>
                <div class="mt-3">
                  <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit" onclick="Iniciar_sesion()">INICIAR SESIÓN</button>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input" id="rememberMe">
                      Recordarme
                    </label>
                  </div>

                </div>

              
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="template/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->

  <script src="utils/jquery.js"></script>
    <script src="utils/sweealert.js"></script>
    <script src="js/usuario.js?rev=<?= time() ?>"></script>

  <script src="template/js/off-canvas.js"></script>
  <script src="template/js/hoverable-collapse.js"></script>
  <script src="template/js/template.js"></script>
  <script src="template/js/settings.js"></script>
  <script src="template/js/todolist.js"></script>

    

    <script>
        const rmcheck = document.getElementById('rememberMe'),
            usuarioinput = document.getElementById('txtUsuario'),
            passwordinput = document.getElementById('txtPassword');

        if (localStorage.checkbox && localStorage.checkbox !== "") {
            rmcheck.setAttribute("checked", "checked");
            usuarioinput.value = localStorage.usuario;
            passwordinput.value = localStorage.password;
        } else {
            rmcheck.removeAttribute("checked");
            usuarioinput.value = "";
            passwordinput.value = "";
        }
    </script>
</body>

</html>











