<?php

namespace Bookstore\Rental\Repositories;

use Bookstore\Rental\Models\Rental;
use Bookstore\Rental\Transformers\RentalTransformer;
use Bookstore\Library\Exceptions\ItemNotDeletedException;
use Bookstore\Library\Exceptions\ItemNotFoundException;
use Bookstore\Library\Exceptions\ItemNotSavedException;
use Bookstore\Library\Repositories\ObjectRepository;

use mysqli as MySQL;

class RentalRepository extends ObjectRepository
{
    protected $tableName = 'rentals';
    protected $primaryKey = 'id';
    
    public function __construct(MySQL $connection)
    {
        parent::__construct($connection);
        $this->transformer = new RentalTransformer($connection);
    }
}