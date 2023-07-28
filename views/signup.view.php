<?php
require 'partials/header.php';
require 'partials/nav.php';
?>

<main class="main">
    <div class="form">
        <fieldset>
            <legend>
                <h3>Create a New Account</h3>
            </legend>

            <?php if (isset($error)) : ?>
                <?php foreach ($error as $error) : ?>
                    <div class="alert" id="alert">
                        <?= $error ?>
                        <button id="close" onclick="remove()"><i class="fa-solid fa-xmark"></i></button>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>

            <form action="" method="post" class="form__container">

                <label for="username">Username</label>
                <input type="text" name="username" id="username" value="<?= isset($username) ? $username : '' ?>">

                <label for=" email">Email</label>
                <input type="email" name="email" id="email" value="<?= isset($email) ? $email : '' ?>">

                <label for=" password">Password</label>
                <input type="password" name="password" id="password" value="<?= isset($password) ? $password : '' ?>">

                <label for="cpassword">Confirm Password</label>
                <input type="password" name="cpassword" id="cpassword" value="<?= isset($cpassword) ? $cpassword : '' ?>">

                <button type="submit" class="primary__btn">Signup</button>

                <span>Already Have an Account? <a href="/login">Login</a></span>
            </form>
        </fieldset>
    </div>
</main>
<?php
require 'partials/footer.php';
