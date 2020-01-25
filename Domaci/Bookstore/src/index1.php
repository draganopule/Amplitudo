<?php

require_once './autoload.php';

use Bookstore\Book\Models\Book;
use Bookstore\Book\Repositories\BookRepository;
use Bookstore\Library\DB\DBConnection;
use Bookstore\Library\Exceptions\ItemNotFoundException;
use Bookstore\Review\Repositories\ReviewRepository;

$connection = DBConnection::getConnection();

$bookRepository = new BookRepository($connection);
$reviewRepository = new ReviewRepository($connection);
$autorRepository = autors();

//$books = $bookRepository->all();
//$books = $bookRepository->booksFromPublisher('Laguna');
//$books = $bookRepository->booksUserRentals('Marko');
$books = $bookRepository->booksSearch('cas');

foreach ($books as $book) {
    
    $autor = $autorRepository->autorFromBook($book->id);
    $avGrade = $reviewRepository->averageGradeOfBook($book->id);
    echo '<h3>' . $book . ', ' . $autor . ', ' . $avGrade . '</h3>';
}
$users = users()->all();

foreach ($users as $user) {
    echo '<pre>' . $user->email . '</pre>';
}


/*
foreach ($books as $book) {
    if(floatval($reviewRepository->averageGradeOfBook($book->name)) > 4.6){
        echo '<h3>' . $book . ', prosjecna ocjena: ' . $reviewRepository->averageGradeOfBook($book->name) . '</h3>';
    }
}
*/


//echo '<h1>' . $knjigaRepository->findById('0123456789798')->naziv . '</h1>';

//$dictionaryRepository->insert(['id' => 3, 'name' => 'Ime 1', 'language_code' => 'en', 'description' => 'Opis 1']);
//$bookRepository->create(['isbn'=>'0123456789802', 'name'=>'Ime 1', 'year_of_publication'=> 2019, 'publisher_id'=> 5]);
//$book = new Book('0123456789801', 'Ime 1', 2019, 5);
//$bookRepository->create($book->__toArray());
//$dictionaryRepository->destroy(3);
//try {
//    $dictionaryRepository->findById(3);
//} catch (ItemNotFoundException $e) {
//    die('ItemNotFound!');
//}



DBConnection::closeConnection();