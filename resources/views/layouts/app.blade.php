<!DOCTYPE html>
<html lang="en" dir="ltr" data-bs-theme="light" data-color-theme="Blue_Theme" data-layout="vertical">

<head>
  <!-- Required meta tags -->
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- Favicon icon-->
  <link rel="shortcut icon" type="image/png" href="../../assets/images/logos/favicon.png" />

  <!-- Core Css -->
  <link rel="stylesheet" href="../../assets/css/styles.css" />

  <title>Indicadores de Salud</title>
</head>

<body style="background-image: url('../../img/imagen.png'); background-repeat: no-repeat; background-size: cover;">
  <!-- Preloader -->
  <div class="preloader">
    <img src="../../assets/images/logos/favicon.png" alt="loader" class="lds-ripple img-fluid" />
  </div>
  <div id="main-wrapper">

  <div class="position-relative overflow-hidden min-vh-100 w-100 d-flex align-items-center justify-content-center"
  >
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row  w-100 my-0 my-xl-0">
        <div class="col-6 text-start"  >
        <img src="{{asset('img/cropped-redlogo.png')}}"width="80px" alt="" style="margin-bottom:0px" srcset="">
        </div>
        <div class="col-6 text-end"  >
        <img src="{{asset('img/EMCABEZADO UEIT _ESTADISTICA.png')}}"width="350px" alt="" srcset="">
        </div>
          <div class="col-md-12 justify-content-center d-flex flex-column justify-content-center">
            @yield("content")
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="dark-transparent sidebartoggler"></div>
  <!-- Import Js Files -->
  <script src="../../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../../assets/libs/simplebar/dist/simplebar.min.js"></script>
  <script src="../../assets/js/theme/app.init.js"></script>
  <script src="../../assets/js/theme/theme.js"></script>
  <script src="../../assets/js/theme/app.min.js"></script>
  <script src="../../assets/js/theme/sidebarmenu.js"></script>

  <!-- solar icons -->
  <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
</body>

</html>
