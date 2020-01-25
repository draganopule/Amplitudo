<?php

use Bookstore\Library\Exceptions\ValidationException;

require_once '../../autoload.php';

try {
    requestValidator()->validateWithThrow([
        'name'        => 'Name is required.',
    ], $_POST);

    $item = autors()->save($_POST);
    redirect('./autors.php?item=' . $item->id);
} catch (ValidationException $e) {
    if (isset($_POST['id'])) {
        redirect('./autors-edit.php?item=' . $_POST['id']);
    } else {
        redirect('./autors-edit.php');
    }
}
