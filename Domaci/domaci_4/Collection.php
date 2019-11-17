<?php

namespace Amplitudo\Domaci4;

class Collection implements HTMLRenderable
{
    protected $items;
    protected $count;

    protected function add($element, $position)
    {
        if($position < 0 || $position > $this->count){
            throw new CollectionOverflowException();
        }
        $this->items[$position] = $element;
    }

    public abstract function getIterator();

    public function isEmpty()
    {
        return empty($this->items);
    }

    public function toHtml()
    {
        echo '<ul>';
        foreach($this->items as $it){
            echo '<li>' . $it . '</li>';
        }
    }
}

?>