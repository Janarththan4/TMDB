<?php
require 'partials/header.php';
require 'partials/nav.php';
?>

<main class="main">

    <section class="filter">

    </section>

    <section class="movies">
        <div class="movies__container">
            <?php while ($movie = $movies->fetch(PDO::FETCH_ASSOC)) :  ?>
                <div class="movie__container">
                    <a href="/movie?mid=<?= $movie['mid'] ?>">
                        <img src="/uploads/<?= $movie['poster'] ?>" alt="" class="movie__poster">
                        <span>
                            [<?= strtoupper(substr($movie['language'], 0, 2)) ?>]
                            <?= $movie['title'] ?>
                            (<?= $movie['year'] ?>)
                        </span>
                    </a>
                </div>
            <?php endwhile; ?>
        </div>

    </section>

    <section class="pagination">
        <?php
        if ($page > $no_of_pages) {
            abort();
        }

        if ($page >= 2) {
            echo "<a href='/movies?page=" . ($page - 1) . "'>  Prev </a>";
        }

        for ($i = 1; $i <= $no_of_pages; $i++) {
            if ($i == $page) {
                $page_link .= "<a class = 'active' href='/movies?page="
                    . $i . "'>" . $i . " </a>";
            } else {
                $page_link .= "<a href='/movies?page=" . $i . "'>" . $i . " </a>";
            }
        };
        echo $page_link;

        if ($page < $no_of_pages) {
            echo "<a href='/movies?page=" . ($page + 1) . "'>  Next </a>";
        }
        ?>
    </section>

</main>

<?php
require 'partials/footer.php';
