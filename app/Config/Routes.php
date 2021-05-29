<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Perawatan::index');
$routes->get('/perawatan/detail/(:num)', 'Perawatan::detail/$1');
$routes->get('/perawatan/edit/(:num)', 'Perawatan::edit/$1');

$routes->get('/dokter', 'Dokter::index');
$routes->get('/dokter/create/(:segment)', 'Dokter::create/$1');
$routes->get('/dokter/detail/(:segment)', 'Dokter::detail/$1');
$routes->get('/dokter/edit/(:segment)', 'Dokter::edit/$1');


$routes->get('/pasien', 'Pasien::index');
$routes->get('/pasien/create/(:segment)', 'Pasien::create/$1');
$routes->get('/pasien/detail/(:segment)', 'Pasien::detail/$1');
$routes->get('/pasien/edit/(:segment)', 'Pasien::edit/$1');

$routes->get('/obat', 'obat::index');
$routes->get('/obat/create/(:segment)', 'obat::create/$1');
$routes->get('/obat/detail/(:segment)', 'obat::detail/$1');
$routes->get('/obat/edit/(:segment)', 'obat::edit/$1');

$routes->get('/produsen', 'produsen::index');
$routes->get('/produsen/create/(:segment)', 'produsen::create/$1');
$routes->get('/produsen/detail/(:segment)', 'produsen::detail/$1');
$routes->get('/produsen/edit/(:segment)', 'produsen::edit/$1');
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
