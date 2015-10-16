<?php
use Cake\Routing\Router;

Router::plugin('Admin', function ($routes) {

    $routes->connect('/', ['controller' => 'Panels', 'action' => 'index']);
    $routes->fallbacks('DashedRoute');

});
