<?php

use Bookstore\Library\Exceptions\ValidationException;

require_once '../../autoload.php';

try {
    requestValidator()->validateWithThrow([
        'username'        => 'Username is required.',
        'email'        => 'Email is required.',
    ], $_POST);

    $item = users()->save($_POST);
    redirect('./users.php?item=' . $item->id);
} catch (ValidationException $e) {
    if (isset($_POST['id'])) {
        redirect('./users-edit.php?item=' . $_POST['id']);
    } else {
        redirect('./users-edit.php');
    }
}
