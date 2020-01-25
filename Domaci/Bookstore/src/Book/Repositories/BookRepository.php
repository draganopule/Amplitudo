<?php

namespace Bookstore\Book\Repositories;

use Bookstore\Book\Models\Book;
use Bookstore\Book\Transformers\BookTransformer;
use Bookstore\Library\Exceptions\ItemNotDeletedException;
use Bookstore\Library\Exceptions\ItemNotFoundException;
use Bookstore\Library\Exceptions\ItemNotSavedException;
use Bookstore\Library\Repositories\ObjectRepository;

use mysqli as MySQL;

class BookRepository extends ObjectRepository
{
    protected $tableName = 'books';
    protected $primaryKey = 'id';
    
    public function __construct(MySQL $connection)
    {
        parent::__construct($connection);
        $this->transformer = new BookTransformer($connection);
    }

    /*Korisnik izlistava sve knjige koje je objavila odredjena izdavacka kuca */
    public function booksFromPublisher($publisherName)
    {
        $publisherName = publishers()->transformer->sqlString($publisherName);

        $query = "SELECT * FROM books B WHERE EXISTS (SELECT * FROM publishers P WHERE P.id = B.publisher_id AND LOWER(P.name) = LOWER($publisherName))";
        
        $result = $this->connection->query($query);

        if (!$result) {
            return [];
        }

        $transformed = books()->transformer->toObjectArray($result);

        mysqli_free_result($result);
        return $transformed;
    }

    /*Korisnik izlistava sve knjige odredjenog zanra */
    public function booksOfGenre($genreName)
    {
        $genreName = genres()->transformer->sqlString($genreName);

        $query = "SELECT * FROM genres G, books B WHERE EXISTS (SELECT * FROM book_genres BG WHERE B.id = BG.book_id AND G.id = BG.genre_id AND LOWER(G.name) = LOWER($genreName))";
       
        $result = $this->connection->query($query);

        if (!$result) {
            return [];
        }

        $transformed = books()->transformer->toObjectArray($result);

        mysqli_free_result($result);
        return $transformed;
    }

    /* Korisnik pregleda sve knjige koje je napisao odredjeni autor */
    public function booksFromAutor($autorName)
    {
        $autorName = autors()->transformer->sqlString($autorName);

        $query = "SELECT * FROM books WHERE id IN (SELECT book_id FROM book_autors WHERE autor_id = (SELECT id FROM autors WHERE LOWER(name) = LOWER($autorName)))";
        
        $result = $this->connection->query($query);

        if (!$result) {
            return [];
        }

        $transformed = books()->transformer->toObjectArray($result);

        mysqli_free_result($result);
        return $transformed;
    }

    /* Korisnik izlistava sve knjige koje je iznajmljivao korisnik sa odredjenim username-om */
    public function booksUserRentals($username)
    {
        $username = users()->transformer->sqlString($username);

        $query = "SELECT * FROM books B WHERE EXISTS (SELECT * FROM rentals R WHERE B.id = R.book_id AND LOWER(R.user_id) = (SELECT U.id FROM users U WHERE U.username = LOWER($username)))";
        //echo '<pre>' . $query . '</pre>';
        $result = $this->connection->query($query);

        if (!$result) {
            return [];
        }

        $transformed = books()->transformer->toObjectArray($result);

        mysqli_free_result($result);
        return $transformed;
    }

    /*Korisnik izlistava sve knjige koje u imenu sadrze proslijedjeni string */
    public function booksSearch($name)
    {
        $query = "SELECT * FROM books B WHERE lower(B.name) like '%" . $name . "%'";
       
        $result = $this->connection->query($query);

        if (!$result) {
            return [];
        }

        $transformed = books()->transformer->toObjectArray($result);

        mysqli_free_result($result);
        return $transformed;
    }

}