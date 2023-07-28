<?php
$title = "TMDB &bull; Home";

require 'database.php';

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
