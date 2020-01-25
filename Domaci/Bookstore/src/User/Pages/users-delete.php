<?php

require_once '../../autoload.php';

if (isset($_GET['item'])) {
    users()->destroy($_GET['item']);
}

redirect('./users.php');
