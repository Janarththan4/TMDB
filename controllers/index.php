<?php
$title = "TMDB &bull; Home";

require 'database.php';

$recentMovies = $conn->prepare("SELECT * FROM movies ORDER BY mid DESC LIMIT 5");
$recentMovies->execute();

$recentReviews = $conn->prepare("SELECT * FROM reviews AS R
                        INNER JOIN users AS U ON R.uid = U.uid
                        INNER JOIN movies AS M ON R.mid = M.mid
                        ORDER BY rid DESC LIMIT 4");
$recentReviews->execute();

require 'views/index.view.php';

if (isset($_SESSION['login'])) {
    echo '<script>Swal.fire("' . $_SESSION['login'] . '", "", "success");</script>';
    unset($_SESSION['login']);
}
if (isset($_SESSION['delete-user'])) {
    echo '<script>Swal.fire("' . $_SESSION['delete-user'] . '", "", "error");</script>';
    unset($_SESSION['delete-user']);
}
if (isset($_SESSION['logout'])) {
    echo '<script>Swal.fire("' . $_SESSION['logout'] . '", "", "warning");</script>';
    unset($_SESSION['logout']);
}
