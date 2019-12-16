<?php

namespace Bookstore\Book\Transformers;

use Bookstore\Book\Models\Book;
use Bookstore\Library\Transformers\ObjectTransformer;

class BookTransformer extends ObjectTransformer
{
    protected $fields = [
        'isbn' => 'string',
        'name' => 'string',
        'year_of_publication' => 'int',
        'publisher_id' => 'int',
    ];
    public function transform($array)
    {
        return new Book(
            $array['isbn'],
            $array['name'],
            $array['year_of_publication'],
            $array['publisher_id']
        );
    }
    public function transformToArray($object)
    {
        return [
            'isbn' => $this->transformString($object->isbn),
            'name' => $this->transformString($object->name),
            'year_of_publication' => $object->yearOfPublication,
            'publisher_id' => $object->publisherId,
        ];
    }
}