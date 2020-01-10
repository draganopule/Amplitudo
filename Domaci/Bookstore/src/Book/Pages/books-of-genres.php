<?php

require_once './autoload.php';

$errors = [];
$bookRepository = books();
$genreRepository = genres();
$genreId = null;
$genreName = null;

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirect('book.php');
}

if (!isset($_POST['genre_id'])) {
    $errors['genre_id'] = 'Genre Id is required';
} else {
    $genreId = $_POST['genre_id'];
    $genreName = $genreRepository->findById($genreId);
}

$books = $bookRepository->booksOfGenre($genreName);

foreach ($books as $book) {
    echo '<h1>' . $book . '</h1>';
}