<?php

use Bookstore\Library\Exceptions\ValidationException;

require_once '../../autoload.php';

try {
    requestValidator()->validateWithThrow([
        'name'        => 'Name is required.',
        'isbn'        => 'ISBN is required',
    ], $_POST);

    $item = books()->save($_POST);
    redirect('./books.php?item=' . $item->id);
} catch (ValidationException $e) {
    if (isset($_POST['id'])) {
        redirect('./books-edit.php?item=' . $_POST['id']);
    } else {
        redirect('./books-edit.php');
    }
}
