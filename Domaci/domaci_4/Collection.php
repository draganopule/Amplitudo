<?php

namespace Amplitudo\Domaci4;

require_once './HTMLRenderable.php';

class Collection implements HTMLRenderable
{
    protected $items;
    protected $count;

    public function __construct($items, $count)
    {
        $this->items = $items;
        $this->$count = $count;
    }
    protected function add($element, $position)
    {
        if($position < 0 || $position > $this->count){
            throw new CollectionOverflowException();
        }
        array_splice($this->items, $this->position, 0, $element);
    }

    public abstract function getIterator();

    public function isEmpty()
    {
        return empty($this->items);
    }

    public function toHtml()
    {
        echo '<ul>';
        foreach($this->items as $item){
            echo '<li>' . $item . '</li>';
        }
    }
}

?>