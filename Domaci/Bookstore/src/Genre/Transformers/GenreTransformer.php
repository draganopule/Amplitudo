<?php

namespace Bookstore\Genre\Transformers;

use Bookstore\Genre\Models\Genre;
use Bookstore\Library\Transformers\ObjectTransformer;

class GenreTransformer extends ObjectTransformer
{
    protected $fields = [
        'id' => 'int',
        'name' => 'string',
    ];
    public function toObject($array)
    {
        return new Genre(
            $array['id'] ?? 0,
            $array['name'] ?? ''
        );
    }
}