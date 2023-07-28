<?php
require 'partials/header.php';
require 'partials/nav.php';
?>

<main class="main">
    <div class="form">
        <fieldset>
            <legend>
                <h3>Welcome To TMDB</h3>
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

                <label for=" password">Password</label>
                <input type="password" name="password" id="password" value="<?= isset($password) ? $password : '' ?>">

                <button type="submit" class="primary__btn">Login</button>

                <span>Don't Have an Account? <a href="/signup">Signup</a></span>
            </form>
        </fieldset>
    </div>
</main>

<?php
require 'partials/footer.php';
