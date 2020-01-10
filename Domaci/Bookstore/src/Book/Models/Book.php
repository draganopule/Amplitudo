<?php

namespace Bookstore\Book\Models;

class Book
{
    public $id;
    public $isbn;
    public $name;
    public $yearOfPublication;
    public $publisherId;

    public $publisher;

    public function __construct($id, $isbn, $name, $yearOfPublication, $publisherId)
    {
        $this->id = $id;
        $this->isbn = $isbn;
        $this->name = $name;
        $this->yearOfPublication = $yearOfPublication;
        $this->publisherId = $publisherId;
    }

    public function __toString()
    {
        return $this->name;
    }

    public function publisher($refresh = false)
    {
        if ($this->publisherId && (!$this->publisher || $refresh)) {
            $this->publisher = publishers()->findById($this->publisherId);
        }

        return $this->publisher;
    }

    public function __toArray()
    {
        return [
            'id' => $this->id,
            'isbn' => $this->isbn,
            'name' => $this->name,
            'year_of_publication' => $this->yearOfPublication,
            'publisher_id' => $this->publisherId,
        ];
    }
}