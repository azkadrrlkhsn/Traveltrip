<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// --- Tambahkan baris di bawah ini ---
$routes->get('/cari', 'Search::index');

$routes->get('/pesan/(:num)', 'Booking::detail/$1');
$routes->get('/pesan/(:num)', 'Booking::detail/$1'); // Sudah ada sebelumnya
$routes->post('/booking/proses', 'Booking::proses'); // Route baru untuk submit form
$routes->get('/booking/sukses/(:segment)', 'Booking::sukses/$1'); // Route halaman sukses
$routes->get('/cek-pesanan', 'CekPesanan::index');
$routes->get('/cek-pesanan/cari', 'CekPesanan::cari');
$routes->get('/booking/payment/(:segment)', 'Booking::payment/$1');
$routes->post('/booking/verifikasi', 'Booking::verifikasi');
$routes->get('/auth/google', 'Auth::googleLogin');
$routes->get('/auth/google/callback', 'Auth::googleCallback');
$routes->get('/akun', 'Akun::index');
