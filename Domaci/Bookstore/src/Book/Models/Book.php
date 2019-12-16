<?php

namespace Bookstore\Book\Models;

class Book
{
    public $isbn;
    public $name;
    public $yearOfPublication;
    public $publisherId;
    public function __construct($isbn, $name, $yearOfPublication, $publisherId)
    {
        $this->isbn = $isbn;
        $this->name = $name;
        $this->yearOfPublication = $yearOfPublication;
        $this->publisherId = $publisherId;
    }
    
    public function __toString()
    {
        return $this->name;
    }
}