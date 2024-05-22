<?php

use CodeIgniter\Router\RouteCollection;
use Config\Routes;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');  //Landing page
$routes->get('responden', 'Responden::responden'); //Menampilkan data responden
$routes->add('survei', 'Survei::index'); //Menampilkan survei
$routes->get('pertanyaan', 'Pertanyaan::index'); //Menampilkan data pertanyaan
$routes->post('add-pertanyaan', 'Pertanyaan::addPertanyaan'); //Menambahkan data pertanyaan
$routes->add('delete-pertanyaan/(:num)', 'Pertanyaan::deletePertanyaan/$1'); //Menghapus data pertanyaan
$routes->add('update-pertanyaan/(:num)', 'Pertanyaan::update/$1'); //Mengupdate data pertanyaan
$routes->post('save', 'Survei::save'); //Menyimpan data survei
$routes->get('login', 'Home::login'); //Menampilkan halaman login
$routes->get('dashboard', 'Dashboard::index'); //Menampilkan halaman dashboard
$routes->get('register', 'Home::register'); //Menambahkan data user
$routes->post('addUser', 'Home::addUser'); //Menambahkan data user
$routes->post('loginAction', 'Home::loginAction'); //Login
$routes->get('logout', 'Home::logout'); //Logout
// $routes->get('dashboard', 'Dashboard::index', ['filter' => 'auth']);
