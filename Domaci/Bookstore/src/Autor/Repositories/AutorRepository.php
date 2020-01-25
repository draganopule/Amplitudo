<?php

namespace Bookstore\Autor\Repositories;

use Bookstore\Autor\Models\Autor;
use Bookstore\Autor\Transformers\AutorTransformer;
use Bookstore\Library\Exceptions\ItemNotDeletedException;
use Bookstore\Library\Exceptions\ItemNotFoundException;
use Bookstore\Library\Exceptions\ItemNotSavedException;
use Bookstore\Library\Repositories\ObjectRepository;

use mysqli as MySQL;

class AutorRepository extends ObjectRepository
{
    protected $tableName  = 'autors';
    protected $primaryKey = 'id';

    public function __construct(MySQL $connection)
    {
        parent::__construct($connection);
        $this->transformer = new AutorTransformer($connection);
    }

    
    /*Korisnik prikazuje autora za odredjenu knjigu */
    public function autorFromBook($id)
    {
        $query = "SELECT * FROM autors A WHERE EXISTS (SELECT * FROM book_autors BA WHERE A.id = BA.autor_id AND BA.book_id = $id)";
        //echo '<pre>' . $query . '</pre>';
        $result = $this->connection->query($query);
        $item = $result->fetch_assoc();

        if (!$item) {
            throw new ItemNotFoundException();
        }

        $transformed = $this->transformer->toObject($item);
        mysqli_free_result($result);
        return $transformed;
    }
}