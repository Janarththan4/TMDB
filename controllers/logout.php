    <?php
    setcookie('user_id', '', time() - 1, '/');
    $_SESSION['logout'] = "You've been logged out!";
    header("Location: /");
