<?php
require 'partials/header.php';
require 'partials/nav.php';
?>

<main class="main">

    <section class="movie">

        <li><?= $movie['title'] ?></li>

    </section>

    <section class="add__review">
        <h3>User Reviews (<?= $reviewsCount ?>)</h3>
    </section>

    <section class="reviews">
        <?php while ($review = $reviews->fetch(PDO::FETCH_ASSOC)) : ?>
            <li><?= $review['review'] ?> - <?= $review['username'] ?></li>
        <?php endwhile; ?>
    </section>

</main>

<?php
require 'partials/footer.php';
