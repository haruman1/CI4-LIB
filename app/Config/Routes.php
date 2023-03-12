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
// direktori asli

$routes->get('/', 'Home::index');
$routes->get('/check', 'Auth::testEmail');
$routes->get('/about', 'Home::tentangkita');
$routes->get('/category', 'CategoryController::index');
$routes->get('/category/borrow', 'CategoryController::pinjam_buku');
$routes->post('/category/borrow/book', 'CategoryController::savePinjam');
$routes->get('/category/search', 'CategoryController::search');
$routes->get('/category/mybook', 'CategoryController::buku_saya');
$routes->get('/category/read', 'CategoryController::baca_buku');
$routes->get('category/mybook/deletedata_pinjam', 'CategoryController::deletepinjambuku');


//tentang auth disini
$routes->get('/login', 'Auth::login');
$routes->post('/login', 'Auth::loginSave');
$routes->get('/register', 'Auth::index');
$routes->post('/register', 'Auth::registerSave');
$routes->get('/logout', 'Auth::logout');
$routes->post('/forget', 'Auth::lupapw');
$routes->get('/forget', 'Auth::forget');


//route admin
$routes->get('/admin', 'Admin::index');
$routes->get('/admin/anggota', 'Admin::anggota');
$routes->get('/admin/anggota', 'Admin::editUser');
$routes->post('/admin/anggota', 'Admin::tambahAnggota');
$routes->post('/admin/anggota/edit', 'Admin::editUser');
$routes->get('/admin/buku', 'Admin::buku');
$routes->post('/admin/buku/save', 'Admin::tambahBuku');
$routes->post('/admin/buku/edit', 'Admin::editBuku');
$routes->get('/admin/transaksi', 'Admin::transaksi');
$routes->get('/admin/anggota/delete', 'Admin::deleteUser');
//mangill isi database

$routes->get('/database', 'IsiDatabase::index');
$routes->get('/database/halamanbuku', 'IsiDatabase::hlmnbuku');
$routes->get('/database/buku', 'IsiDatabase::bukutersedia');
//manggil Trigger
$routes->get('/trigger', 'SemuaTrigger::index');
$routes->get('/trigger/log/delete', 'SemuaTrigger::log_delete_user');
$routes->get('/trigger/log/insert', 'SemuaTrigger::TriggerInsertUser');
$routes->get('/trigger/log/update', 'SemuaTrigger::log_update_user');
$routes->get('/trigger/transaksi/insert', 'SemuaTrigger::transaksi_insert_Trigger');
$routes->get('/prod/insert', 'SemuaTrigger::procedureCreateUser');
$routes->get('/trigger/buku/delete', 'SemuaTrigger::trigger_hapus_buku');
$routes->get('/trigger/buku/insert', 'SemuaTrigger::trigger_penambahan_buku');
$routes->get('/trigger/buku/update', 'SemuaTrigger::trigger_perubahan_buku');
$routes->get('/trigger/buku/jumlah', 'SemuaTrigger::update_jumlah_peminjaman');
$routes->get('/trigger/buku/stok', 'SemuaTrigger::update_stok_pengembalian');
$routes->get('/trigger/buku/trending', 'SemuaTrigger::viewTrendingbook');
//manggil hasil database

$routes->get('/database/berhasil', 'IsiDatabase::hlmnbuku');
$routes->get('/database/gagal', 'IsiDatabase::hlmnbuku');

$routes->get('/database/berhasil', 'IsiDatabase::bukutersedia');
$routes->get('/database/gagal', 'IsiDatabase::bukutersedia');
//hasilnya trigger
$routes->get('/trigger/berhasil', 'SemuaTrigger::log_delete_user');
$routes->get('/trigger/gagal', 'SemuaTrigger::log_delete_user');

$routes->get('/trigger/berhasil', 'SemuaTrigger::log_insert_user');
$routes->get('/trigger/gagal', 'SemuaTrigger::log_insert_user');

$routes->get('/trigger/berhasil', 'SemuaTrigger::log_update_user');
$routes->get('/trigger/gagal', 'SemuaTrigger::log_update_user');

$routes->get('/trigger/berhasil', 'SemuaTrigger::transaksi_insert');
$routes->get('/trigger/gagal', 'SemuaTrigger::transaksi_insert');

$routes->get('/trigger/berhasil', 'SemuaTrigger::procedureCreateUser');
$routes->get('/trigger/gagal', 'SemuaTrigger::procedureCreateUser');

$routes->get('/trigger/berhasil', 'SemuaTrigger::trigger_hapus_buku');
$routes->get('/trigger/gagal', 'SemuaTrigger::trigger_hapus_buku');

$routes->get('/trigger/berhasil', 'SemuaTrigger::trigger_penambahan_buku');
$routes->get('/trigger/gagal', 'SemuaTrigger::trigger_penambahan_buku');

$routes->get('/trigger/berhasil', 'SemuaTrigger::trigger_perubahan_buku');
$routes->get('/trigger/gagal', 'SemuaTrigger::trigger_perubahan_buku');

$routes->get('/trigger/berhasil', 'SemuaTrigger::update_jumlah_peminjaman');
$routes->get('/trigger/gagal', 'SemuaTrigger::update_jumlah_peminjaman');

$routes->get('/trigger/berhasil', 'SemuaTrigger::update_stok_pengembalian');
$routes->get('/trigger/gagal', 'SemuaTrigger::update_stok_pengembalian');

$routes->get('/trigger/berhasil', 'SemuaTrigger::viewTrendingbook');
$routes->get('/trigger/gagal', 'SemuaTrigger::viewTrendingbook');



$routes->get('/verifikasiEmail', 'Auth::EmailVer');



// $routes->get('/trigger/user', 'SemuaTrigger::TriggerInsertUser');
// $routes->get('/prod/user', 'SemuaTrigger::procedureCreateUser');

// $routes->get('/trigger/hapus/buku', 'SemuaTrigger::trigger_hapus_buku');
// $routes->get('/trigger/transaksi', 'SemuaTrigger::transaksi_insert_Trigger');




// API
// $routes->post('/register', 'Auth::register');
$routes->get('/api/user', 'HandlerLogin::index');

$routes->get('/api/ip', 'HandlerLogin::hitApi');
$routes->get('/api/user/(:num)', 'HandlerLogin::index/$1');
$routes->post('/api/user', 'HandlerLogin::create');
$routes->put('/api/user/(:num)', 'HandlerLogin::update/$1');
// $routes->patch('/api/user/(:num)', 'HandlerLogin::update/$1');
$routes->delete('/api/user/(:num)', 'HandlerLogin::delete/$1');

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
