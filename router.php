<?php

$routes = [
    '/' => 'controllers/index.php',
    '/login' => 'controllers/login.php',
    '/signup' => 'controllers/signup.php',
    '/logout' => 'controllers/logout.php',
];

function routeToController($uri, $routes)
{
    if (array_key_exists($uri, $routes)) {
        require $routes[$uri];
    } else {
        abort();
    }
}

function abort($code = 404)
{
    http_response_code($code);
    require "views/{$code}.php";
    die();
}

routeToController($uri, $routes);
