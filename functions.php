<?php

function dd($value)
{
    echo '<pre>';
    var_dump($value);
    echo '</pre>';

    die();
}

function isUri($value)
{
    return $_SERVER['REQUEST_URI'] === $value;
}
// dd($_SERVER['REQUEST_URI']);

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
// dd(parse_url($uri));