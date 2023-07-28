<?php
$title = "TMDB &bull; Movies";

require 'database.php';

$stmt = $conn->prepare("SELECT * FROM movies ORDER BY mid DESC");
$stmt->execute();

$no_of_movies = $stmt->rowCount();
$movies_per_page = 5;

$no_of_pages = ceil($no_of_movies / $movies_per_page);
$page_link = '';

if (!isset($_GET['page'])) {
    $page = 1;
} else {
    $page = $_GET['page'];
}

$first_page_result = ($page - 1) * $movies_per_page;

$movies = $conn->prepare("SELECT * FROM movies ORDER BY mid DESC LIMIT $first_page_result, $movies_per_page");
$movies->execute();


require 'views/movies.view.php';
