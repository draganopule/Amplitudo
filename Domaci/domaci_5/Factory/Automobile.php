<?php

namespace Amplitudo\Domaci5\Factory;

/*
Klasa Automobile koja sadrzi podatke o proizvodjacu ($make), modelu ($model),
i godinu kad je automobil proizveden ($year)
*/
class Automobile
{
    private $make;
    private $model;
    private $year;

    public function __construct($make, $model, $year)
    {
        $this->make = $make;
        $this->model = $model;
        $this->year = $year;
    }
    public function getMake()
    {
        return $this->make;
    }
    public function getModel()
    {
        return $this->model;
    }
    public function getYear()
    {
        return $this->year;
    }
    public function __toString()
    {
        return $this->make . ', ' . $this->model . ', ' . $this->year;
    }
}