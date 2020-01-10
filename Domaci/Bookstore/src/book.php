<?php
require_once './autoload.php';

use Bookstore\Library\DB\DBConnection;
use Bookstore\Publisher\Repositories\PublisherRepository;

$connection = DBConnection::getConnection();

$publishers = publishers()->all();
$autors = autors()->all();
$genres = genres()->all();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Book</title>
</head>
<body>
    <form action="./book-add.php" method="POST">
        <!-- ISBN -->
        <label for="isbn">ISBN</label>
        <input id="isbn" type="text" name="isbn" placeholder="Enter book ISBN" required>

        <!-- Name -->
        <label for="name">Name</label>
        <input id="name" type="text" name="name" placeholder="Enter book name" required>

        <!-- Year of publication -->
        <label for="year_of_publication">Year of publication</label>
        <input id="year_of_publication" id="year_of_publication" placeholder="Enter book year of publication">

        <!-- Publisher id -->
        <label for="publisher_id">Publisher</label>
        <select name="publisher_id" id="publisher_id">
            <?php
                foreach ($publishers as $publisher) {
                    echo "<option value=\"$publisher->id\">$publisher->name</option>";
                }
            ?>
        </select>

        <!-- Submit -->
        <button type="submit">Save</button>

    </form>

    <br>
    <form action="./books-from-publisher.php" method="POST">
        <!-- Publisher id -->
        <label for="publisher_id">Publisher</label>
        <select name="publisher_id" id="publisher_id">
            <?php
                foreach ($publishers as $publisher) {
                    echo "<option value=\"$publisher->id\">$publisher->name</option>";
                }
            ?>
        </select>

        <!-- Submit -->
        <button type="submit">Prikazi</button>
    </form>

    <br>
    <form action="./books-from-autor.php" method="POST">
        <!-- Autor id -->
        <label for="autor_id">Autor</label>
        <select name="autor_id" id="autor_id">
            <?php
                foreach ($autors as $autor) {
                    echo "<option value=\"$autor->id\">$autor->name</option>";
                }
            ?>
        </select>

        <!-- Submit -->
        <button type="submit">Prikazi</button>
    </form>

    <br>
    <form action="./books-of-genres.php" method="POST">
        <!-- Genre id -->
        <label for="genre_id">Genre</label>
        <select name="genre_id" id="genre_id">
            <?php
                foreach ($genres as $genre) {
                    echo "<option value=\"$genre->id\">$genre->name</option>";
                }
            ?>
        </select>

        <!-- Submit -->
        <button type="submit">Prikazi</button>
    </form>
</body>
</html>