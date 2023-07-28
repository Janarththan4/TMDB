<?php
require 'partials/header.php';
require 'partials/nav.php';
?>

<main class="main">
    <section class="watchlist">
        <h2>My Watchlist</h2>

        <div class="my__watchlist">

            <?php while ($watchlist = $watchlists->fetch(PDO::FETCH_ASSOC)) : ?>

                <a href="/movie?mid=<?= $watchlist['mid'] ?>">
                    <img src="/uploads/<?= $watchlist['poster'] ?>" alt="" height="200px" width="auto">
                    <?= $watchlist['title'] ?>
                </a>

            <?php endwhile; ?>
        </div>
    </section>
</main>

<?php
require 'partials/footer.php';
