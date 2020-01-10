<?php

namespace Bookstore\Review\Models;

class Review
{
    public $revNumber;
    public $revText;
    public $grade;
    public $bookId;
    public $userId;
    public function __construct($revNumber, $revText, $grade, $bookId, $userId)
    {
        $this->revNumber = $revNumber;
        $this->revText = $revText;
        $this->grade = $grade;
        $this->bookId = $bookId;
        $this->userId = $userId;
    }

    public function __toArray()
    {
        return [
            'rev_number' => $this->revNumber,
            'rev_text' => $this->revText,
            'grade' => $this->grade,
            'book_id' => $this->bookId,
            'user_id' => $this->userId,
        ];
    }
}