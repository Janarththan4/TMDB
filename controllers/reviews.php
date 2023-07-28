<?php
$title = "TMDB &bull; My Reviews";

if (!isset($_COOKIE['user_id'])) {
    header('Location: /');
}

require 'database.php';

$user_id = $_COOKIE['user_id'];

$reviews = $conn->prepare("SELECT movies.title, movies.mid, reviews.rating, reviews.review
                        FROM reviews  
                        INNER JOIN movies ON reviews.mid = movies.mid
                        WHERE uid= :uid");
$reviews->bindParam(":uid", $user_id);
$reviews->execute();

require 'views/reviews.view.php';
