<?php

require_once '../../autoload.php';

if (isset($_GET['item'])) {
    publishers()->destroy($_GET['item']);
}

redirect('./publishers.php');
