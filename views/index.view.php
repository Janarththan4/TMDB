<?php
require 'partials/header.php';
require 'partials/nav.php';
?>

<main class="main">
    <section class="hero">
        <h1>Welcome.</h1>
        <h3>Millions of movies to discover. Explore now.</h3>
        <form action="/movies" class="hero__form">
            <input type="text" class="hero__search" placeholder="Search for a movie...">
            <button class="hero__search__btn">Search</button>
        </form>
    </section>

    <section class="movies">
        <h1>Recent Movies</h1>
        <div class="movies__container">
            <?php while ($recentMovie = $recentMovies->fetch(PDO::FETCH_ASSOC)) :  ?>
                <div class="movie__container">
                    <a href="/movie?mid=<?= $recentMovie['mid'] ?>">
                        <img src="/uploads/<?= $recentMovie['poster'] ?>" alt="" class="movie__poster">
                        <span>
                            [<?= strtoupper(substr($recentMovie['language'], 0, 2)) ?>]
                            <?= $recentMovie['title'] ?>
                            (<?= $recentMovie['year'] ?>)
                        </span>
                    </a>
                </div>
            <?php endwhile; ?>
        </div>
    </section>

    <section class="reviews">
        <h1>Recent Reviews</h1>
        <div class="reviews__container">
            <?php while ($recentReview = $recentReviews->fetch(PDO::FETCH_ASSOC)) : ?>
                <div class="review__container">

                    <h3><?= $recentReview['review'] ?></h3>
                    <p>- <a href="/movie?mid=<?= $recentReview['mid'] ?>"><?= $recentReview['title'] ?></a></p>
                    <i>by <?= $recentReview['username'] ?></i>

                </div>
            <?php endwhile; ?>
        </div>
    </section>

</main>

<?php
require 'partials/footer.php';
