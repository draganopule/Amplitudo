<?php

namespace Amplitudo\Domaci4;

use Amplitudo\Domaci4\CollectionOverflowException;

class Stack extends Collection
{
    public function push($item)
    {
        try{                                 //na kraj kolekcije dodajemo $item koristeci 
            parent::add($item, $this->count);//naslijedjenu metodu add($element, $position) 
            $this->count++;                                   
        }catch(CollectionOverflowException $e){//hvatamo izuzetak ukoliko je pozicija 
            echo '<h4>'. $e->getMessage() . '</h4>';//van opsega kolekcije
        }
    }

    public function pop()
    {
        $this->count--;
        return array_pop($this->items);//ugradjena funkcija array_pop($this->items) brise 
    }                                  //poslednji element iz kolekcije i vraca ga kao rezultat
    

    public function getIterator()
    {
        return new StackIterator($this);//vracamo StackIterator za trenutni objekat
    }
}

?>