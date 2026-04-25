<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/layanan', 'Layanan::index');
$routes->get('/booking/pesan/(:num)', 'Booking::pesan/$1');
$routes->post('/booking/simpan', 'Booking::simpan');
$routes->get('/menu', 'Makanan::index');
$routes->get('/login', 'Auth::login');
$routes->post('/auth/cek_login', 'Auth::cek_login');
$routes->get('/logout', 'Auth::logout');
$routes->get('/register', 'Auth::register');
$routes->post('/auth/simpan_register', 'Auth::simpan_register');
$routes->get('admin/dashboard', 'Admin::dashboard');
$routes->get('admin/layanan', 'Admin::layanan');
$routes->post('admin/tambah_layanan', 'Admin::tambah_layanan');
$routes->get('admin/hapus_layanan/(:num)', 'Admin::hapus_layanan/$1');
$routes->get('admin/makanan', 'Admin::makanan');
$routes->post('admin/tambah_makanan', 'Admin::tambah_makanan');
$routes->get('admin/hapus_makanan/(:num)', 'Admin::hapus_makanan/$1');
$routes->get('/logout', 'Auth::logout');
$routes->get('/admin/pesanan', 'Admin::pesanan');

