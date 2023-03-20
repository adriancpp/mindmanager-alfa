<?php

namespace Config;

// Create a new instance of our RouteCollection class.
use App\Controllers\Charts;
use App\Controllers\Dashboard;
use App\Controllers\Routine;
use App\Controllers\User;

$routes = Services::routes();

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
//$routes->get('register', [User::class, 'register']);

//NOT LOGGED
$routes->get('/', [User::class, 'index'], ['filter' => 'noauth']);
$routes->match(['get','post'],'login', 'User::login', ['filter' => 'noauth']);
$routes->match(['get','post'],'register', 'User::register', ['filter' => 'noauth']);

//LOGGED
    $routes->get('dashboard', [Dashboard::class, 'index'], ['filter' => 'auth']);
    $routes->match(['get','post'],'profile', 'User::profile', ['filter' => 'auth']);
    $routes->get('logout', [User::class, 'logout']);
    //routine
    $routes->get('routine', [Routine::class, 'index'], ['filter' => 'auth']);
    $routes->match(['get','post'],'/routine/new', 'Routine::createNew', ['filter' => 'auth']);
    $routes->match(['get','post'],'/routine/edit/(:any)', 'Routine::edit/$1', ['filter' => 'auth']);

    $routes->match(['get','post'],'/routine/status/(:any)/(:any)', 'Routine::changeRoutineStatus/$1/$2', ['filter' => 'auth']);

    $routes->get('charts', [Charts::class, 'index'], ['filter' => 'auth']);

$routes->get('/lang/{locale}', 'Language::index');
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
