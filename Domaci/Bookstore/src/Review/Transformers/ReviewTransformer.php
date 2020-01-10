<?php

namespace Bookstore\Review\Transformers;

use Bookstore\Review\Models\Review;
use Bookstore\Library\Transformers\ObjectTransformer;
use mysqli_result as MySqlResult;

class ReviewTransformer extends ObjectTransformer
{
    protected $fields = [
        'rev_number' => 'int',
        'rev_text' => 'string',
        'grade' => 'int',
        'book_id' => 'int',
        'user_id' => 'int',
    ];

    public function toObject($array)
    {
        return new Review(
            $array['rev_number'] ?? 0,
            $array['rev_text'] ?? '',
            $array['grade'] ?? 0,
            $array['book_id'] ?? 0,
            $array['user_id'] ?? 0
        );
    }

    public function toData(MySqlResult $set)
    {
        $data = $set->fetch_assoc();
        foreach ($data as $key => $value) {
            return $value;
        }
    }
}