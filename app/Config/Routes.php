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
$routes->setDefaultController('User');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->add('/logout', 'Authentification::logout');
$routes->add('/login', 'Authentification::login');
$routes->add('/smsAuth', 'Authentification::smsAuth');
$routes->add('/loginAsGuest', 'Authentification::loginAsGuest');


$routes->add('/register', 'Authentification::register');
$routes->add('/forgotPassword', 'Authentification::forgotPassword');
$routes->add('/resetPassword/(:any)/(:any)', 'Authentification::resetPassword/$1/$2');
$routes->add('/activation/(:any)/(:any)', 'Authentification::activateAccount/$1/$2');

 $routes->add('/loginas_back/(:any)', 'UserPanel::loginas_back/$1');
$routes->get('/loginas_back/(:any)', 'UserPanel::loginas_back/$1');


# admin routes #######
$routes->add('admin/dashboard',        'AdminPanel::Dashboard');
$routes->add('admin/package',           'Package::package');
$routes->add('admin/package/insert',    'Package::insert');
$routes->add('admin/package/update',    'Package::update');
$routes->add('admin/package/get_data',  'Package::get_data');
$routes->add('admin/package/delete',    'Package::delete');
////
$routes->add('admin/user',              'User::user');
$routes->add('admin/user/addUser',      'User::addUser');
$routes->add('admin/user/updateUser',   'User::updateUser');
$routes->add('admin/user/get_data',     'User::get_data');
$routes->add('admin/user/delete',       'User::delete');

# ######user routes ########################
$routes->add('user/dashboarduser',      'UserPanel::Dash');
$routes->add('user/packageuser',        'Packageuser::package_list');
/////
$routes->add('user/partners',           'Partners::partners');
$routes->add('user/partners/insert',    'Partners::insert');
$routes->add('user/partners/delete',    'Partners::delete');
$routes->add('user/partners/get_data',  'Partners::get_data');
$routes->add('user/partners/update',    'Partners::update');
/////
$routes->add('user/contacts',           'Contacts::contacts');
$routes->add('user/contacts/insert',    'Contacts::insert');
$routes->add('user/contacts/delete',    'Contacts::delete');
$routes->add('user/contacts/get_data',  'Contacts::get_data');
$routes->add('user/contacts/update',    'Contacts::update');
//////
$routes->add('user/products',           'Products::products');
$routes->add('user/products/insert',    'Products::insert');
$routes->add('user/products/delete',    'Products::delete');
$routes->add('user/products/get_data',  'Products::get_data');
$routes->add('user/products/update',    'Products::update');
/////
$routes->add('user/premi',           'Premi::premi');
$routes->add('user/premi/insert',    'Premi::insert');
$routes->add('user/premi/delete',    'Premi::delete');
$routes->add('user/premi/get_data',  'Premi::get_data');
$routes->add('user/premi/update',    'Premi::update');
$routes->add('user/premi/get_block_data',  'Premi::get_block_data');
////
$routes->add('user/companyInfo',   'CompanyInfo::companyInfo');
$routes->add('user/companyInfo/update',   'CompanyInfo::update');

$routes->add('user/category',           'Category::categories');
$routes->add('user/category/insert',    'Category::insert');
$routes->add('user/category/delete',    'Category::delete');
$routes->add('user/category/get_data',  'Category::get_data');
$routes->add('user/category/update',    'Category::update');

///// testing
$routes->add('admin/test',      'Test::test');



$routes->add('/ajax/(:any)', 'Ajax::index/$1');
$routes->add('user/brochures/new',    'Brochures::new_broch');
$routes->add('user/brochures/delete',    'Brochures::delete');
$routes->add('user/brochures/edit/(:any)',    'Brochures::edit_broch/$1');

$routes->add('user/brochures/preview/(:any)',    'Brochures::preview_broch/$1');

$routes->add('user/brochures',    'Brochures::index');


// $routes->match(['get','post'],'register', 'Users::user', ['filter' => 'noauth']);



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
