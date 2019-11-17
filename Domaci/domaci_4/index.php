<?php

$items = ['a','b','c','d'];
$element = 'x';
array_splice($items, 4, 0, $element);

echo '<pre>';

var_dump($items);

echo '</pre>';

echo array_shift($items);

echo '<pre>';

var_dump($items);

echo '</pre>';

?>