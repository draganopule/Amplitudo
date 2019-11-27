<?php

namespace Amplitudo\Domaci5\Factory;
//interface koji nasljedjuju sve fabrike automobila
interface GeneralFactory
{
    public static function create($model);
}