<?php
use Bookstore\Book\Repositories\BookRepository;
use Bookstore\Library\DB\DBConnection;
use Bookstore\Publisher\Repositories\PublisherRepository;

require_once '../../autoload.php';

$errors = [];
$bookRepository = books();
$publisherRepository = publishers();
$publisherId = null;
$publisherName = null;

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirect('book.php');
}

if (!isset($_POST['publisher_id'])) {
    $errors['publisher_id'] = 'Publisher Id is required';
} else {
    $publisherId = $_POST['publisher_id'];
    $publisherName = $publisherRepository->findById($publisherId);
}

$books = $bookRepository->booksFromPublisher($publisherName);

foreach ($books as $book) {
    echo '<h1>' . $book . '</h1>';
}