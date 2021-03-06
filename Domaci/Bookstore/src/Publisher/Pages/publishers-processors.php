<?php

use Bookstore\Library\Exceptions\ValidationException;

require_once '../../autoload.php';

try {
    requestValidator()->validateWithThrow([
        'name'        => 'Name is required.',
    ], $_POST);

    $item = publishers()->save($_POST);
    redirect('./publishers.php?item=' . $item->id);
} catch (ValidationException $e) {
    if (isset($_POST['id'])) {
        redirect('./publishers-edit.php?item=' . $_POST['id']);
    } else {
        redirect('./publishers-edit.php');
    }
}
