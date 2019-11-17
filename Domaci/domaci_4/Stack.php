<?php

namespace Amplitudo\Domaci4;

require_once './Collection.php';

class Stack extends Collection
{
    public function push($item)
    {
        parent::add($item, $this->count);
        $this->count++;
    }

    public function pop()
    {
        $this->count--;
        return array_pop($this->items);
    }

    public function getIterator()
    {
        
    }
}

?>