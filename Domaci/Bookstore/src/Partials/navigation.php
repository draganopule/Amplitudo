<div class="row">
    <nav class="col-sm-12 bg-header">
        <ul class="nav justify-content-center">

            <!-- Home -->
            <li class="nav-item">
                <a href="../../index.php" class="nav-link <?php if (isPageActive(['index.php'])) echo 'active' ?>">
                    Home
                </a>
            </li>

            <!-- Books -->
            <li class="nav-item">
                <a href="../../Book/Pages/books.php" class="nav-link <?php if (isPageActive(['books.php', 'books-edit.php'])) echo 'active' ?>">
                    Books
                </a>
            </li>

            <!-- Autors -->
            <li class="nav-item">
                <a href="../../Autor/Pages/autors.php" class="nav-link <?php if (isPageActive(['autors.php', 'autors-edit.php', ])) echo 'active' ?>">
                    Autors
                </a>
            </li>

            <!-- Genres -->
            <li class="nav-item">
                <a href="../../Genre/Pages/genres.php" class="nav-link <?php if (isPageActive(['genres.php', 'genres-edit.php'])) echo 'active' ?>">
                    Genres
                </a>
            </li>

            <!-- Publishers -->
            <li class="nav-item">
                <a href="../../Publisher/Pages/publishers.php" class="nav-link <?php if (isPageActive(['publishers.php', 'publishers-edit.php'])) echo 'active' ?>">
                    Publisher
                </a>
            </li>

            <!-- Users -->
            <li class="nav-item">
                <a href="../../User/Pages/users.php" class="nav-link <?php if (isPageActive(['users.php', 'users-edit.php'])) echo 'active' ?>">
                    Users
                </a>
            </li>
        </ul>
    </nav>
</div>
