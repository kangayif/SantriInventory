<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');
$routes->get('santri', 'Santri::index');
$routes->post('santri/simpan', 'Santri::simpan');
$routes->get('santri/edit/(:num)', 'Santri::edit/$1');
$routes->post('santri/update/(:num)', 'Santri::update/$1');
$routes->get('santri/hapus/(:num)', 'Santri::hapus/$1');