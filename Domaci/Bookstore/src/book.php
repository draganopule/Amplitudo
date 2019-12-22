<?php
require_once './autoload.php';

use Bookstore\Library\DB\DBConnection;
use Bookstore\Publisher\Repositories\PublisherRepository;

$connection = DBConnection::getConnection();

$publisherRepository = new PublisherRepository($connection);
$publishers = $publisherRepository->all();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dictionary</title>
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
        <label for="publisher_id">Language</label>
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
</body>
</html>