<?php

require_once '../../autoload.php';

if (isset($_GET['item'])) {
    genres()->destroy($_GET['item']);
}

redirect('./genres.php');
