<?php

use Bookstore\Library\Exceptions\ValidationException;

require_once '../../autoload.php';

try {
    requestValidator()->validateWithThrow([
        'name'        => 'Name is required.',
    ], $_POST);

    $item = genres()->save($_POST);
    redirect('./genres.php?item=' . $item->id);
} catch (ValidationException $e) {
    if (isset($_POST['id'])) {
        redirect('./genres-edit.php?item=' . $_POST['id']);
    } else {
        redirect('./genres-edit.php');
    }
}
