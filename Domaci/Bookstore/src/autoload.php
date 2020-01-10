<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/Amplitudo/Domaci/Bookstore/src/Library/DB/DBConnection.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Amplitudo/Domaci/Bookstore/src/Library/Exceptions/DBException.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Amplitudo/Domaci/Bookstore/src/Library/Repositories/ObjectRepository.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Amplitudo/Domaci/Bookstore/src/Library/Transformers/ObjectTransformer.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Amplitudo/Domaci/Bookstore/src/Library/Exceptions/ItemNotFoundException.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Amplitudo/Domaci/Bookstore/src/Library/Exceptions/ItemNotSavedException.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Amplitudo/Domaci/Bookstore/src/Library/Exceptions/ItemNotDeletedException.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Amplitudo/Domaci/Bookstore/src/Library/Exceptions/ValidationException.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Amplitudo/Domaci/Bookstore/src/Library/Validators/RequestValidator.php';

require_once $_SERVER['DOCUMENT_ROOT'] . '/Amplitudo/Domaci/Bookstore/src/functions.php';

require_once $_SERVER['DOCUMENT_ROOT'] . '/Amplitudo/Domaci/Bookstore/src/Book/Models/Book.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Amplitudo/Domaci/Bookstore/src/Book/Repositories/BookRepository.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Amplitudo/Domaci/Bookstore/src/Book/Transformers/BookTransformer.php';

require_once $_SERVER['DOCUMENT_ROOT'] . '/Amplitudo/Domaci/Bookstore/src/Publisher/Models/Publisher.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Amplitudo/Domaci/Bookstore/src/Publisher/Repositories/PublisherRepository.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Amplitudo/Domaci/Bookstore/src/Publisher/Transformers/PublisherTransformer.php';

require_once $_SERVER['DOCUMENT_ROOT'] . '/Amplitudo/Domaci/Bookstore/src/Genre/Models/Genre.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Amplitudo/Domaci/Bookstore/src/Genre/Repositories/GenreRepository.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Amplitudo/Domaci/Bookstore/src/Genre/Transformers/GenreTransformer.php';

require_once $_SERVER['DOCUMENT_ROOT'] . '/Amplitudo/Domaci/Bookstore/src/Autor/Models/Autor.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Amplitudo/Domaci/Bookstore/src/Autor/Repositories/AutorRepository.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Amplitudo/Domaci/Bookstore/src/Autor/Transformers/AutorTransformer.php';

require_once $_SERVER['DOCUMENT_ROOT'] . '/Amplitudo/Domaci/Bookstore/src/Review/Models/Review.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Amplitudo/Domaci/Bookstore/src/Review/Repositories/ReviewRepository.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Amplitudo/Domaci/Bookstore/src/Review/Transformers/ReviewTransformer.php';

require_once $_SERVER['DOCUMENT_ROOT'] . '/Amplitudo/Domaci/Bookstore/src/User/Models/User.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Amplitudo/Domaci/Bookstore/src/User/Repositories/UserRepository.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Amplitudo/Domaci/Bookstore/src/User/Transformers/UserTransformer.php';