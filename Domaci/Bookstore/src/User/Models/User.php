<?php

namespace Bookstore\User\Models;

class User
{
    public $id;
    public $username;
    public $birthYear;
    public $email;
    public function __construct($id, $username, $birthYear, $email)
    {
        $this->id = $id;
        $this->username = $username;
        $this->birthYear = $birthYear;
        $this->email = $email;
    }

    public function __toString()
    {
        return $this->username;
    }

    public function __toArray()
    {
        return [
            'id' => $this->id,
            'username' => $this->username,
            'birth_year' => $this->birthYear,
            'email' => $this->email,
        ];
    }
}