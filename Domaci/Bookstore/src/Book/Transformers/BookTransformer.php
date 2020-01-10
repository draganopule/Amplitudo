<?php

namespace Bookstore\Book\Transformers;

use Bookstore\Book\Models\Book;
use Bookstore\Library\Transformers\ObjectTransformer;

class BookTransformer extends ObjectTransformer
{
    protected $fields = [
        'id' => 'int',
        'isbn' => 'string',
        'name' => 'string',
        'year_of_publication' => 'int',
        'publisher_id' => 'int',
    ];
    public function toObject($array)
    {
        return new Book(
            $array['id'] ?? 0,
            $array['isbn'] ?? '',
            $array['name'] ?? '',
            $array['year_of_publication'] ?? 0,
            $array['publisher_id'] ?? 0
        );
    }
}