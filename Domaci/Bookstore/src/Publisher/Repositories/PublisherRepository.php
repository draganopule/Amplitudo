<?php

namespace Bookstore\Publisher\Repositories;

use mysqli as MySQL;
use Bookstore\Library\Repositories\ObjectRepository;
use Bookstore\Publisher\Transformers\PublisherTransformer;

class PublisherRepository extends ObjectRepository
{
    protected $tableName  = 'publishers';
    protected $primaryKey = 'id';

    public function __construct(MySQL $connection)
    {
        parent::__construct($connection);
        $this->transformer = new PublisherTransformer($connection);
    }
}