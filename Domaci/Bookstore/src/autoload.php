<?php
require_once './Library/DB/DBConnection.php';
require_once './Library/Exceptions/DBException.php';
require_once './Library/Repositories/ObjectRepository.php';
require_once './Library/Transformers/ObjectTransformer.php';
require_once './Library/Exceptions/ItemNotFoundException.php';
require_once './Library/Exceptions/ItemNotSavedException.php';
require_once './Library/Exceptions/ItemNotDeletedException.php';

require_once './functions.php';

require_once './Book/Models/Book.php';
require_once './Book/Repositories/BookRepository.php';
require_once './Book/Transformers/BookTransformer.php';