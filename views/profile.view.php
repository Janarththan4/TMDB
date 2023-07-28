<?php
require 'partials/header.php';
require 'partials/nav.php';
?>

<main class="main">

    <div class="form">
        <fieldset>
            <legend>
                <h3>My Profile</h3>
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
                <input type="text" name="username" id="username" disabled value="<?= $username ?>">

                <label for=" email">Email</label>
                <input type="email" name="email" id="email" disabled value="<?= $email ?>">

                <label for=" opassword">Old Password</label>
                <input type="password" name="opassword" id="opassword">

                <label for=" npassword">New Password</label>
                <input type="password" name="npassword" id="npassword">

                <label for=" cnpassword">Confirm New Password</label>
                <input type="password" name="cnpassword" id="cnpassword">

                <button type="submit" name="update-profile" class="primary__btn update">Change Password</button>

            </form>
            <button name="delete-profile" class="primary__btn delete" onclick="deleteAccount(<?= $user['uid'] ?>)">Delete My Account</button>

        </fieldset>
    </div>

</main>

<?php
require 'partials/footer.php';
