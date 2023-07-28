<?php
$title = "TMDB &bull; 404";
require 'partials/header.php';
?>
<style>
    .page__notfound {
        text-align: center;
        line-height: 1.7;
    }

    .page__notfound * {
        margin-block: 2rem;
    }

    .page__notfound h1 {
        font-size: 4rem;
    }

    .page__notfound h3 {
        font-size: 2rem;
    }

    .page__notfound a {
        color: dodgerblue;
        text-decoration: underline;
    }
</style>
<main class="main">
    <div class="page__notfound">
        <h1>404</h1>
        <h3>Page Not Found.</h3>
        <p>Sorry, we couldn’t find the page you’re looking for...</p>
        <a href="/">Go Home</a>
    </div>
</main>