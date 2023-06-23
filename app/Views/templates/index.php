<?php

use function PHPUnit\Framework\isNull;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- PWA Start -->
    <meta name="Description" content="Manajemen surat yang lebih efisien dan mudah untuk permintaan surat ke Balai Desa." />
    <meta name="theme-color" content="#414f57" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="default" />
    <meta name="apple-mobile-web-app-title" content="Nama Situs" />

    <meta name="msapplication-TileImage" content="/icon/android-chrome-512x512.png" />
    <meta name="msapplication-TileColor" content="#000000" />

    <link rel="apple-touch-icon" href="/icon/apple-touch-icon.png" />

    <!-- manifest.json -->
    <link rel="manifest" href="/manifest.json">
    <!-- PWA End -->

    <title><?= $title; ?></title>

    <!-- Fonts and icons -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons -->
    <link href="<?= base_url() ?>/assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="<?= base_url() ?>/assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="<?= base_url() ?>/assets/js/fontawesome-kit.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle" href="<?= base_url() ?>/assets/css/material-dashboard.css?v=3.0.0" rel="stylesheet" />
    <!-- Global css -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/global.css">
    <!-- Datatables -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/DataTables-1.13.2/css/dataTables.bootstrap5.min.css">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/magnific-popup.css">


    <style>
        .mfp-wrap {
            z-index: 1200 !important;
        }

        .mfp-bg {
            z-index: 1150 !important;
        }
    </style>

    <!-- PWA Register service-worker Start -->
    <script>
        if (navigator.serviceWorker) {
            navigator.serviceWorker.register('/sw.js').then(function(registration) {
                console.log('ServiceWorker registration successful with scope:', registration.scope);
            }).catch(function(error) {
                console.log('ServiceWorker registration failed:', errror);
            });
        }
    </script>
    <!-- PWA Register service-worker End -->
</head>

<body class="g-sidenav-show  bg-gray-200">

    <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-info" id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" href="/" target="_blank">
                <img src="<?= base_url() ?>/assets/img/logo_pekalongan.png" class="navbar-brand-img h-100" alt="main_logo">
                <span class="ms-1 font-weight-bold text-white">ASMS</span>
            </a>
        </div>
        <hr class="horizontal light mt-0 mb-2">
        <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item mt-3">
                    <?php
                    if (in_groups('user')) : ?>
                        <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Warga</h6>
                    <?php elseif (in_groups('petugas')) : ?>
                        <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Petugas</h6>
                    <?php elseif (in_groups('admin')) : ?>
                        <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Admin</h6>
                    <?php endif; ?>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white <?= uri_string() == '/' ? 'active' : '' ?>" href="/">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">dashboard</i>
                        </div>
                        <span class="nav-link-text ms-1">Dashboard</span>
                    </a>
                </li>
                <?php if (in_groups('user')) : ?>
                    <li class="nav-item">
                        <a class="nav-link text-white <?= uri_string() == 'pengajuan-surat' ? 'active' : '' ?>" href="<?= base_url('pengajuan-surat') ?>">
                            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="material-icons opacity-10">mail</i>
                            </div>
                            <span class="nav-link-text ms-1">Pengajuan Surat</span>
                        </a>
                    </li>
                <?php elseif (in_groups('petugas')) : ?>
                    <li class="nav-item">
                        <a class="nav-link text-white <?= uri_string() == 'pengajuan-surat' ? 'active' : '' ?>" href="<?= base_url('pengajuan-surat') ?>">
                            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="material-icons opacity-10">mail</i>
                            </div>
                            <span class="nav-link-text ms-1">Pengajuan Surat</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white <?= uri_string() == 'manajemen-surat' ? 'active' : '' ?>" href="<?= base_url('manajemen-surat') ?>">
                            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="material-icons opacity-10">mail</i>
                            </div>
                            <span class="nav-link-text ms-1">Manajemen Surat</span>
                        </a>
                    </li>
                <?php elseif (in_groups('admin')) : ?>
                    <li class="nav-item">
                        <a class="nav-link text-white <?= uri_string() == 'manajemen-surat' ? 'active' : '' ?>" href="<?= base_url('manajemen-surat') ?>">
                            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="material-icons opacity-10">mail</i>
                            </div>
                            <span class="nav-link-text ms-1">Manajemen Surat</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white <?= uri_string() == 'manajemen-user' ? 'active' : '' ?>" href="<?= base_url('manajemen-user') ?>">
                            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="material-icons opacity-10">person</i>
                            </div>
                            <span class="nav-link-text ms-1">Manajemen User</span>
                        </a>
                    </li>
                <?php endif; ?>

                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Akun</h6>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white <?= uri_string() == 'profil' ? 'active' : '' ?>" href="<?= base_url('profil') ?>">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">person</i>
                        </div>
                        <span class="nav-link-text ms-1">Profil</span>
                    </a>
                </li>


                <?php if (logged_in()) : ?>
                    <li class="nav-item">
                        <a class="nav-link text-white " href="<?= base_url('logout') ?>">
                            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="material-icons opacity-10">logout</i>
                            </div>
                            <span class="nav-link-text ms-1">Keluar</span>
                        </a>
                    </li>
                <?php endif ?>
                <hr class="horizontal light mt-0 mb-2">
                <li class="nav-item">
                    <a class="nav-link text-white " href="<?= base_url('profil-desa') ?>">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">webhook</i>
                        </div>
                        <span class="nav-link-text ms-1">Profil Desa</span>
                    </a>
                </li>

            </ul>
        </div>
    </aside>

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="<?= base_url() ?>"><?= uri_string() == '/' ? 'Home' : 'Home' ?></a></li>
                        <?php if (uri_string() == '/') :  ?>
                            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">
                                <a href="<?= base_url() ?>">
                                    Dashboard
                                </a>
                            </li>
                        <?php elseif (uri_string() == 'pengajuan-surat') : ?>
                            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">
                                <a href="<?= base_url() ?>/pengajuan-surat">
                                    Pengajuan Surat
                                </a>
                            </li>
                        <?php elseif (uri_string() == 'manajemen-surat') : ?>
                            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">
                                <a href="<?= base_url() ?>/manajemen-surat">
                                    Manajemen Surat
                                </a>
                            </li>
                        <?php elseif (uri_string() == 'manajemen-user') : ?>
                            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">
                                <a href="<?= base_url() ?>/manajemen-user">
                                    Manajemen User
                                </a>
                            </li>
                        <?php elseif (uri_string() == 'profil') : ?>
                            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">
                                <a href="<?= base_url() ?>/profil">
                                    Profil
                                </a>
                            </li>
                        <?php endif; ?>
                    </ol>
                    <h6 class="font-weight-bolder mb-0 mt-2">
                        Aplikasi Sistem Manajemen Surat
                    </h6>
                </nav>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                    </div>
                    <ul class="navbar-nav dropdown justify-content-end">
                        <li class="nav-item d-flex align-items-center d-none d-lg-block">
                            <a href="javascript:;" class="nav-link text-white font-weight-bold bg-info p-2 px-4 rounded-pill" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-user me-sm-1"></i>&nbsp; |
                                <span class="d-sm-inline d-none"> &nbsp; <?= user()->username; ?></span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end px-2 me-sm-n4" aria-labelledby="dropdownMenuButton">
                                <li class="">
                                    <a href="<?= base_url('logout') ?>" id="logout" class="text-bold gap-2 d-flex justify-content-center align-items-center py-1">
                                        <img src="<?= base_url() ?>/assets/img/<?= user()->img_user ?>" class="avatar avatar-sm rounded-circle" alt="user_image">
                                        Keluar
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->

        <!-- Page-Content -->
        <?= $this->renderSection('page-content'); ?>
        <!-- End Page-Content -->

    </main>



    <!--   Core JS Files   -->
    <script src="<?= base_url() ?>/assets/js/core/popper.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/core/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/plugins/chartjs.min.js"></script>
    <script src="/js/jquery-3.6.3.min.js"></script>
    <script src="/js/app.js"></script>
    <script src="/js/jquery.magnific-popup.js"></script>
    <script src="<?= base_url() ?>/assets/DataTables-1.13.2/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>/assets/DataTables-1.13.2/js/dataTables.bootstrap5.min.js"></script>

    <?= $this->renderSection('bsc'); ?>

    <script>
        $(document).ready(function() {
            $('#data_table').DataTable();
        });
    </script>
    <script>
        $('.btn-change-group').on('click', function() {
            const id = $(this).data('id');

            $('.id').val(id);
            $('#changeGroupModal').modal('show');
        });
    </script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <script text="text/javascript">
        // memanggil plugin magnific popup
        $('.portfolio-popup').magnificPopup({
            type: 'image',
            removalDelay: 300,
            mainClass: 'mfp-fade',
            gallery: {
                enabled: true
            },
            zoom: {
                enabled: true,
                duration: 300,
                easing: 'ease-in-out',
                opener: function(openerElement) {
                    return openerElement.is('img') ? openerElement : openerElement.find('img');
                }
            }
        });
        // memanggil datatable membuat callback datatable pada magnific popup agar gambar 
        // yang di munculkan sesuai pada saat pindah paginasi dari 1 ke 2 
        // dan seterusnya
        $(document).ready(function() {
            var table = $('#example').dataTable({
                "fnDrawCallback": function() {
                    $('.portfolio-popup').magnificPopup({
                        type: 'image',
                        removalDelay: 300,
                        mainClass: 'mfp-fade',
                        gallery: {
                            enabled: true
                        },
                        zoom: {
                            enabled: true,
                            duration: 300,
                            easing: 'ease-in-out',
                            opener: function(openerElement) {
                                return openerElement.is('img') ? openerElement : openerElement.find('img');
                            }
                        }
                    });
                }
            });
        });
    </script>

    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="<?= base_url() ?>/assets/js/material-dashboard.min.js?v=3.0.0"></script>
</body>

</html>