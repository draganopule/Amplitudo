<?php

use Bookstore\Library\Exceptions\ValidationException;

require_once '../../autoload.php';

try {
    requestValidator()->validateWithThrow([
        'rev_text'     => 'Text is required.',
        'grade'        => 'Grade is required',
        'book_id'      => 'Book name is required',
    ], $_POST);

    reviews()->save($_POST);
    redirect('./reviews-from-book.php?item=' . $_POST['book_id']);
} catch (ValidationException $e) {
    redirect('./reviews-add.php?item=' . $_POST['book_id']);
}
