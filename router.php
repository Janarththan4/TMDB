<?php

$routes = [
    '/' => 'controllers/index.php',
    '/movies' => 'controllers/movies.php',
    '/movie' => 'controllers/movie.php',
    '/login' => 'controllers/login.php',
    '/signup' => 'controllers/signup.php',
    '/logout' => 'controllers/logout.php',
    '/profile' => 'controllers/profile.php',
    '/watchlist' => 'controllers/watchlist.php',
    '/reviews' => 'controllers/reviews.php',
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
