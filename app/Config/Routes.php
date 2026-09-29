<?php

use CodeIgniter\Router\RouteCollection;


$routes->get('/', 'Home::index', ['as' => 'home']);
$routes->get('tasks', 'Tasks::index', ['as' => 'tasks']);
$routes->get('profile', 'Pages::profile', ['as' => 'profile']);
$routes->get('about', 'Pages::about', ['as' => 'about']);
