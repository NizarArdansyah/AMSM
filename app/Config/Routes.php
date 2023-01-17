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
$routes->get('/surat', 'Home::surat');

// Role User Route
$routes->get('/profil', 'User\User::profil', ['filter' => 'role:user']);
$routes->post('/ubah-profil', 'User\User::ubah_profil', ['filter' => 'role:user']);
$routes->get('/pengajuan-surat', 'User\User::pengajuan_surat', ['filter' => 'role:user,petugas']);
$routes->post('/pengajuan-surat', 'User\User::buat_pengajuan_surat', ['filter' => 'role:user,petugas']);
$routes->post('/update-pengajuan-surat', 'User\User::update_pengajuan_surat', ['filter' => 'role:user']);

// Role Petugas Route
$routes->get('/profil-petugas', 'Petugas\Petugas::profil_petugas', ['filter' => 'role:petugas']);
$routes->get('/manajemen-surat', 'Petugas\Petugas::manajemen_surat', ['filter' => 'role:petugas']);
$routes->post('/update-surat', 'Petugas\Petugas::update_surat', ['filter' => 'role:petugas']);
$routes->post('/pesan-pembatalan', 'Petugas\Petugas::pesan_pembatalan', ['filter' => 'role:petugas']);
$routes->get('/cetak-surat/(:num)', 'Petugas\Petugas::cetak_surat/$1', ['filter' => 'role:petugas']);
$routes->get('/hapus-surat/(:num)', 'Petugas\Petugas::hapus_surat/$1', ['filter' => 'role:petugas']);

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
