<?php
use Bookstore\Book\Repositories\BookRepository;
use Bookstore\Library\DB\DBConnection;

require_once './autoload.php';

$errors = [];
$bookRepository = new BookRepository(DBConnection::getConnection());
$isbn = null;
$name = null;
$yearOfPublication = null;
$publisherId = null;

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirect('book.php');
}

if (!isset($_POST['isbn'])) {
    $errors['isbn'] = 'ISBN is required';
} else {
    $isbn = $_POST['isbn'];
}

if (!isset($_POST['name'])) {
    $errors['name'] = 'Name is required';
} else {
    $name = $_POST['name'];
}

if (isset($_POST['year_of_publication'])) {
    $yearOfPublication = $_POST['year_of_publication'];
}

if (!isset($_POST['publisher_id'])) {
    $errors['publisher_id'] = 'Publisher Id is required';
} else {
    $publisherId = $_POST['publisher_id'];
}

print_r($isbn);
print_r($name);
print_r($yearOfPublication);
print_r($publisherId);
print_r($errors);

$description = $bookRepository->save([
    'isbn' => $isbn,
    'name' => $name,
    'year_of_publication' => $yearOfPublication,
    'publisher_id' => $publisherId,
]);

print_r($description);