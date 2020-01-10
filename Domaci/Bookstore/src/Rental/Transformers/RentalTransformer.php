<?php

namespace Bookstore\Rental\Transformers;

use Bookstore\Rental\Models\Rental;
use Bookstore\Library\Transformers\ObjectTransformer;

class RentalTransformer extends ObjectTransformer
{
    protected $fields = [
        'id' => 'int',
        'rental_date' => 'string',
        'user_id' => 'int',
        'book_id' => 'int',
    ];
    public function toObject($array)
    {
        return new Rental(
            $array['id'] ?? 0,
            $array['rental_date'] ?? '',
            $array['user_id'] ?? 0,
            $array['book_id'] ?? 0,
        );
    }
}