<?php

namespace Bookstore\User\Repositories;

use Bookstore\User\Models\User;
use Bookstore\User\Transformers\UserTransformer;
use Bookstore\Library\Exceptions\ItemNotDeletedException;
use Bookstore\Library\Exceptions\ItemNotFoundException;
use Bookstore\Library\Exceptions\ItemNotSavedException;
use Bookstore\Library\Repositories\ObjectRepository;

use mysqli as MySQL;

class UserRepository extends ObjectRepository
{
    protected $tableName = 'users';
    protected $primaryKey = 'id';
    
    public function __construct(MySQL $connection)
    {
        parent::__construct($connection);
        $this->transformer = new UserTransformer($connection);
    }
}