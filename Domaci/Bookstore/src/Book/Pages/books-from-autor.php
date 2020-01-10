<?php

require_once './autoload.php';

$errors = [];
$bookRepository = books();
$autorRepository = autors();
$autorId = null;
$autorName = null;

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirect('book.php');
}

if (!isset($_POST['autor_id'])) {
    $errors['autor_id'] = 'Autor Id is required';
} else {
    $autorId = $_POST['autor_id'];
    $autorName = $autorRepository->findById($autorId);
}

$books = $bookRepository->booksFromAutor($autorName);

foreach ($books as $book) {
    echo '<h1>' . $book . '</h1>';
}