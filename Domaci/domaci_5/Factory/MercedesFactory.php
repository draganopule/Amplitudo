<?php

namespace Amplitudo\Domaci5\Factory;

//Klasa MercedesFactory sluzi za pravljenje automobila marke "Mercedes"
class MercedesFactory implements GeneralFactory
{
    /*
    Funkcija create($model) kreira automobil pozivom konstruktora klase Automobile
    i prosljedjuje mu kao nepromjenjive podatke o proizvodjacu i godini proizvodnje.
    Godina proizvodnje se generise automatski pozivom ugradjene funkcije date('Y').
    Podatak za model automobila je promjenjiv i on zavisi od toga sta je korisnik 
    unio kao argument kad je pozvao funkciju create($model).
    */
    public static function create($model)
    {
        return new Automobile('Mercedes', $model, date('Y'));
    }
}