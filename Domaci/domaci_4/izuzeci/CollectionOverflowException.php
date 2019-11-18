<?php

namespace Amplitudo\Domaci4;

use \Exception;

class CollectionOverflowException extends Exception
{
    public function __construct()
    {
        parent::__construct(
            'Pozicija na koju zelite da umetnete element je van opsega kolekcije',
            401,
            null
        );
    }
}

?>