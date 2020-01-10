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
    protected $tableName = 'review';
    protected $primaryKey = 'rev_number';
    
    public function __construct(MySQL $connection)
    {
        parent::__construct($connection);
        $this->transformer = new ReviewTransformer($connection);
    }

    /* Korisnik racuna prosjecnu ocjenu za odredjenu knjigu*/
    public function averageGradeOfBook($bookName)
    {
        $bookName = books()->transformer->sqlString($bookName);

        $query = "SELECT AVG(grade) FROM reviews R WHERE book_id = (SELECT id FROM books B WHERE B.name = $bookName)";
        
        $result = $this->connection->query($query);

        if (!$result) {
            return 0;
        }

         $transformed = $this->transformer->toData($result);

        mysqli_free_result($result);
        return $transformed;
    }
}