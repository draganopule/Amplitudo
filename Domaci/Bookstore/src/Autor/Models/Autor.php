<?php

namespace Bookstore\Autor\Models;

class Autor
{
    public $id;
    public $name;
    public function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public function __toString()
    {
        return $this->name;
    }

    public function __toArray()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
        ];
    }
}