<?php

require_once './autoload.php';

use Bookstore\Book\Models\Book;
use Bookstore\Book\Repositories\BookRepository;
use Bookstore\Library\DB\DBConnection;
use Bookstore\Library\Exceptions\ItemNotFoundException;

$connection = DBConnection::getConnection();

$bookRepository = new BookRepository($connection);

$books = $bookRepository->all();

foreach ($books as $book) {
    echo '<h1>' . $book . '</h1>';
}

//echo '<h1>' . $knjigaRepository->findById('0123456789798')->naziv . '</h1>';

//$dictionaryRepository->insert(['id' => 3, 'name' => 'Ime 1', 'language_code' => 'en', 'description' => 'Opis 1']);
//$bookRepository->insert(new Book('0123456789806', 'Ime 6', 2019, 5));
//$dictionaryRepository->destroy(3);
//try {
//    $dictionaryRepository->findById(3);
//} catch (ItemNotFoundException $e) {
//    die('ItemNotFound!');
//}



DBConnection::closeConnection();