<?php

use CodeIgniter\Router\RouteCollection;


$routes->get('/', 'Home::index', ['as' => 'home']);
$routes->get('tasks', 'Tasks::index', ['as' => 'tasks']);
$routes->get('profile', 'Pages::profile', ['as' => 'profile']);
$routes->get('about', 'Pages::about', ['as' => 'about']);
$routes->get('login', 'Auth::login', ['as' => 'login']);
$routes->post('login', 'Auth::attempt', ['as' => 'login.submit']);
$routes->post('logout', 'Auth::logout', ['filter' => 'auth']);
$routes->get('tasks/new', 'Tasks::createForm', ['filter' => 'auth']);
$routes->post('tasks', 'Tasks::create', ['filter' => 'auth']);
$routes->get('tasks/(:num)/edit', 'Tasks::edit/$1', ['filter' => 'auth']);
$routes->post('tasks/(:num)/update', 'Tasks::update/$1', ['filter' => 'auth']);
$routes->post('tasks/(:num)/delete', 'Tasks::delete/$1', ['filter' => 'auth']);
