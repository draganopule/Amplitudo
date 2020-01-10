<?php

namespace Bookstore\Autor\Transformers;

use Bookstore\Autor\Models\Autor;
use Bookstore\Library\Transformers\ObjectTransformer;

class AutorTransformer extends ObjectTransformer
{
    protected $fields = [
        'id' => 'int',
        'name' => 'string',
    ];
    public function toObject($array)
    {
        return new Autor(
            $array['id'] ?? 0,
            $array['name'] ?? ''
        );
    }
}