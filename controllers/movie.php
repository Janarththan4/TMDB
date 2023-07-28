<?php
if (isset($_GET['mid'])) {
    $mid = $_GET['mid'];
} else {
    abort();
}

require 'database.php';

$movie = $conn->prepare("SELECT * FROM movies WHERE mid = :mid");
$movie->bindParam(":mid", $mid);
$movie->execute();

if ($movie->rowCount() > 0) {
    $movie = $movie->fetch(PDO::FETCH_ASSOC);
} else {
    abort();
}

$reviews = $conn->prepare("SELECT * FROM reviews AS R INNER JOIN users AS U ON R.uid = U.uid WHERE mid = :mid");
$reviews->bindParam(":mid", $mid);
$reviews->execute();
$reviewsCount = $reviews->rowCount();

$title = "TMDB &bull; Movie ID: $mid";

require 'views/movie.view.php';
