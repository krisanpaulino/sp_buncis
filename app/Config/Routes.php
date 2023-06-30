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

$routes->group('auth', static function ($routes) {
    $routes->get('/', 'Auth::index');
    $routes->post('login', 'Auth::login');
    $routes->post('logout', 'Auth::logout');
    $routes->post('signup', 'Petani::store');
    $routes->get('signup', 'Auth::signup');
});
$routes->group('petani', ['filter' => 'petani'], static function ($routes) {
    $routes->get('/', 'Home::petani');
    $routes->get('diagnosa', 'Diagnosa::index');
    $routes->get('diagnosa/mulai', 'Diagnosa::mulai');
    $routes->get('diagnosa/proses/(:num)', 'Diagnosa::proses/$1');
    $routes->get('diagnosa/(:num)', 'Diagnosa::hasil/$1');
    $routes->get('diagnosa/(:num)/cetak', 'Diagnosa::cetakHasil/$1');
    $routes->post('diagnosa/proses/(:num)', 'Diagnosa::proses/$1');
    $routes->post('diagnosa/create-diagnosa', 'Diagnosa::createDiagnosa');
    $routes->post('diagnosa/delete', 'Diagnosa::delete');

    $routes->get('penyakit', 'Penyakit::showPetani');
    $routes->get('penyakit/(:num)', 'Penyakit::detailPetani/$1');
    $routes->get('petani', 'Petani::index');

    $routes->get('profil', 'Petani::profil');

    $routes->post('profil/update', 'Petani::update');
    $routes->post('profil/reset-password', 'Petani::resetPassword');

    $routes->get('berita/', 'Berita::indexPetani');
    $routes->get('berita/(:num)', 'Berita::detailPetani/$1');
});
$routes->group('admin', ['filter' => 'admin'], static function ($routes) {
    $routes->get('/', 'Home::admin');
    $routes->get('user', 'Admin::index');
    $routes->post('user/store', 'Admin::store');
    $routes->post('user/delete', 'Admin::delete');

    $routes->get('pakar', 'Pakar::index');
    $routes->get('pakar/(:num)', 'Pakar::detail/$1');
    $routes->post('pakar/store', 'Pakar::store');
    $routes->post('pakar/delete', 'Pakar::delete');
    $routes->post('pakar/update', 'Pakar::update');
    $routes->post('pakar/reset-password', 'Pakar::resetPassword');

    $routes->get('petani', 'Petani::index');
    $routes->get('petani/(:num)', 'Petani::detail/$1');
    $routes->post('petani/store', 'Petani::store');
    $routes->post('petani/delete', 'Petani::delete');
    $routes->post('petani/update', 'Petani::update');
    $routes->post('petani/reset-password', 'Petani::resetPassword');

    $routes->get('penyakit', 'Penyakit::index');
    $routes->get('penyakit/tambah', 'Penyakit::tambah');
    $routes->get('penyakit/(:any)/gejala', 'Penyakit::gejala/$1');
    $routes->get('penyakit/(:any)/tambah-gejala', 'Penyakit::tambahGejala/$1');
    $routes->get('penyakit/(:any)', 'Penyakit::detail/$1');
    $routes->post('penyakit/store', 'Penyakit::store');
    $routes->post('penyakit/store-gejala', 'Penyakit::storeGejala');
    $routes->post('penyakit/delete-gejala', 'Penyakit::deleteGejala');
    $routes->post('penyakit/update', 'Penyakit::update');
    $routes->post('penyakit/delete', 'Penyakit::delete');

    $routes->get('gejala', 'Gejala::index');
    $routes->post('gejala/store', 'Gejala::store');
    $routes->post('gejala/update', 'Gejala::update');
    $routes->post('gejala/delete', 'Gejala::delete');

    $routes->get('diagnosa', 'Diagnosa::indexAdmin');
    $routes->get('diagnosa/rekapan', 'Diagnosa::rekapanDiagnosa');
    $routes->post('diagnosa/rekapan', 'Diagnosa::rekapanDiagnosa');
    $routes->get('diagnosa/cetak-rekapan', 'Diagnosa::cetakRekapan');
    $routes->get('diagnosa/(:num)', 'Diagnosa::hasil/$1');
    $routes->get('diagnosa/(:num)/cetak', 'Diagnosa::cetakHasil/$1');

    $routes->get('berita', 'Berita::index');
    $routes->get('berita/tambah', 'Berita::tambah');
    $routes->post('berita/store', 'Berita::store');
    $routes->post('berita/update', 'Berita::update');
    $routes->post('berita/delete', 'Berita::delete');
    $routes->get('berita/(:num)', 'Berita::detail/$1');
});
$routes->group('pakar', ['filter' => 'pakar'], static function ($routes) {
    $routes->get('/', 'Home::pakar');
    $routes->get('penyakit', 'Penyakit::index');
    $routes->get('penyakit/tambah', 'Penyakit::tambah');
    $routes->get('penyakit/(:any)/gejala', 'Penyakit::gejala/$1');
    $routes->get('penyakit/(:any)/tambah-gejala', 'Penyakit::tambahGejala/$1');
    $routes->get('penyakit/(:any)', 'Penyakit::detail/$1');
    $routes->post('penyakit/store', 'Penyakit::store');
    $routes->post('penyakit/store-gejala', 'Penyakit::storeGejala');
    $routes->post('penyakit/delete-gejala', 'Penyakit::deleteGejala');
    $routes->post('penyakit/update', 'Penyakit::update');
    $routes->post('penyakit/delete', 'Penyakit::delete');
    $routes->get('diagnosa/(:num)/cetak', 'Diagnosa::cetakHasil/$1');

    $routes->get('gejala', 'Gejala::index');
    $routes->post('gejala/store', 'Gejala::store');
    $routes->post('gejala/update', 'Gejala::update');
    $routes->post('gejala/delete', 'Gejala::delete');

    $routes->get('diagnosa', 'Diagnosa::indexAdmin');
    $routes->get('diagnosa/(:num)', 'Diagnosa::hasil/$1');
});
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
