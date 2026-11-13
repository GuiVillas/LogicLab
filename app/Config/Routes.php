<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');
$routes->get('produtos', 'ProdutoController::index');
$routes->get('produtos/buscar', 'ProdutoController::buscar');
