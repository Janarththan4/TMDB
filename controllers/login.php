<?php
require 'database.php';

if (isset($_COOKIE['user_id'])) {
    header('Location: /');
}

$title = "TMDB &bull; Login";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    if (empty($username)) {
        $error[] = 'Username is required';
    } else if (empty($password)) {
        $error[] = 'Password is required';
    } else {

        $stmt = $conn->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->bindParam(":username", $username);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $hashpassword = $result['password'];

            if (password_verify($password, $hashpassword)) {
                setcookie('user_id', $result['uid'], time() + 86400, '/'); // 1 day
                $_SESSION['login'] = "You are logged in!";
                header('location: /');
            } else {
                $error[] = "Incorrect password";
            }
        } else {
            $error[] = "Incorrect username";
        }
    }
}

require 'views/login.view.php';

if (isset($_SESSION['signup'])) {
    echo '<script>Swal.fire("' . $_SESSION['signup'] . '", "", "success");</script>';
    unset($_SESSION['signup']);
}
