<?php
$title = "TMDB &bull; My Watchlist";

if (!isset($_COOKIE['user_id'])) {
    header('Location: /');
}

require 'database.php';

$user_id = $_COOKIE['user_id'];

$watchlists = $conn->prepare("SELECT movies.mid, movies.title, movies.poster
                            FROM watchlist
                            INNER JOIN movies ON watchlist.mid = movies.mid
                            WHERE uid = :uid");
$watchlists->bindParam(":uid", $user_id);
$watchlists->execute();

require 'views/watchlist.view.php';
