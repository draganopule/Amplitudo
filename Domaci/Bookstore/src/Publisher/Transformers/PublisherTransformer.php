<?php

namespace Bookstore\Publisher\Transformers;

use Bookstore\Publisher\Models\Publisher;
use Bookstore\Library\Transformers\ObjectTransformer;

class PublisherTransformer extends ObjectTransformer
{
    protected $fields = [
        'id' => 'int',
        'name' => 'string',
    ];
    public function toObject($array)
    {
        return new Publisher(
            $array['id'] ?? 0,
            $array['name'] ?? ''
        );
    }
}