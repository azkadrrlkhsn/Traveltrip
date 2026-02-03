<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');                    
$routes->get('home/search', 'Home::search');         
$routes->get('tour/(:num)', 'Home::detail/$1');      
$routes->get('lang/(:segment)', 'Home::setLanguage/$1'); 

// AUTH
$routes->get('login', 'Auth::login');                
$routes->post('auth/process', 'Auth::process');      
$routes->get('logout', 'Auth::logout');              
$routes->get('auth/google_login', 'Auth::google_login');       
$routes->get('auth/google_callback', 'Auth::google_callback'); 

// === BOOKING MANUAL SYSTEM ===
$routes->post('payment', 'Home::payment');           // Halaman Review & Info Rekening
$routes->post('booking/process', 'Home::process_booking'); // Proses Upload Bukti
$routes->get('booking/success', 'Home::success');        
$routes->get('booking/history', 'Home::history');        
$routes->get('booking/print/(:num)', 'Home::print_ticket/$1'); 

// Review & Profile
$routes->post('review/save', 'Home::saveReview');
$routes->get('user/profile', 'Home::profile');       
$routes->get('user/edit', 'Home::editProfile');      
$routes->post('user/update', 'Home::updateProfile'); 

// ADMIN
$routes->get('admin', 'Admin::index');               
$routes->get('admin/bookings', 'Admin::bookings');   
$routes->post('admin/confirm/(:num)', 'Admin::confirm/$1'); 
$routes->post('admin/reject/(:num)', 'Admin::reject/$1');   
$routes->get('admin/bookings/delete/(:num)', 'Admin::delete_booking/$1'); 
$routes->get('admin/tours', 'Admin::tours');              
$routes->get('admin/tours/create', 'Admin::create_tour'); 
$routes->post('admin/tours/store', 'Admin::store_tour');  
$routes->get('admin/tours/edit/(:num)', 'Admin::edit_tour/$1'); 
$routes->post('admin/tours/update/(:num)', 'Admin::update_tour/$1'); 
$routes->get('admin/tours/delete/(:num)', 'Admin::delete_tour/$1');