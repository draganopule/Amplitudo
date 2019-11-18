<?php

namespace Amplitudo\Domaci4;

abstract class Collection implements HTMLRenderable
{
    protected $items = array();
    protected $count;

    protected function add($element, $position)
    {
        if($position < 0 || $position > $this->count){
            throw new CollectionOverflowException();//izbacujemo izuzetak ukoliko je pozicija 
                                                    //van opsega niza.
        }
        array_splice($this->items, $position, 0, $element);
        //ugradjena funkcija array_splice($this->items, $position, 0, $element)
        //u nizu $items, na poziciji $position, brise 0 elemenata i dodaje $element
    }

    public abstract function getIterator();

    public function isEmpty()//provjeravamo da li je niz $items prazan
    {
        return empty($this->items);
    }

    public function toHtml()//generisemo neuredjenu listu koja predstavlja trenutnu kolekciju
    {
        echo '<ul>';
        foreach($this->items as $item){
            echo '<li>' . $item . '</li>';
        }
        echo '</ul>';
    }
}

?>