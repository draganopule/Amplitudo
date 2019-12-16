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
    protected $primaryKey = 'isbn';
    public function __construct(MySQL $connection)
    {
        parent::__construct($connection);
        $this->transformer = new BookTransformer($connection);
    }
    // public function findById($id)
    // {
    //     //$value = $this->transformer->transformField($id, $this->primaryKey);
    //     $query = "SELECT * FROM $this->tableName WHERE $this->primaryKey = $id";
    //     $result = $this->connection->query($query);
    //     $item = $result->fetch_assoc();
    //     if (!$item) {
    //         throw new ItemNotFoundException();
    //     }
    //     $transformed = $this->transformer->transform($item);
    //     mysqli_free_result($result);
    //     return $transformed;
    // }
     public function insert($book)
     {
         $data = $this->transformer->transformToArray($book);
         $columns = '(' . implode(', ', array_keys($data)) . ')';
         $values = '(' . implode(', ', array_values($data)) . ')';
         $query = "INSERT INTO $this->tableName $columns VALUES $values";
         if (!$this->connection->query($query)) {
             throw new ItemNotSavedException();
         }
         
         return  $this->findById($book->getIsbn());
     }
}