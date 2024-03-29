<!--
=========================================================
* Material Dashboard 2 - v3.0.4
=========================================================

* Product Page: https://www.creative-tim.com/product/material-dashboard
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url() ?>/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="<?= base_url() ?>/assets/img/favicon.png">
  <title>
    Masuk
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="<?= base_url() ?>/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="<?= base_url() ?>/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="<?= base_url() ?>/assets/css/material-dashboard.css?v=3.0.4" rel="stylesheet" />
</head>

<body class="bg-gray-200">
  <main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-100" style="background-image: url('<?= base_url() ?>/assets/img/auth-background.png');">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-4 col-md-8 col-12 mx-auto">
            <div class="card z-index-0 fadeIn3 fadeInBottom">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-info shadow-info border-radius-lg py-3 pe-1">
                  <h4 class="text-white font-weight-bolder text-center mt-2 mb-0" style="letter-spacing: 1px;">Masuk</h4>
                  <div class="row mt-3">
                    <p class="text-white text-center">Aplikasi Sistem Manajemen Surat </p>
                  </div>

                </div>
              </div>
              <div class="card-body">
                <form role="form" class="text-start" action="<?= url_to('login') ?>" method='post'>
                  <?= csrf_field() ?>

                  <?php if ($config->validFields === ['email']) : ?>
                    <div class="input-group input-group-outline my-3">
                      <label for="login" class="form-label"><?= lang('Auth.email') ?></label>
                      <input type="email" class="form-control bg-outline-info <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login">
                      <div class="invalid-feedback">
                        <?= session('errors.login') ?>
                      </div>
                    </div>
                  <?php else : ?>
                    <div class="input-group input-group-outline my-3">
                      <label for="login" class="form-label"><?= lang('Auth.emailOrUsername') ?></label>
                      <input type="text" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login">
                      <div class="invalid-feedback">
                        <?= session('errors.login') ?>
                      </div>
                    </div>
                  <?php endif; ?>

                  <div class="input-group input-group-outline mb-1">
                    <label class="form-label"><?= lang('Auth.password') ?></label>
                    <input type="password" name="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>">
                    <div class="invalid-feedback">
                      <?= session('errors.password') ?>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col">
                      <div class="form-check form-switch d-flex align-items-center mt-1">
                        <small><input class="form-check-input" type="checkbox" role="switch" id="showPassword"></small>
                        <label class="form-check-label mb-0 ms-2" for="showPassword"><small>Show Password</small></label>
                      </div>
                    </div>
                    <div class="col">
                      <?php if ($config->allowRemembering) : ?>
                        <div class="form-check float-end">
                          <input class="form-check-input" type="checkbox" id="rememberMe" <?php if (old('remember')) : ?> checked <?php endif ?>>
                          <label class="form-check-label" for="rememberMe"><small><?= lang('Auth.rememberMe') ?></small></label>
                        </div>
                      <?php endif; ?>
                    </div>
                  </div>

                  <div class="text-center">
                    <button type="submit" class="btn bg-gradient-info w-100 my-4 mb-2">Masuk</button>
                  </div>
                </form>
                <?php if ($config->activeResetter) : ?>
                  <p class="mt-4 text-sm text-center mb-2 p-0"><a class="text-info text-gradient font-weight-bold" href="<?= url_to('forgot') ?>"><?= lang('Auth.forgotYourPassword') ?></a></p>
                <?php endif; ?>
                <p class="text-sm text-center <?= !$config->activeResetter ? 'mt-4' : 'mt-3' ?>">
                  Belum punya akun?
                  <a href="/register" class="text-info text-gradient font-weight-bold">Daftar</a>
                </p>
                <?= view('Myth\Auth\Views\_message_block') ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer position-absolute bottom-2 py-2 w-100">
        <div class="container">
          <div class="row align-items-center justify-content-center">
            <div class="col-12 my-auto">
              <div class="copyright text-center text-sm text-white">
                © <script>
                  document.write(new Date().getFullYear())
                </script> -
                Aplikasi Sistem Manajemen Surat
              </div>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </main>
  <!--   Core JS Files   -->
  <script src="<?= base_url() ?>/assets/js/core/popper.min.js"></script>
  <script src="<?= base_url() ?>/assets/js/core/bootstrap.min.js"></script>
  <script src="<?= base_url() ?>/assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="<?= base_url() ?>/assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }

    // showPassword 
    const showPassword = document.querySelector('#showPassword');
    const password = document.querySelector('input[name=password]');

    showPassword.addEventListener('click', function() {
      if (password.type === 'password') {
        password.type = 'text';
      } else {
        password.type = 'password';
      }
    });
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?= base_url() ?>/assets/js/material-dashboard.min.js?v=3.0.4"></script>
</body>

</html>