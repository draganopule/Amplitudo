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
}