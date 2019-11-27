<?php

namespace Amplitudo\Domaci5\Factory;

class MercedesFactory implements GeneralFactory
{
    public static function create($model)
    {
        return new Automobile('Mercedes', $model, date('Y'));
    }
}