<?php

require_once './autoload.php';

if (isset($_GET['item'])) {
    books()->destroy($_GET['item']);
}

redirect('./books.php');
