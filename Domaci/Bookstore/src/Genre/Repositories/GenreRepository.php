<?php

namespace Bookstore\Genre\Repositories;

use Bookstore\Genre\Models\Genre;
use Bookstore\Genre\Transformers\GenreTransformer;
use Bookstore\Library\Exceptions\ItemNotDeletedException;
use Bookstore\Library\Exceptions\ItemNotFoundException;
use Bookstore\Library\Exceptions\ItemNotSavedException;
use Bookstore\Library\Repositories\ObjectRepository;

use mysqli as MySQL;

class GenreRepository extends ObjectRepository
{
    protected $tableName = 'genres';
    protected $primaryKey = 'id';
    
    public function __construct(MySQL $connection)
    {
        parent::__construct($connection);
        $this->transformer = new GenreTransformer($connection);
    }
}