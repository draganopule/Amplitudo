<?php

namespace Bookstore\Rental\Models;

class Rental
{
    public $id;
    public $rentalDate;
    public $userId;
    public $bookId;
    public function __construct($id, $rentalDate, $userId, $bookId)
    {
        $this->id = $id;
        $this->rentalDate = $rentalDate;
        $this->userId = $userId;
        $this->bookId = $bookId;
    }

    public function __toArray()
    {
        return [
            'id' => $this->id,
            'rental_date' => $this->rentalDate,
            'user_id' => $this->userId,
            'book_id' => $this->bookId,
        ];
    }
}