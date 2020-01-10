<?php

namespace Bookstore\User\Transformers;

use Bookstore\User\Models\User;
use Bookstore\Library\Transformers\ObjectTransformer;

class UserTransformer extends ObjectTransformer
{
    protected $fields = [
        'id' => 'int',
        'username' => 'string',
        'birth_year' => 'string',
        'email' => 'int',
    ];
    public function toObject($array)
    {
        return new User(
            $array['id'] ?? 0,
            $array['username'] ?? '',
            $array['birth_year'] ?? 0,
            $array['email'] ??''
        );
    }
}