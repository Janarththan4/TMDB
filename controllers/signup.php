<?php
$title = "TMDB &bull; Signup";

if (isset($_COOKIE['user_id'])) {
    header('Location: /');
}

require 'database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $cpassword = htmlspecialchars($_POST['cpassword']);

    if (empty($username)) {
        $error[] = "Username is required";
    } else if (empty($email)) {
        $error[] = "Email is required";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error[] = "Valid email is required";
    } else if (empty($password)) {
        $error[] = "Password is required";
    } else if (strlen($password) < 5) {
        $error[] = "Password must be atleast 5 characters";
    } else if (!preg_match("/[a-z]/i", $password)) {
        $error[] = "Password must contain one letter";
    } else if (!preg_match("/[0-9]/", $password)) {
        $error[] = "Password must contain one number";
    } else if (empty($cpassword)) {
        $error[] = "Confirm Password";
    } else if ($password !== $cpassword) {
        $error[] = "Password doesn't match!";
    } else {
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = :username OR email = :email");
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":email", $email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $error[] = "Username/Email is taken";
        } else {
            $hash_password = password_hash($password, PASSWORD_DEFAULT);

            $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
            $stmt->bindParam(":username", $username);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":password", $hash_password);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                $_SESSION['signup'] = "You have signed up!";
                header('Location: /login');
            }
        }
    }
}

require 'views/signup.view.php';
