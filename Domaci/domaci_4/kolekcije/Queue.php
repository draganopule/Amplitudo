<?php

namespace Amplitudo\Domaci4;

use Amplitudo\Domaci4\CollectionOverflowException;

class Queue extends Collection
{
    public function enqueue($item)
    {
        try{                                 //na kraj kolekcije dodajemo $item koristeci
            parent::add($item, $this->count);//naslijedjenu metodu add($element, $position) 
            $this->count++;
        }catch(CollectionOverflowException $e){//hvatamo izuzetak ukoliko je pozicija 
            echo '<h4>'. $e->getMessage() . '</h4>';//van opsega kolekcije
        }
    }

    public function dequeue()
    {
        $this->count--;
        return array_shift($this->items);//ugradjena funkcija array_shift($this->items) brise 
    }                                    //prvi element iz kolekcije i vraca ga kao rezultat

    public function getIterator()
    {
        return new QueueIterator($this);//vracamo QueueIterator za trenutni objekat
    }
}

?>