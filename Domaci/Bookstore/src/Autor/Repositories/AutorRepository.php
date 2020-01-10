<?php

namespace Bookstore\Autor\Repositories;

use Bookstore\Autor\Models\Autor;
use Bookstore\Autor\Transformers\AutorTransformer;
use Bookstore\Library\Exceptions\ItemNotDeletedException;
use Bookstore\Library\Exceptions\ItemNotFoundException;
use Bookstore\Library\Exceptions\ItemNotSavedException;
use Bookstore\Library\Repositories\ObjectRepository;

use mysqli as MySQL;

class AutorRepository extends ObjectRepository
{
    protected $tableName  = 'autors';
    protected $primaryKey = 'id';

    public function __construct(MySQL $connection)
    {
        parent::__construct($connection);
        $this->transformer = new AutorTransformer($connection);
    }
}