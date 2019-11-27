<?php

namespace Amplitudo\Domaci5\Factory;

require_once './Factory/Automobile.php';
require_once './Factory/GeneralFactory.php';
require_once './Factory/MercedesFactory.php';
require_once './Factory/BMWFactory.php';
/*
kreiramo dva vozila koristeci staticku funkciju create()
iz klasa 'MercedesFactory' 'BMWFactory'. Ovo su tzv. faktori klase.
One za nas pozivaju konstruktor klase 'Automobile' i salju mu podatke koji su mu potrebni.
U ovom primjeru ja sam sakrio od korisnika sta je sve potrebno konstruktoru 
klase 'Automobile' i on samo salje model automobila koji zeli da napravi.
Biranje marke (proizvodjaca) automobila je sakriveno od korisnika i on to 
bira posredno, na nacin sto izabere iz koje klase (fabrike) poziva funkciju create. 
*/
$vozilo1 = MercedesFactory::create('B 180');
$vozilo2 = BMWFactory::create('X5');

echo '<h3>' . $vozilo1 . '</h3>';
echo '<h3>' . $vozilo2 . '</h3>';