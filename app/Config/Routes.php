<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::home');

// User
$routes->get('/login', 'User::login');
$routes->post('/proses_login_user', 'User::proses_login_user');
$routes->get('/register', 'User::register');
$routes->post('/proses_register_user', 'User::proses_register_user');
$routes->get('/keluar', 'User::keluar');

// Notes
$routes->get('/tambah_notes', 'Notes::tambah_notes');
$routes->post('/proses_tambah_notes', 'Notes::proses_tambah_notes');
$routes->get('/hapus_notes/(:segment)', 'Notes::hapus_notes/$1');