<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

// Role User Route
$routes->get('/profil', 'Warga\Warga::profil', ['filter' => 'role:user,petugas,admin']);
$routes->post('/ubah-profil', 'Warga\Warga::ubah_profil', ['filter' => 'role:user,petugas,admin']);
$routes->get('/pengajuan-surat', 'Warga\Warga::pengajuan_surat', ['filter' => 'role:user,petugas,admin']);
$routes->post('/pengajuan-surat', 'Warga\Warga::buat_pengajuan_surat', ['filter' => 'role:user,petugas,admin']);
$routes->post('/update-pengajuan-surat', 'Warga\Warga::update_pengajuan_surat', ['filter' => 'role:user,petugas,admin']);
$routes->post('/upload-kk', 'Warga\Warga::upload_kk', ['filter' => 'role:user,petugas,admin']);

// Role Petugas Route
$routes->get('/manajemen-surat', 'Petugas\Petugas::manajemen_surat', ['filter' => 'role:petugas,admin']);
$routes->post('/update-surat', 'Petugas\Petugas::update_surat', ['filter' => 'role:petugas,admin']);
$routes->post('/pesan-pembatalan', 'Petugas\Petugas::pesan_pembatalan', ['filter' => 'role:petugas,admin']);
$routes->get('/cetak-surat/(:num)', 'Petugas\Petugas::cetak_surat/$1', ['filter' => 'role:petugas,admin']);
$routes->get('/hapus-surat/(:num)', 'Petugas\Petugas::hapus_surat/$1', ['filter' => 'role:petugas,admin']);

// Role Admin Route
$routes->get('/manajemen-user', 'Admin\Admin::manajemen_user', ['filter' => 'role:admin']);
$routes->post('/tambah-user', 'Admin\Admin::tambah_user', ['filter' => 'role:admin']);
$routes->post('/ubah-group', 'Admin\Admin::ubah_group', ['filter' => 'role:admin']);
$routes->get('/update-password/(:num)', 'Admin\Admin::update_pass/$1', ['filter' => 'role:admin']);
$routes->post('/update-password', 'Admin\Admin::set_password', ['filter' => 'role:admin']);
$routes->get('/hapus-user/(:num)', 'Admin\Admin::hapus_user/$1', ['filter' => 'role:admin']);

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
