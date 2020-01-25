<?php

namespace Bookstore\Review\Repositories;

use Bookstore\Review\Models\Review;
use Bookstore\Review\Transformers\ReviewTransformer;
use Bookstore\Library\Exceptions\ItemNotDeletedException;
use Bookstore\Library\Exceptions\ItemNotFoundException;
use Bookstore\Library\Exceptions\ItemNotSavedException;
use Bookstore\Library\Repositories\ObjectRepository;

use mysqli as MySQL;

class ReviewRepository extends ObjectRepository
{
    protected $tableName = 'reviews';
    protected $primaryKey = 'rev_number';
    
    public function __construct(MySQL $connection)
    {
        parent::__construct($connection);
        $this->transformer = new ReviewTransformer($connection);
    }

    /* Korisnik racuna prosjecnu ocjenu za odredjenu knjigu*/
    public function averageGradeOfBook($bookId)
    {
        //$bookName = books()->transformer->sqlString($bookName);

        $query = "SELECT AVG(grade) FROM reviews R WHERE book_id = $bookId";
        
        $result = $this->connection->query($query);

        if (!$result) {
            return 0;
        }

         $transformed = $this->transformer->toData($result);

        mysqli_free_result($result);
        return $transformed;
    }

    /*Korisnik izlistava sve kritike za odredjenu knjigu */
    public function reviewsFromBooks($id)
    {
        $query = "SELECT * FROM reviews WHERE book_id = $id";
        //echo '<pre>' . $query . '</pre>';
        $result = $this->connection->query($query);

        if (!$result) {
            return [];
        }

        $transformed = reviews()->transformer->toObjectArray($result);

        mysqli_free_result($result);
        return $transformed;
    }
}