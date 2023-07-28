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
            <div class="movie__container">
                <?php // 
                ?>
            </div>
        </div>
    </section>

    <section class="reviews">
        <h1>Recent Reviews</h1>
        <div class="reviews__container">
            <div class="review__container">
                <?php // 
                ?>
            </div>
        </div>
    </section>

</main>

<?php
require 'partials/footer.php';
