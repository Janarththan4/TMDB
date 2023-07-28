<?php
$title = "TMDB &bull; My Profile";

if (!isset($_COOKIE['user_id'])) {
    header('Location: /');
}

require 'database.php';

$user_id = $_COOKIE['user_id'];
$stmt = $conn->prepare("SELECT * FROM users WHERE uid = :uid");
$stmt->bindParam(":uid", $user_id);
$stmt->execute();

$user = $stmt->fetch(PDO::FETCH_ASSOC);
$username = $user['username'];
$email = $user['email'];
$password = $user['password'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $opassword = htmlspecialchars($_POST['opassword']);
    $npassword = htmlspecialchars($_POST['npassword']);
    $cnpassword = htmlspecialchars($_POST['cnpassword']);

    if (empty($opassword)) {
        $error[] = "Old Password is required";
    } else
    if (!$opassword == password_verify($opassword, $password)) {
        $error[] = "Incorrect Old Password";
    } else
    if (empty($npassword)) {
        $error[] = "New Password is required";
    } else
    if (strlen($npassword) < 5) {
        $error[] = "New Password must be atleast 5 characters";
    } else if (!preg_match("/[a-z]/i", $npassword)) {
        $error[] = "New Password must contain one letter";
    } else if (!preg_match("/[0-9]/", $npassword)) {
        $error[] = "New Password must contain one number";
    } else
    if (empty($cnpassword)) {
        $error[] = "Confirm New Password";
    } else
    if ($npassword != $cnpassword) {
        $error[] = "Confirm Password doesn't match!";
    } else {
        $hash_password = password_hash($npassword, PASSWORD_DEFAULT);

        $stmt = $conn->prepare("UPDATE users SET password = :password WHERE uid = :uid");
        $stmt->bindParam(":password", $hash_password);
        $stmt->bindParam(":uid", $user_id);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            echo '<script>Swal.fire("Your profile has been updated!", "", "success");</script>';
        }
    }
}

require 'views/profile.view.php';
