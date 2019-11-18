<?php

require_once './autoload.php';

use Amplitudo\Domaci4\Queue;
use Amplitudo\Domaci4\Stack;

$items = ['a','b','c','d'];

$queue = new Queue();
foreach($items as $item){
    $queue->enqueue($item);//preko metode enqueue($item) dodajemo element po element u queue
}
echo '<h3>Queue elementi:</h3>';
$queue->toHtml();//koristimo naslijedjenu metodu toHtml() da stampamo sve elemente iz kolekcije

echo '<h3>Queue iterator:</h3>';
$queIterator = $queue->getIterator();//funkcijom getIterator() vracamo objekat klase QueueIterator


while($queIterator->hasNext()){//u while petlji koristimo metode tog objekta hasNext() 
    echo '<p>' . $queIterator->next() . '</p>';//i next() da se krecemo kroz kolekciju i  
}                                              //jedan po jedan element 'izvlacimo' iz kolekcije

if($queue->isEmpty()){
    echo '<h3>Nakon iteratora nema vise elemenata u kolekciji queue</h3>';
}
else{
    echo '<h3>Nakon iteratora u kolekciji su ostali sledeci elementi:</h3>';
    $queue->toHtml();
}


$stack = new Stack();
foreach($items as $item){
    $stack->push($item);//preko metode push($item) dodajemo element po element u stack
}
echo '<h3>Stack elementi:</h3>';
$stack->toHtml();//koristimo naslijedjenu metodu toHtml() da stampamo sve elemente iz kolekcije

echo '<h3>Stack iterator:</h3>';
$stackIterator = $stack->getIterator();//funkcijom getIterator() vracamo objekat klase StackIterator
while($stackIterator->hasNext()){//u while petlji koristimo metode tog objekta hasNext() 
    echo '<p>' . $stackIterator->next() . '</p>';//i next() da se krecemo kroz kolekciju i  
}                                              //jedan po jedan element 'izvlacimo' iz kolekcije

if($stack->isEmpty()){
    echo '<h3>Nakon iteratora nema vise elemenata u kolekciji stack</h3>';
}
else{
    echo '<h3>Nakon iteratora u kolekciji su ostali sledeci elementi:</h3>';
    $stack->toHtml();
}

?>