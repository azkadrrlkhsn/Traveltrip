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
