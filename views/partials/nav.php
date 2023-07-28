<nav class="nav">
    <div class="nav__logo">
        <a href="/"><img src="https://www.themoviedb.org/assets/2/v4/logos/v2/blue_square_1-5bdc75aaebeb75dc7ae79426ddd9be3b2be1e342510f8202baf6bffa71d7f5c4.svg" alt="IMDb" width="75px"></a>
    </div>
    <ul class="nav__page">
        <li><a href="/">Home</a></li>
        <li><a href="/movies">Movies</a></li>
        <li><a href="/contact">Contact</a></li>
    </ul>

    <ul class="nav__user">
        <?php if (isset($_COOKIE['user_id'])) : ?>

            <li><a href="/profile"><i class="fa-solid fa-user"></i> Profile</a></li>
            <li><a href="/watchlist"><i class="fa-solid fa-clapperboard"></i> Watchlist <sup>(0)</sup> </a></li>
            <li><a href="/reviews"><i class="fa-solid fa-star-half-stroke"></i> Reviews <sup>(0)</sup> </a></li>
            <li><button onClick=logOut()><i class="fa-solid fa-right-from-bracket"></i> Logout</button></li>

        <?php else : ?>

            <li><a href="/login"><i class="fa-solid fa-right-to-bracket"></i> Login</a></li>
            <li><a href="/signup"><i class="fa-solid fa-user-plus"></i> Singup</a></li>

        <?php endif; ?>
    </ul>

</nav>