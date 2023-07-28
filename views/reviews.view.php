<?php
require 'partials/header.php';
require 'partials/nav.php';
?>

<main class="main">

    <section class="reviews">

        <div class="my__reviews">
            <table>
                <caption>My Reviews</caption>
                <thead>
                    <tr>
                        <th>Movie</th>
                        <th>Rating</th>
                        <th>Review</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($review = $reviews->fetch(PDO::FETCH_ASSOC)) : ?>
                        <tr>
                            <td data-cell="Movie"><a href="/movie?mid=<?= $review['mid'] ?>"><?= $review['title'] ?></a></td>
                            <td data-cell="Rating"><i class="fa-solid fa-star-half-stroke"></i> <?= $review['rating'] ?>/10</td>
                            <td data-cell="Review"><?= $review['review'] ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </section>

</main>

<?php
require 'partials/footer.php';
