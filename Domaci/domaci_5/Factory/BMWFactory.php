<?php

namespace Amplitudo\Domaci5\Factory;

class BMWFactory implements GeneralFactory
{
    public static function create($model)
    {
        return new Automobile('BMW', $model, date('Y'));
    }
}