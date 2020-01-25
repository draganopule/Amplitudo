<?php

require_once '../../autoload.php';

if (isset($_GET['item'])) {
    autors()->destroy($_GET['item']);
}

redirect('./autors.php');
