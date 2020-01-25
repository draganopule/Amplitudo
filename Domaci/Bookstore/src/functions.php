<?php

use Bookstore\Book\Repositories\BookRepository;
use Bookstore\Publisher\Repositories\PublisherRepository;
use Bookstore\Genre\Repositories\GenreRepository;
use Bookstore\Autor\Repositories\AutorRepository;
use Bookstore\Review\Repositories\ReviewRepository;
use Bookstore\User\Repositories\UserRepository;
use Bookstore\Library\DB\DBConnection;
use Bookstore\Library\Validators\RequestValidator;

function redirect($location)
{
    header('Location: ' . $location);
    exit;
}

function fetchErrors()
{
    session_start();
    $errors = isset($_SESSION['errors']) ? $_SESSION['errors'] : [];

    $_SESSION['errors'] = [];
    session_write_close();

    return $errors;
}

function requestValidator()
{
    return new RequestValidator();
}

function books()
{
    return new BookRepository(DBConnection::getConnection());
}

function publishers()
{
    return new PublisherRepository(DBConnection::getConnection());
}

function genres()
{
    return new GenreRepository(DBConnection::getConnection());
}

function autors()
{
    return new AutorRepository(DBConnection::getConnection());
}

function reviews()
{
    return new ReviewRepository(DBConnection::getConnection());
}

function users()
{
    return new UserRepository(DBConnection::getConnection());
}

function isPageActive($pages)
{
    foreach ($pages as $page) {
        if (basename($_SERVER['PHP_SELF']) === $page) {
            return true;
        }
    }

    return false;
}