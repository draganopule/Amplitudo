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
    
    public function getIsbn()
    {
        return $this->isbn;
    }

    public function __toString()
    {
        return $this->name;
    }

    public function __toArray()
    {
        return [
            'isbn' => $this->isbn,
            'name' => $this->name,
            'year_of_publication' => $this->yearOfPublication,
            'publisher_id' => $this->publisherId,
        ];
    }
}